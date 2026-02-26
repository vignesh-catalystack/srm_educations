<?php
include '../../includes/header.php';

// ── HERO DATA ──────────────────────────────────────────
$badge_text      = "SPEAK WITH CONFIDENCE";
$title_line1     = "Master";
$title_highlight = "Spoken";
$title_line2     = "English Fluently";
$description     = "An immersive spoken English program designed to build real fluency through live practice, accent training, and interactive conversation sessions with expert coaches.";
$btn_primary     = "Get Started";
$btn_primary_url = "#get-started";
$btn_outline     = "Learn More";
$btn_outline_url = "#learn-more";
$stats = [
    ["num" => "+630", "label" => "Best Online Course"],
    ["num" => "+75",  "label" => "Expert Teachers"],
    ["num" => "98%",  "label" => "Success Rate"],
];
$hero_cards = [
    ["class" => "card-1", "icon_class" => "orange", "icon" => "🎯", "num" => "Live Classes", "txt" => "Daily sessions"],
    ["class" => "card-2", "icon_class" => "green",  "icon" => "⭐", "num" => "4.9 Rating",   "txt" => "2,400 reviews"],
    ["class" => "card-3", "icon_class" => "blue",   "icon" => "🎓", "num" => "Certificate",  "txt" => "On completion"],
];
$person_image = "../../assets/images/teacher.png";

// ── COURSES DATA ───────────────────────────────────────
$courses_badge = "What We Offer";
$courses_title = "Our Provided Courses";
$courses_subtitle = "Structured learning paths designed for every stage of your English journey";

$courses = [
    [
        "level"    => "Level I",
        "tag"      => "Basic · Kids",
        "icon"     => "fas fa-seedling",
        "color"    => "green",
        "title"    => "Foundation English",
        "duration_nt" => "NT 12 Weeks",
        "duration_ft" => "FT 6 Weeks",
        "contents" => [
            "Phonics & Pronunciation Basics",
            "Everyday Vocabulary Building",
            "Simple Sentence Formation",
            "Basic Listening & Speaking",
            "Fun Interactive Activities",
            "Story-based Learning",
        ],
        "badge_color" => "#22C55E",
        "featured"    => false,
    ],
    [
        "level"    => "Level II",
        "tag"      => "Intermediate",
        "icon"     => "fas fa-fire",
        "color"    => "orange",
        "title"    => "Conversational English",
        "duration_nt" => "NT 12 Weeks",
        "duration_ft" => "FT 6 Weeks",
        "contents" => [
            "Fluent Conversation Skills",
            "Grammar in Context",
            "Accent Reduction Training",
            "Role-play & Dialogue Practice",
            "Reading Comprehension",
            "Vocabulary Expansion",
        ],
        "badge_color" => "#FF6B2B",
        "featured"    => true,
    ],
    [
        "level"    => "Level III",
        "tag"      => "Advanced",
        "icon"     => "fas fa-crown",
        "color"    => "blue",
        "title"    => "Advanced Fluency",
        "duration_nt" => "NT 12 Weeks",
        "duration_ft" => "FT 6 Weeks",
        "contents" => [
            "Professional Communication",
            "Public Speaking & Presentation",
            "Interview Preparation",
            "Advanced Writing Skills",
            "Critical Thinking in English",
            "Certificate Preparation",
        ],
        "badge_color" => "#3B82F6",
        "featured"    => false,
    ],
];

// ── SERVICES DATA ──────────────────────────────────────
$services_badge = "Services";
$services_title = "Our Provided Services";
$services = [
    ["icon" => "fas fa-chalkboard-teacher", "title" => "Learning Management System",  "desc" => "vcv's lms is an application for delivery of educational resources and training programs", "link" => "#lms"],
    ["icon" => "fas fa-tasks",              "title" => "Teaching Management System",  "desc" => "vcv's tms is the essential digital tool for organizing teaching activities and help you improving", "link" => "#tms"],
    ["icon" => "fas fa-microphone-alt",     "title" => "Spoken English Program",      "desc" => "A structured spoken English program designed to build real-world fluency through live practice sessions", "link" => "#spoken"],
    ["icon" => "fas fa-school",             "title" => "School Management System",    "desc" => "vcv's sms to help you manages all your business and related activities and keep track of everything", "link" => "#sms"],
];

