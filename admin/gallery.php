<?php 
require '../connect.php'; 
include_once 'includes/header.php'; 
include_once 'includes/sidebar.php'; 

$uploadBase = '../assets/uploads/gallery/';

/* ================================
   LOGIC (Kept exactly as yours)
================================= */
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("SELECT file_path FROM gallery_media WHERE id=?");
    $stmt->execute([$id]);
    $file = $stmt->fetch();
    if ($file) {
        $fullPath = '../' . $file['file_path'];
        if (file_exists($fullPath)) unlink($fullPath);
        $pdo->prepare("DELETE FROM gallery_media WHERE id=?")->execute([$id]);
    }
    header("Location: gallery.php"); exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $category_id = (int)$_POST['category_id'];
    $type = $_POST['type'];
    $folder = $uploadBase . ($type === 'image' ? 'images/' : 'videos/');
    if (!is_dir($folder)) mkdir($folder, 0777, true);
    $filePath = null;

    if (!empty($_FILES['media_file']['name'])) {
        $fileName = time() . '_' . basename($_FILES['media_file']['name']);
        $target = $folder . $fileName;
        move_uploaded_file($_FILES['media_file']['tmp_name'], $target);
        $filePath = 'assets/uploads/gallery/' . ($type === 'image' ? 'images/' : 'videos/') . $fileName;
    }

    if ($id) {
        if ($filePath) {
            $stmt = $pdo->prepare("UPDATE gallery_media SET category_id=?, type=?, file_path=? WHERE id=?");
            $stmt->execute([$category_id, $type, $filePath, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE gallery_media SET category_id=?, type=? WHERE id=?");
            $stmt->execute([$category_id, $type, $id]);
        }
    } else {
        $stmt = $pdo->prepare("INSERT INTO gallery_media (category_id, type, file_path) VALUES (?, ?, ?)");
        $stmt->execute([$category_id, $type, $filePath]);
    }
    header("Location: gallery.php"); exit;
}

$categories = $pdo->query("SELECT * FROM gallery_categories ORDER BY name")->fetchAll();
$media = $pdo->query("SELECT gm.*, gc.name AS category_name FROM gallery_media gm JOIN gallery_categories gc ON gc.id = gm.category_id ORDER BY gm.created_at DESC")->fetchAll();

$editData = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM gallery_media WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $editData = $stmt->fetch();
}

// Group counts per category
$catCounts = [];
foreach ($media as $m) {
    $catCounts[$m['category_name']] = ($catCounts[$m['category_name']] ?? 0) + 1;
}
$totalImages = count(array_filter($media, fn($m) => $m['type'] === 'image'));
$totalVideos = count(array_filter($media, fn($m) => $m['type'] === 'video'));
?>

<style>
/* ── Modal Upload Panel ── */
#uploadModal {
    display: none;
    position: fixed; inset: 0; z-index: 9999;
    background: rgba(26,26,46,.55);
    backdrop-filter: blur(6px);
    align-items: center; justify-content: center;
}
#uploadModal.open { display: flex; }
#uploadModal .modal-box {
    background: #fff;
    border-radius: 2rem;
    padding: 2.5rem;
    width: 100%; max-width: 460px;
    box-shadow: 0 30px 80px rgba(26,26,46,.25);
    animation: slideUp .3s cubic-bezier(.34,1.56,.64,1);
}
@keyframes slideUp {
    from { opacity:0; transform: translateY(40px) scale(.96); }
    to   { opacity:1; transform: translateY(0) scale(1); }
}

