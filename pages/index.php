<?php include_once '../includes/header.php'; ?>

<style>
:root {
  --red:    #D32F2F;
  --red2:   #D32F2F;
  --sky:    #F59E0B;
  --sky2:   #F59E0B;
  --navy:   #1E293B;
  --white:  #F8FAFC;
  --light:  #F8FAFC;
  --gray:   #1E293B;
  --border: #F8FAFC;
  --font-head: 'Rajdhani', sans-serif;
  --font-body: 'Nunito', sans-serif;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
img { display: block; max-width: 100%; }
a { text-decoration: none; color: inherit; }
body { background: #F8FAFC; }

/* ═══════════════════════════════════════
   HERO
═══════════════════════════════════════ */
.hero {
  position: relative;
  width: 100%;
  min-height: 620px;
  overflow: hidden;
  background: #F8FAFC;
}
.hero::before {
  content: "";
  position: absolute;
  left: -180px;
  top: -120px;
  width: 560px;
  height: 560px;
  border-radius: 50%;
  background: rgba(245,158,11,0.08);
  pointer-events: none;
}
.hero-inner {
  position: relative;
  z-index: 2;
  max-width: 1280px;
  margin: 0 auto;
  padding: 48px 36px 72px;
  min-height: 620px;
  display: grid;
  grid-template-columns: 1fr 0.9fr;
  gap: 28px;
  align-items: center;
}

/* LEFT CONTENT */
.hero-content { max-width: 700px; }

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: transparent;
  border: 0;
  color: #D32F2F;
  font-size: 11.5px;
  font-weight: 800;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  padding: 0;
  margin-bottom: 14px;
  animation: fadeUp 0.6s 0.1s both;
}
.hero-title {
  font-family: var(--font-head);
  font-size: clamp(40px,6.4vw,72px);
  font-weight: 700;
  color: #1E293B;
  line-height: 1.03;
  letter-spacing: 0.02em;
  text-transform: uppercase;
  margin-bottom: 16px;
  animation: fadeUp 0.6s 0.25s both;
}
.hero-title .accent     { color: #1E293B; }
.hero-title .accent-red { color: #D32F2F; }

.hero-sub {
  color: #D32F2F;
  max-width: 560px;
  font-size: 24px;
  font-weight: 800;
  line-height: 1.2;
  margin-bottom: 12px;
  animation: fadeUp 0.6s 0.4s both;
}
.hero-sub-note {
  color: #1E293B;
  max-width: 520px;
  font-size: 18px;
  font-weight: 700;
  line-height: 1.65;
  margin-bottom: 30px;
}
.hero-buttons {
  display: flex;
  flex-wrap: wrap;
  gap: 0;
  animation: fadeUp 0.6s 0.6s both;
}
.btn-red {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #F59E0B;
  color: #1E293B;
  font-size: 14px;
  font-weight: 800;
  padding: 14px 30px;
  border-radius: 8px;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  box-shadow: 0 10px 24px rgba(245,158,11,0.32);
  transition: all 0.25s;
}
.btn-red:hover {
  background: #D32F2F;
  color: #F8FAFC;
  transform: translateY(-2px);
  box-shadow: 0 14px 28px rgba(211,47,47,0.3);
}

/* RIGHT VISUAL — BLOB STYLE */
.hero-visual {
  position: relative;
  min-height: 520px;
  display: flex;
  align-items: flex-end;
  justify-content: center;
}

/* Orange blob anchored to bottom */
.hero-blob {
  position: absolute;
  width: 400px;
  height: 400px;
  border-radius: 50%;
  background: #F59E0B;
  opacity: 0.92;
  bottom: 40px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 1;
  animation: blobPulse 5s ease-in-out infinite;
}

/* Outer decorative ring */
.hero-blob-ring {
  position: absolute;
  width: 470px;
  height: 470px;
  border-radius: 50%;
  border: 2px solid rgba(30,41,59,0.15);
  bottom: 5px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 0;
}

/* Student container */
.hero-student-crop {
  position: relative;
  z-index: 3;
  width: 420px;
  height: 520px;
  flex-shrink: 0;
  overflow: hidden;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  animation: heroFloat 4.2s ease-in-out infinite;
}

/* Student image */
.hero-student {
  position: relative;
  z-index: 3;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: 79% top;
  display: block;
  transform: scale(1.22);
  transform-origin: right top;
  
}

/* Floating icon bubbles */
.hero-icon {
  position: absolute;
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: #F59E0B;
  color: #1E293B;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  border: 5px solid #fff;
  box-shadow: 0 8px 24px rgba(30,41,59,0.2);
  z-index: 4;
}
.hero-icon.icon-left  { left: 4%;  bottom: 32%; animation: iconFloat 3.4s ease-in-out infinite; }
.hero-icon.icon-right { right: 2%; top: 16%;    animation: iconFloat 3.8s ease-in-out infinite; }

/* Bottom accent bar */
.hero-bottom-border {
  position: absolute;
  left: 0; right: 0; bottom: 0;
  height: 4px;
  background: linear-gradient(90deg, #D32F2F 0%, #F59E0B 50%, #D32F2F 100%);
  z-index: 5;
}

/* Animations */
@keyframes blobPulse {
  0%,100% { transform: translateX(-50%) scale(1); }
  50%      { transform: translateX(-50%) scale(1.05); }
}
@keyframes heroFloat { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-14px); } }
@keyframes iconFloat { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
@keyframes fadeUp { from { opacity:0; transform:translateY(28px); } to { opacity:1; transform:translateY(0); } }

/* ═══════════════════════════════════════
   STATS RIBBON
═══════════════════════════════════════ */
.stats-ribbon { background: transparent; padding-top: 26px; }
.stats-ribbon-inner {
  max-width: 1280px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(4,1fr);
  background: #F8FAFC;
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 14px 34px rgba(30,41,59,0.14);
}
.ribbon-stat {
  padding: 32px 24px;
  text-align: center;
  border-right: 1px solid #eee;
  transition: background 0.3s;
}
.ribbon-stat:hover { background: rgba(211,47,47,0.06); }
.ribbon-stat:last-child { border-right: none; }
.ribbon-stat-num   { font-family: var(--font-head); font-size: 40px; font-weight: 700; color: #D32F2F; line-height: 1; }
.ribbon-stat-label { font-size: 11px; font-weight: 700; color: #1E293B; text-transform: uppercase; letter-spacing: 0.14em; margin-top: 6px; }

/* ═══════════════════════════════════════
   SHARED HELPERS
═══════════════════════════════════════ */
.section-label {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 11px;
  font-weight: 800;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  margin-bottom: 12px;
}
.section-label.red { color: #D32F2F; }
.section-label.sky { color: #F59E0B; }
.section-label::before { content:''; display:block; width:26px; height:3px; border-radius:2px; background:currentColor; }
.section-title { font-family: var(--font-head); font-size: clamp(30px,5vw,52px); font-weight: 700; color: #1E293B; letter-spacing: 0.02em; line-height: 1.08; text-transform: uppercase; }
.section-title .accent { color: #D32F2F; }
.section-title .sky    { color: #F59E0B; }

/* ═══════════════════════════════════════
   PATHWAY SECTION
═══════════════════════════════════════ */
.pathway-section { background: transparent; padding: 72px 0; }
.pathway-wrap    { max-width: 1280px; margin: 0 auto; padding: 0 36px; }
.pathway-header  { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: end; margin-bottom: 34px; }
.pathway-title-block { transform: translate3d(0,0,0); transition: transform 0.25s ease-out; will-change: transform; }
.pathway-hint    { font-size: 11px; font-weight: 800; color: #1E293B; letter-spacing: 0.2em; text-transform: uppercase; text-align: right; align-self: end; }
.pathway-mobile-group-title { display: none; }
.pathway-tabs    { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 42px; justify-content: center; }
.ptab {
  padding: 11px 26px;
  font-size: 13px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  border: 2px solid #eee;
  border-radius: 100px;
  background: #F8FAFC;
  color: #1E293B;
  cursor: pointer;
  transition: all 0.25s;
}
.ptab:hover { border-color: #F59E0B; color: #F59E0B; }
.ptab.active { background: #D32F2F; border-color: #D32F2F; color: #F8FAFC; box-shadow: 0 6px 20px rgba(211,47,47,0.3); }
.pathway-grid { display: grid; grid-template-columns: repeat(auto-fill,minmax(240px,1fr)); gap: 16px; }
.pathway-card {
  background: #F8FAFC;
  border-top: 4px solid #F59E0B;
  border-radius: 12px;
  padding: 22px;
  box-shadow: 0 14px 34px rgba(30,41,59,0.10);
  display: flex;
  flex-direction: column;
  gap: 7px;
  transition: all 0.25s;
}
.pathway-card:hover   { box-shadow: 0 18px 40px rgba(30,41,59,0.15); transform: translateY(-6px); }
.pathway-card.red-top { border-top-color: #D32F2F; }
.pcard-tag     { font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.14em; color: #F59E0B; }
.pcard-tag.red { color: #D32F2F; }
.pcard-name    { font-family: var(--font-head); font-size: 19px; font-weight: 700; color: #1E293B; text-transform: uppercase; letter-spacing: 0.04em; line-height: 1.2; }
.pcard-duration{ font-size: 11px; font-weight: 800; color: #1E293B; text-transform: uppercase; letter-spacing: 0.1em; }
.pathway-cta   { text-align: center; margin-top: 48px; }

/* ═══════════════════════════════════════
   INSTITUTIONS SECTION
═══════════════════════════════════════ */
.institutions-section { background: transparent; padding: 72px 0; }
.inst-wrap    { max-width: 1280px; margin: 0 auto; padding: 0 36px; }
.inst-header  { text-align: center; margin-bottom: 56px; }
.inst-underline { width: 60px; height: 4px; border-radius: 2px; background: linear-gradient(90deg,#D32F2F,#F59E0B); margin: 14px auto 0; }
.inst-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 24px; }
.inst-card {
  position: relative;
  border-radius: 14px;
  overflow: hidden;
  background: #1E293B;
  min-height: 480px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  box-shadow: 0 14px 34px rgba(30,41,59,0.18);
  transition: transform 0.4s;
}
.inst-card:hover { transform: translateY(-6px); }
.inst-card img {
  position: absolute; inset: 0;
  width: 100%; height: 100%;
  object-fit: cover;
  opacity: 0.5;
  transition: opacity 0.5s, transform 0.5s;
}
.inst-card:hover img { opacity: 0.3; transform: scale(1.06); }
.inst-card-body {
  position: relative; z-index: 2;
  padding: 30px;
  background: linear-gradient(to top,rgba(30,41,59,0.98) 0%,rgba(30,41,59,0.7) 70%,transparent 100%);
}
.inst-card-tag   { font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.18em; color: #F59E0B; margin-bottom: 10px; }
.inst-card-title { font-family: var(--font-head); font-size: 28px; font-weight: 700; color: #F8FAFC; text-transform: uppercase; line-height: 1.15; margin-bottom: 12px; }
.inst-card-desc  { font-size: 13px; font-weight: 600; color: rgba(248,250,252,0.88); line-height: 1.65; margin-bottom: 20px; max-height: 0; overflow: hidden; transition: max-height 0.4s, opacity 0.4s; opacity: 0; }
.inst-card:hover .inst-card-desc { max-height: 80px; opacity: 1; }
.btn-inst { display: inline-flex; align-items: center; gap: 7px; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; padding: 10px 22px; border-radius: 6px; transition: all 0.25s; }
.btn-inst.white { background: #F8FAFC; color: #1E293B; }
.btn-inst.white:hover { background: #F59E0B; }
.btn-inst.sky   { background: #F59E0B; color: #F8FAFC; }
.btn-inst.sky:hover { background: #D32F2F; }

/* ═══════════════════════════════════════
   WHY SECTION
═══════════════════════════════════════ */
.why-section { padding: 72px 0; background: transparent; }
.why-wrap    { max-width: 1200px; margin: 0 auto; padding: 0 36px; position: relative; z-index: 1; }
.why-header  { text-align: center; margin-bottom: 64px; }
.why-header p { font-size: 15px; font-weight: 600; color: #1E293B; margin-top: 10px; }
.why-grid    { display: grid; grid-template-columns: 1fr auto 1fr; gap: 32px; align-items: center; }
.why-col     { display: flex; flex-direction: column; gap: 20px; }
.why-card {
  background: #F8FAFC;
  border-radius: 16px;
  padding: 22px;
  box-shadow: 0 14px 34px rgba(30,41,59,0.09);
  display: flex;
  gap: 16px;
  align-items: flex-start;
  transition: all 0.3s;
}
.why-card:hover { box-shadow: 0 20px 44px rgba(30,41,59,0.14); transform: translateY(-4px); }
.why-icon { width: 44px; height: 44px; flex-shrink: 0; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 18px; color: #F8FAFC; }
.why-icon.red { background: linear-gradient(135deg,#D32F2F,#b71c1c); }
.why-icon.sky { background: linear-gradient(135deg,#F59E0B,#D32F2F); }
.why-card-title { font-family: var(--font-head); font-size: 20px; font-weight: 700; color: #1E293B; text-transform: uppercase; margin-bottom: 5px; }
.why-card-desc  { font-size: 13px; font-weight: 600; color: #1E293B; line-height: 1.65; }
.why-center { display: flex; justify-content: center; align-items: center; }
.why-circle { width: 280px; height: 280px; border-radius: 50%; padding: 6px; background: linear-gradient(135deg,#D32F2F,#F59E0B); box-shadow: 0 24px 64px rgba(30,41,59,0.2); }
.why-circle-inner { width: 100%; height: 100%; border-radius: 50%; overflow: hidden; }
.why-circle-inner img { width: 100%; height: 100%; object-fit: cover; }

/* ═══════════════════════════════════════
   ENQUIRY SECTION
═══════════════════════════════════════ */
.enquiry-section {
  background: #1E293B;
  padding: 72px 0;
  position: relative;
  overflow: hidden;
}
.enquiry-section::after {
  content:'';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg,#D32F2F,#F59E0B,#D32F2F);
}
.enquiry-wrap { max-width: 1200px; margin: 0 auto; padding: 0 36px; }
.enquiry-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
.enquiry-left h2 { font-family: var(--font-head); font-size: clamp(36px,5vw,60px); font-weight: 700; color: #F8FAFC; text-transform: uppercase; line-height: 1.0; margin-bottom: 18px; }
.enquiry-left h2 span { color: #D32F2F; }
.enquiry-left p { font-size: 15px; font-weight: 600; color: rgba(248,250,252,0.88); line-height: 1.75; margin-bottom: 34px; }
.enquiry-features { display: flex; flex-direction: column; gap: 14px; }
.enq-feat { display: flex; align-items: center; gap: 12px; font-size: 14px; font-weight: 700; color: rgba(248,250,252,0.95); }
.enq-feat-icon { width: 32px; height: 32px; border-radius: 8px; background: rgba(211,47,47,0.18); border: 1px solid rgba(211,47,47,0.35); display: flex; align-items: center; justify-content: center; color: #F59E0B; font-size: 13px; flex-shrink: 0; }
.form-card { background: #F8FAFC; border-radius: 18px; padding: 40px; box-shadow: 0 32px 80px rgba(30,41,59,0.3); }
.form-card h3 { font-family: var(--font-head); font-size: 28px; font-weight: 700; color: #1E293B; text-transform: uppercase; margin-bottom: 4px; }
.form-card > p { font-size: 13px; color: #1E293B; margin-bottom: 26px; }
.form-group { margin-bottom: 14px; }
.form-group label { display: block; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #1E293B; margin-bottom: 5px; }
.form-group input,
.form-group select { width: 100%; padding: 12px 16px; border: 2px solid #eee; border-radius: 8px; font-size: 14px; font-weight: 600; color: #1E293B; outline: none; background: #F8FAFC; transition: border-color 0.2s, box-shadow 0.2s; }
.form-group input:focus,
.form-group select:focus { border-color: #F59E0B; box-shadow: 0 0 0 4px rgba(245,158,11,0.12); }
.form-submit { width: 100%; padding: 15px; border: none; background: linear-gradient(135deg,#D32F2F,#b71c1c); color: #F8FAFC; font-size: 15px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; border-radius: 8px; cursor: pointer; box-shadow: 0 8px 24px rgba(211,47,47,0.4); transition: all 0.25s; margin-top: 4px; }
.form-submit:hover { transform: translateY(-2px); box-shadow: 0 14px 36px rgba(211,47,47,0.5); }

/* ═══════════════════════════════════════
   SHARED BUTTON
═══════════════════════════════════════ */
.btn-main { display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; padding: 13px 30px; border-radius: 8px; transition: all 0.25s; }
.btn-main.dark { background: #1E293B; color: #F8FAFC; box-shadow: 0 6px 18px rgba(30,41,59,0.25); }
.btn-main.dark:hover { background: #F59E0B; color: #F8FAFC; transform: translateY(-2px); }
.hidden { display: none !important; }

/* ═══════════════════════════════════════
   RESPONSIVE
═══════════════════════════════════════ */
@media (max-width: 1100px) {
  .inst-grid { grid-template-columns: 1fr; }
  .inst-card { min-height: 350px; }
  .why-grid  { grid-template-columns: 1fr; }
  .why-center { display: none; }
  .why-col { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
  .enquiry-grid { grid-template-columns: 1fr; }
  .enquiry-left { text-align: center; }
  .enquiry-features { align-items: center; }
}
@media (max-width: 768px) {
  .hero { min-height: 820px; }
  .hero-inner { min-height: 820px; padding: 32px 20px 24px; grid-template-columns: 1fr; gap: 14px; align-items: flex-start; }
  .hero-content { max-width: 100%; }
  .hero-sub { font-size: 20px; }
  .hero-sub-note { font-size: 16px; }
  .hero-visual        { min-height: 420px; }
  .hero-blob          { width: 290px; height: 290px; bottom: 30px; }
  .hero-blob-ring     { width: 340px; height: 340px; bottom: 5px; }
  .hero-student-crop  { width: 300px; height: 400px; }
  .hero-student       { object-position: 80% top; transform: scale(1.28); }
  .hero-icon.icon-left  { left: 2%;  bottom: 18%; }
  .hero-icon.icon-right { right: 4%; top: 8%; }
  .stats-ribbon-inner { grid-template-columns: repeat(2,1fr); }
  .pathway-header { grid-template-columns: 1fr; }
  .pathway-hint { text-align: left; }
  .pathway-title-block {
    position: static;
    transition: none;
    transform: none !important;
  }
  .pathway-tabs { display: none; }
  .pathway-mobile-group-title {
    display: block;
    margin: 0 0 12px;
    font-family: var(--font-head);
    font-size: 18px;
    font-weight: 700;
    color: #1E293B;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    position: sticky;
    top: 72px;
    z-index: 9;
    background: #F8FAFC;
    padding: 6px 0 10px;
  }
  .pathway-grid {
    display: block;
    grid-template-columns: 1fr;
    padding-bottom: 6vh;
  }
  .pathway-section .pathway-grid.hidden { display: block !important; }
  .pathway-card {
    position: sticky;
    top: calc(132px + (var(--stack-index, 0) * 14px));
    margin-bottom: 14px;
  }
  .pathway-card:last-child { margin-bottom: 0; }
  .pathway-cta .btn-main { padding: 10px 22px; }
  .why-col { grid-template-columns: 1fr; }
  .form-card { padding: 28px 22px; }
  .pathway-wrap, .inst-wrap, .why-wrap, .enquiry-wrap { padding: 0 20px; }
}
</style>

<!-- ═══════════════ HERO ═══════════════ -->
<section class="hero">
  <div class="hero-inner">

    <div class="hero-content">
      <div class="hero-badge">Empowering Careers in Healthcare &amp; IT</div>
      <h1 class="hero-title">
        BUILDING FUTURE<br>
        <span class="accent">GLOBAL </span><span class="accent-red">LEADERS.</span>
      </h1>
      <p class="hero-sub">FREE REGISTRATION NOW</p>
      <p class="hero-sub-note">Practical, affordable and career-focused education designed for students from Ambur &amp; Vaniyambadi and beyond.</p>
      <div class="hero-buttons">
        <a href="contact.php" class="btn-red"><i class="fas fa-graduation-cap"></i> Join Course</a>
      </div>
    </div>

    <div class="hero-visual">
      <div class="hero-blob-ring"></div>
      <div class="hero-blob"></div>
      <div class="hero-student-crop">
        <img
          src="../assets/images/index-hero-student.png"
          class="hero-student"
          alt="SRM Education Student"
        >
      </div>
      <div class="hero-icon icon-left"><i class="fas fa-lightbulb"></i></div>
      <div class="hero-icon icon-right"><i class="fas fa-graduation-cap"></i></div>
    </div>

  </div>
  <div class="hero-bottom-border"></div>
</section>

<!-- ═══════════════ STATS RIBBON ═══════════════ -->
<div class="stats-ribbon">
  <div class="stats-ribbon-inner">
    <div class="ribbon-stat"><div class="ribbon-stat-num">15K+</div><div class="ribbon-stat-label">Alumni Placed</div></div>
    <div class="ribbon-stat"><div class="ribbon-stat-num">100%</div><div class="ribbon-stat-label">Placement Record</div></div>
    <div class="ribbon-stat"><div class="ribbon-stat-num">3</div><div class="ribbon-stat-label">Specialised Institutes</div></div>
    <div class="ribbon-stat"><div class="ribbon-stat-num">20+</div><div class="ribbon-stat-label">Courses Offered</div></div>
  </div>
</div>

<!-- ═══════════════ PATHWAY ═══════════════ -->
<section id="pathway" class="pathway-section">
  <div class="pathway-wrap">
    <div class="pathway-header">
      <div class="pathway-title-block">
        <div class="section-label red">Your Journey Starts Here</div>
        <h2 class="section-title">Find Your <span class="sky">Pathway</span></h2>
      </div>
      <div class="pathway-hint">Select your educational background</div>
    </div>

    <div class="pathway-tabs">
      <button class="ptab active" onclick="showPathway('pass10',this)"><i class="fas fa-check-circle"></i>&nbsp; I Passed 10th</button>
      <button class="ptab" onclick="showPathway('pass12',this)"><i class="fas fa-check-circle"></i>&nbsp; I Passed 12th</button>
      <button class="ptab" onclick="showPathway('science12',this)"><i class="fas fa-check-circle"></i>&nbsp; I Completed 12th Science</button>
    </div>

    <h3 class="pathway-mobile-group-title">I Passed 10th</h3>
    <div id="path-pass10" class="pathway-grid">
      <div class="pathway-card"><div class="pcard-tag sky"><i class="fas fa-heart-pulse"></i>&nbsp; Healthcare</div><div class="pcard-name">Nursing Assistant</div><div class="pcard-duration">2 Year Diploma</div></div>
      <div class="pathway-card"><div class="pcard-tag sky"><i class="fas fa-stethoscope"></i>&nbsp; Healthcare</div><div class="pcard-name">Health Worker (MPHW)</div><div class="pcard-duration">2 Year Diploma</div></div>
      <div class="pathway-card red-top"><div class="pcard-tag red"><i class="fas fa-computer"></i>&nbsp; IT</div><div class="pcard-name">Office Automation</div><div class="pcard-duration">IT Certification</div></div>
      <div class="pathway-card red-top"><div class="pcard-tag red"><i class="fas fa-calculator"></i>&nbsp; IT</div><div class="pcard-name">Tally Prime</div><div class="pcard-duration">Accounting Module</div></div>
    </div>

    <h3 class="pathway-mobile-group-title">I Passed 12th</h3>
    <div id="path-pass12" class="pathway-grid hidden">
      <div class="pathway-card"><div class="pcard-tag sky"><i class="fas fa-pills"></i>&nbsp; Pharmacy</div><div class="pcard-name">Diploma in Pharmacy</div><div class="pcard-duration">2 Year Professional</div></div>
      <div class="pathway-card"><div class="pcard-tag sky"><i class="fas fa-flask"></i>&nbsp; Paramedical</div><div class="pcard-name">Lab Technology (DMLT)</div><div class="pcard-duration">2 Year Paramedical</div></div>
      <div class="pathway-card"><div class="pcard-tag sky"><i class="fas fa-hospital"></i>&nbsp; Clinical</div><div class="pcard-name">OT Technology</div><div class="pcard-duration">2 Year Professional</div></div>
      <div class="pathway-card red-top"><div class="pcard-tag red"><i class="fas fa-network-wired"></i>&nbsp; IT</div><div class="pcard-name">Hardware &amp; Networking</div><div class="pcard-duration">IT Infrastructure</div></div>
    </div>

    <h3 class="pathway-mobile-group-title">I Completed 12th Science</h3>
    <div id="path-science12" class="pathway-grid hidden">
      <div class="pathway-card"><div class="pcard-tag sky"><i class="fas fa-microscope"></i>&nbsp; Degree</div><div class="pcard-name">B.Sc MLT</div><div class="pcard-duration">3 Year Degree</div></div>
      <div class="pathway-card"><div class="pcard-tag sky"><i class="fas fa-eye"></i>&nbsp; Degree</div><div class="pcard-name">B.Sc Optometry</div><div class="pcard-duration">3 Year Degree</div></div>
      <div class="pathway-card"><div class="pcard-tag sky"><i class="fas fa-mortar-pestle"></i>&nbsp; Pharmacy</div><div class="pcard-name">B.Pharmacy</div><div class="pcard-duration">4 Year Professional</div></div>
      <div class="pathway-card red-top"><div class="pcard-tag red"><i class="fas fa-code"></i>&nbsp; Advanced IT</div><div class="pcard-name">Full Stack Development</div><div class="pcard-duration">Advanced IT Program</div></div>
    </div>

    <div class="pathway-cta">
      <a href="course.php" class="btn-main dark"><i class="fas fa-list"></i> View All Courses <i class="fas fa-arrow-right"></i></a>
    </div>
  </div>
</section>

<!-- ═══════════════ INSTITUTIONS ═══════════════ -->
<section id="institutions" class="institutions-section">
  <div class="inst-wrap">
    <div class="inst-header">
      <div class="section-label sky" style="justify-content:center">Our Academic Wings</div>
      <h2 class="section-title" style="text-align:center">Our <span class="accent">Institutions</span></h2>
      <div class="inst-underline"></div>
    </div>
    <div class="inst-grid">
      <div class="inst-card">
        <img src="../assets/images/our_inst_paramedical.png" alt="Paramedical">
        <div class="inst-card-body">
          <div class="inst-card-tag">Academic Wing</div>
          <div class="inst-card-title">Paramedical<br>Sciences</div>
          <div class="inst-card-desc">Lab Tech, Radiology, and OT assistance with practical hospital exposure.</div>
          <a href="institution.php" class="btn-inst white">Explore Institute <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="inst-card">
        <img src="../assets/images/our_inst_degree.png" alt="Degree Programs">
        <div class="inst-card-body">
          <div class="inst-card-tag">UGC Approved</div>
          <div class="inst-card-title">Degree<br>Programs</div>
          <div class="inst-card-desc">Globally recognized BSc and professional degree courses.</div>
          <a href="institution.php" class="btn-inst sky">Explore Institute <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="inst-card">
        <img src="../assets/images/our_inst_computer.png" alt="Computer Center">
        <div class="inst-card-body">
          <div class="inst-card-tag">Skill Center</div>
          <div class="inst-card-title">SRM Computer<br>Center</div>
          <div class="inst-card-desc">Industry-aligned IT training and Full Stack development.</div>
          <a href="institution.php" class="btn-inst white">Explore Institute <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════ WHY SRM ═══════════════ -->
<section class="why-section">
  <div class="why-wrap">
    <div class="why-header">
      <div class="section-label red" style="justify-content:center">Our Advantage</div>
      <h2 class="section-title" style="text-align:center">Why Choose <span class="sky">SRM?</span></h2>
      <p>Practical, affordable and career-focused education trusted by thousands</p>
    </div>
    <div class="why-grid">
      <div class="why-col">
        <div class="why-card"><div class="why-icon red"><i class="fas fa-wallet"></i></div><div><div class="why-card-title">Economic</div><div class="why-card-desc">Affordable fee plans with flexible payment options and scholarship up to 75%.</div></div></div>
        <div class="why-card"><div class="why-icon sky"><i class="fas fa-user-tie"></i></div><div><div class="why-card-title">Professional</div><div class="why-card-desc">Industry-ready training with project-based learning and expert mentors.</div></div></div>
        <div class="why-card"><div class="why-icon red"><i class="fas fa-shield-alt"></i></div><div><div class="why-card-title">Security</div><div class="why-card-desc">Safe campus environment with transparent academic processes.</div></div></div>
      </div>
      <div class="why-center">
        <div class="why-circle"><div class="why-circle-inner"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=800" alt="SRM Mentor"></div></div>
      </div>
      <div class="why-col">
        <div class="why-card"><div class="why-icon sky"><i class="fas fa-clock"></i></div><div><div class="why-card-title">Time-Smart</div><div class="why-card-desc">Fast-track practical programs with clear career outcomes.</div></div></div>
        <div class="why-card"><div class="why-icon red"><i class="fas fa-headset"></i></div><div><div class="why-card-title">24/7 Support</div><div class="why-card-desc">Continuous guidance from dedicated faculty and support teams.</div></div></div>
        <div class="why-card"><div class="why-icon sky"><i class="fas fa-smile"></i></div><div><div class="why-card-title">Student First</div><div class="why-card-desc">Trusted by students across Ambur and Vaniyambadi.</div></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════ ENQUIRY ═══════════════ -->
<section id="contact" class="enquiry-section">
  <div class="enquiry-wrap">
    <div class="enquiry-grid">
      <div class="enquiry-left">
        <div class="section-label sky">Get in Touch</div>
        <h2>Admission<br><span>Enquiry</span></h2>
        <p>Take the first step toward a rewarding healthcare or IT career. Our counselors will guide you through the right program based on your background.</p>
        <div class="enquiry-features">
          <div class="enq-feat"><div class="enq-feat-icon"><i class="fas fa-check"></i></div> Free career counseling session</div>
          <div class="enq-feat"><div class="enq-feat-icon"><i class="fas fa-check"></i></div> Scholarship assessment on enquiry</div>
          <div class="enq-feat"><div class="enq-feat-icon"><i class="fas fa-check"></i></div> 100% placement assistance</div>
          <div class="enq-feat"><div class="enq-feat-icon"><i class="fas fa-check"></i></div> Flexible fee &amp; EMI options</div>
        </div>
      </div>
      <div class="form-card">
        <h3>Apply Now</h3>
        <p>Fill the form and we'll contact you within 24 hours</p>
        <form>
          <div class="form-group"><label>Full Name</label><input type="text" placeholder="Enter your full name"></div>
          <div class="form-group"><label>Email Address</label><input type="email" placeholder="Enter your email"></div>
          <div class="form-group"><label>Phone Number</label><input type="tel" placeholder="Enter your mobile number"></div>
          <div class="form-group">
            <label>Programme Interest</label>
            <select>
              <option value="">Select a programme</option>
              <option>Paramedical Sciences</option>
              <option>Degree Programs</option>
              <option>IT / Computer Center</option>
            </select>
          </div>
          <button type="submit" class="form-submit"><i class="fas fa-paper-plane"></i>&nbsp; Submit Application</button>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
function showPathway(pathId, btn) {
  document.querySelectorAll('.pathway-grid').forEach(el => el.classList.add('hidden'));
  document.querySelectorAll('.ptab').forEach(b => b.classList.remove('active'));
  document.getElementById('path-' + pathId).classList.remove('hidden');
  btn.classList.add('active');
}

function setPathwayStackIndexes() {
  document.querySelectorAll('.pathway-grid').forEach(grid => {
    grid.querySelectorAll('.pathway-card').forEach((card, index) => {
      card.style.setProperty('--stack-index', index);
    });
  });
}

function animateCounters(wrapper) {
  wrapper.querySelectorAll('.ribbon-stat-num').forEach(el => {
    if (el.dataset.animated) return;
    el.dataset.animated = 'true';
    const raw = el.textContent.trim();
    const num = parseInt(raw.replace(/\D/g,''), 10);
    const suffix = raw.replace(/[\d]/g,'').trim();
    if (!num) return;
    let cur = 0;
    const step = Math.ceil(num / 55);
    const t = setInterval(() => {
      cur += step;
      if (cur >= num) { cur = num; clearInterval(t); }
      el.textContent = cur + suffix;
    }, 22);
  });
}

const obs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) animateCounters(e.target); });
}, { threshold: 0.4 });
document.querySelectorAll('.stats-ribbon').forEach(el => obs.observe(el));
setPathwayStackIndexes();

</script>

<?php include_once '../includes/footer.php'; ?>
