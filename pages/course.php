<?php
include_once '../includes/header.php';
?>

<style>
    :root {
        --srm-blue: #D32F2F;
        --srm-blue-dark: #1E293B;
        --srm-text: #1E293B;
        --srm-muted: #1E293B;
        --srm-bg: #F8FAFC;
        --srm-line: #F8FAFC;
        --srm-white: #F8FAFC;
        --srm-green: #D32F2F;
        --srm-green-dark: #D32F2F;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: var(--srm-text);
        background: var(--srm-bg);
    }

    .course-hero {
        background-image:
            /* linear-gradient(120deg, rgba(30,41,59,0.9), rgba(211,47,47,0.82)), */
            url('../assets/images/course-hero-bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding-top: 7rem;
        padding-bottom: 4rem;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .course-hero::before,
    .course-hero::after {
        content: '';
        position: absolute;
        border-radius: 999px;
        background: rgba(248,250,252,0.12);
        filter: blur(2px);
        animation: floatOrb 8s ease-in-out infinite;
    }

    .course-hero::before {
        width: 220px;
        height: 220px;
        top: -80px;
        right: -40px;
    }

    .course-hero::after {
        width: 160px;
        height: 160px;
        bottom: -70px;
        left: -30px;
        animation-delay: 1.2s;
    }

    @keyframes floatOrb {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-12px); }
    }

    .hero-content {
        max-width: 1280px;
        margin: 0 auto;
        text-align: center;
        color: #F8FAFC;
    }

    .hero-badge {
        text-transform: uppercase;
        letter-spacing: 0.2em;
        font-size: 0.75rem;
        font-weight: 600;
        color: #F8FAFC;
        margin-bottom: 1rem;
    }

    .hero-title {
        font-size: clamp(2rem, 5vw, 3.75rem);
        font-weight: 900;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .hero-subtitle {
        color: #F8FAFC;
        font-size: clamp(1rem, 2vw, 1.125rem);
        max-width: 48rem;
        margin: 0 auto;
        line-height: 1.6;
    }

    .hero-stats {
        margin-top: 2rem;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.875rem;
        max-width: 760px;
        margin-left: auto;
        margin-right: auto;
    }

    .hero-stat {
        background: rgba(248,250,252,0.12);
        border: 1px solid rgba(248,250,252,0.25);
        border-radius: 0.875rem;
        padding: 0.9rem;
        backdrop-filter: blur(6px);
    }

    .hero-stat-number {
        font-size: clamp(1.2rem, 3vw, 1.7rem);
        font-weight: 800;
        color: #F8FAFC;
        line-height: 1;
    }

    .hero-stat-label {
        margin-top: 0.35rem;
        font-size: 0.75rem;
        color: #F8FAFC;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        font-weight: 600;
    }

    .main-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 3rem 1.5rem;
    }

    .explorer-bar {
        background: #F8FAFC;
        border: 1px solid var(--srm-line);
        border-radius: 1rem;
        padding: 1rem;
        box-shadow: 0 10px 24px rgba(30,41,59,0.08);
        margin-bottom: 1.5rem;
        position: static;
    }

    .explorer-top {
        display: grid;
        grid-template-columns: 1.2fr auto;
        gap: 0.75rem;
        align-items: center;
    }

    .course-search {
        width: 100%;
        border: 1px solid #F8FAFC;
        border-radius: 0.75rem;
        padding: 0.75rem 0.9rem;
        font-size: 0.875rem;
        color: #1e293b;
        outline: none;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .course-search:focus {
        border-color: #D32F2F;
        box-shadow: 0 0 0 3px rgba(211,47,47,0.12);
    }

    .result-count {
        font-size: 0.8rem;
        color: #1E293B;
        font-weight: 600;
    }

    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.75rem;
    }

    .filter-btn {
        border: 1px solid #F8FAFC;
        color: #1E293B;
        background: #F8FAFC;
        font-size: 0.75rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        font-weight: 700;
        padding: 0.5rem 0.85rem;
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .filter-btn:hover {
        border-color: #D32F2F;
        color: #D32F2F;
    }

    .filter-btn.active {
        background: #D32F2F;
        border-color: #D32F2F;
        color: #F8FAFC;
    }

    .section-wrapper {
        background: transparent;
        border: 0;
        border-radius: 1.25rem;
        box-shadow: none;
        padding: 0;
        margin-bottom: 3rem;
    }

    .section-header {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .section-meta {
        text-transform: uppercase;
        letter-spacing: 0.2em;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .section-meta.green {
        color: var(--srm-green);
    }

    .section-meta.blue {
        color: var(--srm-blue);
    }

    .section-title {
        font-size: clamp(1.75rem, 4vw, 2.25rem);
        font-weight: 800;
        letter-spacing: -0.02em;
        color: var(--srm-text);
    }

    .affiliation-badge {
        display: inline-block;
        font-size: 0.8125rem;
        font-weight: 700;
        color: #D32F2F;
        background: #F8FAFC;
        padding: 0.5rem 1rem;
        border-radius: 999px;
        align-self: flex-start;
    }

    .course-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.25rem;
        margin-bottom: 2rem;
    }

    .course-card {
        background: #F8FAFC;
        border: 0;
        border-radius: 1.25rem;
        padding: 0;
        transition: all 0.25s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 14px 34px rgba(30,41,59,0.14);
    }

    .course-card.hide {
        display: none;
    }

    .course-card::before,
    .course-card::after {
        content: none;
    }

    .course-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 42px rgba(30,41,59,0.2);
    }

    .course-thumb {
        width: 100%;
        height: 210px;
        border-radius: 0;
        overflow: hidden;
        margin-bottom: 0;
        border: 0;
        background: #F8FAFC;
        position: relative;
    }

    .course-thumb::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 48%;
        background: linear-gradient(to top, rgba(30,41,59, 0.4), transparent);
        pointer-events: none;
    }

    .course-level-badge {
        position: absolute;
        top: 0.9rem;
        left: 0.9rem;
        z-index: 2;
        display: inline-flex;
        align-items: center;
        padding: 0.38rem 0.8rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.03em;
        background: #D32F2F;
        color: #F8FAFC;
        box-shadow: 0 6px 15px rgba(211,47,47,0.25);
    }

    .course-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.35s ease;
    }

    .course-card:hover .course-thumb img {
        transform: scale(1.05);
    }

    .course-card-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--srm-blue-dark);
        margin: 1rem 1rem 0.75rem;
        letter-spacing: -0.01em;
    }

    .course-list {
        list-style: none;
        padding: 0 0 0.85rem;
        margin: 0 1rem 0.85rem;
        border-bottom: 1px solid #F8FAFC;
    }

    .course-list li {
        position: relative;
        padding-left: 1rem;
        padding-top: 0.375rem;
        padding-bottom: 0.375rem;
        font-size: 0.875rem;
        color: #1E293B;
        line-height: 1.5;
        transition: color 0.2s ease;
    }

    .course-list li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.75rem;
        width: 0.35rem;
        height: 0.35rem;
        border-radius: 999px;
        background: #D32F2F;
    }

    .duration-pill {
        display: inline-flex;
        align-items: center;
        font-size: 0.8125rem;
        font-weight: 700;
        color: #D32F2F;
        background: #F8FAFC;
        padding: 0.5rem 0.875rem;
        border-radius: 999px;
        margin: 0 1rem 1.15rem;
        border: 1px solid #F8FAFC;
    }

    .highlights-section {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #F8FAFC;
    }

    .highlights-title {
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--srm-text);
    }

    .highlights-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 0.75rem;
    }

    .highlights-grid li {
        position: relative;
        padding-left: 1rem;
        font-size: 0.875rem;
        color: #1E293B;
    }

    .highlights-grid li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.5rem;
        width: 0.35rem;
        height: 0.35rem;
        border-radius: 999px;
        background: #D32F2F;
    }

    .faq-section {
        margin-top: 1rem;
    }

    .faq-item {
        border: 1px solid var(--srm-line);
        border-radius: 0.875rem;
        background: #F8FAFC;
        margin-bottom: 0.65rem;
        overflow: hidden;
    }

    .faq-question {
        width: 100%;
        background: transparent;
        border: 0;
        text-align: left;
        padding: 0.95rem 1rem;
        font-size: 0.95rem;
        font-weight: 700;
        color: #1E293B;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.25s ease;
        padding: 0 1rem;
        color: #1E293B;
        font-size: 0.875rem;
        line-height: 1.6;
    }

    .faq-item.open .faq-answer {
        max-height: 140px;
        padding-bottom: 0.95rem;
    }

    .faq-toggle {
        transition: transform 0.2s ease;
    }

    .faq-item.open .faq-toggle {
        transform: rotate(180deg);
    }

    .reveal {
        opacity: 0;
        transform: translateY(18px);
        transition: opacity 0.45s ease, transform 0.45s ease;
    }

    .reveal.show {
        opacity: 1;
        transform: translateY(0);
    }

    .course-card.reveal.show {
        animation: cardPop 0.45s ease both;
    }

    @keyframes cardPop {
        from {
            opacity: 0;
            transform: translateY(14px) scale(0.98);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .course-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .course-hero {
            padding-top: 5rem;
            padding-bottom: 3rem;
        }

        .hero-badge {
            font-size: 0.625rem;
        }

        .hero-stats {
            grid-template-columns: 1fr;
            max-width: 340px;
        }

        .main-container {
            padding: 2rem 1rem;
        }

        .explorer-top {
            grid-template-columns: 1fr;
        }

        .section-wrapper {
            padding: 0;
            margin-bottom: 2rem;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .affiliation-badge {
            align-self: flex-start;
        }

        .course-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .course-card {
            padding: 0;
        }

        .course-card-title {
            font-size: 1.25rem;
        }

        .course-thumb {
            height: 185px;
        }

        .highlights-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .section-wrapper {
            padding: 0;
        }

        .course-card {
            padding: 0;
        }

        .course-thumb {
            height: 160px;
        }

        .highlights-section {
            padding-top: 1rem;
        }

        .faq-question {
            font-size: 0.875rem;
        }
    }

    @media (min-width: 768px) {
        .section-header {
            flex-direction: row;
            align-items: flex-end;
            justify-content: space-between;
        }

        .section-header-left {
            flex: 1;
        }
    }
</style>

<section class="course-hero">
    <div class="hero-content">
        <p class="hero-badge">SRM Courses</p>
        <h1 class="hero-title">Paramedical & Computer Center Programs</h1>
        <p class="hero-subtitle">
            Explore our complete list of career-focused courses with duration details for both day and fast-track batches.
        </p>
        <div class="hero-stats">
            <div class="hero-stat">
                <div class="hero-stat-number" data-count="18">0</div>
                <div class="hero-stat-label">Specialized Courses</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-number" data-count="95">0</div>
                <div class="hero-stat-label">Placement Assistance %</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-number" data-count="2">0</div>
                <div class="hero-stat-label">Learning Modes</div>
            </div>
        </div>
    </div>
</section>

<main class="main-container">
    <section class="explorer-bar">
        <div class="explorer-top">
            <input type="text" id="courseSearch" class="course-search" placeholder="Search courses, modules, or skills...">
            <div class="result-count">Showing <span id="resultCount">18</span> courses</div>
        </div>
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">All Courses</button>
            <button class="filter-btn" data-filter="paramedical">Paramedical</button>
            <button class="filter-btn" data-filter="computer">Computer Center</button>
        </div>
    </section>

    <!-- Paramedical Courses Section -->
    <section class="section-wrapper course-section reveal" data-category="paramedical">
        <div class="section-header">
            <div class="section-header-left">
                <p class="section-meta green">Institute of Allied Health Science</p>
                <h2 class="section-title">Complete Paramedical Courses</h2>
            </div>
            <span class="affiliation-badge">Affiliated with SSDVCA</span>
        </div>

        <div class="course-grid">
            <article class="course-card reveal">
                <h3 class="course-card-title">General Duty Assistant</h3>
                <ul class="course-list">
                    <li>Patient Care Fundamentals</li>
                    <li>Basic Medical Procedures</li>
                    <li>Hospital Ward Management</li>
                    <li>Emergency Response Training</li>
                    <li>Clinical Practice Sessions</li>
                </ul>
                <span class="duration-pill">Duration: 2 Years</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">Medical Laboratory Technology</h3>
                <ul class="course-list">
                    <li>Clinical Pathology & Diagnostics</li>
                    <li>Microbiology & Serology</li>
                    <li>Biochemistry Analysis</li>
                    <li>Hematology & Blood Banking</li>
                    <li>Advanced Lab Equipment</li>
                </ul>
                <span class="duration-pill">Duration: 2 Years</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">Operation Theatre Technology</h3>
                <ul class="course-list">
                    <li>Surgical Instruments Handling</li>
                    <li>OT Setup & Sterilization</li>
                    <li>Anesthesia Assistance</li>
                    <li>Surgical Procedures Support</li>
                    <li>Emergency OT Management</li>
                </ul>
                <span class="duration-pill">Duration: 2 Years</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">Accident & Emergency Technology</h3>
                <ul class="course-list">
                    <li>Trauma Care & Management</li>
                    <li>First Aid & CPR Certification</li>
                    <li>Emergency Medical Services</li>
                    <li>Disaster Management</li>
                    <li>Advanced Life Support</li>
                </ul>
                <span class="duration-pill">Duration: 2 Years</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">X-Ray Technology</h3>
                <ul class="course-list">
                    <li>Radiographic Imaging Techniques</li>
                    <li>Digital X-Ray Systems</li>
                    <li>Radiation Safety Protocols</li>
                    <li>Diagnostic Image Processing</li>
                    <li>Patient Positioning Methods</li>
                </ul>
                <span class="duration-pill">Duration: 2 Years</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">CT Scan Technician</h3>
                <ul class="course-list">
                    <li>CT Scanner Operation</li>
                    <li>Cross-Sectional Imaging</li>
                    <li>3D Image Reconstruction</li>
                    <li>Contrast Media Administration</li>
                    <li>Advanced Imaging Protocols</li>
                </ul>
                <span class="duration-pill">Duration: 1 Year</span>
            </article>
        </div>

        <div class="highlights-section">
            <h4 class="highlights-title">Program Highlights</h4>
            <ul class="highlights-grid">
                <li>100% Project Based Training</li>
                <li>Well Qualified Faculties</li>
                <li>Complete Placement Assistance</li>
                <li>State-of-the-Art Lab</li>
            </ul>
        </div>
    </section>

    <!-- Computer Courses Section -->
    <section class="section-wrapper course-section reveal" data-category="computer">
        <div class="section-header">
            <div class="section-header-left">
                <p class="section-meta blue">SRM Computer Center</p>
                <h2 class="section-title">Courses Offered</h2>
            </div>
        </div>

        <div class="course-grid">
            <article class="course-card reveal">
                <h3 class="course-card-title">DCA</h3>
                <ul class="course-list">
                    <li>Windows 2000</li>
                    <li>Intro. to Computer</li>
                    <li>MS-Office</li>
                    <li>Internet</li>
                    <li>HTML</li>
                    <li>C & C++</li>
                </ul>
                <span class="duration-pill">NT 4 Months | FT 2 Months</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">DOM</h3>
                <ul class="course-list">
                    <li>Windows XP</li>
                    <li>MS-Office</li>
                    <li>Internet</li>
                    <li>HTML</li>
                    <li>Tally Prime</li>
                </ul>
                <span class="duration-pill">NT 4 Months | FT 2 Months</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">PGDCA</h3>
                <ul class="course-list">
                    <li>MS-Office</li>
                    <li>C & C++</li>
                    <li>Java</li>
                    <li>Python</li>
                    <li>DTP</li>
                    <li>Hardware & Networking</li>
                </ul>
                <span class="duration-pill">NT 12 Months | FT 6 Months</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">Hardware & Networking</h3>
                <ul class="course-list">
                    <li>Intro. to Windows XP</li>
                    <li>DOS</li>
                    <li>Networking</li>
                    <li>Assembling & Trouble Shooting</li>
                    <li>Keyboard & User Management</li>
                    <li>LAN Troubleshooting</li>
                    <li>Windows Server 2003</li>
                    <li>Backup & Restore</li>
                </ul>
                <span class="duration-pill">NT 12 Weeks | FT 6 Weeks</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">DCA + Java</h3>
                <ul class="course-list">
                    <li>Windows 2000</li>
                    <li>Intro. to Computer</li>
                    <li>MS-Office</li>
                    <li>Internet</li>
                    <li>HTML</li>
                    <li>C & C++</li>
                    <li>Core Java</li>
                </ul>
                <span class="duration-pill">NT 6 Months | FT 3 Months</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">DCA Basic</h3>
                <ul class="course-list">
                    <li>Intro. to Computer</li>
                    <li>MS-Office 2007</li>
                    <li>MS-Word</li>
                    <li>MS-Excel</li>
                    <li>MS-PowerPoint</li>
                    <li>HTML</li>
                    <li>Internet</li>
                </ul>
                <span class="duration-pill">NT 2 Months | FT 1 Month</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">Tally Prime</h3>
                <ul class="course-list">
                    <li>GST - Goods & Service Tax</li>
                    <li>TDS - Tax Deducted at Source</li>
                    <li>CST - Central Sales Tax</li>
                    <li>FBT - Fringe Benefit Tax</li>
                    <li>TCS - Tax Collected at Source</li>
                </ul>
                <span class="duration-pill">NT 2 Months | FT 1 Month</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">HDCA</h3>
                <ul class="course-list">
                    <li>Basic Computer</li>
                    <li>DTP</li>
                    <li>Corel Draw</li>
                    <li>Photoshop CS</li>
                    <li>Hardware & Networking</li>
                </ul>
                <span class="duration-pill">NT 9 Months | FT 4 Months</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">ADCA</h3>
                <ul class="course-list">
                    <li>MS-Office (MS-Word, MS-Excel, MS-PowerPoint)</li>
                    <li>C & C++</li>
                    <li>Core Java</li>
                    <li>Python</li>
                </ul>
                <span class="duration-pill">NT 8 Months | FT 4 Months</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">DTP Designer</h3>
                <ul class="course-list">
                    <li>Intro. to Computer</li>
                    <li>Corel Draw</li>
                    <li>Photoshop CS</li>
                </ul>
                <span class="duration-pill">NT 12 Weeks | FT 6 Weeks</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">Spoken English</h3>
                <ul class="course-list">
                    <li>Level I (Basic - Kids)</li>
                    <li>Level II</li>
                    <li>Level III</li>
                </ul>
                <span class="duration-pill">NT 12 Weeks | FT 6 Weeks</span>
            </article>

            <article class="course-card reveal">
                <h3 class="course-card-title">Smart Kids</h3>
                <ul class="course-list">
                    <li>Basic Computer</li>
                    <li>Windows</li>
                    <li>Typing</li>
                    <li>Basic Animation</li>
                </ul>
                <span class="duration-pill">Duration: 1 Month</span>
            </article>
        </div>
    </section>

    <section class="section-wrapper faq-section reveal">
        <div class="section-header">
            <div class="section-header-left">
                <p class="section-meta blue">Need Help Choosing?</p>
                <h2 class="section-title">Frequently Asked Questions</h2>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Which course is best after 10th or 12th?
                <i class="fas fa-chevron-down faq-toggle"></i>
            </button>
            <div class="faq-answer">
                After 10th, short career-entry tracks like Nursing Assistant, DCA Basic, and Smart Kids foundations are suitable. After 12th, students can opt for advanced tracks like DMLT, OT Technology, PGDCA, or Hardware & Networking.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Do you provide placement support?
                <i class="fas fa-chevron-down faq-toggle"></i>
            </button>
            <div class="faq-answer">
                Yes. SRM provides structured placement assistance, interview preparation, communication support, and employer referrals based on your completed track and performance.
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Can I choose fast-track mode?
                <i class="fas fa-chevron-down faq-toggle"></i>
            </button>
            <div class="faq-answer">
                Most computer programs provide both NT (normal time) and FT (fast track) options. Our counselors will help you choose based on availability and your weekly schedule.
            </div>
        </div>
    </section>

</main>

<script>
    // Animated counters in hero stats
    const counters = document.querySelectorAll('[data-count]');
    counters.forEach((counter) => {
        const target = Number(counter.getAttribute('data-count')) || 0;
        const duration = 1000;
        const start = performance.now();
        const step = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            counter.textContent = Math.floor(progress * target);
            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                counter.textContent = target;
            }
        };
        requestAnimationFrame(step);
    });

    // Course filter + search
    const searchInput = document.getElementById('courseSearch');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const sections = document.querySelectorAll('.course-section');
    const cards = document.querySelectorAll('.course-section .course-card');
    const resultCount = document.getElementById('resultCount');
    let activeFilter = 'all';

    // Add small course thumbnail on top of each card
    function getCourseImage(card, title, category) {
        const t = title.toLowerCase();
        const map = [
            { key: 'laboratory', img: 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=80' },
            { key: 'x-ray', img: 'https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&w=800&q=80' },
            { key: 'ct scan', img: 'https://images.unsplash.com/photo-1519494080410-f9aa8f52f12c?auto=format&fit=crop&w=800&q=80' },
            { key: 'operation theatre', img: 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=800&q=80' },
            { key: 'accident', img: 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&fit=crop&w=800&q=80' },
            { key: 'nursing', img: 'https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=800&q=80' },
            { key: 'network', img: 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=800&q=80' },
            { key: 'java', img: 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80' },
            { key: 'python', img: 'https://images.unsplash.com/photo-1526379095098-d400fd0bf935?auto=format&fit=crop&w=800&q=80' },
            { key: 'tally', img: 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=800&q=80' },
            { key: 'spoken english', img: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80' },
            { key: 'kids', img: 'https://images.unsplash.com/photo-1503676382389-4809596d5290?auto=format&fit=crop&w=800&q=80' }
        ];

        const matched = map.find((item) => t.includes(item.key));
        if (matched) return matched.img;

        return category === 'paramedical'
            ? 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80'
            : 'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&w=800&q=80';
    }

    cards.forEach((card) => {
        if (card.querySelector('.course-thumb')) return;
        const titleEl = card.querySelector('.course-card-title');
        if (!titleEl) return;
        const section = card.closest('.course-section');
        const category = section ? section.getAttribute('data-category') : 'computer';
        const imgUrl = getCourseImage(card, titleEl.textContent.trim(), category);

        const thumb = document.createElement('div');
        thumb.className = 'course-thumb';
        thumb.innerHTML = `<span class="course-level-badge">Diploma</span><img src="${imgUrl}" alt="${titleEl.textContent.trim()} course image" loading="lazy">`;
        card.insertBefore(thumb, card.firstChild);
    });

    function applyCourseFilters() {
        const query = (searchInput.value || '').trim().toLowerCase();
        let visibleCards = 0;

        sections.forEach((section) => {
            const category = section.getAttribute('data-category');
            const sectionCards = section.querySelectorAll('.course-card');
            let sectionVisible = 0;
            const categoryMatch = activeFilter === 'all' || activeFilter === category;

            sectionCards.forEach((card) => {
                const text = card.textContent.toLowerCase();
                const queryMatch = query === '' || text.includes(query);
                const show = categoryMatch && queryMatch;
                card.classList.toggle('hide', !show);
                if (show) {
                    sectionVisible += 1;
                    visibleCards += 1;
                }
            });

            section.style.display = sectionVisible > 0 ? '' : 'none';
        });

        resultCount.textContent = visibleCards;
    }

    filterButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            filterButtons.forEach((b) => b.classList.remove('active'));
            btn.classList.add('active');
            activeFilter = btn.getAttribute('data-filter');
            applyCourseFilters();
        });
    });

    searchInput.addEventListener('input', applyCourseFilters);
    resultCount.textContent = cards.length;

    // FAQ accordion
    document.querySelectorAll('.faq-question').forEach((btn) => {
        btn.addEventListener('click', () => {
            const parent = btn.closest('.faq-item');
            parent.classList.toggle('open');
        });
    });

    // Scroll reveal animation
    const revealItems = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    revealItems.forEach((item) => revealObserver.observe(item));
</script>

<?php
include_once '../includes/footer.php';
?>