/* ── Filter bar ── */
.filter-pill {
    padding: .4rem 1.1rem;
    border-radius: 999px;
    font-size: .7rem;
    font-weight: 800;
    letter-spacing: .06em;
    text-transform: uppercase;
    cursor: pointer;
    border: 2px solid transparent;
    transition: all .2s;
    background: #f1f5f9;
    color: #64748b;
}
.filter-pill:hover, .filter-pill.active {
    background: #FF6B2B;
    color: #fff;
    border-color: #FF6B2B;
    box-shadow: 0 4px 14px rgba(255,107,43,.3);
}
.filter-pill.all.active { background: #1A1A2E; border-color: #1A1A2E; box-shadow: 0 4px 14px rgba(26,26,46,.25); }

/* ── View toggle ── */
.view-btn { padding:.5rem .8rem; border-radius:.75rem; border:2px solid #e2e8f0; color:#94a3b8; cursor:pointer; transition:all .2s; background:#fff; }
.view-btn.active { background:#1A1A2E; border-color:#1A1A2E; color:#fff; }

/* ── Gallery grid ── */
#galleryGrid.grid-view {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 1.25rem;
}
#galleryGrid.list-view {
    display: flex;
    flex-direction: column;
    gap: .75rem;
}

/* ── Card ── */
.media-card { transition: all .3s cubic-bezier(.34,1.2,.64,1); }
.media-card:hover { transform: translateY(-4px); }

/* List view card */
#galleryGrid.list-view .media-card {
    display: flex;
    align-items: center;
    background: #fff;
    border-radius: 1.25rem;
    overflow: hidden;
    border: 1px solid #f1f5f9;
    box-shadow: 0 2px 8px rgba(0,0,0,.04);
    gap: 0;
}
#galleryGrid.list-view .media-card .card-thumb {
    width: 100px; min-width: 100px; height: 72px;
    flex-shrink: 0;
}
#galleryGrid.list-view .media-card .card-body {
    flex: 1; padding: .75rem 1rem; display: flex; align-items: center; gap: 1rem;
}
#galleryGrid.list-view .media-card .card-actions {
    padding: .75rem 1rem; display: flex; gap: .5rem; flex-shrink: 0;
}
#galleryGrid.list-view .media-card .card-title { font-size: .8rem; }
#galleryGrid.list-view .media-card .card-cat { font-size: .65rem; }

/* Grid view card */
#galleryGrid.grid-view .media-card {
    background: #fff;
    border-radius: 1.5rem;
    overflow: hidden;
    border: 1px solid #f1f5f9;
    box-shadow: 0 2px 12px rgba(0,0,0,.04);
}
#galleryGrid.grid-view .media-card .card-thumb {
    height: 160px; position: relative; overflow: hidden; background: #e2e8f0;
}
#galleryGrid.grid-view .media-card .card-body {
    padding: .9rem 1rem .5rem;
}
#galleryGrid.grid-view .media-card .card-actions {
    padding: .5rem 1rem .9rem; display: flex; gap: .5rem;
}

/* ── Checkbox select ── */
.media-card .select-check {
    position: absolute; top: 10px; right: 10px; z-index: 5;
    width: 20px; height: 20px; border-radius: 6px;
    border: 2px solid rgba(255,255,255,.8);
    background: rgba(255,255,255,.2);
    backdrop-filter: blur(4px);
    cursor: pointer; appearance: none; -webkit-appearance: none;
    transition: all .15s;
}
.media-card .select-check:checked {
    background: #FF6B2B; border-color: #FF6B2B;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3E%3C/svg%3E");
}

/* Bulk action bar */
#bulkBar {
    display: none; position: fixed; bottom: 2rem; left: 50%; transform: translateX(-50%);
    background: #1A1A2E; color: #fff; border-radius: 2rem; padding: .75rem 1.5rem;
    box-shadow: 0 20px 60px rgba(26,26,46,.5); z-index: 1000;
    align-items: center; gap: 1rem; white-space: nowrap;
    animation: slideUp .3s cubic-bezier(.34,1.56,.64,1);
}
#bulkBar.show { display: flex; }

/* Search highlight */
.media-card.hidden-by-search { display: none !important; }

/* Lightbox */
#lightbox {
    display: none; position: fixed; inset: 0; z-index: 9998;
    background: rgba(10,10,20,.93); align-items: center; justify-content: center;
}
#lightbox.open { display: flex; }
#lightbox img, #lightbox video { max-width: 90vw; max-height: 85vh; border-radius: 1rem; object-fit: contain; }
#lightbox .lb-close { position: absolute; top: 1.5rem; right: 1.5rem; color: #fff; font-size: 1.5rem; cursor: pointer; background: rgba(255,255,255,.1); width: 42px; height: 42px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background .2s; }
#lightbox .lb-close:hover { background: #FF6B2B; }
#lightbox .lb-nav { position: absolute; top: 50%; transform: translateY(-50%); color: #fff; font-size: 1.25rem; cursor: pointer; background: rgba(255,255,255,.1); width: 48px; height: 48px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all .2s; }
#lightbox .lb-nav:hover { background: #FF6B2B; }
#lightbox .lb-prev { left: 1.5rem; }
#lightbox .lb-next { right: 1.5rem; }
#lightbox .lb-info { position: absolute; bottom: 1.5rem; left: 50%; transform: translateX(-50%); background: rgba(255,255,255,.1); backdrop-filter: blur(10px); padding: .5rem 1.25rem; border-radius: 2rem; color: #fff; font-size: .75rem; font-weight: 700; }
</style>

