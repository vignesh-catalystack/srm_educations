<?php include '../../includes/header.php'; ?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Nunito:wght@400;500;600;700;800&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&display=swap');

  * { box-sizing: border-box; }

  :root {
    --font-head: 'Rajdhani', sans-serif;
    --font-body: 'Nunito', sans-serif;
    --red:      #0b1f4d;
    --red2:     #071433;
    --red-rgb:  11,31,77;
    --sky:      #1a7fc1;
    --gold:     #f6cb42;
    --d:        620ms;
    --e:        cubic-bezier(0.19, 1, 0.22, 1);
  }

  /* ================================================================
     HERO
  ================================================================ */
  .cc-hero-wrap {
    background: #ffffff;
    padding: 0;
  }
  .cc-hero {
    width: 100%;
    max-width: none;
    min-height: calc(100vh - 74px);
    background: linear-gradient(240deg, #f5f8ff 0%, #ede4f8 30%, #e8c0f5 55%, #f0e6fa 75%, #eef3ff 100%);
    border-radius: 0;
    display: flex;
    flex-direction: row-reverse;
    align-items: stretch;
    justify-content: space-between;
    gap: clamp(24px, 4vw, 72px);
    padding: clamp(56px, 8vh, 92px) 7vw clamp(34px, 5vh, 62px);
    position: relative;
    overflow: hidden;
    margin: 0;
  }
  .cc-hero::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 52%;
    height: 100%;
    background-image:
      linear-gradient(rgba(120, 90, 200, 0.08) 1px, transparent 1px),
      linear-gradient(90deg, rgba(120, 90, 200, 0.08) 1px, transparent 1px);
    background-size: 38px 38px;
    pointer-events: none;
  }
  .cc-hero-content {
    max-width: 540px;
    z-index: 2;
    position: relative;
    font-family: 'Manrope', sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .cc-eyebrow {
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2.5px;
    color: var(--red);
    text-transform: uppercase;
    margin: 0 0 18px;
  }
  .cc-hero-title {
    font-size: clamp(52px, 5.2vw, 78px);
    font-weight: 900;
    color: #0a0a18;
    line-height: 0.96;
    margin: 0 0 18px;
    letter-spacing: -0.9px;
    font-family: 'Manrope', sans-serif;
  }
  .cc-subtitle {
    font-size: 17px;
    color: #4a4a5a;
    line-height: 1.45;
    margin: 0 0 28px;
    max-width: 500px;
    font-weight: 500;
    font-family: 'Manrope', sans-serif;
  }
  .cc-cta-group {
    display: flex;
    gap: 16px;
    align-items: center;
    flex-wrap: wrap;
  }
  .cc-btn {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 15px 26px;
    border-radius: 50px;
    font-size: 15px;
    font-weight: 800;
    cursor: pointer;
    text-decoration: none;
    border: 0;
    transition: transform 0.22s ease, box-shadow 0.22s ease;
    font-family: 'Manrope', sans-serif;
    letter-spacing: 0.2px;
    white-space: nowrap;
    background: linear-gradient(135deg, var(--red) 0%, var(--red2) 100%);
    color: #fff;
  }
  .cc-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(var(--red-rgb), 0.35);
  }
  .cc-btn-icon {
    width: 16px;
    height: 16px;
    flex-shrink: 0;
  }
  .cc-arrow-deco {
    position: absolute;
    top: clamp(44px, 6vh, 74px);
    left: 47%;
    z-index: 3;
  }
  .cc-person-wrap {
    position: relative;
    z-index: 4;
    flex-shrink: 0;
    margin-left: 0;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    animation: floatPerson 4s ease-in-out infinite;
    filter: drop-shadow(0 24px 44px rgba(80, 40, 160, 0.18));
  }
  .cc-person-wrap img {
    width: clamp(430px, 42vw, 740px);
    height: auto;
    display: block;
    border-radius: 16px;
    object-fit: cover;
    max-height: none;
  }
  @keyframes floatPerson {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(-20px); }
  }

  /* ================================================================
     COURSES SECTION — animated hover-reveal cards
  ================================================================ */
  .cc-courses-section {
    background: #f0f4fb;
    padding: 84px 5%;
  }
  .cc-courses-wrap {
    max-width: 1280px;
    margin: 0 auto;
  }

  /* Header */
  .cc-courses-header {
    text-align: center;
    margin-bottom: 52px;
  }
  .cc-courses-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border-radius: 999px;
    background: #dce8ff;
    color: var(--red);
    border: 1px solid #b8cef5;
    padding: 8px 16px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin-bottom: 14px;
    font-family: var(--font-body);
  }
  .cc-courses-title {
    font-size: clamp(34px, 4.8vw, 58px);
    font-weight: 900;
    color: #0a1428;
    line-height: 0.97;
    letter-spacing: -1px;
    font-family: 'Manrope', sans-serif;
  }
  .cc-courses-sub {
    margin-top: 14px;
    font-size: 16px;
    color: #5a6a88;
    max-width: 780px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.7;
    font-family: var(--font-body);
  }

  /* Grid */
  .cc-card-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
  }
  @media (max-width: 1200px) { .cc-card-grid { grid-template-columns: repeat(3, 1fr); } }
  @media (max-width: 860px)  { .cc-card-grid { grid-template-columns: repeat(2, 1fr); } }
  @media (max-width: 540px)  { .cc-card-grid { grid-template-columns: 1fr; } }

  /* Card base */
  .cc-card {
    position: relative;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
    height: 380px;
    border-radius: 5px;
    color: #fff;
    text-align: left;
    
    
    cursor: pointer;
    outline: none;
    opacity: 0;
    transform: translateY(28px) scale(0.97);
    animation: ccCardIn var(--d) var(--e) both;
  }

  /* Background image layer */
  .cc-card::before {
    content: '';
    position: absolute;
    inset: 0;
    width: 100%;
    height: 110%;
    background-size: cover;
    background-position: center top;
    transition: transform calc(var(--d) * 1.5) var(--e);
    will-change: transform;
  }

  /* Gradient overlay */
  .cc-card::after {
    content: '';
    position: absolute;
    inset: 0;
    width: 100%;
    height: 200%;
    background-image: linear-gradient(
      to bottom,
      hsla(220,55%,8%,0)    0%,
      hsla(220,55%,8%,.01)  11%,
      hsla(220,55%,8%,.04)  22%,
      hsla(220,55%,8%,.09)  31%,
      hsla(220,55%,8%,.16)  39%,
      hsla(220,55%,8%,.26)  47%,
      hsla(220,55%,8%,.38)  54%,
      hsla(220,55%,8%,.52)  61%,
      hsla(220,55%,8%,.65)  68%,
      hsla(220,55%,8%,.76)  74%,
      hsla(220,55%,8%,.84)  80%,
      hsla(220,55%,8%,.90)  86%,
      hsla(220,55%,8%,.94)  91%,
      hsla(220,55%,8%,.97)  96%,
      hsla(220,55%,8%,.99) 100%
    );
    transform: translateY(-50%);
    transition: transform calc(var(--d) * 2) var(--e);
    pointer-events: none;
  }

  /* Tag badge */
  .cc-card-tag {
    position: absolute;
    z-index: 3;
    top: 16px;
    left: 16px;
    padding: 6px 12px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    background: var(--gold);
    color: #2a1f00;
    box-shadow: 0 4px 12px rgba(0,0,0,.2);
  }

  /* Card content block */
  .cc-card-content {
    position: relative;
    z-index: 2;
    width: 100%;
    padding: 22px 22px 24px;
    display: flex;
    flex-direction: column;
    gap: 0;
    transform: translateY(calc(100% - 72px));
    transition: transform var(--d) var(--e);
    will-change: transform;
  }
  .cc-card-title {
    font-size: clamp(20px, 1.6vw, 24px);
    font-weight: 900;
    line-height: 1.1;
    letter-spacing: -0.3px;
    color: #fff;
    text-shadow: 0 2px 8px rgba(0,0,0,.5);
    margin-bottom: 14px;
    font-family: 'Manrope', sans-serif;
  }

  /* Subjects — plain text list */
  .cc-card-chips {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-bottom: 18px;
    padding-left: 2px;
    list-style: none;
    opacity: 0;
    transform: translateY(14px);
    transition: opacity var(--d) var(--e), transform var(--d) var(--e);
  }
  .cc-chip {
    font-size: 12px;
    font-weight: 500;
    color: rgba(255,255,255,0.82);
    letter-spacing: 0.01em;
    line-height: 1.5;
    padding-left: 14px;
    position: relative;
    font-family: 'Manrope', sans-serif;
  }
  .cc-chip::before {
    content: '–';
    position: absolute;
    left: 0;
    color: rgba(255,255,255,0.4);
  }

  /* Duration — plain text */
  .cc-card-duration {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding-top: 10px;
    border-top: 1px solid rgba(255,255,255,0.15);
    opacity: 0;
    transform: translateY(14px);
    transition: opacity var(--d) var(--e), transform var(--d) var(--e);
    transition-delay: calc(var(--d) / 10);
  }
  .cc-dur-pill {
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: rgba(255,255,255,0.65);
    background: none;
    border: none;
    padding: 0;
    font-family: 'Manrope', sans-serif;
  }
  .cc-dur-pill.alt {
    color: #7ec8f5;
    background: none;
  }

  /* Hover / focus-within interactions */
  @media (hover: hover) {
    .cc-card:hover::before,
    .cc-card:focus-within::before { transform: translateY(-5%); }

    .cc-card:hover::after,
    .cc-card:focus-within::after  { transform: translateY(-50%); }

    .cc-card:hover .cc-card-content,
    .cc-card:focus-within .cc-card-content { transform: translateY(0); }

    .cc-card:hover .cc-card-chips,
    .cc-card:focus-within .cc-card-chips,
    .cc-card:hover .cc-card-duration,
    .cc-card:focus-within .cc-card-duration {
      opacity: 1;
      transform: translateY(0);
      transition-delay: calc(var(--d) / 8);
    }
  }

  /* Touch devices: always show content */
  @media (hover: none) {
    .cc-card-content  { transform: none; }
    .cc-card-chips,
    .cc-card-duration { opacity: 1; transform: none; }
    .cc-card::after   { transform: translateY(-50%); }
  }

  /* Staggered load animation */
  @keyframes ccCardIn {
    to { opacity: 1; transform: translateY(0) scale(1); }
  }
  .cc-card:nth-child(1)  { animation-delay: 0.04s; }
  .cc-card:nth-child(2)  { animation-delay: 0.08s; }
  .cc-card:nth-child(3)  { animation-delay: 0.12s; }
  .cc-card:nth-child(4)  { animation-delay: 0.16s; }
  .cc-card:nth-child(5)  { animation-delay: 0.20s; }
  .cc-card:nth-child(6)  { animation-delay: 0.24s; }
  .cc-card:nth-child(7)  { animation-delay: 0.28s; }
  .cc-card:nth-child(8)  { animation-delay: 0.32s; }
  .cc-card:nth-child(9)  { animation-delay: 0.36s; }
  .cc-card:nth-child(10) { animation-delay: 0.40s; }
  .cc-card:nth-child(11) { animation-delay: 0.44s; }
  .cc-card:nth-child(12) { animation-delay: 0.48s; }

  /* Background images per card */
  .cc-card[data-course="dca"]::before       { background-image: url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="dom"]::before       { background-image: url('https://images.unsplash.com/photo-1526378722484-bd91ca387e72?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="pgdca"]::before     { background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="hw"]::before        { background-image: url('https://images.unsplash.com/photo-1517430816045-df4b7de11d1d?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="dca-java"]::before  { background-image: url('https://images.unsplash.com/photo-1605379399642-870262d3d051?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="dca-basic"]::before { background-image: url('https://images.unsplash.com/photo-1517842645767-c639042777db?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="tally"]::before     { background-image: url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="hdca"]::before      { background-image: url('https://images.unsplash.com/photo-1526379095098-d400fd0bf935?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="adca"]::before      { background-image: url('https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="dtp"]::before       { background-image: url('https://images.unsplash.com/photo-1561736778-92e52a7769ef?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="english"]::before   { background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80'); }
  .cc-card[data-course="kids"]::before      { background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800&q=80'); }

  /* ================================================================
     ENROLL PROCESS SECTION
  ================================================================ */
  .enroll-process-section {
    background: #eef2f7;
    padding: 76px 5% 88px;
  }
  .enroll-process-wrap {
    max-width: 1120px;
    margin: 0 auto;
    text-align: center;
  }
  .enroll-process-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border-radius: 999px;
    background: #eaf2ff;
    color: var(--red);
    padding: 8px 16px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    font-family: var(--font-body);
  }
  .enroll-process-title {
    margin: 18px 0 50px;
    font-family: var(--font-head);
    font-size: clamp(30px, 5vw, 52px);
    line-height: 0.95;
    color: #0e1d42;
  }
  .enroll-steps {
    position: relative;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 24px;
    align-items: start;
  }
  .enroll-steps::before {
    content: "";
    position: absolute;
    left: 16.66%;
    right: 16.66%;
    top: 34px;
    height: 3px;
    background: var(--red);
    border-radius: 999px;
    z-index: 0;
  }
  .enroll-step {
    position: relative;
    z-index: 1;
    text-align: center;
    padding: 0 14px;
  }
  .enroll-step-num {
    width: 68px;
    height: 68px;
    border-radius: 999px;
    margin: 0 auto 18px;
    background: linear-gradient(145deg, var(--red), var(--red2));
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-body);
    font-size: 35px;
    font-weight: 800;
    box-shadow: 0 10px 22px rgba(var(--red-rgb), 0.32);
  }
  .enroll-step h3 {
    margin: 0 0 10px;
    font-family: var(--font-body);
    font-size: 20px;
    line-height: 1;
    font-weight: 800;
    color: #0e1d42;
    text-transform: uppercase;
    letter-spacing: 0.02em;
  }
  .enroll-step p {
    margin: 0;
    color: #4c5b77;
    font-size: 15px;
    line-height: 1.45;
    font-family: var(--font-body);
  }

  /* ================================================================
     RESPONSIVE
  ================================================================ */
  @media (max-width: 820px) {
    .cc-hero {
      flex-direction: column;
      gap: 8px;
      padding: 42px 20px 26px;
      text-align: center;
      align-items: center;
      min-height: calc(100vh - 74px);
    }
    .cc-hero-title   { font-size: clamp(36px, 10.5vw, 56px); }
    .cc-subtitle     { font-size: 18px; max-width: 100%; line-height: 1.4; margin: 0 0 20px; }
    .cc-cta-group    { justify-content: center; }
    .cc-arrow-deco   { display: none; }
    .cc-person-wrap  { margin: 24px auto 0; }
    .cc-person-wrap img { width: min(92vw, 460px); }
    .cc-hero::after  { width: 100%; left: 0; }
  }
  @media (max-width: 760px) {
    .cc-courses-section { padding: 68px 5%; }
  }
  @media (max-width: 900px) {
    .enroll-steps {
      grid-template-columns: 1fr;
      gap: 28px;
      max-width: 560px;
      margin: 0 auto;
    }
    .enroll-steps::before { display: none; }
    .enroll-process-title { margin-bottom: 36px; }
    .enroll-step h3 { font-size: 18px; }
    .enroll-step p  { font-size: 14px; }
  }
</style>


<!-- ================================================================
     HERO
================================================================ -->
<section class="cc-hero-wrap">
  <div class="cc-hero">

    <div class="cc-arrow-deco" aria-hidden="true">
      <svg width="72" height="58" viewBox="0 0 72 58" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8 50 C 14 28, 32 6, 57 18" stroke="#1a1a2e" stroke-width="2.4" stroke-linecap="round" fill="none"/>
        <path d="M49 11 L61 20 L51 29" stroke="#1a1a2e" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </div>

    <div class="cc-hero-content">
      <p class="cc-eyebrow">Learn The Skills</p>
      <h1 class="cc-hero-title">Develop Skills<br>That Push Your Career<br>Path Forward</h1>
      <p class="cc-subtitle">Technology and the world of work change fast - with us, you're faster. Get the skills to achieve goals and stay competitive.</p>

      <div class="cc-cta-group">
        <a href="#perfect-courses" class="cc-btn">
          <svg class="cc-btn-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/>
          </svg>
          View Courses
        </a>
        <a href="../contact.php" class="cc-btn">
          <svg class="cc-btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="3" y="4" width="18" height="17" rx="2"/>
            <line x1="8" y1="2" x2="8" y2="6"/>
            <line x1="16" y1="2" x2="16" y2="6"/>
            <line x1="3" y1="10" x2="21" y2="10"/>
          </svg>
          Book Free Demo
        </a>
      </div>
    </div>

    <div class="cc-person-wrap">
      <img src="../../assets/images/srm-cc-hero-img.png" alt="Professional holding laptop">
    </div>

  </div>
</section>


<!-- ================================================================
     COURSES — hover-reveal cards
================================================================ -->
<section id="perfect-courses" class="cc-courses-section">
  <div class="cc-courses-wrap">

    <div class="cc-courses-header">
      <div class="cc-courses-badge">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zm-7 9.45V15l7 3.83 7-3.83v-2.55L12 16l-7-3.55z"/></svg>
        Courses Offered
      </div>
      <h2 class="cc-courses-title">Find Your Perfect Course</h2>
      <p class="cc-courses-sub">Explore our most demanded computer and language programs. Hover any card to reveal subjects and duration — then choose the path that fits your goals.</p>
    </div>

    <div class="cc-card-grid">

      <!-- 1 · DCA -->
      <article class="cc-card" data-course="dca" tabindex="0">
        <span class="cc-card-tag">★ Most Popular</span>
        <div class="cc-card-content">
          <h3 class="cc-card-title">DCA</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Windows 2000</li>
            <li class="cc-chip">Intro. to Computer</li>
            <li class="cc-chip">Ms-Office</li>
            <li class="cc-chip">Internet</li>
            <li class="cc-chip">HTML</li>
            <li class="cc-chip">C &amp; C++</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 4 Months</span>
            <span class="cc-dur-pill alt">FT · 2 Months</span>
          </div>
        </div>
      </article>

      <!-- 2 · DOM -->
      <article class="cc-card" data-course="dom" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">DOM</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Windows XP</li>
            <li class="cc-chip">Ms-Office</li>
            <li class="cc-chip">Internet</li>
            <li class="cc-chip">HTML</li>
            <li class="cc-chip">Tally Prime</li>
            <li class="cc-chip">GST</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 4 Months</span>
            <span class="cc-dur-pill alt">FT · 2 Months</span>
          </div>
        </div>
      </article>

      <!-- 3 · PGDCA -->
      <article class="cc-card" data-course="pgdca" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">PGDCA</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Ms-Office</li>
            <li class="cc-chip">C &amp; C++</li>
            <li class="cc-chip">Java</li>
            <li class="cc-chip">Python</li>
            <li class="cc-chip">DTP</li>
            <li class="cc-chip">Hardware &amp; Networking</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 12 Months</span>
            <span class="cc-dur-pill alt">FT · 6 Months</span>
          </div>
        </div>
      </article>

      <!-- 4 · Hardware & Networking -->
      <article class="cc-card" data-course="hw" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">Hardware &amp; Networking</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Intro. to Windows XP</li>
            <li class="cc-chip">DOS</li>
            <li class="cc-chip">Networking</li>
            <li class="cc-chip">Assembling</li>
            <li class="cc-chip">Trouble Shooting</li>
            <li class="cc-chip">Keyboard</li>
            <li class="cc-chip">User Management</li>
            <li class="cc-chip">LAN Troubleshooting</li>
            <li class="cc-chip">Windows Server 2003</li>
            <li class="cc-chip">Backup &amp; Restore</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 12 Weeks</span>
            <span class="cc-dur-pill alt">FT · 6 Weeks</span>
          </div>
        </div>
      </article>

      <!-- 5 · DCA + Java -->
      <article class="cc-card" data-course="dca-java" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">DCA + Java</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Windows 2000</li>
            <li class="cc-chip">Intro. to Computer</li>
            <li class="cc-chip">Ms-Office</li>
            <li class="cc-chip">Internet</li>
            <li class="cc-chip">HTML</li>
            <li class="cc-chip">C &amp; C++</li>
            <li class="cc-chip">Core Java</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 6 Months</span>
            <span class="cc-dur-pill alt">FT · 3 Months</span>
          </div>
        </div>
      </article>

      <!-- 6 · DCA Basic -->
      <article class="cc-card" data-course="dca-basic" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">DCA Basic</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Intro. to Computer</li>
            <li class="cc-chip">Ms-Office 2007</li>
            <li class="cc-chip">MS-Word</li>
            <li class="cc-chip">MS-Excel</li>
            <li class="cc-chip">MS-PowerPoint</li>
            <li class="cc-chip">HTML</li>
            <li class="cc-chip">Internet</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 2 Months</span>
            <span class="cc-dur-pill alt">FT · 1 Month</span>
          </div>
        </div>
      </article>

      <!-- 7 · Tally Prime + GST -->
      <article class="cc-card" data-course="tally" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">Tally Prime + GST</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">GST – Goods &amp; Service Tax</li>
            <li class="cc-chip">TDS – Tax Deducted at Source</li>
            <li class="cc-chip">CST – Central Sales Tax</li>
            <li class="cc-chip">FBT – Fringe Benefit Tax</li>
            <li class="cc-chip">TCS – Tax Collected at Source</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 2 Months</span>
            <span class="cc-dur-pill alt">FT · 1 Month</span>
          </div>
        </div>
      </article>

      <!-- 8 · HDCA -->
      <article class="cc-card" data-course="hdca" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">HDCA</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Basic Computer</li>
            <li class="cc-chip">DTP</li>
            <li class="cc-chip">Corel Draw</li>
            <li class="cc-chip">Photoshop CS</li>
            <li class="cc-chip">Hardware &amp; Networking</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 12 Months</span>
            <span class="cc-dur-pill alt">FT · 6 Months</span>
          </div>
        </div>
      </article>

      <!-- 9 · ADCA -->
      <article class="cc-card" data-course="adca" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">ADCA</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Ms-Office (Word, Excel, PowerPoint)</li>
            <li class="cc-chip">C &amp; C++</li>
            <li class="cc-chip">Core Java</li>
            <li class="cc-chip">Python</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 8 Months</span>
            <span class="cc-dur-pill alt">FT · 4 Months</span>
          </div>
        </div>
      </article>

      <!-- 10 · DTP Designer -->
      <article class="cc-card" data-course="dtp" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">DTP Designer</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Intro. to Computer</li>
            <li class="cc-chip">Corel Draw</li>
            <li class="cc-chip">Photoshop CS</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 12 Weeks</span>
            <span class="cc-dur-pill alt">FT · 6 Weeks</span>
          </div>
        </div>
      </article>

      <!-- 11 · Spoken English -->
      <article class="cc-card" data-course="english" tabindex="0">
        <div class="cc-card-content">
          <h3 class="cc-card-title">Spoken English</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Level I – Basic (Kids)</li>
            <li class="cc-chip">Level II</li>
            <li class="cc-chip">Level III</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">NT · 12 Weeks</span>
            <span class="cc-dur-pill alt">FT · 6 Weeks</span>
          </div>
        </div>
      </article>

      <!-- 12 · Smart Kids -->
      <article class="cc-card" data-course="kids" tabindex="0">
        <span class="cc-card-tag">Kids</span>
        <div class="cc-card-content">
          <h3 class="cc-card-title">Smart Kids</h3>
          <ul class="cc-card-chips">
            <li class="cc-chip">Basic Computer</li>
            <li class="cc-chip">Windows</li>
            <li class="cc-chip">Typing</li>
            <li class="cc-chip">Basic Animation</li>
          </ul>
          <div class="cc-card-duration">
            <span class="cc-dur-pill">Duration · 1 Month</span>
          </div>
        </div>
      </article>

    </div><!-- /.cc-card-grid -->
  </div><!-- /.cc-courses-wrap -->
</section>


<!-- ================================================================
     ENROLL PROCESS
================================================================ -->
<section class="enroll-process-section">
  <div class="enroll-process-wrap">
    <div class="enroll-process-badge"><i class="fa-solid fa-diamond"></i> Enrollment Process</div>
    <h2 class="enroll-process-title">Start Your Journey in 3 Easy Steps</h2>

    <div class="enroll-steps">
      <article class="enroll-step">
        <div class="enroll-step-num">1</div>
        <h3>Choose Your Course</h3>
        <p>Browse our wide range of IT and language courses. Pick the one that matches your goals and schedule.</p>
      </article>

      <article class="enroll-step">
        <div class="enroll-step-num">2</div>
        <h3>Write SCATe Exam</h3>
        <p>Appear for the scholarship entrance test to win up to 75% off your course fees instantly.</p>
      </article>

      <article class="enroll-step">
        <div class="enroll-step-num">3</div>
        <h3>Start Learning</h3>
        <p>Join classes at our Vaniyambadi or Ambur center and kickstart your IT career with expert faculty.</p>
      </article>
    </div>
  </div>
</section>

<?php include '../../includes/footer.php'; ?>