// ── CTA DATA ───────────────────────────────────────────
$cta_title_plain1  = "Experience Better";
$cta_title_orange1 = "Learning";
$cta_title_plain2  = "And";
$cta_title_orange2 = "Teaching";
$cta_title_plain3  = "English";
$cta_desc          = "Learners of English as a foreign language need more immersion and a greater level of exposure and opportunities to communicate and apply what they learn.";
$cta_btn_text      = "Join VCV English";
$cta_btn_url       = "#join";
$cta_person_image  = "../../assets/images/teacher-img-1.png";
?>

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<style>
/* ═══════════════════════════════════════════════════════
   ROOT VARIABLES
═══════════════════════════════════════════════════════ */
:root {
  --orange:       #FF6B2B;
  --orange-light: #FF8C55;
  --orange-pale:  #FFF0E8;
  --bg:           #FFFFFF;
  --text-dark:    #1A1A2E;
  --text-muted:   #666;
  --se-orange:      #FF6B2B;
  --se-orange-pale: #FFF0E8;
  --se-navy:        #1A1A2E;
  --se-muted:       #666;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

/* ═══════════════════════════════════════════════════════
   HERO
═══════════════════════════════════════════════════════ */
.hero-section {
  font-family: 'Nunito', sans-serif;
  background: var(--bg);
  min-height: calc(100vh - 70px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 60px 40px;
  position: relative;
  overflow: hidden;
}
.hero-section::before {
  content: '';
  position: absolute;
  width: 550px; height: 550px;
  background: radial-gradient(circle, #FFE8D6 0%, transparent 65%);
  top: -120px; right: -50px;
  border-radius: 50%;
  z-index: 0; pointer-events: none;
}
.hero-section::after {
  content: '';
  position: absolute;
  width: 250px; height: 250px;
  background: radial-gradient(circle, #FFD5B8 0%, transparent 70%);
  bottom: -30px; left: 200px;
  border-radius: 50%;
  z-index: 0; pointer-events: none;
}
.hero-inner {
  position: relative; z-index: 2;
  width: 100%; max-width: 1200px;
  display: flex; align-items: center;
  justify-content: space-between; gap: 40px;
}
.hero-left { flex: 1 1 0; min-width: 0; max-width: 520px; }
.hero-badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--orange-pale); border: 1px solid #FFD5B8;
  color: var(--orange); font-weight: 800; font-size: 0.78rem;
  padding: 7px 16px; border-radius: 30px; margin-bottom: 24px;
  letter-spacing: 0.8px; opacity: 0;
  animation: fadeUp 0.6s 0.1s forwards;
}
.hero-badge::before { content: '🎙️'; }
.hero-title {
  font-size: clamp(2.4rem, 4.5vw, 3.4rem); font-weight: 900;
  line-height: 1.13; color: var(--text-dark); margin-bottom: 18px;
  opacity: 0; animation: fadeUp 0.6s 0.25s forwards;
}
.hero-title .highlight {
  color: var(--orange); position: relative; display: inline-block;
}
.hero-title .highlight::after {
  content: ''; position: absolute; bottom: 4px; left: 0;
  width: 100%; height: 5px; background: var(--orange);
  border-radius: 3px; opacity: 0.2;
}
.hero-desc {
  font-size: 1.05rem; color: var(--text-muted); line-height: 1.75;
  margin-bottom: 36px; max-width: 440px;
  opacity: 0; animation: fadeUp 0.6s 0.4s forwards;
}
.hero-btns {
  display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 52px;
  opacity: 0; animation: fadeUp 0.6s 0.55s forwards;
}
.btn-primary {
  background: var(--orange); color: #fff; border: none;
  padding: 15px 34px; border-radius: 40px; font-weight: 800;
  font-size: 1rem; cursor: pointer;
  box-shadow: 0 8px 28px rgba(255,107,43,0.38);
  transition: transform 0.2s, box-shadow 0.2s;
  font-family: 'Nunito', sans-serif; text-decoration: none;
  display: inline-block; white-space: nowrap;
}
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 14px 34px rgba(255,107,43,0.48); }
.btn-outline {
  background: transparent; color: var(--text-dark);
  border: 2px solid #E0E0E0; padding: 15px 34px;
  border-radius: 40px; font-weight: 700; font-size: 1rem;
  cursor: pointer; transition: border-color 0.2s, color 0.2s;
  font-family: 'Nunito', sans-serif; text-decoration: none;
  display: inline-block; white-space: nowrap;
}
.btn-outline:hover { border-color: var(--orange); color: var(--orange); }
.hero-stats {
  display: flex; gap: 40px; flex-wrap: wrap;
  opacity: 0; animation: fadeUp 0.6s 0.7s forwards;
}
.stat-item { display: flex; flex-direction: column; gap: 3px; }
.stat-num { font-size: 1.7rem; font-weight: 900; color: var(--orange); line-height: 1; }
.stat-label { font-size: 0.82rem; color: var(--text-muted); font-weight: 600; }
.hero-stats .stat-item:not(:last-child) { padding-right: 40px; border-right: 1px solid #F0EDE9; }
.wave-decor {
  display: flex; gap: 5px; align-items: center; margin-bottom: 28px;
  opacity: 0; animation: fadeUp 0.6s 0.18s forwards;
}
.wave-bar {
  width: 4px; background: var(--orange); border-radius: 2px;
  opacity: 0.45; animation: waveAnim 1.2s ease-in-out infinite;
}
.wave-bar:nth-child(1){height:10px}
.wave-bar:nth-child(2){height:20px;animation-delay:.1s}
.wave-bar:nth-child(3){height:30px;animation-delay:.2s}
.wave-bar:nth-child(4){height:16px;animation-delay:.3s}
.wave-bar:nth-child(5){height:26px;animation-delay:.4s}
.wave-bar:nth-child(6){height:12px;animation-delay:.5s}
@keyframes waveAnim {
  0%,100%{transform:scaleY(1)} 50%{transform:scaleY(1.8);opacity:.7}
}
.hero-right {
  flex-shrink: 0; position: relative; z-index: 2;
  opacity: 0; animation: fadeIn 0.9s 0.4s forwards;
}
.image-wrapper { position: relative; width: 420px; height: 480px; }
.blob-bg {
  position: absolute; top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  width: 370px; height: 390px;
  background: linear-gradient(135deg, #FFE8D6 0%, #FFDABF 100%);
  border-radius: 60% 40% 50% 50% / 50% 40% 60% 50%;
  animation: morphBlob 8s ease-in-out infinite;
}
@keyframes morphBlob {
  0%,100%{border-radius:60% 40% 50% 50%/50% 40% 60% 50%}
  33%{border-radius:40% 60% 60% 40%/60% 50% 50% 40%}
  66%{border-radius:50% 50% 40% 60%/40% 60% 50% 50%}
}
.person-placeholder {
  position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);
  width: 300px; height: 390px;
  background: linear-gradient(180deg, #FFB380 0%, #FF8C55 100%);
  border-radius: 50% 50% 0 0 / 40% 40% 0 0;
  animation: floatPerson 4s ease-in-out infinite;
  z-index: 2; display: flex; flex-direction: column;
  align-items: center; justify-content: flex-start;
  padding-top: 36px; overflow: hidden;
}
.person-placeholder::before {
  content:''; width:80px; height:80px; background:#FF6B2B;
  border-radius:50%; margin-bottom:12px; flex-shrink:0;
}
.person-placeholder::after {
  content:''; width:170px; height:220px; background:#FF7A42;
  border-radius:50% 50% 0 0; flex-shrink:0;
}
.person-img {
  position: absolute; bottom: 40px; left: 52%; transform: translateX(-50%);
  width: 330px; height: 410px; object-fit: cover; object-position: top;
  border-radius: 50% 50% 0 0 / 40% 40% 0 0;
  animation: floatPerson 4s ease-in-out infinite; z-index: 2;
}
@keyframes floatPerson {
  0%,100%{transform:translateX(-50%) translateY(0)}
  50%{transform:translateX(-50%) translateY(-16px)}
}
.float-card {
  position: absolute; background: #fff; border-radius: 16px;
  padding: 12px 18px; box-shadow: 0 10px 32px rgba(0,0,0,0.11);
  display: flex; align-items: center; gap: 12px; z-index: 5; white-space: nowrap;
}
.card-1{top:40px;left:-30px;animation:floatCard1 5s ease-in-out infinite}
.card-2{top:48%;right:-35px;animation:floatCard2 6s ease-in-out infinite 1s}
.card-3{bottom:50px;left:-20px;animation:floatCard3 4.5s ease-in-out infinite 0.5s}
@keyframes floatCard1{0%,100%{transform:translateY(0) rotate(-2deg)}50%{transform:translateY(-10px) rotate(-2deg)}}
@keyframes floatCard2{0%,100%{transform:translateY(0) rotate(1.5deg)}50%{transform:translateY(-12px) rotate(1.5deg)}}
@keyframes floatCard3{0%,100%{transform:translateY(0) rotate(-1deg)}50%{transform:translateY(-8px) rotate(-1deg)}}
.card-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0}
.card-icon.orange{background:var(--orange-pale)}
.card-icon.green{background:#E8F8F0}
.card-icon.blue{background:#E8F0FF}
.card-meta{display:flex;flex-direction:column;gap:2px}
.card-num{font-size:1rem;font-weight:900;color:var(--text-dark);line-height:1}
.card-txt{font-size:0.75rem;color:var(--text-muted);font-weight:600}
.sparkle{position:absolute;font-size:1.4rem;animation:sparklePop 3s ease-in-out infinite;z-index:6}
.sparkle-1{top:20px;right:50px;animation-delay:0s}
.sparkle-2{top:110px;right:-10px;animation-delay:1s;font-size:1rem}
.sparkle-3{bottom:60px;right:20px;animation-delay:2s;font-size:0.9rem}
@keyframes sparklePop{0%,100%{transform:scale(1) rotate(0);opacity:.7}50%{transform:scale(1.3) rotate(20deg);opacity:1}}
@keyframes fadeUp { to { opacity:1; transform:translateY(0) } }
@keyframes fadeIn { to { opacity:1 } }
.hero-badge,.wave-decor,.hero-title,.hero-desc,.hero-btns,.hero-stats{transform:translateY(24px)}


/* ═══════════════════════════════════════════════════════
   COURSES SECTION
═══════════════════════════════════════════════════════ */
.sc-courses-section {
  font-family: 'Nunito', sans-serif;
  background: #FAFAFA;
  padding: 90px 40px 100px;
  position: relative;
  overflow: hidden;
}

/* Subtle background pattern */
.sc-courses-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    radial-gradient(circle at 15% 20%, rgba(255,107,43,0.06) 0%, transparent 50%),
    radial-gradient(circle at 85% 80%, rgba(255,107,43,0.04) 0%, transparent 50%);
  pointer-events: none;
}

.sc-courses-inner {
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

/* ── Header ── */
.sc-header {
  text-align: center;
  margin-bottom: 60px;
}

.sc-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--orange-pale);
  border: 1px solid #FFD5B8;
  color: var(--orange);
  font-weight: 800;
  font-size: 0.78rem;
  padding: 6px 16px;
  border-radius: 30px;
  margin-bottom: 16px;
  letter-spacing: 0.8px;
}
.sc-badge::before {
  content: '';
  width: 7px; height: 7px;
  background: var(--orange);
  border-radius: 50%;
}

.sc-title {
  font-size: clamp(1.9rem, 3.2vw, 2.6rem);
  font-weight: 900;
  color: var(--text-dark);
  line-height: 1.15;
  margin-bottom: 14px;
}
.sc-title span { color: var(--orange); }

.sc-subtitle {
  font-size: 1rem;
  color: var(--text-muted);
  max-width: 500px;
  margin: 0 auto;
  line-height: 1.7;
}

/* ── Cards Grid ── */
.sc-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
}

/* ── Individual Card ── */
.sc-card {
  background: #fff;
  border-radius: 5px;                  /* 5px as requested */
  border: 1.5px solid #F0EDE9;
  padding: 0;
  overflow: hidden;
  position: relative;
  transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1),
              box-shadow 0.35s ease,
              border-color 0.3s ease;
  cursor: default;

  /* scroll-reveal initial state */
  opacity: 0;
  transform: translateY(40px);
}

