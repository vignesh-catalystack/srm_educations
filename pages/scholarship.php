<?php 
include_once '../includes/header.php'; 
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    :root {
        --srm-navy: #1E293B;
        --srm-blue: #F59E0B;
        --srm-gold: #F59E0B;
        --srm-green: #F59E0B;
        --srm-red: #D32F2F;
        --srm-light: #F8FAFC;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    
    html { scroll-behavior: smooth; }
    
    body { 
        font-family: 'Inter', sans-serif; 
        color: var(--srm-navy);
        overflow-x: hidden;
        background: #F8FAFC;
    }

    /* Hero Section */
    .scholarship-hero {
        min-height: 90vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image:
            linear-gradient(135deg, rgba(30,41,59,0.94) 0%, rgba(30,41,59,0.84) 48%, rgba(30,41,59,0.94) 100%),
            url('../assets/images/scholarship-hero-bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow: hidden;
    }

    .scholarship-hero::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(245,158,11,0.16) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: gridMove 20s linear infinite;
    }

    .scholarship-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 42%, rgba(245,158,11,0.08), rgba(30,41,59,0.45) 70%);
        pointer-events: none;
    }

    @keyframes gridMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    .scholarship-particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(245,158,11,0.6);
        border-radius: 50%;
        animation: floatParticle 15s infinite;
    }

    .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { left: 20%; animation-delay: 2s; }
    .particle:nth-child(3) { left: 30%; animation-delay: 4s; }
    .particle:nth-child(4) { left: 40%; animation-delay: 1s; }
    .particle:nth-child(5) { left: 50%; animation-delay: 3s; }
    .particle:nth-child(6) { left: 60%; animation-delay: 5s; }
    .particle:nth-child(7) { left: 70%; animation-delay: 2.5s; }
    .particle:nth-child(8) { left: 80%; animation-delay: 4.5s; }

    @keyframes floatParticle {
        0%, 100% { transform: translateY(100vh) scale(0); opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { transform: translateY(-100vh) scale(1); }
    }

    .hero-content {
        position: relative;
        z-index: 10;
        text-align: center;
        padding: 0 1.5rem;
        max-width: 1200px;
        margin: 0 auto;
        text-shadow: 0 2px 10px rgba(30,41,59,0.45);
    }

    .scholarship-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1.75rem;
        background: rgba(30,41,59,0.55);
        border: 2px solid rgba(245,158,11,0.55);
        border-radius: 50px;
        color: #F59E0B;
        font-size: 0.9375rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 2rem;
        backdrop-filter: blur(12px);
        box-shadow: 0 10px 26px rgba(30,41,59,0.28);
        animation: fadeInDown 0.8s ease-out;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-title {
        font-size: clamp(2.5rem, 8vw, 5.5rem);
        font-weight: 900;
        color: #F8FAFC;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        font-family: 'Space Grotesk', sans-serif;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    .hero-title .highlight {
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
        display: inline-block;
        text-shadow: none;
    }

    .percentage-circle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 180px;
        height: 180px;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        border-radius: 50%;
        margin: 2rem auto;
        box-shadow: 0 16px 46px rgba(245,158,11,0.38);
        animation: pulse 2s ease-in-out infinite;
        position: relative;
        border: 3px solid rgba(248,250,252,0.18);
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); box-shadow: 0 20px 60px rgba(245,158,11,0.4); }
        50% { transform: scale(1.05); box-shadow: 0 25px 70px rgba(245,158,11,0.6); }
    }

    .percentage-circle::before {
        content: '';
        position: absolute;
        width: 140px;
        height: 140px;
        background: linear-gradient(135deg, #1E293B, #1E293B);
        border-radius: 50%;
        box-shadow: inset 0 0 0 2px rgba(248,250,252,0.08);
    }

    .percentage-text {
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .percentage-number {
        font-size: 4rem;
        font-weight: 900;
        color: #F59E0B;
        font-family: 'Space Grotesk', sans-serif;
        line-height: 1;
    }

    .percentage-label {
        font-size: 0.875rem;
        color: #F8FAFC;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        margin-top: 0.25rem;
    }

    .hero-subtitle {
        font-size: clamp(1.125rem, 3vw, 1.5rem);
        color: rgba(248,250,252,0.94);
        max-width: 700px;
        margin: 2rem auto;
        line-height: 1.6;
        font-weight: 600;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .cta-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1.5rem 3rem;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #1E293B;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.125rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 16px 42px rgba(245,158,11,0.38);
        transition: all 0.3s ease;
        animation: fadeInUp 0.8s ease-out 0.6s both;
    }

    .cta-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 22px 56px rgba(245,158,11,0.52);
    }

    /* Main Content Section */
    .main-content {
        padding: 6rem 1.5rem;
        background: #F8FAFC;
    }

    .content-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
        animation: fadeInUp 0.8s ease-out;
    }

    .section-badge {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(245,158,11,0.1));
        border: 1px solid rgba(245,158,11,0.3);
        border-radius: 50px;
        color: #F59E0B;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 900;
        color: #1E293B;
        margin-bottom: 1rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .section-subtitle {
        font-size: 1.25rem;
        color: #1E293B;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Eligibility Grid */
    .eligibility-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .eligibility-card {
        background: #F8FAFC;
        padding: 2.5rem;
        border-radius: 1.5rem;
        border: 2px solid #F8FAFC;
        box-shadow: 0 10px 40px rgba(30,41,59,0.05);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .eligibility-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, #F59E0B, #F59E0B);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }

    .eligibility-card:hover::before {
        transform: scaleX(1);
    }

    .eligibility-card:hover {
        transform: translateY(-10px);
        border-color: #F59E0B;
        box-shadow: 0 25px 60px rgba(245,158,11,0.15);
    }

    .card-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        border-radius: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #F8FAFC;
        margin-bottom: 1.5rem;
        box-shadow: 0 10px 30px rgba(245,158,11,0.3);
    }

    .card-title {
        font-size: 1.75rem;
        font-weight: 900;
        color: #1E293B;
        margin-bottom: 1rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .card-description {
        color: #1E293B;
        line-height: 1.7;
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    .card-list {
        list-style: none;
        padding: 0;
    }

    .card-list li {
        padding: 0.75rem 0;
        color: #1E293B;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.9375rem;
    }

    .card-list li i {
        color: #F59E0B;
        font-size: 1rem;
        flex-shrink: 0;
    }

    /* Benefits Section */
    .benefits-section {
        padding: 6rem 1.5rem;
        background: linear-gradient(180deg, #f8fafc 0%, #F8FAFC 100%);
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .benefit-card {
        background: #F8FAFC;
        padding: 2rem;
        border-radius: 1.25rem;
        text-align: center;
        border: 2px solid #F8FAFC;
        transition: all 0.3s ease;
    }

    .benefit-card:hover {
        border-color: #F59E0B;
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(245,158,11,0.1);
    }

    .benefit-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(245,158,11,0.1));
        border-radius: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2.5rem;
        color: #F59E0B;
        transition: all 0.3s ease;
    }

    .benefit-card:hover .benefit-icon {
        transform: scale(1.1) rotate(5deg);
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #F8FAFC;
    }

    .benefit-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: #1E293B;
        margin-bottom: 0.75rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .benefit-text {
        color: #1E293B;
        font-size: 0.9375rem;
        line-height: 1.6;
    }

    /* How to Apply Section */
    .apply-section {
        padding: 6rem 1.5rem;
        background: #F8FAFC;
    }

    .steps-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .step-item {
        display: grid;
        grid-template-columns: 80px 1fr;
        gap: 2rem;
        margin-bottom: 3rem;
        position: relative;
    }

    .step-item::before {
        content: '';
        position: absolute;
        left: 40px;
        top: 80px;
        width: 2px;
        height: calc(100% - 60px);
        background: linear-gradient(180deg, #F59E0B, transparent);
    }

    .step-item:last-child::before {
        display: none;
    }

    .step-number {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 900;
        color: #F8FAFC;
        font-family: 'Space Grotesk', sans-serif;
        box-shadow: 0 10px 30px rgba(245,158,11,0.3);
        flex-shrink: 0;
    }

    .step-content {
        padding-top: 1rem;
    }

    .step-title {
        font-size: 1.75rem;
        font-weight: 900;
        color: #1E293B;
        margin-bottom: 1rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .step-description {
        color: #1E293B;
        line-height: 1.7;
        font-size: 1.0625rem;
    }

    /* CTA Section */
    .cta-section {
        padding: 8rem 1.5rem;
        background: linear-gradient(135deg, #1E293B 0%, #1E293B 100%);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(245,158,11,0.15), transparent);
        border-radius: 50%;
    }

    .cta-content {
        max-width: 900px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .cta-title {
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 900;
        color: #F8FAFC;
        margin-bottom: 1.5rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .cta-title .highlight {
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .cta-text {
        font-size: 1.25rem;
        color: rgba(248,250,252,0.8);
        margin-bottom: 3rem;
        line-height: 1.7;
    }

    .cta-buttons {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-gold {
        padding: 1.5rem 3rem;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #F8FAFC;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.125rem;
        box-shadow: 0 15px 40px rgba(245,158,11,0.4);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-gold:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 50px rgba(245,158,11,0.6);
    }

    .btn-outline {
        padding: 1.5rem 3rem;
        background: transparent;
        color: #F8FAFC;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.125rem;
        border: 2px solid #F8FAFC;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-outline:hover {
        background: #F8FAFC;
        color: #1E293B;
        transform: translateY(-3px);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .eligibility-grid,
        .benefits-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .scholarship-hero {
            min-height: 80vh;
        }

        .percentage-circle {
            width: 150px;
            height: 150px;
        }

        .percentage-circle::before {
            width: 115px;
            height: 115px;
        }

        .percentage-number {
            font-size: 3rem;
        }

        .main-content,
        .benefits-section,
        .apply-section,
        .cta-section {
            padding: 4rem 1.5rem;
        }

        .eligibility-grid,
        .benefits-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .eligibility-card {
            padding: 2rem;
        }

        .step-item {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .step-item::before {
            display: none;
        }

        .step-number {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .btn-gold,
        .btn-outline {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .eligibility-card,
        .benefit-card {
            padding: 1.5rem;
        }

        .card-icon,
        .benefit-icon {
            width: 60px;
            height: 60px;
            font-size: 1.75rem;
        }
    }
</style>


<!-- Hero Section -->
<section class="scholarship-hero">
    <div class="scholarship-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    
    <div class="hero-content">
        <div class="scholarship-badge">
            <i class="fas fa-award"></i>
            <span>75% Scholarship for All Computer Courses</span>
        </div>
        
        <h1 class="hero-title">
            Get <span class="highlight">Up To</span>
        </h1>
        
        <div class="percentage-circle">
            <div class="percentage-text">
                <div class="percentage-number">75%</div>
                <div class="percentage-label">Scholarship</div>
            </div>
        </div>
        
        <p class="hero-subtitle">
            கம்ப்யூட்டர் படிப்புகள் அனைத்திற்கும் 75% வரை Scholarship!<br>
            Scholarship available for ALL Computer Courses at SRM Computer Center.
        </p>
        
        <a href="#" onclick="openApplyModal(); return false;" class="cta-primary">
            <i class="fas fa-graduation-cap"></i>
            <span>Apply for Scholarship</span>
        </a>
    </div>
</section>

<!-- Eligibility Section -->
<section class="main-content">
    <div class="content-container">
        <div class="section-header">
            <span class="section-badge">Scholarship Program</span>
            <h2 class="section-title">Scholarship for All Computer Courses</h2>
            <p class="section-subtitle">
                We are offering up to 75% scholarship for every Computer Course. No category restrictions. Open for all eligible students.
            </p>
        </div>
        
        <div class="eligibility-grid">
            <div class="eligibility-card">
                <div class="card-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h3 class="card-title">All Computer Courses Eligible</h3>
                <p class="card-description">
                    75% scholarship applicable for all computer-related programs.
                </p>
                <ul class="card-list">
                    <li><i class="fas fa-check-circle"></i> Programming Courses</li>
                    <li><i class="fas fa-check-circle"></i> Software & App Development</li>
                    <li><i class="fas fa-check-circle"></i> Tally & Accounting Software</li>
                    <li><i class="fas fa-check-circle"></i> Hardware & Networking</li>
                    <li><i class="fas fa-check-circle"></i> All Diploma & Certification Courses</li>
                </ul>
            </div>

            <div class="eligibility-card">
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="card-title">Open for Students & Professionals</h3>
                <p class="card-description">
                    Anyone interested in computer education can apply for the scholarship.
                </p>
                <ul class="card-list">
                    <li><i class="fas fa-check-circle"></i> School Students</li>
                    <li><i class="fas fa-check-circle"></i> College Students</li>
                    <li><i class="fas fa-check-circle"></i> Job Seekers</li>
                    <li><i class="fas fa-check-circle"></i> Working Professionals</li>
                </ul>
            </div>

            <div class="eligibility-card">
                <div class="card-icon">
                    <i class="fas fa-percentage"></i>
                </div>
                <h3 class="card-title">Flat 75% Scholarship</h3>
                <p class="card-description">
                    Direct fee concession up to 75% on total course fees.
                </p>
                <ul class="card-list">
                    <li><i class="fas fa-check-circle"></i> Transparent fee structure</li>
                    <li><i class="fas fa-check-circle"></i> Limited seats available</li>
                    <li><i class="fas fa-check-circle"></i> First come, first served basis</li>
                </ul>
            </div>

            <div class="eligibility-card">
                <div class="card-icon">
                    <i class="fas fa-award"></i>
                </div>
                <h3 class="card-title">Special 2026 Offer</h3>
                <p class="card-description">
                    Exclusive scholarship campaign for 2026 admissions.
                </p>
                <ul class="card-list">
                    <li><i class="fas fa-check-circle"></i> Applicable for new admissions only</li>
                    <li><i class="fas fa-check-circle"></i> Valid for all computer programs</li>
                    <li><i class="fas fa-check-circle"></i> Limited period offer</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="benefits-section">
    <div class="content-container">
        <div class="section-header">
            <span class="section-badge">Program Benefits</span>
            <h2 class="section-title">What You'll Get</h2>
            <p class="section-subtitle">
                Along with 75% scholarship, students receive premium training benefits.
            </p>
        </div>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h4 class="benefit-title">100% Project Based Training</h4>
                <p class="benefit-text">Hands-on real-time practical training.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h4 class="benefit-title">Expert Trainers</h4>
                <p class="benefit-text">Learn from experienced industry professionals.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h4 class="benefit-title">Placement Assistance</h4>
                <p class="benefit-text">Complete job support after course completion.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h4 class="benefit-title">Recognized Certification</h4>
                <p class="benefit-text">Valuable certificates for career growth.</p>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="cta-section">
    <div class="cta-content">
        <h2 class="cta-title">
            75% Scholarship on <span class="highlight">All Computer Courses</span>
        </h2>
        <p class="cta-text">
            Limited seats available. Apply now and secure up to 75% fee concession on every computer course.
        </p>
        
        <div class="cta-buttons">
            <a href="#" onclick="openApplyModal(); return false;" class="btn-gold">
                <i class="fas fa-file-alt"></i>
                <span>Apply Now</span>
            </a>
            <a href="tel:7373733765" class="btn-outline">
                <i class="fas fa-phone-alt"></i>
                <span>Call: 73737 33765</span>
            </a>
        </div>
    </div>
</section>

<?php 
// Scholarship updated: 75% applicable for ALL Computer Courses (2026 Campaign)
?>