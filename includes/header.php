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
        /* ============================================================
           CSS VARIABLES — unchanged
           ============================================================ */
        :root {
            --red:       #D32F2F;
            --red2:      #B71C1C;
            --red-rgb:   211,47,47;
            --sky:       #F59E0B;
            --navy:      #1E293B;
            --white:     #F8FAFC;
            --light:     #F8FAFC;
            --gray:      #1E293B;
            --border:    #F8FAFC;
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

        /* ============================================================
           TOP BAR — unchanged
           ============================================================ */
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
        .topbar a {
            color: #F8FAFC;
            text-decoration: underline;
            margin-left: 10px;
            font-weight: 800;
            position: relative;
            z-index: 1;
        }

        /* ============================================================
           SITE HEADER — unchanged
           ============================================================ */
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

        /* ============================================================
           LOGO — unchanged
           ============================================================ */
        .logo-link { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .logo-link.logo-only { gap: 0; }
        .logo-badge {
            width: 50px; height: 50px;
            background: linear-gradient(135deg, var(--red), #D32F2F);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-family: var(--font-head); font-size: 21px; font-weight: 700;
            color: #F8FAFC; letter-spacing: 1px;
            box-shadow: 0 4px 14px rgba(211,47,47,0.35);
        }
        .logo-badge.logo-image-only {
            width: 188px; height: 230px;
            background: transparent; box-shadow: none;
            border-radius: 0; color: transparent;
            font-size: 0; letter-spacing: 0; overflow: hidden;
        }
        .logo-badge.logo-image-only img {
            width: 100%; height: 25%;
            object-fit: contain; border-radius: 0; display: block;
            transform: translateY(2px) scale(1.18); transform-origin: center;
        }
        .logo-badge.logo-main { width: 160px; height: 50px; }
        .logo-badge.logo-main img {
            width: auto; height: 170%; max-height: 100px;
            object-fit: contain; transform: none; border-radius: 0; display: block;
        }
        .logo-badge.logo-computer-center img {
            transform: translateY(2px) scale(1.18); object-position: center; height: 20%;
        }
        .logo-badge.logo-spoken-english img {
            transform: translateY(5px) scale(1.1); object-position: center; height: 45%;
        }
        .logo-text-wrap strong {
            display: block; font-family: var(--font-head);
            font-size: 24px; font-weight: 700; color: var(--navy);
            letter-spacing: 0.06em; line-height: 1;
        }
        .logo-text-wrap small {
            font-size: 10px; font-weight: 700; color: var(--gray);
            letter-spacing: 0.18em; text-transform: uppercase;
        }

        /* ============================================================
           NAVIGATION — unchanged
           ============================================================ */
        .nav-links { display: flex; align-items: center; gap: 2px; }
        .nav-item   { position: relative; }
        .nav-links a,
        .nav-dropdown-trigger {
            font-size: 13px; font-weight: 700; color: var(--navy);
            padding: 8px 14px; border-radius: 6px; transition: all 0.2s;
            text-transform: uppercase; letter-spacing: 0.03em;
            text-decoration: none; border: 0; background: transparent;
            font-family: var(--font-head); cursor: pointer;
            white-space: nowrap; line-height: 1;
        }
        .nav-links a:hover, .nav-links a.active,
        .nav-dropdown-trigger:hover, .nav-dropdown-trigger.active {
            background: #F8FAFC; color: var(--red);
        }
        .nav-dropdown-trigger i { margin-left: 8px; font-size: 11px; transition: transform 0.2s ease; }
        .nav-item:hover .nav-dropdown-trigger i,
        .nav-item.open  .nav-dropdown-trigger i { transform: rotate(180deg); }
        .nav-dropdown-menu {
            position: absolute; top: calc(100% + 10px); left: 0;
            min-width: 240px; background: #F8FAFC;
            border: 1px solid rgba(30,41,59,0.08); border-radius: 10px;
            padding: 10px; box-shadow: 0 14px 34px rgba(30,41,59,0.14);
            display: grid; gap: 4px; opacity: 0; visibility: hidden;
            transform: translateY(8px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
            z-index: 1001;
        }
        .nav-dropdown-menu::before {
            content: ""; position: absolute; top: -6px; left: 20px;
            width: 12px; height: 12px; background: #F8FAFC;
            border-left: 1px solid rgba(30,41,59,0.08);
            border-top: 1px solid rgba(30,41,59,0.08); transform: rotate(45deg);
        }
        .nav-item:hover .nav-dropdown-menu,
        .nav-item.open  .nav-dropdown-menu { opacity: 1; visibility: visible; transform: translateY(0); }
        .nav-dropdown-link {
            display: flex; align-items: center; justify-content: space-between;
            gap: 10px; padding: 10px 12px; border-radius: 8px;
            font-size: 12px; font-weight: 700; color: var(--navy);
            text-transform: uppercase; letter-spacing: 0.04em; transition: all 0.2s ease;
        }
        .nav-dropdown-link:hover, .nav-dropdown-link.active {
            background: #F8FAFC; color: var(--red); transform: translateX(3px);
        }
        .nav-dropdown-link i { font-size: 11px; opacity: 0.65; }
        .nav-cta {
            background: var(--red) !important; color: #F8FAFC !important;
            border-radius: 6px !important; padding: 9px 20px !important;
            box-shadow: 0 4px 14px rgba(211,47,47,0.3);
            font-family: var(--font-head); white-space: nowrap;
            line-height: 1; cursor: pointer; border: none;
        }
        .nav-cta:hover { background: var(--red2) !important; }
        .nav-student-corner {
            background: #F59E0B !important; color: #1E293B !important;
            border-radius: 6px !important; padding: 9px 20px !important;
            box-shadow: 0 4px 14px rgba(245,158,11,0.3);
            font-family: var(--font-head); white-space: nowrap;
            line-height: 1; margin-right: 8px;
        }
        .nav-student-corner:hover { background: #FBBF24 !important; color: #1E293B !important; }
        .nav-student-corner i { margin-right: 6px; font-size: 12px; }
        .header-phone {
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 13px; font-weight: 800; font-family: var(--font-body);
            color: var(--red); border: 2px solid var(--red);
            padding: 7px 14px; border-radius: 6px; transition: all 0.2s;
            text-decoration: none; white-space: nowrap; line-height: 1;
        }
        .header-phone:hover { background: var(--red); color: #F8FAFC; }

        /* ============================================================
           MOBILE — unchanged
           ============================================================ */
        .mobile-menu-btn {
            display: none; width: 40px; height: 40px;
            border: 1px solid #F8FAFC; border-radius: 8px;
            background: #F8FAFC; color: var(--navy);
        }
        .mobile-menu {
            display: none; padding: 0 20px 16px;
            border-top: 1px solid #F8FAFC; background: #F8FAFC;
        }
        .mobile-menu a {
            display: block; padding: 10px 6px; font-size: 13px; font-weight: 700;
            color: var(--navy); border-bottom: 1px solid #F8FAFC;
            text-transform: uppercase; letter-spacing: 0.04em; text-decoration: none;
        }
        .mobile-menu a:last-child { border-bottom: 0; }
        .mobile-menu a.active { color: var(--red); }
        .mobile-dropdown { border-bottom: 1px solid #F8FAFC; }
        .mobile-dropdown-trigger {
            width: 100%; display: flex; align-items: center;
            justify-content: space-between; gap: 10px; padding: 10px 6px;
            font-size: 13px; font-weight: 700; color: var(--navy);
            text-transform: uppercase; letter-spacing: 0.04em;
            border: 0; background: transparent; font-family: var(--font-head);
        }
        .mobile-dropdown-trigger i { transition: transform 0.2s ease; font-size: 12px; }
        .mobile-dropdown.open .mobile-dropdown-trigger i { transform: rotate(180deg); }
        .mobile-dropdown-menu { display: none; padding: 0 0 8px 14px; }
        .mobile-dropdown.open .mobile-dropdown-menu { display: block; }
        .mobile-dropdown-menu a { font-size: 12px; padding: 9px 6px; border-bottom: 0; color: #334155; }

        /* ============================================================
           RESPONSIVE — unchanged
           ============================================================ */
        @media (max-width: 1240px) {
            .header-phone { display: none; }
            .nav-links a, .nav-dropdown-trigger { padding: 8px 10px; font-size: 12px; }
            .header-wrap { padding: 0 16px; }
        }
        @media (max-width: 1080px) {
            .nav-links, .header-phone { display: none; }
            .mobile-menu-btn { display: inline-flex; align-items: center; justify-content: center; }
            .mobile-menu.show { display: block; }
            .header-wrap { padding: 0 16px; }
        }
        @media (max-width: 768px) {
            .logo-badge.logo-image-only { width: 158px; height: 48px; }
            .logo-badge.logo-main { width: 120px; height: 36px; }
        }

        /* Spoken English override — unchanged */
        body.spoken-english-page { --red: #FF6B2B; --red2: #FF8C55; --red-rgb: 255,107,43; }

        /* ============================================================
           APPLY NOW — CENTERED FLOATING MODAL
           A centered popup with a single scrollable form.
           No stepper, no Next — scroll top to bottom, Submit at end.
           ============================================================ */

        /* Overlay */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(10, 15, 40, 0.72);
            backdrop-filter: blur(4px);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .modal-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        /* Modal box — centered, floatable */
        .apply-modal {
            background: #fff;
            border-radius: 18px;
            width: 100%;
            max-width: 620px;
            max-height: 90vh;
            display: flex;
            flex-direction: column;
            box-shadow: 0 32px 80px rgba(10,15,40,0.35), 0 0 0 1px rgba(255,255,255,0.08);
            transform: scale(0.93) translateY(20px);
            transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), opacity 0.3s ease;
            opacity: 0;
            overflow: hidden;
        }
        .modal-overlay.open .apply-modal {
            transform: scale(1) translateY(0);
            opacity: 1;
        }

        /* ── Modal header ── */
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 26px;
            background: linear-gradient(135deg, var(--red) 0%, #8B0000 100%);
            flex-shrink: 0;
        }
        .modal-header-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .modal-header-icon {
            width: 42px; height: 42px;
            background: rgba(255,255,255,0.18);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px; color: #fff;
        }
        .modal-header h2 {
            font-family: var(--font-head);
            font-size: 22px; font-weight: 700;
            color: #fff; letter-spacing: 0.05em; line-height: 1;
        }
        .modal-header p {
            font-size: 12px; color: rgba(255,255,255,0.8); margin-top: 3px;
        }
        .modal-close {
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.15);
            border: none; border-radius: 8px;
            color: #fff; font-size: 16px;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            transition: background 0.2s; flex-shrink: 0;
        }
        .modal-close:hover { background: rgba(255,255,255,0.3); }

        /* ── Scrollable form body ── */
        .modal-body {
            flex: 1;
            overflow-y: auto;
            padding: 28px 26px;
            scroll-behavior: smooth;
        }
        .modal-body::-webkit-scrollbar { width: 5px; }
        .modal-body::-webkit-scrollbar-track { background: #F1F5F9; }
        .modal-body::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 3px; }
        .modal-body::-webkit-scrollbar-thumb:hover { background: #94A3B8; }

        /* ── Section headings inside form ── */
        .form-section {
            margin-bottom: 28px;
        }
        .form-section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            background: linear-gradient(135deg, #FEF2F2, #fff5f5);
            border-left: 3px solid var(--red);
            border-radius: 0 8px 8px 0;
            margin-bottom: 18px;
        }
        .form-section-title i {
            color: var(--red);
            font-size: 14px;
            width: 20px;
            text-align: center;
        }
        .form-section-title span {
            font-family: var(--font-head);
            font-size: 15px;
            font-weight: 700;
            color: var(--navy);
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* ── Form grid ── */
        .fgrid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .fgrid .fcol-2 { grid-column: 1 / 3; }

        /* ── Fields ── */
        .ffield { display: flex; flex-direction: column; gap: 5px; }
        .ffield label {
            font-size: 11px; font-weight: 700; color: #374151;
            text-transform: uppercase; letter-spacing: 0.06em;
        }
        .ffield label .req { color: var(--red); margin-left: 2px; }
        .ffield input,
        .ffield select,
        .ffield textarea {
            padding: 10px 13px;
            border: 1.5px solid #E2E8F0;
            border-radius: 8px;
            font-family: var(--font-body);
            font-size: 13px; color: var(--navy);
            background: #F8FAFC;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }
        .ffield input:focus,
        .ffield select:focus,
        .ffield textarea:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(211,47,47,0.09);
            background: #fff;
        }
        .ffield textarea { min-height: 72px; resize: vertical; }

        /* ── Sub-label (Present / Permanent) ── */
        .fsub-label {
            font-family: var(--font-head);
            font-size: 13px; font-weight: 700;
            color: var(--red); text-transform: uppercase;
            letter-spacing: 0.06em; margin: 16px 0 10px;
            display: flex; align-items: center; gap: 6px;
        }
        .fsub-label::after {
            content: '';
            flex: 1; height: 1px;
            background: linear-gradient(90deg, rgba(211,47,47,0.3), transparent);
        }

        /* ── Course type pill toggle ── */
        .course-pills {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 16px;
        }
        .cpill {
            padding: 14px;
            border: 2px solid #E2E8F0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.22s;
            display: flex; align-items: center; gap: 12px;
            background: #F8FAFC;
        }
        .cpill:hover { border-color: var(--red); background: #fff; }
        .cpill.selected {
            border-color: var(--red);
            background: #FEF2F2;
            box-shadow: 0 4px 14px rgba(211,47,47,0.1);
        }
        .cpill input[type="radio"] { display: none; }
        .cpill-icon {
            width: 38px; height: 38px; border-radius: 8px;
            background: #fff; display: flex; align-items: center; justify-content: center;
            font-size: 17px; color: #64748B; flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06); transition: all 0.22s;
        }
        .cpill.selected .cpill-icon { background: var(--red); color: #fff; }
        .cpill-text strong {
            display: block; font-family: var(--font-head);
            font-size: 15px; font-weight: 700; color: var(--navy);
        }
        .cpill-text span { font-size: 11px; color: #64748B; }
        .cpill.selected .cpill-text strong { color: var(--red); }

        .course-select-wrap { display: none; margin-bottom: 4px; }
        .course-select-wrap.show { display: block; }

        /* ── Divider between sections ── */
        .fdivider {
            height: 1px;
            background: linear-gradient(90deg, #E2E8F0 0%, transparent 100%);
            margin: 24px 0;
        }

        /* ── Error alert ── */
        .merror {
            background: #FEF2F2; border: 1px solid #FECACA;
            color: #B91C1C; padding: 11px 14px;
            border-radius: 8px; font-size: 12px; font-weight: 600;
            display: none; align-items: center; gap: 8px;
            margin-bottom: 20px;
        }
        .merror.show { display: flex; }

        /* ── Modal sticky footer ── */
        .modal-footer {
            padding: 16px 26px;
            border-top: 1px solid #E2E8F0;
            background: #F8FAFC;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
            gap: 12px;
        }
        .modal-footer-note {
            font-size: 11px;
            color: #94A3B8;
            display: flex; align-items: center; gap: 6px;
        }
        .modal-footer-note i { color: var(--red); }
        .mbtn-submit {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 12px 28px;
            background: linear-gradient(135deg, var(--red), var(--red2));
            color: #fff;
            border: none; border-radius: 10px;
            font-family: var(--font-head);
            font-size: 16px; font-weight: 700;
            letter-spacing: 0.05em;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(211,47,47,0.3);
            transition: all 0.25s;
            flex-shrink: 0;
        }
        .mbtn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(211,47,47,0.38);
        }
        .mbtn-submit:disabled {
            opacity: 0.7; cursor: not-allowed; transform: none;
        }

        /* ── Success state (replaces form content) ── */
        .modal-success {
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 56px 32px;
            flex: 1;
        }
        .modal-success.show { display: flex; }
        .msuccess-ring {
            width: 80px; height: 80px;
            background: linear-gradient(135deg, #dcfce7, #86efac);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 34px; color: #16A34A;
            margin-bottom: 22px;
            animation: mPopIn 0.55s cubic-bezier(.175,.885,.32,1.275);
        }
        @keyframes mPopIn {
            from { transform: scale(0) rotate(-15deg); opacity: 0; }
            to   { transform: scale(1) rotate(0deg);  opacity: 1; }
        }
        .modal-success h2 {
            font-family: var(--font-head);
            font-size: 26px; font-weight: 700; color: var(--navy);
            margin-bottom: 8px;
        }
        .modal-success p { font-size: 13px; color: #64748B; margin-bottom: 20px; }
        .msl-badge {
            background: var(--navy); color: #fff;
            font-family: var(--font-head);
            font-size: 22px; font-weight: 700;
            letter-spacing: 0.12em;
            padding: 14px 32px; border-radius: 12px;
            margin-bottom: 28px;
        }
        .mbtn-new {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 11px 24px;
            background: var(--red); color: #fff;
            border: none; border-radius: 8px;
            font-family: var(--font-head);
            font-size: 15px; font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(211,47,47,0.25);
            transition: all 0.2s;
        }
        .mbtn-new:hover { background: var(--red2); transform: translateY(-1px); }

        /* Prevent body scroll when modal open */
        body.modal-open { overflow: hidden; }

        /* ============================================================
           RESPONSIVE — modal
           ============================================================ */
        @media (max-width: 640px) {
            .modal-overlay { padding: 0; align-items: flex-end; }
            .apply-modal { max-width: 100%; max-height: 95vh; border-radius: 18px 18px 0 0; }
            .fgrid { grid-template-columns: 1fr; }
            .fgrid .fcol-2 { grid-column: 1; }
            .course-pills { grid-template-columns: 1fr; }
            .modal-footer { flex-wrap: wrap; }
            .modal-footer-note { display: none; }
        }

    </style>
</head>

<?php
/* PAGE DETECTION — unchanged */
$currentPage          = basename($_SERVER['PHP_SELF']);
$isSpokenEnglish      = ($currentPage === 'spoken-english.php');
$isParamedicalPage    = ($currentPage === 'paramedical.php');
$isComputerCenterPage = ($currentPage === 'computer-center.php');
$isSpokenEnglishPage  = ($currentPage === 'spoken-english.php');
$institutionPages     = ['institution.php','paramedical.php','computer-center.php','spoken-english.php'];
$isInstitutionsPage   = in_array($currentPage, $institutionPages, true);
?>
<body<?php echo $isSpokenEnglish ? ' class="spoken-english-page"' : ''; ?>>

<?php
/* BASE PATH — unchanged */
$scriptPath = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
$pagesPos   = strpos($scriptPath, '/pages/');
$navBase    = $pagesPos !== false ? substr($scriptPath, 0, $pagesPos + 7) : 'pages/';

/* LOGO SELECTION — unchanged */
if ($isParamedicalPage) {
    $logoPath = $navBase . '../assets/images/srm-paramedical-logo.png';
    $logoBadgeClass = 'logo-image-only logo-paramedical';
} elseif ($isComputerCenterPage) {
    $logoPath = $navBase . '../assets/images/srm-cc-logo.png';
    $logoBadgeClass = 'logo-image-only logo-computer-center';
} elseif ($isSpokenEnglishPage) {
    $logoPath = $navBase . '../assets/images/srm-se-logo.png';
    $logoBadgeClass = 'logo-image-only logo-spoken-english';
} else {
    $logoPath = $navBase . '../assets/images/srm-main-logo.png';
    $logoBadgeClass = 'logo-image-only logo-main';
}
$hasCustomLogo = !empty($logoPath);
?>

<!-- TOP BAR -->
<div class="topbar">
    <span>⭐</span> Admissions Open 2026 <span>|</span> Scholarship up to <span>75%</span>
    <a href="#" onclick="openApplyModal(); return false;">Apply Now</a>
</div>

<!-- SITE HEADER -->
<header class="site-header">
    <div class="header-wrap">

        <!-- LOGO — unchanged -->
        <a href="<?php echo $navBase; ?>index.php"
           class="logo-link <?php echo $hasCustomLogo ? 'logo-only' : ''; ?>">
            <div class="logo-badge <?php echo htmlspecialchars($logoBadgeClass); ?>">
                <?php if ($hasCustomLogo): ?>
                    <img src="<?php echo $logoPath; ?>" alt="SRM Logo" loading="eager">
                <?php else: ?>
                    SRM
                <?php endif; ?>
            </div>
            <?php if (!$hasCustomLogo): ?>
                <div class="logo-text-wrap">
                    <strong>SRM Institute</strong>
                    <small>Healthcare & Technology</small>
                </div>
            <?php endif; ?>
        </a>

        <!-- DESKTOP NAV — unchanged -->
        <nav class="nav-links">
            <a href="<?php echo $navBase; ?>index.php"
               class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">Home</a>
            <a href="<?php echo $navBase; ?>course.php"
               class="<?php echo $currentPage === 'course.php' ? 'active' : ''; ?>">Courses</a>

            <!-- Institutions dropdown — unchanged -->
            <div class="nav-item">
                <button id="institutionsTrigger" type="button"
                        class="nav-dropdown-trigger <?php echo $isInstitutionsPage ? 'active' : ''; ?>"
                        aria-haspopup="true" aria-expanded="false">
                    Institutions <i class="fas fa-chevron-down" aria-hidden="true"></i>
                </button>
                <div id="institutionsMenu" class="nav-dropdown-menu">
                    <a href="<?php echo $navBase; ?>all_institutions/paramedical.php"
                       class="nav-dropdown-link <?php echo $currentPage === 'paramedical.php' ? 'active' : ''; ?>">
                        Paramedical <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="<?php echo $navBase; ?>all_institutions/computer-center.php"
                       class="nav-dropdown-link <?php echo $currentPage === 'computer-center.php' ? 'active' : ''; ?>">
                        Computer Center <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="<?php echo $navBase; ?>all_institutions/spoken-english.php"
                       class="nav-dropdown-link <?php echo $currentPage === 'spoken-english.php' ? 'active' : ''; ?>">
                        Spoken English <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <a href="<?php echo $navBase; ?>scholarship.php"
               class="<?php echo $currentPage === 'scholarship.php' ? 'active' : ''; ?>">Scholarships</a>
            <a href="<?php echo $navBase; ?>gallery.php"
               class="<?php echo $currentPage === 'gallery.php' ? 'active' : ''; ?>">Gallery</a>
            <a href="<?php echo $navBase; ?>contact.php"
               class="<?php echo $currentPage === 'contact.php' ? 'active' : ''; ?>">Contact</a>

            <!-- Student Corner — unchanged -->
            <a href="<?php echo $navBase; ?>student-corner/student-corner.php"
               class="nav-student-corner">
                <i class="fas fa-user-large"></i> Student Corner
            </a>

            <!-- STEP 1: Desktop button — changed onclick to openApplyOptions() -->
            <button type="button" class="nav-cta" onclick="openApplyOptions()">Apply 2026</button>
        </nav>

        <!-- PHONE — unchanged -->
        <a href="tel:+917373733765" class="header-phone">
            <i class="fas fa-phone-alt"></i> +91 73 73 73 37 63
        </a>

        <!-- HAMBURGER — unchanged -->
        <button id="mobileMenuBtn" class="mobile-menu-btn"
                aria-label="Toggle menu" aria-expanded="false">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- MOBILE MENU — unchanged -->
    <div id="mobileMenu" class="mobile-menu">
        <a href="<?php echo $navBase; ?>index.php"
           class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">Home</a>
        <a href="<?php echo $navBase; ?>course.php"
           class="<?php echo $currentPage === 'course.php' ? 'active' : ''; ?>">Courses</a>
        <div id="mobileInstitutions" class="mobile-dropdown">
            <button id="mobileInstitutionsTrigger" type="button"
                    class="mobile-dropdown-trigger" aria-haspopup="true" aria-expanded="false">
                Institutions <i class="fas fa-chevron-down"></i>
            </button>
            <div class="mobile-dropdown-menu">
                <a href="<?php echo $navBase; ?>all_institutions/paramedical.php">Paramedical</a>
                <a href="<?php echo $navBase; ?>all_institutions/computer-center.php">Computer Center</a>
                <a href="<?php echo $navBase; ?>all_institutions/spoken-english.php">Spoken English</a>
            </div>
        </div>
        <a href="<?php echo $navBase; ?>scholarship.php"
           class="<?php echo $currentPage === 'scholarship.php' ? 'active' : ''; ?>">Scholarships</a>
        <a href="<?php echo $navBase; ?>gallery.php"
           class="<?php echo $currentPage === 'gallery.php' ? 'active' : ''; ?>">Gallery</a>
        <a href="<?php echo $navBase; ?>contact.php"
           class="<?php echo $currentPage === 'contact.php' ? 'active' : ''; ?>">Contact</a>
        <a href="<?php echo $navBase; ?>student-corner/student-corner.php">Student Corner</a>
        <!-- STEP 1: Mobile link — changed onclick to openApplyOptions() -->
        <a href="#" onclick="openApplyOptions(); return false;">Apply 2026</a>
    </div>
</header>

<!-- ============================================================
     STEP 2: APPLY OPTIONS MODAL (Download / Online)
     Placed ABOVE the existing apply modal overlay.
     Opens first when clicking "Apply 2026".
     ============================================================ -->
<div class="modal-overlay" id="applyOptionsOverlay" onclick="handleApplyOptionsOverlay(event)">

    <div class="apply-modal" style="max-width:480px;" role="dialog" aria-modal="true">

        <!-- Header -->
        <div class="modal-header">
            <div class="modal-header-left">
                <div class="modal-header-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <h2>Apply Now — 2026</h2>
                    <p>SRM College of Education · Vaniyambadi</p>
                </div>
            </div>
            <button class="modal-close" onclick="closeApplyOptions()" aria-label="Close">
                <i class="fas fa-xmark"></i>
            </button>
        </div>

        <!-- Body — two cards side by side -->
        <div class="modal-body" style="padding:24px; overflow:hidden;">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">

                <!-- Download Application card -->
                <button type="button" onclick="downloadApplicationForm()"
                        style="display:flex;flex-direction:column;align-items:center;justify-content:center;
                               gap:12px;padding:22px 16px;border:2px solid #E2E8F0;border-radius:14px;
                               background:#F8FAFC;cursor:pointer;text-align:center;transition:all .22s;
                               font-family:inherit;"
                        onmouseover="this.style.borderColor='var(--red)';this.style.background='#FEF2F2';this.style.boxShadow='0 6px 20px rgba(211,47,47,0.12)';this.style.transform='translateY(-2px)';this.querySelector('.opt-icon').style.background='var(--navy)';this.querySelector('.opt-icon').style.color='#fff';"
                        onmouseout="this.style.borderColor='#E2E8F0';this.style.background='#F8FAFC';this.style.boxShadow='none';this.style.transform='translateY(0)';this.querySelector('.opt-icon').style.background='#EEF2FF';this.querySelector('.opt-icon').style.color='var(--navy)';">
                    <div class="opt-icon" style="width:52px;height:52px;border-radius:12px;background:#EEF2FF;
                                                  display:flex;align-items:center;justify-content:center;
                                                  font-size:22px;color:var(--navy);transition:all .22s;flex-shrink:0;">
                        <i class="fas fa-file-arrow-down"></i>
                    </div>
                    <div>
                        <div style="font-family:var(--font-head);font-size:15px;font-weight:700;
                                    color:var(--navy);letter-spacing:.04em;text-transform:uppercase;
                                    line-height:1.2;margin-bottom:5px;">Download<br>Application</div>
                        <div style="font-size:11px;color:#64748B;line-height:1.4;">
                            Get the printable PDF &amp; submit in person
                        </div>
                    </div>
                </button>

                <!-- Online Apply card -->
                <button type="button" onclick="openOnlineApplyFromOptions()"
                        style="display:flex;flex-direction:column;align-items:center;justify-content:center;
                               gap:12px;padding:22px 16px;border:2px solid #E2E8F0;border-radius:14px;
                               background:#F8FAFC;cursor:pointer;text-align:center;transition:all .22s;
                               font-family:inherit;"
                        onmouseover="this.style.borderColor='var(--red)';this.style.background='#FEF2F2';this.style.boxShadow='0 6px 20px rgba(211,47,47,0.12)';this.style.transform='translateY(-2px)';this.querySelector('.opt-icon').style.background='var(--red)';this.querySelector('.opt-icon').style.color='#fff';"
                        onmouseout="this.style.borderColor='#E2E8F0';this.style.background='#F8FAFC';this.style.boxShadow='none';this.style.transform='translateY(0)';this.querySelector('.opt-icon').style.background='#FEF2F2';this.querySelector('.opt-icon').style.color='var(--red)';">
                    <div class="opt-icon" style="width:52px;height:52px;border-radius:12px;background:#FEF2F2;
                                                  display:flex;align-items:center;justify-content:center;
                                                  font-size:22px;color:var(--red);transition:all .22s;flex-shrink:0;">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <div>
                        <div style="font-family:var(--font-head);font-size:15px;font-weight:700;
                                    color:var(--navy);letter-spacing:.04em;text-transform:uppercase;
                                    line-height:1.2;margin-bottom:5px;">Online<br>Apply</div>
                        <div style="font-size:11px;color:#64748B;line-height:1.4;">
                            Fill &amp; submit your application instantly online
                        </div>
                    </div>
                </button>

            </div>
        </div>

    </div>
</div>

<!-- ============================================================
     CENTERED FLOATING MODAL — APPLY NOW
     Single scrollable form, no steps, Submit at bottom
     ============================================================ -->

<!-- Overlay (click to close) -->
<div class="modal-overlay" id="applyOverlay" onclick="handleOverlayClick(event)">

    <!-- Modal box -->
    <div class="apply-modal" id="applyModal" role="dialog" aria-modal="true">

        <!-- ── Header ── -->
        <div class="modal-header">
            <div class="modal-header-left">
                <div class="modal-header-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <h2>Apply Now — 2026</h2>
                    <p>SRM College of Education · Vaniyambadi</p>
                </div>
            </div>
            <button class="modal-close" onclick="closeApplyModal()" aria-label="Close">
                <i class="fas fa-xmark"></i>
            </button>
        </div>

        <!-- ── Scrollable form body ── -->
        <div class="modal-body" id="modalBody">

            <!-- Error alert -->
            <div class="merror" id="modalError">
                <i class="fas fa-circle-exclamation"></i>
                <span id="modalErrorMsg">Please fill all required fields.</span>
            </div>

            <!-- ── SECTION 1: Course Selection ── -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Course Selection</span>
                </div>

                <!-- Course type pills -->
                <div class="course-pills">
                    <label class="cpill" id="cpill-bsc">
                        <input type="radio" name="m_course_type" value="BSC"
                               onchange="mSelectType('BSC')">
                        <div class="cpill-icon"><i class="fas fa-flask"></i></div>
                        <div class="cpill-text">
                            <strong>BSC Degree</strong>
                            <span>3-year bachelor</span>
                        </div>
                    </label>
                    <label class="cpill" id="cpill-diploma">
                        <input type="radio" name="m_course_type" value="DIPLOMA"
                               onchange="mSelectType('DIPLOMA')">
                        <div class="cpill-icon"><i class="fas fa-scroll"></i></div>
                        <div class="cpill-text">
                            <strong>3 Year Diploma</strong>
                            <span>Diploma level</span>
                        </div>
                    </label>
                </div>

                <!-- BSC courses -->
                <div class="course-select-wrap" id="mbscWrap">
                    <div class="ffield">
                        <label>BSC Course <span class="req">*</span></label>
                        <select id="m_bsc_course">
                            <option value="">Select BSC course</option>
                            <option>BSC – MLT</option>
                            <option>BSC – Anaesthesia</option>
                            <option>BSC – Optometry</option>
                            <option>BSC – MPHW</option>
                            <option>B-Pharmacy</option>
                        </select>
                    </div>
                </div>

                <!-- Diploma courses -->
                <div class="course-select-wrap" id="mdipWrap">
                    <div class="ffield">
                        <label>Diploma Course <span class="req">*</span></label>
                        <select id="m_dip_course">
                            <option value="">Select Diploma course</option>
                            <option>D-Pharmacy</option>
                            <option>DMLT</option>
                            <option>DOTT</option>
                            <option>D-Anaesthesia</option>
                            <option>D-Dialysis</option>
                            <option>D-Dental</option>
                            <option>D-Radiology</option>
                        </select>
                    </div>
                </div>

                <!-- Session -->
                <div class="ffield" style="margin-top:14px; max-width:280px;">
                    <label>Academic Session <span class="req">*</span></label>
                    <select id="m_session">
                        <option value="">Select session</option>
                        <option>2026-2027</option>
                        <option>2027-2028</option>
                    </select>
                </div>
            </div>

            <div class="fdivider"></div>

            <!-- ── SECTION 2: Personal Details ── -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-user"></i>
                    <span>Personal Details</span>
                </div>
                <div class="fgrid">
                    <div class="ffield fcol-2">
                        <label>Applicant Name <span class="req">*</span></label>
                        <input type="text" id="m_applicant_name" placeholder="Full name as per certificate">
                    </div>
                    <div class="ffield">
                        <label>Father Name <span class="req">*</span></label>
                        <input type="text" id="m_father_name" placeholder="Father's full name">
                    </div>
                    <div class="ffield">
                        <label>Mother Name <span class="req">*</span></label>
                        <input type="text" id="m_mother_name" placeholder="Mother's full name">
                    </div>
                    <div class="ffield">
                        <label>Gender <span class="req">*</span></label>
                        <select id="m_gender">
                            <option value="">Select gender</option>
                            <option>Male</option><option>Female</option><option>Transgender</option>
                        </select>
                    </div>
                    <div class="ffield">
                        <label>Date of Birth <span class="req">*</span></label>
                        <input type="date" id="m_dob">
                    </div>
                    <div class="ffield">
                        <label>Category <span class="req">*</span></label>
                        <select id="m_category">
                            <option value="">Select</option>
                            <option>GEN</option><option>BC</option>
                            <option>MBC</option><option>SC</option><option>ST</option>
                        </select>
                    </div>
                    <div class="ffield">
                        <label>Mobile <span class="req">*</span></label>
                        <input type="text" id="m_mobile" placeholder="10-digit number">
                    </div>
                    <div class="ffield">
                        <label>Nationality <span class="req">*</span></label>
                        <input type="text" id="m_nationality" value="Indian">
                    </div>
                </div>
            </div>

            <div class="fdivider"></div>

            <!-- ── SECTION 3: Address ── -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-location-dot"></i>
                    <span>Address Details</span>
                </div>

                <div class="fsub-label">Present Address</div>
                <div class="fgrid">
                    <div class="ffield fcol-2">
                        <label>Address <span class="req">*</span></label>
                        <textarea id="m_present_address" placeholder="Door no, Street, Area"></textarea>
                    </div>
                    <div class="ffield">
                        <label>P.S <span class="req">*</span></label>
                        <input type="text" id="m_present_ps" placeholder="Police Station">
                    </div>
                    <div class="ffield">
                        <label>District <span class="req">*</span></label>
                        <input type="text" id="m_present_dist">
                    </div>
                    <div class="ffield">
                        <label>Pin Code <span class="req">*</span></label>
                        <input type="text" id="m_present_pin" placeholder="6 digits">
                    </div>
                    <div class="ffield">
                        <label>Email <span class="req">*</span></label>
                        <input type="email" id="m_present_email" placeholder="you@email.com">
                    </div>
                </div>

                <div class="fsub-label" style="margin-top:20px;">Permanent Address</div>
                <div class="ffield">
                    <label>Permanent Address <span class="req">*</span></label>
                    <textarea id="m_permanent_address"
                              placeholder="If same as present, re-enter or write 'Same as above'"></textarea>
                </div>
            </div>

            <div class="fdivider"></div>

            <!-- ── SECTION 4: Guardian ── -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-people-roof"></i>
                    <span>Guardian Details</span>
                </div>
                <div class="fgrid">
                    <div class="ffield">
                        <label>Father Occupation <span class="req">*</span></label>
                        <input type="text" id="m_father_occupation" placeholder="e.g. Farmer, Business">
                    </div>
                    <div class="ffield">
                        <label>Father Mobile <span class="req">*</span></label>
                        <input type="text" id="m_father_mobile">
                    </div>
                    <div class="ffield">
                        <label>Mother Occupation <span class="req">*</span></label>
                        <input type="text" id="m_mother_occupation" placeholder="e.g. Homemaker">
                    </div>
                    <div class="ffield">
                        <label>Mother Mobile <span class="req">*</span></label>
                        <input type="text" id="m_mother_mobile">
                    </div>
                </div>
            </div>

        </div><!-- /.modal-body -->

        <!-- Success state (shown after submit, hides form) -->
        <div class="modal-success" id="modalSuccess">
            <div class="msuccess-ring"><i class="fas fa-check"></i></div>
            <h2>Application Submitted!</h2>
            <p>Your application has been received. Save your application number below.</p>
            <div class="msl-badge" id="modalSlNo">—</div>
            <p style="font-size:11px;color:#94A3B8;margin-bottom:24px;">
                Keep this number for the admission process.
            </p>
            <button class="mbtn-new" onclick="resetModal()">
                <i class="fas fa-plus"></i> New Application
            </button>
        </div>

        <!-- ── Sticky footer with Submit button ── -->
        <div class="modal-footer" id="modalFooter">
            <div class="modal-footer-note">
                <i class="fas fa-lock"></i>
                Your data is safe with us
            </div>
            <button type="button" class="mbtn-submit" id="modalSubmitBtn"
                    onclick="mSubmitForm()">
                <i class="fas fa-paper-plane"></i> Submit Application
            </button>
        </div>

    </div><!-- /.apply-modal -->
</div><!-- /.modal-overlay -->

<!-- ============================================================
     JAVASCRIPT
     ── STEP 3: Apply Options Modal functions (NEW, added inside IIFE)
     ── Modal open/close/reset           (unchanged)
     ── Course pill toggle               (unchanged)
     ── Fetch submit (no page reload)    (unchanged)
     ── Original nav dropdown logic      (unchanged)
     ============================================================ -->
<script>
(function () {

    var mCourseType = '';

    /* ──────────────────────────────
       STEP 3: APPLY OPTIONS MODAL FUNCTIONS (NEW)
    ────────────────────────────── */

    window.openApplyOptions = function () {
        document.getElementById('applyOptionsOverlay').classList.add('open');
        document.body.classList.add('modal-open');
    };

    window.closeApplyOptions = function () {
        document.getElementById('applyOptionsOverlay').classList.remove('open');
        document.body.classList.remove('modal-open');
    };

    window.handleApplyOptionsOverlay = function (e) {
        if (e.target === document.getElementById('applyOptionsOverlay')) {
            closeApplyOptions();
        }
    };

    /* When Online Apply clicked — close options, open existing apply modal */
    window.openOnlineApplyFromOptions = function () {
        closeApplyOptions();
        openApplyModal();
    };

    /* Download Application PDF */
    window.downloadApplicationForm = function () {
        /* Opens the public download page (/pages/download-application.php)
           which shows the PDF preview + download button served from DB setting */
         window.open('/SRM_EDUCATION/download-application.php', '_blank');
    };

    /* ──────────────────────────────
       OPEN / CLOSE / RESET — unchanged
    ────────────────────────────── */
    window.openApplyModal = function () {
        document.getElementById('applyOverlay').classList.add('open');
        document.body.classList.add('modal-open');
    };

    window.closeApplyModal = function () {
        document.getElementById('applyOverlay').classList.remove('open');
        document.body.classList.remove('modal-open');
    };

    /* Click outside the modal box closes it */
    window.handleOverlayClick = function (e) {
        if (e.target === document.getElementById('applyOverlay')) {
            closeApplyModal();
        }
    };

    /* ESC key closes */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeApplyModal();
            closeApplyOptions();
        }
    });

    /* ──────────────────────────────
       COURSE TYPE PILLS — unchanged
    ────────────────────────────── */
    window.mSelectType = function (type) {
        mCourseType = type;
        document.getElementById('cpill-bsc').classList.toggle('selected', type === 'BSC');
        document.getElementById('cpill-diploma').classList.toggle('selected', type === 'DIPLOMA');
        document.getElementById('mbscWrap').classList.toggle('show', type === 'BSC');
        document.getElementById('mdipWrap').classList.toggle('show', type === 'DIPLOMA');
    };

    /* ──────────────────────────────
       COLLECT ALL FIELD VALUES — unchanged
    ────────────────────────────── */
    function mGetVal(id) {
        var el = document.getElementById(id);
        return el ? el.value.trim() : '';
    }

    function mCollectData() {
        var course = mCourseType === 'BSC'
            ? mGetVal('m_bsc_course')
            : mGetVal('m_dip_course');
        return {
            course_type:        mCourseType,
            course:             course,
            academic_session:   mGetVal('m_session'),
            applicant_name:     mGetVal('m_applicant_name'),
            father_name:        mGetVal('m_father_name'),
            mother_name:        mGetVal('m_mother_name'),
            gender:             mGetVal('m_gender'),
            dob:                mGetVal('m_dob'),
            category:           mGetVal('m_category'),
            mobile:             mGetVal('m_mobile'),
            nationality:        mGetVal('m_nationality'),
            present_address:    mGetVal('m_present_address'),
            present_ps:         mGetVal('m_present_ps'),
            present_dist:       mGetVal('m_present_dist'),
            present_pin:        mGetVal('m_present_pin'),
            present_email:      mGetVal('m_present_email'),
            permanent_address:  mGetVal('m_permanent_address'),
            father_occupation:  mGetVal('m_father_occupation'),
            father_mobile:      mGetVal('m_father_mobile'),
            mother_occupation:  mGetVal('m_mother_occupation'),
            mother_mobile:      mGetVal('m_mother_mobile'),
        };
    }

    /* ──────────────────────────────
       SUBMIT via fetch() — no reload — unchanged
    ────────────────────────────── */
    window.mSubmitForm = function () {

        var data = mCollectData();
        var required = [
            'course_type','course','academic_session',
            'applicant_name','father_name','mother_name',
            'gender','dob','category','mobile','nationality',
            'present_address','present_ps','present_dist','present_pin','present_email',
            'permanent_address',
            'father_occupation','father_mobile',
            'mother_occupation','mother_mobile'
        ];

        var err = document.getElementById('modalError');

        /* Validate */
        for (var i = 0; i < required.length; i++) {
            if (!data[required[i]]) {
                err.classList.add('show');
                document.getElementById('modalErrorMsg').textContent =
                    'Please fill all required fields before submitting.';
                document.getElementById('modalBody').scrollTop = 0;
                return;
            }
        }
        err.classList.remove('show');

        /* Submit */
        var btn = document.getElementById('modalSubmitBtn');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
        btn.disabled  = true;

        var fd = new FormData();
        Object.keys(data).forEach(function (k) { fd.append(k, data[k]); });

        // fetch('<?php echo $navBase; ?>../api/save-application.php', {
        fetch('/SRM_EDUCATION/save-application.php', {
            method: 'POST',
            body: fd
        })
        // .then(function (res) { return res.text(); })
        // .then(function (html) {
        //     /* Parse SL number from response */
        //     var match = html.match(/<h3>([\w]+)<\/h3>/);
        //     var slNo  = match ? match[1] : '—';

        //     /* Show success — hide form & footer */
        //     document.getElementById('modalBody').style.display   = 'none';
        //     document.getElementById('modalFooter').style.display = 'none';
        //     document.getElementById('modalSuccess').classList.add('show');
        //     document.getElementById('modalSlNo').textContent = slNo;
        // })
        .then(res => res.json())
.then(result => {

    if (!result.success) {
        throw new Error();
    }

    document.getElementById('modalBody').style.display = 'none';
    document.getElementById('modalFooter').style.display = 'none';
    document.getElementById('modalSuccess').classList.add('show');
    document.getElementById('modalSlNo').textContent = result.application_no;

})
        .catch(function () {
            err.classList.add('show');
            document.getElementById('modalErrorMsg').textContent =
                'Submission failed. Please check your connection and try again.';
            btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Application';
            btn.disabled  = false;
        });
    };

    /* ──────────────────────────────
       RESET for new application — unchanged
    ────────────────────────────── */
    window.resetModal = function () {
        /* restore form & footer */
        document.getElementById('modalBody').style.display   = '';
        document.getElementById('modalFooter').style.display = '';
        document.getElementById('modalSuccess').classList.remove('show');

        /* reset submit button */
        var btn = document.getElementById('modalSubmitBtn');
        btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Application';
        btn.disabled  = false;

        /* clear all fields */
        document.querySelectorAll('#modalBody input, #modalBody select, #modalBody textarea')
            .forEach(function (el) {
                if (el.id === 'm_nationality') { el.value = 'Indian'; return; }
                el.value = '';
            });

        /* reset pills */
        document.getElementById('cpill-bsc').classList.remove('selected');
        document.getElementById('cpill-diploma').classList.remove('selected');
        document.getElementById('mbscWrap').classList.remove('show');
        document.getElementById('mdipWrap').classList.remove('show');
        mCourseType = '';

        /* scroll to top */
        document.getElementById('modalBody').scrollTop = 0;
        document.getElementById('modalError').classList.remove('show');
    };

    /* ──────────────────────────────
       ORIGINAL NAV DROPDOWN LOGIC — unchanged
    ────────────────────────────── */
    var btn                    = document.getElementById('mobileMenuBtn');
    var menu                   = document.getElementById('mobileMenu');
    var institutionsTrigger    = document.getElementById('institutionsTrigger');
    var institutionsMenu       = document.getElementById('institutionsMenu');
    var institutionLinks       = document.querySelectorAll('.nav-dropdown-link');
    var institutionsItem       = institutionsTrigger ? institutionsTrigger.closest('.nav-item') : null;
    var mobileInstTrigger      = document.getElementById('mobileInstitutionsTrigger');
    var mobileInstitutions     = document.getElementById('mobileInstitutions');
    var mobileInstitutionLinks = document.querySelectorAll('.mobile-dropdown-menu a');

    if (btn && menu) {
        btn.addEventListener('click', function () {
            menu.classList.toggle('show');
            btn.setAttribute('aria-expanded', menu.classList.contains('show') ? 'true' : 'false');
        });
    }
    if (institutionsTrigger && institutionsMenu && institutionsItem) {
        institutionsTrigger.addEventListener('click', function (e) {
            e.preventDefault();
            var isOpen = institutionsItem.classList.toggle('open');
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
    if (mobileInstTrigger && mobileInstitutions) {
        mobileInstTrigger.addEventListener('click', function () {
            var isOpen = mobileInstitutions.classList.toggle('open');
            mobileInstTrigger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
        mobileInstitutionLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                mobileInstitutions.classList.remove('open');
                mobileInstTrigger.setAttribute('aria-expanded', 'false');
            });
        });
    }

})();
</script>