/* Featured card — slightly elevated */
.sc-card.featured {
  border-color: var(--orange);
  box-shadow: 0 4px 24px rgba(255,107,43,0.10);
}

/* Hover lift */
.sc-card:hover {
  transform: translateY(-8px) scale(1.01);
  box-shadow: 0 20px 50px rgba(255,107,43,0.15);
  border-color: var(--orange);
}

/* Animated top accent bar */
.sc-card-accent {
  height: 4px;
  width: 100%;
  background: linear-gradient(90deg, #F0EDE9, #F0EDE9);
  transition: background 0.4s ease;
}
.sc-card:hover .sc-card-accent,
.sc-card.featured .sc-card-accent {
  background: linear-gradient(90deg, var(--orange), var(--orange-light));
}

/* Card body */
.sc-card-body {
  padding: 30px 28px 28px;
}

/* Level badge row */
.sc-card-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
}

.sc-level-pill {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  font-size: 0.72rem;
  font-weight: 900;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  padding: 5px 12px;
  border-radius: 20px;
  color: #fff;
}
.sc-level-pill.green  { background: linear-gradient(135deg, #22C55E, #16A34A); }
.sc-level-pill.orange { background: linear-gradient(135deg, #FF6B2B, #FF8C55); }
.sc-level-pill.blue   { background: linear-gradient(135deg, #3B82F6, #2563EB); }

.sc-level-pill i { font-size: 0.75rem; }

/* "Most Popular" ribbon on featured */
.sc-popular-tag {
  font-size: 0.68rem;
  font-weight: 900;
  color: var(--orange);
  background: var(--orange-pale);
  border: 1px solid #FFD5B8;
  padding: 3px 10px;
  border-radius: 20px;
  letter-spacing: 0.5px;
  animation: pulseTag 2.5s ease-in-out infinite;
}
@keyframes pulseTag {
  0%,100%{opacity:1} 50%{opacity:0.7}
}

/* Icon circle */
.sc-icon-circle {
  width: 52px; height: 52px;
  border-radius: 5px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.3rem;
  margin-bottom: 16px;
  transition: transform 0.3s ease;
}
.sc-icon-circle.green  { background: #DCFCE7; color: #16A34A; }
.sc-icon-circle.orange { background: var(--orange-pale); color: var(--orange); }
.sc-icon-circle.blue   { background: #DBEAFE; color: #2563EB; }
.sc-card:hover .sc-icon-circle { transform: rotate(-6deg) scale(1.1); }

/* Title */
.sc-card-title {
  font-size: 1.15rem;
  font-weight: 900;
  color: var(--text-dark);
  margin-bottom: 6px;
  line-height: 1.3;
}

/* Subtitle tag */
.sc-card-tag {
  font-size: 0.78rem;
  font-weight: 700;
  color: var(--text-muted);
  margin-bottom: 18px;
}

/* Duration badges */
.sc-duration-row {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  margin-bottom: 22px;
}
.sc-duration-badge {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 0.72rem;
  font-weight: 800;
  padding: 4px 11px;
  border-radius: 5px;
  background: #F8F8F8;
  color: var(--text-dark);
  border: 1px solid #EEE;
  transition: background 0.2s, color 0.2s, border-color 0.2s;
}
.sc-duration-badge i { font-size: 0.65rem; color: var(--orange); }
.sc-card:hover .sc-duration-badge {
  background: var(--orange-pale);
  border-color: #FFD5B8;
  color: var(--orange);
}

/* Divider */
.sc-divider {
  height: 1px;
  background: #F0EDE9;
  margin-bottom: 22px;
  position: relative;
  overflow: hidden;
}
.sc-divider::after {
  content: '';
  position: absolute;
  left: -100%; top: 0;
  width: 100%; height: 100%;
  background: linear-gradient(90deg, transparent, var(--orange), transparent);
  transition: left 0.5s ease;
}
.sc-card:hover .sc-divider::after { left: 100%; }

/* Contents list */
.sc-contents-title {
  font-size: 0.7rem;
  font-weight: 900;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  color: var(--text-muted);
  margin-bottom: 12px;
}

.sc-contents-list {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 9px;
  margin-bottom: 28px;
}
.sc-contents-list li {
  display: flex;
  align-items: flex-start;
  gap: 9px;
  font-size: 0.85rem;
  color: var(--text-dark);
  font-weight: 600;
  line-height: 1.4;
}
.sc-contents-list li::before {
  content: '';
  width: 6px; height: 6px;
  background: var(--orange);
  border-radius: 50%;
  flex-shrink: 0;
  margin-top: 5px;
  transition: transform 0.2s ease;
}
.sc-card:hover .sc-contents-list li::before {
  transform: scale(1.4);
}

/* CTA button */
.sc-card-cta {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 13px 18px;
  border-radius: 5px;
  background: #F8F5F2;
  text-decoration: none;
  transition: background 0.25s, transform 0.2s;
  font-family: 'Nunito', sans-serif;
}
.sc-card-cta:hover { background: var(--orange-pale); transform: translateX(3px); }

.sc-card-cta span {
  font-size: 0.85rem;
  font-weight: 800;
  color: var(--text-dark);
  transition: color 0.2s;
}
.sc-card:hover .sc-card-cta span { color: var(--orange); }

.sc-cta-arrow {
  width: 30px; height: 30px;
  background: var(--orange);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  color: #fff;
  font-size: 0.75rem;
  transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1);
  flex-shrink: 0;
}
.sc-card:hover .sc-cta-arrow { transform: translateX(4px) scale(1.15); }

/* Scroll-reveal animation classes */
.sc-card.reveal {
  animation: scCardReveal 0.6s cubic-bezier(0.34,1.2,0.64,1) forwards;
}
.sc-card:nth-child(1) { animation-delay: 0.05s; }
.sc-card:nth-child(2) { animation-delay: 0.18s; }
.sc-card:nth-child(3) { animation-delay: 0.31s; }

@keyframes scCardReveal {
  from { opacity: 0; transform: translateY(40px) scale(0.97); }
  to   { opacity: 1; transform: translateY(0)    scale(1); }
}

/* ═══════════════════════════════════════════════════════
   SERVICES SECTION
═══════════════════════════════════════════════════════ */
.se-services-section {
  font-family: 'Nunito', sans-serif;
  padding: 80px 40px 90px;
  background: #fff;
  overflow: hidden;
}
.se-services-inner { max-width: 1200px; margin: 0 auto; }
.se-section-badge {
  display: flex; align-items: center; justify-content: center;
  gap: 8px; font-size: 0.82rem; font-weight: 800;
  color: var(--se-orange); letter-spacing: 0.6px; margin-bottom: 12px;
}
.se-section-badge::before {
  content: ''; width: 8px; height: 8px;
  background: var(--se-orange); border-radius: 50%;
}
.se-section-title {
  text-align: center; font-size: clamp(1.8rem,3vw,2.4rem);
  font-weight: 900; color: var(--se-navy);
  margin: 0 0 52px; line-height: 1.2;
}
.se-slider-wrap { position: relative; overflow: hidden; }
.se-slider-track {
  display: flex; gap: 28px;
  transition: transform 0.45s cubic-bezier(0.4,0,0.2,1);
  will-change: transform;
}
.se-service-card {
  flex: 0 0 calc((100% - 56px) / 3);
  background: #fff; border: 1px solid #F0EDE9;
  border-radius: 16px; padding: 32px 28px 28px;
  transition: box-shadow 0.25s, transform 0.25s;
}
.se-service-card:hover { box-shadow: 0 12px 36px rgba(255,107,43,0.12); transform: translateY(-4px); }
.se-card-icon-wrap {
  width: 60px; height: 60px; background: var(--se-orange-pale);
  border-radius: 14px; display: flex; align-items: center;
  justify-content: center; margin-bottom: 22px;
  font-size: 1.5rem; color: var(--se-orange);
}
.se-card-title { font-size: 1.05rem; font-weight: 800; color: var(--se-navy); margin: 0 0 10px; line-height: 1.3; }
.se-card-desc  { font-size: 0.88rem; color: var(--se-muted); line-height: 1.7; margin: 0 0 22px; }
.se-card-link  {
  display: inline-flex; align-items: center; gap: 6px;
  font-size: 0.88rem; font-weight: 800; color: var(--se-orange);
  text-decoration: none; transition: gap 0.2s;
}
.se-card-link:hover { gap: 10px; }
.se-card-link i { font-size: 0.8rem; }
.se-slider-dots { display: flex; justify-content: center; gap: 8px; margin-top: 36px; }
.se-dot {
  width: 28px; height: 6px; border-radius: 3px;
  background: #E0D8D0; border: none; cursor: pointer; padding: 0;
  transition: background 0.2s, width 0.2s;
}
.se-dot.active { background: var(--se-orange); width: 44px; }

/* ═══════════════════════════════════════════════════════
   CTA SECTION
═══════════════════════════════════════════════════════ */
.se-cta-section {
  font-family: 'Nunito', sans-serif;
  background: linear-gradient(135deg, #FFF5EF 0%, #FFE8D6 100%);
  padding: 0 40px; overflow: hidden; position: relative;
}
.se-cta-inner {
  max-width: 1200px; margin: 0 auto;
  display: flex; align-items: flex-end; gap: 60px; min-height: 460px;
}
.se-cta-image-wrap { flex-shrink:0; width:280px; align-self:flex-end; position:relative; }
.se-cta-person { width:100%; display:block; border-radius:50% 50% 0 0/30% 30% 0 0; object-fit:cover; object-position:top; }
.se-cta-person-placeholder {
  width:280px; height:340px;
  background: linear-gradient(180deg,#FFB380 0%,#FF8C55 100%);
  border-radius:50% 50% 0 0/30% 30% 0 0;
  display:flex; flex-direction:column; align-items:center;
  justify-content:flex-start; padding-top:36px; overflow:hidden; flex-shrink:0;
}
.se-cta-person-placeholder::before { content:''; width:72px; height:72px; background:#FF6B2B; border-radius:50%; margin-bottom:10px; flex-shrink:0; }
.se-cta-person-placeholder::after  { content:''; width:150px; height:200px; background:#FF7A42; border-radius:50% 50% 0 0; flex-shrink:0; }
.se-cta-sparkle {
  position:absolute; top:60px; right:-20px;
  font-size:2.8rem; color:var(--se-orange); opacity:0.9;
  animation:seSparkle 3s ease-in-out infinite; line-height:1;
}
@keyframes seSparkle { 0%,100%{transform:scale(1) rotate(0)} 50%{transform:scale(1.15) rotate(15deg)} }
.se-cta-content { flex:1; padding:60px 0; }
.se-cta-title { font-size:clamp(1.8rem,3vw,2.5rem); font-weight:900; color:var(--se-navy); line-height:1.25; margin:0 0 20px; }
.se-cta-title .orange { color:var(--se-orange); }
.se-cta-desc { font-size:0.95rem; color:var(--se-muted); line-height:1.75; max-width:500px; margin:0 0 36px; }
.se-cta-btn {
  display:inline-block; background:var(--se-orange); color:#fff;
  font-family:'Nunito',sans-serif; font-weight:800; font-size:0.95rem;
  padding:15px 36px; border-radius:40px; text-decoration:none;
  box-shadow:0 8px 28px rgba(255,107,43,0.38);
  transition:transform 0.2s, box-shadow 0.2s;
}
.se-cta-btn:hover { transform:translateY(-2px); box-shadow:0 14px 34px rgba(255,107,43,0.48); }

/* ═══════════════════════════════════════════════════════
   RESPONSIVE
═══════════════════════════════════════════════════════ */
@media (max-width: 1024px) {
  .hero-inner { gap: 30px; }
  .image-wrapper { width: 360px; height: 420px; }
  .blob-bg { width: 320px; height: 340px; }
  .sc-grid { grid-template-columns: repeat(3, 1fr); gap: 20px; }
}
@media (max-width: 900px) {
  .sc-grid { grid-template-columns: repeat(2, 1fr); }
  .sc-courses-section { padding: 70px 24px 80px; }
  .sc-card:nth-child(3) { grid-column: 1 / -1; max-width: 480px; margin: 0 auto; width: 100%; }
}
@media (max-width: 860px) {
  .hero-section { padding: 50px 24px 60px; }
  .hero-inner { flex-direction: column; align-items: center; text-align: center; }
  .hero-left { max-width: 100%; }
  .hero-badge { margin: 0 auto 20px; }
  .hero-desc { margin-left: auto; margin-right: auto; }
  .hero-btns { justify-content: center; }
  .hero-stats { justify-content: center; }
  .hero-stats .stat-item:not(:last-child) { padding-right: 28px; }
  .wave-decor { justify-content: center; }
  .hero-right { width: 100%; display: flex; justify-content: center; }
  .image-wrapper { width: 320px; height: 380px; }
  .blob-bg { width: 280px; height: 300px; }
  .person-placeholder { width: 260px; height: 340px; }
  .float-card { display: none; }
  .se-service-card { flex: 0 0 calc((100% - 28px) / 2); }
}
@media (max-width: 600px) {
  .sc-grid { grid-template-columns: 1fr; }
  .sc-card:nth-child(3) { grid-column: auto; max-width: 100%; }
  .sc-courses-section { padding: 60px 20px 70px; }
}
@media (max-width: 520px) {
  .hero-section { padding: 40px 20px 50px; }
  .hero-title { font-size: 2rem; }
  .hero-desc { font-size: 0.95rem; }
  .hero-stats { gap: 20px; }
  .hero-stats .stat-item:not(:last-child) { padding-right: 20px; }
  .stat-num { font-size: 1.4rem; }
  .image-wrapper { width: 280px; height: 330px; }
  .blob-bg { width: 250px; height: 270px; }
  .person-placeholder { width: 230px; height: 300px; }
}
@media (max-width: 768px) {
  .se-services-section { padding: 60px 24px 70px; }
  .se-service-card { flex: 0 0 100%; }
  .se-cta-section { padding: 0 24px; }
  .se-cta-inner { flex-direction: column; align-items: center; text-align: center; min-height: auto; gap: 0; }
  .se-cta-image-wrap { width: 220px; order: 2; }
  .se-cta-person-placeholder { width: 220px; height: 270px; }
  .se-cta-content { padding: 50px 0 30px; order: 1; }
  .se-cta-desc { margin-left: auto; margin-right: auto; }
  .se-cta-sparkle { top: 20px; right: 10px; font-size: 2rem; }
}
</style>

<!-- ═══════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════ -->
<section class="hero-section">
  <div class="hero-inner">
    <div class="hero-left">
      <div class="wave-decor">
        <div class="wave-bar"></div><div class="wave-bar"></div>
        <div class="wave-bar"></div><div class="wave-bar"></div>
        <div class="wave-bar"></div><div class="wave-bar"></div>
      </div>
      <div class="hero-badge"><?php echo htmlspecialchars($badge_text); ?></div>
      <h1 class="hero-title">
        <?php echo htmlspecialchars($title_line1); ?>
        <span class="highlight"><?php echo htmlspecialchars($title_highlight); ?></span><br>
        <?php echo htmlspecialchars($title_line2); ?>
      </h1>
      <p class="hero-desc"><?php echo htmlspecialchars($description); ?></p>
      <div class="hero-btns">
        <a href="<?php echo htmlspecialchars($btn_primary_url); ?>" class="btn-primary"><?php echo htmlspecialchars($btn_primary); ?></a>
        <a href="<?php echo htmlspecialchars($btn_outline_url); ?>"  class="btn-outline"><?php echo htmlspecialchars($btn_outline); ?></a>
      </div>
      <div class="hero-stats">
        <?php foreach ($stats as $s): ?>
          <div class="stat-item">
            <span class="stat-num"><?php echo htmlspecialchars($s['num']); ?></span>
            <span class="stat-label"><?php echo htmlspecialchars($s['label']); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="hero-right">
      <div class="image-wrapper">
        <div class="blob-bg"></div>
        <?php if (!empty($person_image)): ?>
          <img class="person-img" src="<?php echo htmlspecialchars($person_image); ?>" alt="Spoken English Teacher">
        <?php else: ?>
          <div class="person-placeholder"></div>
        <?php endif; ?>
        <?php foreach ($hero_cards as $c): ?>
          <div class="float-card <?php echo $c['class']; ?>">
            <div class="card-icon <?php echo $c['icon_class']; ?>"><?php echo $c['icon']; ?></div>
            <div class="card-meta">
              <span class="card-num"><?php echo htmlspecialchars($c['num']); ?></span>
              <span class="card-txt"><?php echo htmlspecialchars($c['txt']); ?></span>
            </div>
          </div>
        <?php endforeach; ?>
        <div class="sparkle sparkle-1">✦</div>
        <div class="sparkle sparkle-2">✦</div>
        <div class="sparkle sparkle-3">✦</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     OUR PROVIDED COURSES
═══════════════════════════════════════════════ -->
<section class="sc-courses-section" id="courses">
  <div class="sc-courses-inner">

    <div class="sc-header">
      <div class="sc-badge"><?php echo htmlspecialchars($courses_badge); ?></div>
      <h2 class="sc-title">Our Provided <span>Courses</span></h2>
      <p class="sc-subtitle"><?php echo htmlspecialchars($courses_subtitle); ?></p>
    </div>

    <div class="sc-grid" id="scGrid">
      <?php foreach ($courses as $course): ?>
        <div class="sc-card <?php echo $course['featured'] ? 'featured' : ''; ?>">

          <div class="sc-card-accent"></div>

          <div class="sc-card-body">
            <!-- Top row: level pill + optional popular tag -->
            <div class="sc-card-top">
              <span class="sc-level-pill <?php echo $course['color']; ?>">
                <i class="<?php echo $course['icon']; ?>"></i>
                <?php echo htmlspecialchars($course['level']); ?>
              </span>
              <?php if ($course['featured']): ?>
                <span class="sc-popular-tag">⭐ Most Popular</span>
              <?php endif; ?>
            </div>

            <!-- Icon -->
            <div class="sc-icon-circle <?php echo $course['color']; ?>">
              <i class="<?php echo $course['icon']; ?>"></i>
            </div>

            <!-- Title + tag -->
            <h3 class="sc-card-title"><?php echo htmlspecialchars($course['title']); ?></h3>
            <p class="sc-card-tag"><?php echo htmlspecialchars($course['tag']); ?></p>

            <!-- Duration badges -->
            <div class="sc-duration-row">
              <span class="sc-duration-badge">
                <i class="fas fa-clock"></i>
                <?php echo htmlspecialchars($course['duration_nt']); ?>
              </span>
              <span class="sc-duration-badge">
                <i class="fas fa-bolt"></i>
                <?php echo htmlspecialchars($course['duration_ft']); ?>
              </span>
            </div>

            <div class="sc-divider"></div>

            <!-- Contents list -->
            <p class="sc-contents-title">Course Contents</p>
            <ul class="sc-contents-list">
              <?php foreach ($course['contents'] as $item): ?>
                <li><?php echo htmlspecialchars($item); ?></li>
              <?php endforeach; ?>
            </ul>

            <!-- CTA -->
            <a href="#enroll" class="sc-card-cta">
              <span>Enroll Now</span>
              <div class="sc-cta-arrow"><i class="fas fa-arrow-right"></i></div>
            </a>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════
     OUR PROVIDED SERVICES
═══════════════════════════════════════════════ -->
<section class="se-services-section">
  <div class="se-services-inner">
    <div class="se-section-badge"><?php echo htmlspecialchars($services_badge); ?></div>
    <h2 class="se-section-title"><?php echo htmlspecialchars($services_title); ?></h2>
    <div class="se-slider-wrap">
      <div class="se-slider-track" id="seSliderTrack">
        <?php foreach ($services as $service): ?>
          <div class="se-service-card">
            <div class="se-card-icon-wrap"><i class="<?php echo htmlspecialchars($service['icon']); ?>"></i></div>
            <h3 class="se-card-title"><?php echo htmlspecialchars($service['title']); ?></h3>
            <p class="se-card-desc"><?php echo htmlspecialchars($service['desc']); ?></p>
            <a href="<?php echo htmlspecialchars($service['link']); ?>" class="se-card-link">
              Learn More <i class="fas fa-chevron-right"></i>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="se-slider-dots" id="seSliderDots"></div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     CTA SECTION
═══════════════════════════════════════════════ -->
<section class="se-cta-section">
  <div class="se-cta-inner">
    <div class="se-cta-image-wrap">
      <?php if (!empty($cta_person_image)): ?>
        <img class="se-cta-person" src="<?php echo htmlspecialchars($cta_person_image); ?>" alt="English Teacher">
      <?php else: ?>
        <div class="se-cta-person-placeholder"></div>
      <?php endif; ?>
      <span class="se-cta-sparkle">✦</span>
    </div>
    <div class="se-cta-content">
      <h2 class="se-cta-title">
        <?php echo htmlspecialchars($cta_title_plain1); ?>
        <span class="orange"><?php echo htmlspecialchars($cta_title_orange1); ?></span>
        <?php echo htmlspecialchars($cta_title_plain2); ?><br>
        <span class="orange"><?php echo htmlspecialchars($cta_title_orange2); ?></span>
        <?php echo htmlspecialchars($cta_title_plain3); ?>
      </h2>
      <p class="se-cta-desc"><?php echo htmlspecialchars($cta_desc); ?></p>
      <a href="<?php echo htmlspecialchars($cta_btn_url); ?>" class="se-cta-btn">
        <?php echo htmlspecialchars($cta_btn_text); ?>
      </a>
    </div>
  </div>
</section>

<script>
/* ── Services Slider ── */
(function () {
  const track  = document.getElementById('seSliderTrack');
  const dotsEl = document.getElementById('seSliderDots');
  if (!track || !dotsEl) return;
  const cards = Array.from(track.children);
  let idx = 0, max = 0, timer = null;

  function visible() {
    const w = window.innerWidth;
    return w <= 768 ? 1 : w <= 960 ? 2 : 3;
  }
  function cardW() { return cards[0] ? cards[0].offsetWidth + 28 : 0; }
  function buildDots() {
    dotsEl.innerHTML = '';
    for (let i = 0; i <= max; i++) {
      const b = document.createElement('button');
      b.className = 'se-dot' + (i === idx ? ' active' : '');
      b.setAttribute('aria-label', 'Slide ' + (i+1));
      b.addEventListener('click', () => go(i));
      dotsEl.appendChild(b);
    }
  }
  function go(i) {
    idx = Math.max(0, Math.min(i, max));
    track.style.transform = 'translateX(-' + idx * cardW() + 'px)';
    Array.from(dotsEl.children).forEach((d, j) => d.classList.toggle('active', j === idx));
  }
  function setup() {
    max = Math.max(0, cards.length - visible());
    if (idx > max) idx = max;
    buildDots(); go(idx);
  }
  function auto() { clearInterval(timer); timer = setInterval(() => go(idx < max ? idx + 1 : 0), 3500); }
  track.addEventListener('mouseenter', () => clearInterval(timer));
  track.addEventListener('mouseleave', auto);
  let tx = 0;
  track.addEventListener('touchstart', e => { tx = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend', e => {
    const d = tx - e.changedTouches[0].clientX;
    if (Math.abs(d) > 50) go(d > 0 ? idx + 1 : idx - 1);
  });
  setup(); auto();
  window.addEventListener('resize', setup);
})();

/* ── Courses scroll-reveal ── */
(function () {
  const cards = document.querySelectorAll('.sc-card');
  if (!cards.length) return;

  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('reveal');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  cards.forEach(c => io.observe(c));
})();
</script>

<?php include '../../includes/footer.php'; ?>