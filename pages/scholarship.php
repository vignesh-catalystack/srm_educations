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
            <span>Limited Time Offer</span>
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
            கம்ப்யூட்டர் படிப்புகள்... உலகை வெல்லுங்கள்...<br>
            Make your dreams affordable with SRM Computer Center's generous scholarship program
        </p>
        
        <a href="#apply" class="cta-primary">
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
            <h2 class="section-title">Who Can Apply?</h2>
            <p class="section-subtitle">
                We believe quality education should be accessible to everyone. Check if you're eligible for our scholarship programs.
            </p>
        </div>
        
        <div class="eligibility-grid">
            <div class="eligibility-card">
                <div class="card-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3 class="card-title">Merit-Based Scholarship</h3>
                <p class="card-description">
                    Awarded to students who demonstrate exceptional academic performance
                </p>
                <ul class="card-list">
                    <li><i class="fas fa-check-circle"></i> 10th/12th marks above 80%</li>
                    <li><i class="fas fa-check-circle"></i> UG/PG students with 75%+ CGPA</li>
                    <li><i class="fas fa-check-circle"></i> Up to 50% fee waiver</li>
                </ul>
            </div>

            <div class="eligibility-card">
                <div class="card-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <h3 class="card-title">Agricultural Background</h3>
                <p class="card-description">
                    Special concessions for students from farming families
                </p>
                <ul class="card-list">
                    <li><i class="fas fa-check-circle"></i> Farmer family certificate required</li>
                    <li><i class="fas fa-check-circle"></i> Valid land ownership proof</li>
                    <li><i class="fas fa-check-circle"></i> Up to 75% fee concession</li>
                </ul>
            </div>

            <div class="eligibility-card">
                <div class="card-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3 class="card-title">Labor Family Support</h3>
                <p class="card-description">
                    Empowering children of daily wage workers and laborers
                </p>
                <ul class="card-list">
                    <li><i class="fas fa-check-circle"></i> Labor card verification</li>
                    <li><i class="fas fa-check-circle"></i> Income certificate (below ₹2L/year)</li>
                    <li><i class="fas fa-check-circle"></i> Up to 75% scholarship</li>
                </ul>
            </div>

            <div class="eligibility-card">
                <div class="card-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="card-title">SCATe Scholarship</h3>
                <p class="card-description">
                    Special scholarship program for computer training excellence
                </p>
                <ul class="card-list">
                    <li><i class="fas fa-check-circle"></i> All course enrollments eligible</li>
                    <li><i class="fas fa-check-circle"></i> Performance-based rewards</li>
                    <li><i class="fas fa-check-circle"></i> 75% scholarship opportunity</li>
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
                Beyond fee reduction, scholarship students enjoy exclusive benefits
            </p>
        </div>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h4 class="benefit-title">100% Project Based Training</h4>
                <p class="benefit-text">Learn by doing with real-world projects and hands-on practice</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h4 class="benefit-title">Well Qualified Faculties</h4>
                <p class="benefit-text">Learn from industry experts with years of practical experience</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4 class="benefit-title">For Professionals & Students</h4>
                <p class="benefit-text">Flexible batches suitable for working professionals and students</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h4 class="benefit-title">Complete Placement Assistance</h4>
                <p class="benefit-text">100% job placement support with top companies</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h4 class="benefit-title">State-of-the-Art Lab</h4>
                <p class="benefit-text">Access to modern computer labs with latest software and tools</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h4 class="benefit-title">Industry Certifications</h4>
                <p class="benefit-text">Get recognized certificates valued by employers worldwide</p>
            </div>
        </div>
    </div>
</section>

<!-- How to Apply Section -->
<section id="apply" class="apply-section">
    <div class="content-container">
        <div class="section-header">
            <span class="section-badge">Application Process</span>
            <h2 class="section-title">How to Apply</h2>
            <p class="section-subtitle">
                Simple 4-step process to claim your scholarship
            </p>
        </div>
        
        <div class="steps-container">
            <div class="step-item">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3 class="step-title">Submit Application</h3>
                    <p class="step-description">
                        Fill out the online scholarship application form or visit our campus. Provide your academic records and personal details.
                    </p>
                </div>
            </div>

            <div class="step-item">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3 class="step-title">Document Verification</h3>
                    <p class="step-description">
                        Submit required documents: Educational certificates, income proof, farmer/labor card (if applicable), and identity proof.
                    </p>
                </div>
            </div>

            <div class="step-item">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3 class="step-title">Counseling Session</h3>
                    <p class="step-description">
                        Meet with our academic counselors who will guide you on course selection and explain scholarship terms in detail.
                    </p>
                </div>
            </div>

            <div class="step-item">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3 class="step-title">Enrollment & Start Learning</h3>
                    <p class="step-description">
                        Complete the enrollment process with your scholarship discount applied. Begin your journey towards a successful tech career!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="cta-section">
    <div class="cta-content">
        <h2 class="cta-title">
            Don't Miss This <span class="highlight">Golden Opportunity!</span>
        </h2>
        <p class="cta-text">
            Limited scholarships available. Apply now and secure your future in the tech industry with up to 75% fee concession.
        </p>
        
        <div class="cta-buttons">
            <a href="contact.php" class="btn-gold">
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

?>
