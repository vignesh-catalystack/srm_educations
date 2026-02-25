<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRM Education | Paramedical & IT Education</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --red: #D32F2F;
            --red2: #D32F2F;
            --red-rgb: 211,47,47;
            --sky: #F59E0B;
            --sky2: #F59E0B;
            --navy: #1E293B;
            --white: #F8FAFC;
            --light: #F8FAFC;
            --gray: #1E293B;
            --border: #F8FAFC;
            --font-head: 'Rajdhani', sans-serif;
            --font-body: 'Nunito', sans-serif;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: var(--font-body);
            color: var(--navy);
            background: var(--white);
            overflow-x: hidden;
        }

        .topbar {
            background: var(--red);
            color: #F8FAFC;
            font-size: 13px;
            font-weight: 700;
            padding: 9px 0;
            text-align: center;
            letter-spacing: 0.04em;
            position: relative;
            overflow: hidden;
        }

        .topbar::before {
            content: '';
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(90deg, transparent 0, transparent 60px, rgba(248,250,252,0.06) 60px, rgba(248,250,252,0.06) 61px);
        }

        .topbar span { color: #F59E0B; margin: 0 5px; }
        .topbar a { color: #F8FAFC; text-decoration: underline; margin-left: 10px; font-weight: 800; position: relative; z-index: 1; }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 999;
            background: var(--white);
            box-shadow: 0 2px 20px rgba(30,41,59,0.1);
            border-bottom: 3px solid var(--red);
        }

        .header-wrap {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .logo-link { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .logo-link.logo-only { gap: 0; }

        .logo-badge {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--red), #D32F2F);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-head);
            font-size: 21px;
            font-weight: 700;
            color: #F8FAFC;
            letter-spacing: 1px;
            box-shadow: 0 4px 14px rgba(211,47,47,0.35);
        }
        .logo-badge.logo-image-only {
            width: 188px;
            height: 120px;
            background: transparent;
            box-shadow: none;
            border-radius: 0;
            color: transparent;
            font-size: 0;
            letter-spacing: 0;
            overflow: hidden;
        }
        .logo-badge img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 10px;
            display: block;
        }
        .logo-badge.logo-image-only img {
            border-radius: 0;
            transform: translateY(2px) scale(1.18);
            transform-origin: center;
        }

        .logo-text-wrap strong {
            display: block;
            font-family: var(--font-head);
            font-size: 24px;
            font-weight: 700;
            color: var(--navy);
            letter-spacing: 0.06em;
            line-height: 1;
        }

        .logo-text-wrap small {
            font-size: 10px;
            font-weight: 700;
            color: var(--gray);
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .nav-links { display: flex; align-items: center; gap: 2px; }
        .nav-item { position: relative; }

        .nav-links a,
        .nav-dropdown-trigger {
            font-size: 13px;
            font-weight: 700;
            color: var(--navy);
            padding: 8px 14px;
            border-radius: 6px;
            transition: all 0.2s;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            text-decoration: none;
            border: 0;
            background: transparent;
            font-family: var(--font-head);
            cursor: pointer;
            white-space: nowrap;
            line-height: 1;
        }

        .nav-links a:hover,
        .nav-links a.active,
        .nav-dropdown-trigger:hover,
        .nav-dropdown-trigger.active { background: #F8FAFC; color: var(--red); }

        .nav-dropdown-trigger i {
            margin-left: 8px;
            font-size: 11px;
            transition: transform 0.2s ease;
        }

        .nav-item:hover .nav-dropdown-trigger i,
        .nav-item.open .nav-dropdown-trigger i { transform: rotate(180deg); }

        .nav-dropdown-menu {
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            min-width: 240px;
            background: #F8FAFC;
            border: 1px solid rgba(30,41,59,0.08);
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 14px 34px rgba(30,41,59,0.14);
            display: grid;
            gap: 4px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(8px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
            z-index: 1001;
        }

        .nav-dropdown-menu::before {
            content: "";
            position: absolute;
            top: -6px;
            left: 20px;
            width: 12px;
            height: 12px;
            background: #F8FAFC;
            border-left: 1px solid rgba(30,41,59,0.08);
            border-top: 1px solid rgba(30,41,59,0.08);
            transform: rotate(45deg);
        }

        .nav-item:hover .nav-dropdown-menu,
        .nav-item.open .nav-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .nav-dropdown-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            color: var(--navy);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            transition: all 0.2s ease;
        }

        .nav-dropdown-link:hover,
        .nav-dropdown-link.active {
            background: #F8FAFC;
            color: var(--red);
            transform: translateX(3px);
        }

        .nav-dropdown-link i {
            font-size: 11px;
            opacity: 0.65;
        }

        .nav-cta {
            background: var(--red) !important;
            color: #F8FAFC !important;
            border-radius: 6px !important;
            padding: 9px 20px !important;
            box-shadow: 0 4px 14px rgba(var(--red-rgb, 211,47,47), 0.3);
            font-family: var(--font-head);
            white-space: nowrap;
            line-height: 1;
        }

        .nav-cta:hover { background: var(--red2) !important; }

        .header-phone {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 800;
            font-family: var(--font-body);
            color: var(--red);
            border: 2px solid var(--red);
            padding: 7px 14px;
            border-radius: 6px;
            transition: all 0.2s;
            text-decoration: none;
            white-space: nowrap;
            line-height: 1;
        }

        .header-phone:hover { background: var(--red); color: #F8FAFC; }

        .mobile-menu-btn {
            display: none;
            width: 40px;
            height: 40px;
            border: 1px solid #F8FAFC;
            border-radius: 8px;
            background: #F8FAFC;
            color: var(--navy);
        }

        .mobile-menu {
            display: none;
            padding: 0 20px 16px;
            border-top: 1px solid #F8FAFC;
            background: #F8FAFC;
        }

        .mobile-menu a {
            display: block;
            padding: 10px 6px;
            font-size: 13px;
            font-weight: 700;
            color: var(--navy);
            border-bottom: 1px solid #F8FAFC;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            text-decoration: none;
        }

        .mobile-menu a:last-child { border-bottom: 0; }
        .mobile-menu a.active { color: var(--red); }

        .mobile-dropdown {
            border-bottom: 1px solid #F8FAFC;
        }

        .mobile-dropdown-trigger {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 6px;
            font-size: 13px;
            font-weight: 700;
            color: var(--navy);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            border: 0;
            background: transparent;
            font-family: var(--font-head);
        }

        .mobile-dropdown-trigger i {
            transition: transform 0.2s ease;
            font-size: 12px;
        }

        .mobile-dropdown.open .mobile-dropdown-trigger i {
            transform: rotate(180deg);
        }

        .mobile-dropdown-menu {
            display: none;
            padding: 0 0 8px 14px;
        }

        .mobile-dropdown.open .mobile-dropdown-menu {
            display: block;
        }

        .mobile-dropdown-menu a {
            font-size: 12px;
            padding: 9px 6px;
            border-bottom: 0;
            color: #334155;
        }

        @media (max-width: 1240px) {
            .header-phone { display: none; }
            .nav-links a,
            .nav-dropdown-trigger {
                padding: 8px 10px;
                font-size: 12px;
            }
            .header-wrap { padding: 0 16px; }
            .logo-text-wrap strong { font-size: 21px; }
        }

        @media (max-width: 1080px) {
            .nav-links, .header-phone { display: none; }
            .mobile-menu-btn { display: inline-flex; align-items: center; justify-content: center; }
            .mobile-menu.show { display: block; }
            .header-wrap { padding: 0 16px; }
            .logo-text-wrap strong { font-size: 20px; }
        }
        @media (max-width: 768px) {
            .logo-badge.logo-image-only {
                width: 158px;
                height: 48px;
            }
        }
    </style>
</head>
<body>
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$scriptPath = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
$pagesPos = strpos($scriptPath, '/pages/');
$navBase = $pagesPos !== false ? substr($scriptPath, 0, $pagesPos + 7) : 'pages/';
$institutionPages = ['institution.php', 'paramedical.php', 'computer-center.php', 'spoken-english.php'];
$isInstitutionsPage = in_array($currentPage, $institutionPages, true);
$isComputerCenterPage = $currentPage === 'computer-center.php';
$logoPath = $isComputerCenterPage ? $navBase . '../assets/images/srm-cc-logo.png' : '';
?>

<div class="topbar">
    <span>??</span> Admissions Open 2026 <span>|</span> Scholarship up to <span>75%</span>
    <a href="<?php echo $navBase; ?>contact.php">Apply Now</a>
</div>

<header class="site-header">
    <div class="header-wrap">
        <a href="<?php echo $navBase; ?>index.php" class="logo-link <?php echo $isComputerCenterPage ? 'logo-only' : ''; ?>">
            <div class="logo-badge <?php echo $isComputerCenterPage ? 'logo-image-only' : ''; ?>">
                <?php if ($isComputerCenterPage): ?>
                    <img src="<?php echo $logoPath; ?>" alt="SRM Computer Center Logo">
                <?php else: ?>
                    SRM
                <?php endif; ?>
            </div>
            <?php if (!$isComputerCenterPage): ?>
                <div class="logo-text-wrap">
                    <strong>SRM Institute</strong>
                    <small>Healthcare & Technology</small>
                </div>
            <?php endif; ?>
        </a>

        <nav class="nav-links">
            <a href="<?php echo $navBase; ?>index.php" class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">Home</a>
            <a href="<?php echo $navBase; ?>course.php" class="<?php echo $currentPage === 'course.php' ? 'active' : ''; ?>">Courses</a>
            <div class="nav-item">
                <button id="institutionsTrigger" type="button" class="nav-dropdown-trigger <?php echo $isInstitutionsPage ? 'active' : ''; ?>" aria-haspopup="true" aria-expanded="false">
                    Institutions <i class="fas fa-chevron-down" aria-hidden="true"></i>
                </button>
                <div id="institutionsMenu" class="nav-dropdown-menu">
                    <a href="<?php echo $navBase; ?>all_institutions/paramedical.php" class="nav-dropdown-link <?php echo $currentPage === 'paramedical.php' ? 'active' : ''; ?>">Paramedical <i class="fas fa-arrow-right"></i></a>
                    <a href="<?php echo $navBase; ?>all_institutions/computer-center.php" class="nav-dropdown-link <?php echo $currentPage === 'computer-center.php' ? 'active' : ''; ?>">Computer Center <i class="fas fa-arrow-right"></i></a>
                    <a href="<?php echo $navBase; ?>all_institutions/spoken-english.php" class="nav-dropdown-link <?php echo $currentPage === 'spoken-english.php' ? 'active' : ''; ?>">Spoken English <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <a href="<?php echo $navBase; ?>scholarship.php" class="<?php echo $currentPage === 'scholarship.php' ? 'active' : ''; ?>">Scholarships</a>
            <a href="<?php echo $navBase; ?>gallery.php" class="<?php echo $currentPage === 'gallery.php' ? 'active' : ''; ?>">Gallery</a>
            <a href="<?php echo $navBase; ?>contact.php" class="<?php echo $currentPage === 'contact.php' ? 'active' : ''; ?>">Contact</a>
            <a href="<?php echo $navBase; ?>contact.php" class="nav-cta">Apply 2026</a>
        </nav>

        <a href="tel:+917373733765" class="header-phone">
            <i class="fas fa-phone-alt"></i> +91 73 73 73 37 65
        </a>

        <button id="mobileMenuBtn" class="mobile-menu-btn" aria-label="Toggle menu" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div id="mobileMenu" class="mobile-menu">
        <a href="<?php echo $navBase; ?>index.php" class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">Home</a>
        <a href="<?php echo $navBase; ?>course.php" class="<?php echo $currentPage === 'course.php' ? 'active' : ''; ?>">Courses</a>
        <div id="mobileInstitutions" class="mobile-dropdown">
            <button id="mobileInstitutionsTrigger" type="button" class="mobile-dropdown-trigger" aria-expanded="false">
                Institutions <i class="fas fa-chevron-down" aria-hidden="true"></i>
            </button>
            <div class="mobile-dropdown-menu">
                <a href="<?php echo $navBase; ?>all_institutions/paramedical.php" class="<?php echo $currentPage === 'paramedical.php' ? 'active' : ''; ?>">Paramedical</a>
                <a href="<?php echo $navBase; ?>all_institutions/computer-center.php" class="<?php echo $currentPage === 'computer-center.php' ? 'active' : ''; ?>">Computer Center</a>
                <a href="<?php echo $navBase; ?>all_institutions/spoken-english.php" class="<?php echo $currentPage === 'spoken-english.php' ? 'active' : ''; ?>">Spoken English</a>
            </div>
        </div>
        <a href="<?php echo $navBase; ?>scholarship.php" class="<?php echo $currentPage === 'scholarship.php' ? 'active' : ''; ?>">Scholarships</a>
        <a href="<?php echo $navBase; ?>gallery.php" class="<?php echo $currentPage === 'gallery.php' ? 'active' : ''; ?>">Gallery</a>
        <a href="<?php echo $navBase; ?>contact.php" class="<?php echo $currentPage === 'contact.php' ? 'active' : ''; ?>">Contact</a>
        <a href="<?php echo $navBase; ?>contact.php">Apply 2026</a>
    </div>
</header>

<script>
(function () {
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    const institutionsTrigger = document.getElementById('institutionsTrigger');
    const institutionsMenu = document.getElementById('institutionsMenu');
    const institutionLinks = document.querySelectorAll('.nav-dropdown-link');
    const institutionsItem = institutionsTrigger ? institutionsTrigger.closest('.nav-item') : null;
    const mobileInstitutionsTrigger = document.getElementById('mobileInstitutionsTrigger');
    const mobileInstitutions = document.getElementById('mobileInstitutions');
    const mobileInstitutionLinks = document.querySelectorAll('.mobile-dropdown-menu a');
    if (!btn || !menu) return;

    btn.addEventListener('click', function () {
        menu.classList.toggle('show');
        btn.setAttribute('aria-expanded', menu.classList.contains('show') ? 'true' : 'false');
    });

    if (institutionsTrigger && institutionsMenu && institutionsItem) {
        institutionsTrigger.addEventListener('click', function (e) {
            e.preventDefault();
            const isOpen = institutionsItem.classList.toggle('open');
            institutionsTrigger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        institutionLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                institutionsItem.classList.remove('open');
                institutionsTrigger.setAttribute('aria-expanded', 'false');
            });
        });

        document.addEventListener('click', function (e) {
            if (!institutionsItem.contains(e.target)) {
                institutionsItem.classList.remove('open');
                institutionsTrigger.setAttribute('aria-expanded', 'false');
            }
        });
    }

    if (mobileInstitutionsTrigger && mobileInstitutions) {
        mobileInstitutionsTrigger.addEventListener('click', function () {
            const isOpen = mobileInstitutions.classList.toggle('open');
            mobileInstitutionsTrigger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        mobileInstitutionLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                mobileInstitutions.classList.remove('open');
                mobileInstitutionsTrigger.setAttribute('aria-expanded', 'false');
            });
        });
    }
})();
</script>
