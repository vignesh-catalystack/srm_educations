<?php include '../../includes/header.php'; ?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&family=Nunito:wght@400;500;600;700&display=swap');

  :root{
    --font-head:'Rajdhani',sans-serif;
    --font-body:'Nunito',sans-serif;
    --red:#0b1f4d;
    --red2:#071433;
    --red-rgb:11,31,77;
    --sky:#1a7fc1;
    --gold:#f6cb42;
  }

  *{
    margin:0;
    padding:0;
    box-sizing:border-box;
  }

  body{
    font-family:var(--font-body);
  }
/* ===============================
   MODERN HERO – PREMIUM VERSION
================================= */

.computer-hero{
  width:100%;
  aspect-ratio:16 / 7;
  position:relative;
  overflow:hidden;
  display:flex;
  align-items:center;
  background:linear-gradient(120deg,#f8faff,#eef2ff);
}

/* Fallback */
@supports not (aspect-ratio: 16 / 7){
  .computer-hero{
    height:43.75vw;
  }
}

/* Subtle grid background */
.computer-hero::before{
  content:"";
  position:absolute;
  inset:0;
  background-image:linear-gradient(rgba(0,0,0,0.03) 1px, transparent 1px),
                   linear-gradient(90deg, rgba(0,0,0,0.03) 1px, transparent 1px);
  background-size:40px 40px;
  z-index:0;
}

/* Animated gradient glow */
.computer-hero::after{
  content:"";
  position:absolute;
  width:500px;
  height:500px;
  background:radial-gradient(circle,var(--sky) 0%, transparent 70%);
  top:-150px;
  right:-100px;
  opacity:0.15;
  animation:glowMove 12s ease-in-out infinite alternate;
  z-index:0;
}

@keyframes glowMove{
  from{ transform:translateY(0); }
  to{ transform:translateY(60px); }
}

.computer-hero .container{
  max-width:1300px;
  margin:auto;
  width:100%;
  padding:60px 20px;
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:60px;
  height:100%;
  position:relative;
  z-index:2;
}

/* LEFT SIDE */
.hero-left{
  flex:1;
  color:var(--red);
  animation:fadeUp 1s ease forwards;
}

@keyframes fadeUp{
  from{ opacity:0; transform:translateY(30px); }
  to{ opacity:1; transform:translateY(0); }
}

.hero-label{
  display:inline-block;
  background:rgba(var(--red-rgb),0.08);
  color:var(--red);
  font-weight:600;
  font-size:13px;
  padding:6px 14px;
  border-radius:30px;
  margin-bottom:18px;
}

.hero-left h1{
  font-family:var(--font-head);
  font-size:50px;
  font-weight:700;
  line-height:1.15;
  margin-bottom:18px;
}

.hero-left h1 span{
  background:linear-gradient(90deg,var(--gold),#ff9f1c);
  -webkit-background-clip:text;
  -webkit-text-fill-color:transparent;
}

.hero-left p{
  font-size:16px;
  max-width:520px;
  color:#555;
  margin-bottom:28px;
  line-height:1.6;
}

/* FEATURES */
.hero-features{
  display:grid;
  gap:8px;
  font-size:14px;
  margin-bottom:28px;
}

/* BUTTONS */
.hero-buttons{
  display:flex;
  gap:15px;
  margin-bottom:35px;
}

.hero-btn{
  padding:13px 30px;
  border-radius:40px;
  font-weight:600;
  text-decoration:none;
  transition:all .3s ease;
  position:relative;
  overflow:hidden;
}

.hero-btn.primary{
  background:linear-gradient(135deg,var(--red),var(--red2));
  color:#fff;
  box-shadow:0 10px 30px rgba(var(--red-rgb),0.25);
}

.hero-btn.primary:hover{
  transform:translateY(-4px);
  box-shadow:0 15px 40px rgba(var(--red-rgb),0.35);
}

.hero-btn.secondary{
  border:2px solid var(--red);
  color:var(--red);
  background:#fff;
}

.hero-btn.secondary:hover{
  background:var(--red);
  color:#fff;
}

/* GLASS STATS */
.hero-stats{
  display:flex;
  gap:25px;
}

.hero-stats div{
  backdrop-filter:blur(10px);
  background:rgba(255,255,255,0.6);
  padding:18px 25px;
  border-radius:14px;
  box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

.hero-stats h3{
  font-family:var(--font-head);
  font-size:22px;
  margin-bottom:4px;
  color:var(--red);
}

.hero-stats span{
  font-size:12px;
  color:#666;
}

/* RIGHT SIDE */
.hero-right{
  flex:1;
  text-align:right;
  position:relative;
}

.hero-right img{
  max-width:480px;
  width:100%;
  animation:floatImage 6s ease-in-out infinite;
  filter:drop-shadow(0 20px 40px rgba(0,0,0,0.15));
}

@keyframes floatImage{
  0%{ transform:translateY(0); }
  50%{ transform:translateY(-18px); }
  100%{ transform:translateY(0); }
}

/* Floating abstract blobs */
.computer-hero .blob{
  position:absolute;
  border-radius:50%;
  opacity:0.15;
  animation:blobFloat 14s ease-in-out infinite alternate;
}

.blob.one{
  width:200px;
  height:200px;
  background:var(--gold);
  top:15%;
  left:10%;
}

.blob.two{
  width:150px;
  height:150px;
  background:var(--sky);
  bottom:10%;
  right:25%;
}

@keyframes blobFloat{
  from{ transform:translateY(0); }
  to{ transform:translateY(50px); }
}

/* RESPONSIVE */
@media(max-width:992px){
  .computer-hero{
    aspect-ratio:auto;
    min-height:650px;
  }

  .computer-hero .container{
    flex-direction:column;
    text-align:center;
  }

  .hero-right{
    text-align:center;
    margin-top:40px;
  }

  .hero-buttons{
    justify-content:center;
    flex-wrap:wrap;
  }

  .hero-stats{
    justify-content:center;
    flex-wrap:wrap;
  }
}

.courses-section{
  padding:110px 20px;
  background:#f4f6fb;
}

.courses-section .container{
  max-width:1400px;
  margin:auto;
}

.section-title{
  text-align:center;
  font-family:var(--font-head);
  font-size:36px;
  font-weight:700;
  color:var(--red);
  margin-bottom:70px;
}

/* GRID */
.course-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:35px;
}

/* CARD */
.course-card{
  background:#fff;
  border-radius:16px;
  overflow:hidden;
  box-shadow:0 12px 35px rgba(0,0,0,0.05);
  transition:all 0.35s cubic-bezier(.4,0,.2,1);
  display:flex;
  flex-direction:column;
}

.course-card:hover{
  transform:translateY(-10px);
  box-shadow:0 25px 60px rgba(0,0,0,0.12);
}

/* IMAGE */
.course-image{
  height:190px;
  background: linear-gradient(to top, #dce8ff 0%, #f4f6fb 100%);
  display:flex;
  align-items:center;
  justify-content:center;
}

.course-image img{
  width:100px;
  animation:floatImg 4s ease-in-out infinite;
}

/* BODY */
.course-body{
  padding:24px;
}

.course-body h3{
  font-family:var(--font-head);
  font-size:19px;
  font-weight:700;
  color:#1c1c1c;
  margin-bottom:10px;
  line-height:1.4;
}

/* Rating */
.course-rating{
  display:flex;
  align-items:center;
  gap:6px;
  margin-bottom:12px;
  font-size:14px;
}

.rating-score{
  font-weight:700;
  color:#222;
}

.stars{
  color:#f4b400;
  letter-spacing:2px;
  font-size:14px;
}

.rating-count{
  color:#777;
}

/* Description */
.course-body p{
  font-size:14px;
  color:#555;
  line-height:1.6;
  margin-bottom:18px;
}

/* Duration */
.course-duration{
  display:inline-block;
  font-size:13px;
  font-weight:600;
  background:rgba(var(--red-rgb),0.08);
  color:var(--red);
  padding:7px 16px;
  border-radius:25px;
}

/* Animation */
@keyframes floatImg{
  0%{ transform:translateY(0); }
  50%{ transform:translateY(-6px); }
  100%{ transform:translateY(0); }
}

/* Responsive */
@media(max-width:1200px){
  .course-grid{
    grid-template-columns:repeat(3,1fr);
  }
}

@media(max-width:768px){
  .course-grid{
    grid-template-columns:1fr;
  }
}
</style>

<section class="computer-hero">
  <div class="container">

    <div class="hero-left">

      <div class="hero-label">Professional Computer Training Institute</div>

      <h1>
        Training That Helps <br>
        <span>You Succeed</span>
      </h1>

      <p>
        Industry-focused computer courses designed to build real-world
        skills in Programming, Accounting, Design, and Networking.
      </p>

      <div class="hero-features">
        <div>✔ 100% Practical Sessions</div>
        <div>✔ Experienced Trainers</div>
        <div>✔ Placement Support</div>
      </div>

      <div class="hero-buttons">
        <a href="#courses" class="hero-btn primary">Explore Courses</a>
        <a href="#contact" class="hero-btn secondary">Get Admission</a>
      </div>

      <div class="hero-stats">
        <div>
          <h3>12+</h3>
          <span>Courses</span>
        </div>
        <div>
          <h3>5,000+</h3>
          <span>Students Trained</span>
        </div>
        <div>
          <h3>8+</h3>
          <span>Years Experience</span>
        </div>
      </div>

    </div>

    <div class="hero-right">
      <img src="../../assets/icons/girl.png" alt="Student">
    </div>

    <!-- Decorative Background Shape -->
    <div class="hero-bg-shape"></div>

  </div>

  <div class="blob one"></div>
<div class="blob two"></div>
</section>


<section class="courses-section">
  <div class="container">

    <h2 class="section-title">Courses Offered</h2>

    <div class="course-grid">

  <!-- DCA -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/girl2.png" alt="">
  </div>
  <div class="course-body">
    <h3>DCA – Diploma in Computer Applications</h3>
    <div class="course-rating">
      <span class="rating-score">4.7</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(1,245)</span>
    </div>
    <p>Windows • Intro to Computer • MS-Office • Internet • HTML • C & C++</p>
    <div class="course-duration">NT 4 Months | FT 2 Months</div>
  </div>
</div>

<!-- DOM -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/star.png" alt="">
  </div>
  <div class="course-body">
    <h3>DOM – Diploma in Office Management</h3>
    <div class="course-rating">
      <span class="rating-score">4.6</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(980)</span>
    </div>
    <p>Windows • MS-Office • Internet • HTML • Tally Prime • GST</p>
    <div class="course-duration">NT 4 Months | FT 2 Months</div>
  </div>
</div>

<!-- PGDCA -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/computer2.png" alt="">
  </div>
  <div class="course-body">
    <h3>PGDCA – Post Graduate Diploma in Computer Applications</h3>
    <div class="course-rating">
      <span class="rating-score">4.8</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(2,341)</span>
    </div>
    <p>MS-Office • C & C++ • Java • Python • DTP • Hardware & Networking</p>
    <div class="course-duration">NT 12 Months | FT 6 Months</div>
  </div>
</div>

<!-- Hardware & Networking -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/girl.png" alt="">
  </div>
  <div class="course-body">
    <h3>Hardware & Networking</h3>
    <div class="course-rating">
      <span class="rating-score">4.5</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(765)</span>
    </div>
    <p>DOS • Networking • Assembling • Troubleshooting • LAN • Windows Server</p>
    <div class="course-duration">NT 12 Weeks | FT 6 Weeks</div>
  </div>
</div>

<!-- DCA + Java -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/girl.png" alt="">
  </div>
  <div class="course-body">
    <h3>DCA + Java</h3>
    <div class="course-rating">
      <span class="rating-score">4.7</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(1,120)</span>
    </div>
    <p>MS-Office • Internet • HTML • C & C++ • Core Java</p>
    <div class="course-duration">NT 6 Months | FT 3 Months</div>
  </div>
</div>

<!-- DCA Basic -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/girl.png" alt="">
  </div>
  <div class="course-body">
    <h3>DCA Basic</h3>
    <div class="course-rating">
      <span class="rating-score">4.4</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(540)</span>
    </div>
    <p>Intro to Computer • MS-Word • MS-Excel • PowerPoint • HTML</p>
    <div class="course-duration">NT 2 Months | FT 1 Month</div>
  </div>
</div>

<!-- Tally Prime + GST -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/girl.png" alt="">
  </div>
  <div class="course-body">
    <h3>Tally Prime + GST</h3>
    <div class="course-rating">
      <span class="rating-score">4.6</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(880)</span>
    </div>
    <p>GST • Sales & Purchase • Tax Deduction • Financial Reports</p>
    <div class="course-duration">NT 2 Months | FT 1 Month</div>
  </div>
</div>

<!-- HDCA -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/girl.png" alt="">
  </div>
  <div class="course-body">
    <h3>HDCA – Higher Diploma in Computer Applications</h3>
    <div class="course-rating">
      <span class="rating-score">4.8</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(1,950)</span>
    </div>
    <p>Basic Computer • DTP • Corel Draw • Photoshop • Networking</p>
    <div class="course-duration">NT 12 Months | FT 6 Months</div>
  </div>
</div>

<!-- ADCA -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/girl.png" alt="">
  </div>
  <div class="course-body">
    <h3>ADCA – Advanced Diploma in Computer Applications</h3>
    <div class="course-rating">
      <span class="rating-score">4.9</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(2,780)</span>
    </div>
    <p>MS-Office • C & C++ • Core Java • Python • Excel Advanced</p>
    <div class="course-duration">NT 8 Months | FT 4 Months</div>
  </div>
</div>

<!-- DTP Designer -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/girl.png" alt="">
  </div>
  <div class="course-body">
    <h3>DTP Designer</h3>
    <div class="course-rating">
      <span class="rating-score">4.5</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(620)</span>
    </div>
    <p>Corel Draw • Photoshop CS • Design Principles</p>
    <div class="course-duration">NT 12 Weeks | FT 6 Weeks</div>
  </div>
</div>

<!-- Spoken English -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/girl.png" alt="">
  </div>
  <div class="course-body">
    <h3>Spoken English</h3>
    <div class="course-rating">
      <span class="rating-score">4.6</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(1,130)</span>
    </div>
    <p>Level I (Basic/Kids) • Level II • Level III</p>
    <div class="course-duration">NT 12 Weeks | FT 6 Weeks</div>
  </div>
</div>

<!-- Smart Kids -->
<div class="course-card">
  <div class="course-image">
    <img src="../../assets/icons/computer.png" alt="">
  </div>
  <div class="course-body">
    <h3>Smart Kids</h3>
    <div class="course-rating">
      <span class="rating-score">4.4</span>
      <span class="stars">★★★★★</span>
      <span class="rating-count">(410)</span>
    </div>
    <p>Basic Computer • Windows • Typing • Basic Animation</p>
    <div class="course-duration">1 Month</div>
  </div>
</div>
</section>
<?php include '../../includes/footer.php'; ?>