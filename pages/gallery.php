<?php include_once '../includes/header.php'; ?>
<?php
require_once '../connect.php';

try {
    // 1. Fetch Categories that actually have active media
    $categories = $pdo->query("
        SELECT DISTINCT gc.name, gc.slug 
        FROM gallery_categories gc
        JOIN gallery_media gm ON gc.id = gm.category_id
        WHERE gc.status = 1 AND gm.status = 1
        ORDER BY gc.name ASC
    ")->fetchAll(PDO::FETCH_ASSOC);

    // 2. Fetch all active Media
    $media = $pdo->query("
        SELECT gm.*, gc.slug
        FROM gallery_media gm
        JOIN gallery_categories gc ON gc.id = gm.category_id
        WHERE gm.status = 1
          AND gc.status = 1
        ORDER BY gm.sort_order ASC, gm.created_at DESC
    ")->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $categories = [];
    $media = [];
}
?>
<style>
    :root {
        --srm-navy: #1E293B;
        --srm-red: #D32F2F;
        --srm-gold: #F59E0B;
        --srm-light: #F8FAFC;
        --srm-muted: #64748B;
    }

    body {
        margin: 0;
        font-family: 'Nunito', sans-serif;
        background: var(--srm-light);
        color: var(--srm-navy);
    }

    .gallery-wrap {
        max-width: 1200px;
        margin: 0 auto;
        padding: 64px 20px 80px;
    }

    .gallery-title {
        margin: 0 0 10px;
        font-family: 'Rajdhani', sans-serif;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .gallery-subtitle {
        margin: 0 0 32px;
        font-size: 1rem;
        line-height: 1.6;
        max-width: 720px;
        color: var(--srm-muted);
    }

    .gallery-video {
        margin-bottom: 36px;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        box-shadow: 0 16px 32px rgba(30, 41, 59, 0.10);
        background: #000000;
        aspect-ratio: 16 / 9;
    }

    .gallery-video video {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        object-position: center;
        background: #000000;
    }

    .filter-bubbles {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 26px;
        padding: 12px;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
    }

    .mobile-filter {
        display: none;
        margin-bottom: 18px;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 12px;
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: 0 10px 22px rgba(15, 23, 42, 0.07);
    }

    .mobile-filter-label {
        display: block;
        margin-bottom: 8px;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.09em;
        text-transform: uppercase;
        color: #475569;
    }

    .mobile-select-wrap {
        position: relative;
    }

    .mobile-filter select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 100%;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        color: var(--srm-navy);
        padding: 12px 40px 12px 14px;
        border-radius: 10px;
        font-size: 0.88rem;
        font-weight: 800;
        outline: none;
        box-shadow: 0 1px 0 #f1f5f9 inset;
    }

    .mobile-select-wrap::after {
        content: '';
        position: absolute;
        right: 14px;
        top: 50%;
        width: 8px;
        height: 8px;
        border-right: 2px solid #64748b;
        border-bottom: 2px solid #64748b;
        transform: translateY(-60%) rotate(45deg);
        pointer-events: none;
    }

    .filter-btn {
        border: 1px solid #e2e8f0;
        background: #ffffff;
        color: var(--srm-navy);
        padding: 10px 16px;
        border-radius: 999px;
        font-size: 0.86rem;
        font-weight: 800;
        letter-spacing: 0.02em;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
    }

    .filter-btn:hover {
        border-color: var(--srm-red);
        color: var(--srm-red);
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(211, 47, 47, 0.16);
    }

    .filter-btn.active {
        background: linear-gradient(135deg, #ef4444 0%, #b91c1c 100%);
        color: #ffffff;
        border-color: #b91c1c;
        box-shadow: 0 10px 22px rgba(185, 28, 28, 0.24);
    }

    .masonry-grid {
        column-count: 3;
        column-gap: 16px;
    }

    .gallery-item {
        break-inside: avoid;
        margin-bottom: 16px;
        border-radius: 14px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 12px 24px rgba(30, 41, 59, 0.08);
    }

    .gallery-item.hidden {
        display: none;
    }

    .gallery-item img {
        width: 100%;
        height: auto;
        display: block;
    }

    .gallery-empty {
        display: none;
        margin: 0;
        padding: 18px 14px;
        border: 1px dashed #cbd5e1;
        border-radius: 10px;
        color: var(--srm-muted);
        font-weight: 700;
    }

    @media (max-width: 900px) {
        .masonry-grid { column-count: 2; }
    }

    @media (max-width: 640px) {
        .gallery-wrap { padding: 44px 14px 64px; }
        .mobile-filter { display: block; }
        .filter-bubbles { display: none; }
        .mobile-filter select { font-size: 0.85rem; }
        .masonry-grid { column-count: 1; }
    }
</style>

<?php
$classroomImages = glob(__DIR__ . '/../assets/images/gallary-images/classroom-*.*');
natsort($classroomImages);
$classroomImages = array_values($classroomImages);
?>

<main class="gallery-wrap">
    <h1 class="gallery-title">Campus Gallery</h1>
    <p class="gallery-subtitle">Step inside SRM through moments that define our campus life, learning, and celebrations.</p>

    <section class="gallery-video">
        <video autoplay muted loop playsinline preload="auto">
            <source src="../assets/images/videos/campus-gallary-video.webm" type="video/webm">
            Your browser does not support the video tag.
        </video>
    </section>

    <div class="mobile-filter">
        <span class="mobile-filter-label">Filter Category</span>
        <div class="mobile-select-wrap">
            <select id="mobileFilter" aria-label="Filter gallery category">
    <option value="all">All</option>
    <?php foreach ($categories as $cat): ?>
        <option value="<?= $cat['slug'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
    <?php endforeach; ?>
</select>
        </div>
    </div>

    <!-- <div class="filter-bubbles" id="filterBubbles">
        <button type="button" class="filter-btn active" data-filter="all">All</button>
        <button type="button" class="filter-btn" data-filter="classroom">Classroom Activities</button>
        <button type="button" class="filter-btn" data-filter="lab">Lab Sessions</button>
        <button type="button" class="filter-btn" data-filter="workshop">Student Workshops</button>
        <button type="button" class="filter-btn" data-filter="events">Campus Events</button>
        <button type="button" class="filter-btn" data-filter="placement">Placement Drives</button>
        <button type="button" class="filter-btn" data-filter="annual">Annual Celebrations</button>
    </div> -->
    <div class="filter-bubbles">
    <button class="filter-btn active" data-filter="all">All</button>
    <?php foreach ($categories as $cat): ?>
        <button class="filter-btn" data-filter="<?= $cat['slug'] ?>">
            <?= htmlspecialchars($cat['name']) ?>
        </button>
    <?php endforeach; ?>
</div>
    
<!-- 
    <section class="masonry-grid" id="masonryGrid">
        <?php foreach ($classroomImages as $index => $classroomImage): ?>
            <?php $classroomFile = basename($classroomImage); ?>
            <figure class="gallery-item" data-category="classroom">
                <img src="<?php echo '../assets/images/gallary-images/' . rawurlencode($classroomFile); ?>" alt="<?php echo 'Classroom activity ' . ($index + 1); ?>">
            </figure>
        <?php endforeach; ?>
        <figure class="gallery-item" data-category="lab">
            <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=900&q=80" alt="Lab session 1">
        </figure>
        <figure class="gallery-item" data-category="workshop">
            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=900&q=80" alt="Student workshop 1">
        </figure>
        <figure class="gallery-item" data-category="events">
            <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=900&q=80" alt="Campus event 1">
        </figure>
        <figure class="gallery-item" data-category="placement">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=900&q=80" alt="Placement drive 1">
        </figure>
        <figure class="gallery-item" data-category="annual">
            <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&w=900&q=80" alt="Annual celebration 1">
        </figure>
        <figure class="gallery-item" data-category="lab">
            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=900&q=80" alt="Lab session 2">
        </figure>
        <figure class="gallery-item" data-category="events">
            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=900&q=80" alt="Campus event 2">
        </figure>
        <figure class="gallery-item" data-category="placement">
            <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=900&q=80" alt="Placement drive 2">
        </figure>
    </section> -->
    <section class="masonry-grid" id="masonryGrid">
    <?php foreach ($media as $item): ?>
        <figure class="gallery-item" data-category="<?= $item['slug'] ?>">
            
            <?php if ($item['type'] === 'image'): ?>
                <img src="../<?= $item['file_path'] ?>" alt="">
            <?php else: ?>
                <video controls>
                    <source src="../<?= $item['file_path'] ?>" type="video/mp4">
                </video>
            <?php endif; ?>
        
        </figure>
    <?php endforeach; ?>
</section>

    


    <p id="emptyState" class="gallery-empty">No images found for this category.</p>
</main>

<script>
    (function () {
        const buttons = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.gallery-item');
        const emptyState = document.getElementById('emptyState');
        const mobileFilter = document.getElementById('mobileFilter');

        function applyFilter(filter) {
            let visibleCount = 0;

            items.forEach(function (item) {
                const category = item.getAttribute('data-category');
                const showItem = filter === 'all' || category === filter;
                item.classList.toggle('hidden', !showItem);
                if (showItem) visibleCount += 1;
            });

            if (emptyState) {
                emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                buttons.forEach(function (btn) {
                    btn.classList.remove('active');
                });
                button.classList.add('active');
                const filterValue = button.getAttribute('data-filter');
                if (mobileFilter) mobileFilter.value = filterValue;
                applyFilter(filterValue);
            });
        });

        if (mobileFilter) {
            mobileFilter.addEventListener('change', function () {
                const filterValue = mobileFilter.value;
                buttons.forEach(function (btn) {
                    btn.classList.toggle('active', btn.getAttribute('data-filter') === filterValue);
                });
                applyFilter(filterValue);
            });
        }

        applyFilter('all');
    })();
</script>

<?php include_once '../includes/footer.php'; ?>