<div class="flex-1 flex flex-col min-h-screen bg-slate-50">
    <main class="flex-1 overflow-y-auto p-6 lg:p-8">

        <!-- ── Page Header ── -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-[#1A1A2E] tracking-tight uppercase">
                    Campus <span class="text-[#FF6B2B]">Gallery</span>
                </h1>
                <p class="text-sm text-[#666] mt-1">Manage institutional photos and video content.</p>
            </div>
            <button onclick="openModal()" class="inline-flex items-center gap-2 bg-[#FF6B2B] text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-[#FF6B2B]/25 hover:scale-[1.03] active:scale-[.97] transition-all text-sm">
                <i class="fa-solid fa-plus"></i> Upload Media
            </button>
        </div>

        <!-- ── Stats Row ── -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <?php
            $stats = [
                ['Total Media', count($media), 'fa-photo-film', '#FF6B2B', '#FFF0E8'],
                ['Images', $totalImages, 'fa-image', '#10b981', '#d1fae5'],
                ['Videos', $totalVideos, 'fa-video', '#3b82f6', '#dbeafe'],
                ['Categories', count($categories), 'fa-folder-open', '#8b5cf6', '#ede9fe'],
            ];
            foreach ($stats as [$label, $val, $icon, $clr, $bg]): ?>
            <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm flex items-center gap-4">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0" style="background:<?=$bg?>">
                    <i class="fa-solid <?=$icon?> text-lg" style="color:<?=$clr?>"></i>
                </div>
                <div>
                    <p class="text-2xl font-black text-[#1A1A2E]"><?=$val?></p>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest"><?=$label?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- ── Toolbar ── -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm px-5 py-4 mb-6 flex flex-wrap items-center gap-3">
            <!-- Search -->
            <div class="relative flex-1 min-w-[180px] max-w-xs">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-300 text-sm"></i>
                <input type="text" id="searchInput" placeholder="Search media..." oninput="filterGallery()"
                    class="w-full bg-slate-50 border-none rounded-xl pl-9 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-[#FF6B2B] transition-all">
            </div>

            <!-- Category filter pills -->
            <div class="flex flex-wrap gap-2 flex-1">
                <button class="filter-pill all active" onclick="setFilter('all', this)">All</button>
                <?php foreach($categories as $cat): 
                    $cnt = $catCounts[$cat['name']] ?? 0;
                    if ($cnt === 0) continue;
                ?>
                <button class="filter-pill" onclick="setFilter('<?= htmlspecialchars($cat['name'], ENT_QUOTES) ?>', this)">
                    <?= htmlspecialchars($cat['name']) ?> <span class="opacity-60 ml-1"><?= $cnt ?></span>
                </button>
                <?php endforeach; ?>
                <button class="filter-pill" onclick="setFilter('image', this)"><i class="fa-solid fa-image mr-1"></i>Images</button>
                <button class="filter-pill" onclick="setFilter('video', this)"><i class="fa-solid fa-video mr-1"></i>Videos</button>
            </div>

            <!-- View toggle -->
            <div class="flex gap-1 ml-auto flex-shrink-0">
                <button class="view-btn active" id="gridBtn" onclick="setView('grid')" title="Grid View"><i class="fa-solid fa-grip"></i></button>
                <button class="view-btn" id="listBtn" onclick="setView('list')" title="List View"><i class="fa-solid fa-list"></i></button>
            </div>
        </div>

        <!-- ── Gallery Grid ── -->
        <div id="galleryGrid" class="grid-view">
            <?php foreach($media as $idx => $item): ?>
            <div class="media-card"
                 data-category="<?= htmlspecialchars($item['category_name'], ENT_QUOTES) ?>"
                 data-type="<?= $item['type'] ?>"
                 data-id="<?= $item['id'] ?>"
                 data-title="Campus Resource #<?= $item['id'] ?>">

                <!-- GRID THUMB -->
                <div class="card-thumb relative group cursor-pointer" onclick="openLightbox(<?= $idx ?>)">
                    <?php if($item['type']=='image'): ?>
                        <img src="../<?= htmlspecialchars($item['file_path']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                    <?php else: ?>
                        <video class="w-full h-full object-cover">
                            <source src="../<?= htmlspecialchars($item['file_path']) ?>">
                        </video>
                        <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/30 transition-all">
                            <i class="fa-solid fa-circle-play text-white text-4xl opacity-90 group-hover:scale-110 transition-transform"></i>
                        </div>
                    <?php endif; ?>

                    <!-- Type badge -->
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-2.5 py-1 rounded-full shadow-sm pointer-events-none">
                        <span class="text-[9px] font-black uppercase tracking-tighter text-[#1A1A2E]">
                            <i class="<?= $item['type']=='image' ? 'fa-solid fa-image text-[#FF6B2B]' : 'fa-solid fa-video text-blue-500' ?> mr-1"></i>
                            <?= $item['type'] ?>
                        </span>
                    </div>

                    <!-- Checkbox -->
                    <input type="checkbox" class="select-check" onchange="updateBulkBar()" onclick="event.stopPropagation()" data-id="<?= $item['id'] ?>">
                </div>

                <!-- CARD BODY -->
                <div class="card-body">
                    <p class="card-cat text-[9px] font-bold text-[#FF6B2B] uppercase tracking-widest mb-0.5"><?= htmlspecialchars($item['category_name']) ?></p>
                    <p class="card-title text-sm font-bold text-[#1A1A2E] truncate">Campus Resource #<?= $item['id'] ?></p>
                </div>

                <!-- CARD ACTIONS -->
                <div class="card-actions">
                    <a href="gallery.php?edit=<?= $item['id'] ?>" onclick="openModalEdit(<?= $item['id'] ?>); return false;"
                       class="flex-1 text-center py-2 bg-slate-50 text-[#1A1A2E] text-xs font-bold rounded-xl hover:bg-[#1A1A2E] hover:text-white transition-all">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                    </a>
                    <a href="gallery.php?delete=<?= $item['id'] ?>" onclick="return confirm('Delete this media?')"
                       class="flex-1 text-center py-2 bg-red-50 text-red-500 text-xs font-bold rounded-xl hover:bg-red-500 hover:text-white transition-all">
                        <i class="fa-solid fa-trash mr-1"></i>Delete
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Empty state -->
        <?php if(empty($media)): ?>
        <div class="bg-white rounded-3xl p-20 text-center border-2 border-dashed border-slate-100 mt-4">
            <i class="fa-solid fa-photo-film text-6xl text-slate-100 mb-6"></i>
            <p class="text-slate-400 font-bold uppercase tracking-widest text-sm">No Media Found in Gallery</p>
            <button onclick="openModal()" class="mt-6 inline-flex items-center gap-2 bg-[#FF6B2B] text-white px-6 py-3 rounded-2xl font-bold text-sm hover:scale-[1.03] transition-all">
                <i class="fa-solid fa-plus"></i> Upload First Media
            </button>
        </div>
        <?php endif; ?>

        <!-- No results (search/filter) -->
        <div id="noResults" class="hidden bg-white rounded-3xl p-16 text-center border-2 border-dashed border-slate-100 mt-4">
            <i class="fa-solid fa-magnifying-glass text-5xl text-slate-100 mb-4"></i>
            <p class="text-slate-400 font-bold uppercase tracking-widest text-sm">No media matches your filter</p>
        </div>

    </main>
    <?php include_once 'includes/footer.php'; ?>
</div>

<!-- ── Upload / Edit Modal ── -->
<div id="uploadModal">
    <div class="modal-box">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-[#1A1A2E] flex items-center gap-2" id="modalTitle">
                <i class="fa-solid fa-circle-plus text-[#FF6B2B]"></i> Upload New Media
            </h3>
            <button onclick="closeModal()" class="text-slate-400 hover:text-red-500 transition-colors w-9 h-9 rounded-xl bg-slate-50 hover:bg-red-50 flex items-center justify-center">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form method="POST" enctype="multipart/form-data" class="space-y-5">
            <input type="hidden" name="id" id="formId" value="">

            <div>
                <label class="text-[11px] font-extrabold text-[#666] uppercase tracking-widest mb-2 block">Category</label>
                <select name="category_id" id="formCategory" required class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#FF6B2B] transition-all">
                    <?php foreach($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="text-[11px] font-extrabold text-[#666] uppercase tracking-widest mb-2 block">Media Type</label>
                <div class="flex gap-4">
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="type" value="image" class="hidden peer" checked>
                        <div class="text-center p-3 rounded-xl border-2 border-slate-100 peer-checked:border-[#FF6B2B] peer-checked:bg-[#FFF0E8] peer-checked:text-[#FF6B2B] transition-all text-xs font-bold text-slate-400">
                            <i class="fa-solid fa-image mb-1 block text-lg"></i> Image
                        </div>
                    </label>
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="type" value="video" class="hidden peer">
                        <div class="text-center p-3 rounded-xl border-2 border-slate-100 peer-checked:border-[#FF6B2B] peer-checked:bg-[#FFF0E8] peer-checked:text-[#FF6B2B] transition-all text-xs font-bold text-slate-400">
                            <i class="fa-solid fa-video mb-1 block text-lg"></i> Video
                        </div>
                    </label>
                </div>
            </div>

            <div>
                <label class="text-[11px] font-extrabold text-[#666] uppercase tracking-widest mb-2 block">Select File</label>
                <div id="dropZone" class="border-2 border-dashed border-slate-200 rounded-xl p-6 text-center cursor-pointer hover:border-[#FF6B2B] hover:bg-[#FFF0E8]/50 transition-all" onclick="document.getElementById('mediaFileInput').click()">
                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-200 mb-2"></i>
                    <p class="text-xs font-bold text-slate-400" id="dropLabel">Click to choose or drag & drop</p>
                </div>
                <input type="file" name="media_file" id="mediaFileInput" class="hidden" onchange="updateDropLabel(this)">
            </div>

            <div class="pt-2 space-y-3">
                <button type="submit" class="w-full bg-[#FF6B2B] text-white py-4 rounded-2xl font-bold shadow-lg shadow-[#FF6B2B]/20 hover:scale-[1.02] active:scale-[0.98] transition-all" id="submitBtn">
                    Start Upload
                </button>
                <button type="button" onclick="closeModal()" class="w-full text-center text-xs font-bold text-slate-400 hover:text-red-500 transition-colors uppercase tracking-widest py-2">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ── Lightbox ── -->
<div id="lightbox">
    <button class="lb-close" onclick="closeLightbox()"><i class="fa-solid fa-xmark"></i></button>
    <button class="lb-nav lb-prev" onclick="lbNav(-1)"><i class="fa-solid fa-chevron-left"></i></button>
    <div id="lbContent"></div>
    <button class="lb-nav lb-next" onclick="lbNav(1)"><i class="fa-solid fa-chevron-right"></i></button>
    <div class="lb-info" id="lbInfo"></div>
</div>

<!-- ── Bulk Action Bar ── -->
<div id="bulkBar">
    <span class="text-sm font-bold"><span id="selectedCount">0</span> selected</span>
    <button onclick="bulkDelete()" class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-xl transition-all flex items-center gap-2">
        <i class="fa-solid fa-trash"></i> Delete Selected
    </button>
    <button onclick="clearSelection()" class="text-slate-400 hover:text-white text-xs font-bold px-3 py-2 rounded-xl transition-all">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>

<?php
// Build JS media array for lightbox
$jsMedia = [];
foreach ($media as $item) {
    $jsMedia[] = [
        'id' => $item['id'],
        'type' => $item['type'],
        'src' => '../' . $item['file_path'],
        'cat' => $item['category_name'],
    ];
}
?>
<script>
const mediaData = <?= json_encode($jsMedia) ?>;
let currentLbIdx = 0;
let activeFilter = 'all';
let activeView = 'grid';

/* ─── Modal ─── */
function openModal() {
    document.getElementById('formId').value = '';
    document.getElementById('modalTitle').innerHTML = '<i class="fa-solid fa-circle-plus text-[#FF6B2B]"></i> Upload New Media';
    document.getElementById('submitBtn').textContent = 'Start Upload';
    document.getElementById('mediaFileInput').removeAttribute('data-optional');
    document.getElementById('uploadModal').classList.add('open');
}

function openModalEdit(id) {
    // Redirect to edit – we could also AJAX load but keeping it simple
    window.location.href = 'gallery.php?edit=' + id;
}

function closeModal() {
    document.getElementById('uploadModal').classList.remove('open');
}
document.getElementById('uploadModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});

// If editData is set, auto open modal in edit mode
<?php if ($editData): ?>
(function() {
    document.getElementById('formId').value = '<?= $editData['id'] ?>';
    document.getElementById('formCategory').value = '<?= $editData['category_id'] ?>';
    document.querySelector('input[name="type"][value="<?= $editData['type'] ?>"]').checked = true;
    document.getElementById('modalTitle').innerHTML = '<i class="fa-solid fa-pen-to-square text-blue-500"></i> Edit Media';
    document.getElementById('submitBtn').textContent = 'Save Changes';
    document.getElementById('uploadModal').classList.add('open');
})();
<?php endif; ?>

/* ─── File drop zone ─── */
function updateDropLabel(input) {
    const label = document.getElementById('dropLabel');
    label.textContent = input.files[0] ? input.files[0].name : 'Click to choose or drag & drop';
}
const dz = document.getElementById('dropZone');
dz.addEventListener('dragover', e => { e.preventDefault(); dz.classList.add('border-[#FF6B2B]'); });
dz.addEventListener('dragleave', () => dz.classList.remove('border-[#FF6B2B]'));
dz.addEventListener('drop', e => {
    e.preventDefault();
    dz.classList.remove('border-[#FF6B2B]');
    const fi = document.getElementById('mediaFileInput');
    fi.files = e.dataTransfer.files;
    updateDropLabel(fi);
});

/* ─── Filter & Search ─── */
function setFilter(val, el) {
    activeFilter = val;
    document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
    el.classList.add('active');
    filterGallery();
}

function filterGallery() {
    const q = document.getElementById('searchInput').value.toLowerCase().trim();
    let visible = 0;
    document.querySelectorAll('.media-card').forEach(card => {
        const cat = card.dataset.category;
        const type = card.dataset.type;
        const title = card.dataset.title.toLowerCase();
        const matchFilter = activeFilter === 'all' || cat === activeFilter || type === activeFilter;
        const matchSearch = !q || title.includes(q) || cat.toLowerCase().includes(q);
        if (matchFilter && matchSearch) {
            card.classList.remove('hidden-by-search');
            visible++;
        } else {
            card.classList.add('hidden-by-search');
        }
    });
    document.getElementById('noResults').classList.toggle('hidden', visible > 0);
}

/* ─── View toggle ─── */
function setView(v) {
    activeView = v;
    const grid = document.getElementById('galleryGrid');
    grid.className = v + '-view';
    document.getElementById('gridBtn').classList.toggle('active', v === 'grid');
    document.getElementById('listBtn').classList.toggle('active', v === 'list');
}

/* ─── Lightbox ─── */
function openLightbox(idx) {
    currentLbIdx = idx;
    renderLb();
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
}
function lbNav(dir) {
    currentLbIdx = (currentLbIdx + dir + mediaData.length) % mediaData.length;
    renderLb();
}
function renderLb() {
    const m = mediaData[currentLbIdx];
    const c = document.getElementById('lbContent');
    if (m.type === 'image') {
        c.innerHTML = `<img src="${m.src}" alt="">`;
    } else {
        c.innerHTML = `<video controls autoplay style="max-width:90vw;max-height:85vh;border-radius:1rem;"><source src="${m.src}"></video>`;
    }
    document.getElementById('lbInfo').textContent = `${m.cat} · #${m.id} · ${currentLbIdx+1} / ${mediaData.length}`;
}
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) closeLightbox();
});
document.addEventListener('keydown', e => {
    if (!document.getElementById('lightbox').classList.contains('open')) return;
    if (e.key === 'ArrowRight') lbNav(1);
    if (e.key === 'ArrowLeft') lbNav(-1);
    if (e.key === 'Escape') closeLightbox();
});

/* ─── Bulk Select ─── */
function updateBulkBar() {
    const checked = document.querySelectorAll('.select-check:checked');
    const bar = document.getElementById('bulkBar');
    document.getElementById('selectedCount').textContent = checked.length;
    bar.classList.toggle('show', checked.length > 0);
}
function clearSelection() {
    document.querySelectorAll('.select-check:checked').forEach(c => c.checked = false);
    updateBulkBar();
}
function bulkDelete() {
    const ids = [...document.querySelectorAll('.select-check:checked')].map(c => c.dataset.id);
    if (!ids.length) return;
    if (!confirm(`Delete ${ids.length} selected item(s)?`)) return;
    // Chain delete via sequential GETs (simple approach; replace with fetch/AJAX for production)
    let i = 0;
    function next() {
        if (i >= ids.length) { window.location.reload(); return; }
        fetch('gallery.php?delete=' + ids[i++]).then(next);
    }
    next();
}
</script>