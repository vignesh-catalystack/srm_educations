<?php 
include_once '../includes/header.php'; 
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    :root {
        --srm-navy: #1E293B;
        --srm-blue: #D32F2F;
        --srm-gold: #D32F2F;
        --srm-light: #F8FAFC;
        --gradient-1: linear-gradient(135deg, #1E293B 0%, #D32F2F 100%);
        --gradient-2: linear-gradient(135deg, #D32F2F 0%, #D32F2F 100%);
        --gradient-3: linear-gradient(135deg, #1E293B 0%, #D32F2F 100%);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    
    html { scroll-behavior: smooth; }
    
    body { 
        font-family: 'Inter', sans-serif; 
        color: var(--srm-navy);
        overflow-x: hidden;
        background: #F8FAFC;
    }

    /* Hero Section with Particles */
    .hero-institutions {
        min-height: 90vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #1E293B 0%, #1E293B 50%, #1E293B 100%);
        overflow: hidden;
    }

    .hero-institutions::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(245,158,11,0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    .hero-particles {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(245,158,11,0.6);
        border-radius: 50%;
        animation: float 15s infinite;
    }

    .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { left: 20%; animation-delay: 2s; }
    .particle:nth-child(3) { left: 30%; animation-delay: 4s; }
    .particle:nth-child(4) { left: 40%; animation-delay: 1s; }
    .particle:nth-child(5) { left: 50%; animation-delay: 3s; }
    .particle:nth-child(6) { left: 60%; animation-delay: 5s; }
    .particle:nth-child(7) { left: 70%; animation-delay: 2.5s; }
    .particle:nth-child(8) { left: 80%; animation-delay: 4.5s; }
    .particle:nth-child(9) { left: 90%; animation-delay: 1.5s; }

    @keyframes float {
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
    }

    .hero-badge {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: rgba(245,158,11,0.1);
        border: 1px solid rgba(245,158,11,0.3);
        border-radius: 50px;
        color: #F59E0B;
        font-size: 0.875rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 2rem;
        backdrop-filter: blur(10px);
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
        font-size: clamp(2.5rem, 8vw, 6rem);
        font-weight: 900;
        color: #F8FAFC;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        font-family: 'Space Grotesk', sans-serif;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    .hero-title .gradient-text {
        background: linear-gradient(135deg, #F59E0B, #F59E0B, #F59E0B);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 3s ease infinite;
    }

    @keyframes gradientShift {
        0%, 100% { filter: hue-rotate(0deg); }
        50% { filter: hue-rotate(45deg); }
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

    .hero-subtitle {
        font-size: clamp(1rem, 3vw, 1.5rem);
        color: rgba(248,250,252,0.7);
        max-width: 700px;
        margin: 0 auto 3rem;
        line-height: 1.6;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .hero-stats {
        display: flex;
        gap: 3rem;
        justify-content: center;
        flex-wrap: wrap;
        animation: fadeInUp 0.8s ease-out 0.6s both;
    }

    .stat-item {
        text-align: center;
        animation: scaleIn 0.5s ease-out backwards;
    }

    .stat-item:nth-child(1) { animation-delay: 0.8s; }
    .stat-item:nth-child(2) { animation-delay: 1s; }
    .stat-item:nth-child(3) { animation-delay: 1.2s; }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 900;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        font-family: 'Space Grotesk', sans-serif;
    }

    .stat-label {
        color: rgba(248,250,252,0.6);
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 0.5rem;
    }

    /* Sticky Navigation */
    .sticky-nav {
        position: sticky;
        top: 0;
        z-index: 100;
        background: rgba(248,250,252,0.95);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(30,41,59,0.05);
        box-shadow: 0 4px 30px rgba(30,41,59,0.05);
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-100%);
        }
        to {
            transform: translateY(0);
        }
    }

    .sticky-nav-inner {
        max-width: 1400px;
        margin: 0 auto;
        padding: 1.25rem 1.5rem;
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .nav-pill {
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #F8FAFC;
        color: #1E293B;
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }

    .nav-pill::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(245,158,11,0.1), transparent);
        transition: left 0.5s;
    }

    .nav-pill:hover::before {
        left: 100%;
    }

    .nav-pill:hover {
        background: #F59E0B;
        color: #F8FAFC;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(245,158,11,0.3);
    }

    /* Institution Section with Enhanced Details */
    .institution-section {
        padding: 8rem 1.5rem;
        position: relative;
        opacity: 0;
        animation: fadeIn 1s ease-out forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    .institution-section:nth-child(even) {
        background: linear-gradient(180deg, #F8FAFC 0%, #F8FAFC 100%);
    }

    .institution-container {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: start;
    }

    .institution-container.reverse {
        direction: rtl;
    }

    .institution-container.reverse > * {
        direction: ltr;
    }

    .institution-visual {
        position: relative;
        position: sticky;
        top: 120px;
    }

    .main-image-wrapper {
        position: relative;
        border-radius: 2rem;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(30,41,59,0.15);
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .main-image-wrapper:hover {
        transform: scale(1.02) rotate(-1deg);
    }

    .main-image-wrapper img {
        width: 100%;
        height: 600px;
        object-fit: cover;
        display: block;
    }

    .floating-badge {
        position: absolute;
        bottom: -2rem;
        right: -2rem;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #F8FAFC;
        padding: 2rem 2.5rem;
        border-radius: 1.5rem;
        box-shadow: 0 20px 50px rgba(245,158,11,0.4);
        animation: floatBadge 3s ease-in-out infinite;
    }

    @keyframes floatBadge {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .badge-number {
        font-size: 3rem;
        font-weight: 900;
        display: block;
        font-family: 'Space Grotesk', sans-serif;
    }

    .badge-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        opacity: 0.9;
        margin-top: 0.25rem;
    }

    .institution-content {
        padding: 2rem 0;
    }

    .section-badge {
        display: inline-block;
        padding: 0.5rem 1.25rem;
        background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(245,158,11,0.1));
        border: 1px solid rgba(245,158,11,0.2);
        border-radius: 50px;
        color: #F59E0B;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        animation: slideInLeft 0.6s ease-out;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .institution-title {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 900;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        color: #1E293B;
        font-family: 'Space Grotesk', sans-serif;
        animation: slideInLeft 0.6s ease-out 0.1s both;
    }

    .institution-title .highlight {
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .focus-subtitle {
        font-size: 1rem;
        font-weight: 700;
        color: #F59E0B;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        animation: slideInLeft 0.6s ease-out 0.2s both;
    }

    .institution-description {
        font-size: 1.125rem;
        line-height: 1.8;
        color: #1E293B;
        margin-bottom: 2.5rem;
        border-left: 4px solid #F59E0B;
        padding-left: 1.5rem;
        animation: slideInLeft 0.6s ease-out 0.3s both;
    }

    /* Detailed Info Cards */
    .info-cards {
        display: grid;
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .info-card {
        background: #F8FAFC;
        padding: 2rem;
        border-radius: 1.5rem;
        border: 2px solid #F8FAFC;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: linear-gradient(180deg, #F59E0B, #F59E0B);
        transform: scaleY(0);
        transition: transform 0.4s ease;
    }

    .info-card:hover::before {
        transform: scaleY(1);
    }

    .info-card:hover {
        border-color: #F59E0B;
        box-shadow: 0 20px 50px rgba(245,158,11,0.15);
        transform: translateX(10px);
    }

    .info-card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .info-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #F8FAFC;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .info-card h4 {
        font-size: 1.25rem;
        font-weight: 800;
        color: #1E293B;
        font-family: 'Space Grotesk', sans-serif;
    }

    .info-card p {
        color: #1E293B;
        line-height: 1.7;
        font-size: 0.9375rem;
    }

    .info-card ul {
        list-style: none;
        padding: 0;
        margin-top: 1rem;
    }

    .info-card ul li {
        padding: 0.5rem 0;
        color: #1E293B;
        font-size: 0.9375rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .info-card ul li i {
        color: #F59E0B;
        font-size: 0.875rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        background: #F8FAFC;
        border-radius: 1rem;
        border: 1px solid #F8FAFC;
        transition: all 0.3s ease;
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .feature-item:nth-child(1) { animation-delay: 0.4s; }
    .feature-item:nth-child(2) { animation-delay: 0.5s; }
    .feature-item:nth-child(3) { animation-delay: 0.6s; }
    .feature-item:nth-child(4) { animation-delay: 0.7s; }
    .feature-item:nth-child(5) { animation-delay: 0.8s; }
    .feature-item:nth-child(6) { animation-delay: 0.9s; }

    .feature-item:hover {
        border-color: #F59E0B;
        box-shadow: 0 10px 30px rgba(245,158,11,0.1);
        transform: translateX(5px);
    }

    .feature-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #F8FAFC;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .feature-text {
        font-weight: 600;
        color: #1E293B;
        font-size: 0.9375rem;
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1.25rem 2.5rem;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #F8FAFC;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9375rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 15px 35px rgba(245,158,11,0.3);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease-out 1s both;
    }

    .cta-button::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(248,250,252,0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .cta-button:hover::before {
        width: 300px;
        height: 300px;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 45px rgba(245,158,11,0.4);
    }

    /* Degree Section - Dark Theme */
    .degree-section {
        background: linear-gradient(135deg, #1E293B 0%, #1E293B 100%);
        color: #F8FAFC;
        padding: 8rem 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .degree-section::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(245,158,11,0.2), transparent);
        border-radius: 50%;
        filter: blur(80px);
    }

    /* Computer Center Section */
    .computer-section {
        background: #F8FAFC;
        padding: 8rem 1.5rem;
    }

    .section-header {
        text-align: center;
        margin-bottom: 5rem;
        animation: fadeInUp 0.8s ease-out;
    }

    .section-header .section-badge {
        margin-bottom: 1.5rem;
    }

    .section-header h2 {
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 900;
        color: #1E293B;
        margin-bottom: 1rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .section-header p {
        font-size: 1.25rem;
        color: #1E293B;
        max-width: 600px;
        margin: 0 auto;
    }

    .computer-grid {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2.5rem;
    }

    .computer-card {
        background: #F8FAFC;
        border-radius: 2rem;
        padding: 3rem;
        text-align: center;
        box-shadow: 0 10px 40px rgba(30,41,59,0.05);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .computer-card:nth-child(1) { animation-delay: 0.2s; }
    .computer-card:nth-child(2) { animation-delay: 0.4s; }
    .computer-card:nth-child(3) { animation-delay: 0.6s; }

    .computer-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, #F59E0B, #F59E0B, #F59E0B);
        transform: scaleX(0);
        transition: transform 0.4s;
    }

    .computer-card:hover::before {
        transform: scaleX(1);
    }

    .computer-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(30,41,59,0.15);
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #F8FAFC;
    }

    .computer-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(245,158,11,0.1));
        border-radius: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 2.25rem;
        color: #F59E0B;
        transition: all 0.4s;
    }

    .computer-card:hover .computer-icon {
        transform: rotateY(360deg);
        background: rgba(248,250,252,0.2);
        color: #F8FAFC;
    }

    .computer-card h4 {
        font-size: 1.75rem;
        font-weight: 900;
        margin-bottom: 1rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .computer-card p {
        line-height: 1.7;
        font-size: 0.9375rem;
        color: #1E293B;
        margin-bottom: 1.5rem;
        transition: color 0.4s;
    }

    .computer-card:hover p {
        color: rgba(248,250,252,0.9);
    }

    .tech-list {
        list-style: none;
        padding: 0;
        margin-top: 1.5rem;
    }

    .tech-list li {
        padding: 0.75rem;
        background: #F8FAFC;
        margin-bottom: 0.5rem;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: #1E293B;
        transition: all 0.3s;
    }

    .computer-card:hover .tech-list li {
        background: rgba(248,250,252,0.16);
        color: #F8FAFC;
    }

    /* Final CTA */
    .final-cta {
        background: linear-gradient(135deg, #F8FAFC 0%, #F8FAFC 100%);
        padding: 8rem 1.5rem;
        text-align: center;
    }

    .final-cta-content {
        max-width: 900px;
        margin: 0 auto;
    }

    .final-cta h2 {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 900;
        color: #1E293B;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        font-family: 'Space Grotesk', sans-serif;
    }

    .final-cta h2 .highlight {
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .final-cta p {
        font-size: 1.25rem;
        color: #1E293B;
        margin-bottom: 3rem;
    }

    .cta-buttons {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-primary {
        padding: 1.5rem 3rem;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #F8FAFC;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.125rem;
        box-shadow: 0 15px 40px rgba(245,158,11,0.3);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 50px rgba(245,158,11,0.4);
    }

    .btn-secondary {
        padding: 1.5rem 3rem;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #F8FAFC;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.125rem;
        box-shadow: 0 15px 40px rgba(245,158,11,0.3);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
    }

    .btn-secondary:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 50px rgba(245,158,11,0.4);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .institution-container,
        .computer-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        .institution-container.reverse {
            direction: ltr;
        }

        .institution-visual {
            position: relative;
            top: 0;
        }

        .floating-badge {
            bottom: 1rem;
            right: 1rem;
            padding: 1.5rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .hero-institutions {
            min-height: 70vh;
        }

        .hero-stats {
            gap: 2rem;
        }

        .stat-number {
            font-size: 2rem;
        }

        .sticky-nav-inner {
            gap: 0.5rem;
        }

        .nav-pill {
            padding: 0.625rem 1.25rem;
            font-size: 0.75rem;
        }

        .institution-section,
        .computer-section,
        .final-cta {
            padding: 4rem 1.5rem;
        }

        .main-image-wrapper img {
            height: 400px;
        }

        .info-cards {
            gap: 1rem;
        }

        .info-card {
            padding: 1.5rem;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            justify-content: center;
        }
    }

    /* Course page vibe alignment: red/#F8FAFC/#1E293B + contained layout */
    .hero-institutions {
        background-image:
            linear-gradient(120deg, rgba(30,41,59,0.84)),
            url('../assets/images/institution-hero-bg.png') !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
    }

    .hero-institutions::before {
        background: radial-gradient(circle, rgba(211,47,47,0.12) 1px, transparent 1px) !important;
    }

    .particle {
        background: rgba(211,47,47,0.65) !important;
    }

    .hero-badge {
        background: rgba(211,47,47,0.12) !important;
        border-color: rgba(211,47,47,0.35) !important;
        color: #F8FAFC !important;
    }

    .hero-title .gradient-text,
    .stat-number,
    .institution-title .highlight {
        background: linear-gradient(135deg, #D32F2F, #D32F2F) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
    }

    .sticky-nav {
        border-bottom: 1px solid #F8FAFC !important;
    }

    .sticky-nav-inner,
    .institution-container,
    .computer-grid,
    .final-cta-content {
        max-width: 1280px !important;
    }

    .institution-section,
    .computer-section,
    .degree-section,
    .final-cta {
        padding: 5rem 1.5rem !important;
        background: #F8FAFC !important;
        color: #1E293B !important;
    }

    #degree.institution-section {
        background: #F8FAFC !important;
    }

    .institution-container {
        background: #F8FAFC;
        border: 1px solid #F8FAFC;
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 14px 34px rgba(30,41,59,0.08);
    }

    .main-image-wrapper {
        box-shadow: 0 20px 42px rgba(30,41,59,0.14) !important;
    }

    .floating-badge {
        background: linear-gradient(135deg, #D32F2F, #D32F2F) !important;
        box-shadow: 0 16px 34px rgba(211,47,47,0.28) !important;
    }

    .section-badge,
    .focus-subtitle {
        color: #D32F2F !important;
        border-color: rgba(211,47,47,0.3) !important;
    }

    .section-badge {
        background: rgba(211,47,47,0.08) !important;
    }

    .institution-title,
    .section-header h2,
    .feature-text,
    .info-card h4,
    .computer-card h4 {
        color: #1E293B !important;
    }

    .institution-description,
    .section-header p,
    .info-card p,
    .computer-card p {
        color: #1E293B !important;
        border-left-color: #D32F2F !important;
    }

    .info-card,
    .feature-item,
    .computer-card {
        border-color: #F8FAFC !important;
        box-shadow: 0 10px 24px rgba(30,41,59,0.08) !important;
    }

    .info-card::before,
    .computer-card::before {
        background: #D32F2F !important;
    }

    .info-card:hover,
    .feature-item:hover,
    .computer-card:hover {
        border-color: #D32F2F !important;
        box-shadow: 0 16px 34px rgba(211,47,47,0.16) !important;
    }

    .info-icon,
    .feature-icon,
    .computer-icon {
        background: linear-gradient(135deg, #D32F2F, #D32F2F) !important;
        color: #F8FAFC !important;
    }

    .nav-pill:hover,
    .cta-button,
    .btn-primary {
        background: linear-gradient(135deg, #D32F2F, #D32F2F) !important;
        color: #F8FAFC !important;
        box-shadow: 0 14px 30px rgba(211,47,47,0.25) !important;
    }
</style>

<!-- Hero Section -->
<section class="hero-institutions">
    <div class="hero-particles">
        <div class="particle"></div>
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
        <div class="hero-badge">Three Specialized Wings</div>
        <h1 class="hero-title">
            Our <span class="gradient-text">Institutions</span>
        </h1>
        <p class="hero-subtitle">
            SRM Group of Institutions delivers world-class education across Healthcare, Technology, and Management through three specialized divisions
        </p>
        
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">3</span>
                <span class="stat-label">Specialized Divisions</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">25+</span>
                <span class="stat-label">Accredited Programs</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">5000+</span>
                <span class="stat-label">Alumni Network</span>
            </div>
        </div>
    </div>
</section>

<!-- Sticky Navigation -->
<nav class="sticky-nav">
    <div class="sticky-nav-inner">
        <a href="#paramedical" class="nav-pill">
            <i class="fas fa-microscope"></i> Paramedical Sciences
        </a>
        <a href="#degree" class="nav-pill">
            <i class="fas fa-graduation-cap"></i> Degree Programs
        </a>
        <a href="#computer" class="nav-pill">
            <i class="fas fa-laptop-code"></i> Computer Center
        </a>
    </div>
</nav>

<!-- Paramedical Section -->
<section id="paramedical" class="institution-section">
    <div class="institution-container">
        <div class="institution-visual">
            <div class="main-image-wrapper">
                <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?auto=format&fit=crop&q=80&w=1200" alt="Paramedical Laboratory">
            </div>
            <div class="floating-badge">
                <span class="badge-number">2 Years</span>
                <span class="badge-label">Intensive Training</span>
            </div>
        </div>
        
        <div class="institution-content">
            <div class="section-badge">Division 01</div>
            <h2 class="institution-title">
                SRM Institute of<br>
                <span class="highlight">Paramedical Sciences</span>
            </h2>
            <p class="focus-subtitle">Focus: Clinical Excellence & Immediate Employment</p>
            <p class="institution-description">
                The backbone of modern healthcare - Our Paramedical division shapes skilled clinical professionals through intensive hands-on training in state-of-the-art laboratories. We produce job-ready technicians who excel in diagnostic precision and patient care.
            </p>
            
            <div class="info-cards">
                <div class="info-card">
                    <div class="info-card-header">
                        <div class="info-icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <h4>Academic Foundation</h4>
                    </div>
                    <p>As a trusted branch of the MMR Foundation, we provide industry-validated training that bridges the gap between education and healthcare service.</p>
                </div>

                <div class="info-card">
                    <div class="info-card-header">
                        <div class="info-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <h4>Clinical Immersion</h4>
                    </div>
                    <p>Students gain hands-on experience in our Video & Audio Projector Labs, ensuring they master complex diagnostic procedures before entering a hospital environment.</p>
                </div>

                <div class="info-card">
                    <div class="info-card-header">
                        <div class="info-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h4>Career Assurance</h4>
                    </div>
                    <p>We don't just teach; we place. Our graduates are guaranteed job opportunities across major healthcare networks.</p>
                </div>
            </div>
            
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div class="feature-text">Advanced Clinical Pathology Labs</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-x-ray"></i>
                    </div>
                    <div class="feature-text">Digital Radiology & Imaging Units</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <div class="feature-text">Modern OT Technology Setup</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="feature-text">Dialysis Technician Training Modules</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-stethoscope"></i>
                    </div>
                    <div class="feature-text">ECG & Cardiology Equipment</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <div class="feature-text">Phlebotomy & Sample Collection</div>
                </div>
            </div>
            
            <a href="course.php" class="cta-button">
                <span>Explore Paramedical Courses</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Degree Programs Section -->
<section id="degree" class="institution-section" style="background: linear-gradient(135deg, #1E293B 0%, #1E293B 100%);">
    <div class="institution-container reverse">
        <div class="institution-visual">
            <div class="main-image-wrapper">
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=1200" alt="Degree Students">
            </div>
            <div class="floating-badge" style="background: linear-gradient(135deg, #F59E0B, #F59E0B);">
                <span class="badge-number">UGC</span>
                <span class="badge-label">Approved Programs</span>
            </div>
        </div>
        
        <div class="institution-content">
            <div class="section-badge" style="background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(245,158,11,0.1)); border-color: rgba(245,158,11,0.3); color: #F59E0B;">Division 02</div>
            <h2 class="institution-title" style="color: #F8FAFC;">
                Higher Academic Wing<br>
                <span class="highlight" style="background: linear-gradient(135deg, #F59E0B, #F59E0B); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Degree Programs</span>
            </h2>
            <p class="focus-subtitle" style="color: #F59E0B;">Focus: UGC-Approved Professional Growth</p>
            <p class="institution-description" style="border-left-color: #F59E0B; color: rgba(248,250,252,0.8);">
                In partnership with renowned universities, we offer globally recognized undergraduate degrees (BSc/BVoc) that seamlessly blend academic rigor with real-world industry applications. Our graduates emerge as well-rounded professionals ready for immediate career success.
            </p>
            
            <div class="info-cards">
                <div class="info-card" style="background: rgba(248,250,252,0.05); border-color: rgba(248,250,252,0.1);">
                    <div class="info-card-header">
                        <div class="info-icon" style="background: linear-gradient(135deg, #F59E0B, #F59E0B);">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h4 style="color: #F8FAFC;">Central Gov. Approval</h4>
                    </div>
                    <p style="color: rgba(248,250,252,0.7);">Pursue your degree with confidence, knowing all our programs are fully recognized and approved by Central Government bodies.</p>
                </div>

                <div class="info-card" style="background: rgba(248,250,252,0.05); border-color: rgba(248,250,252,0.1);">
                    <div class="info-card-header">
                        <div class="info-icon" style="background: linear-gradient(135deg, #F59E0B, #F59E0B);">
                            <i class="fas fa-language"></i>
                        </div>
                        <h4 style="color: #F8FAFC;">Dual-Edge Learning</h4>
                    </div>
                    <p style="color: rgba(248,250,252,0.7);">Alongside your degree, you receive specialized SRM Spoken English training to ensure you can compete in international job markets.</p>
                </div>

                <div class="info-card" style="background: rgba(248,250,252,0.05); border-color: rgba(248,250,252,0.1);">
                    <div class="info-card-header">
                        <div class="info-icon" style="background: linear-gradient(135deg, #F59E0B, #F59E0B);">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4 style="color: #F8FAFC;">Social Mission</h4>
                    </div>
                    <p style="color: rgba(248,250,252,0.7);">We believe education is a right. We provide exclusive fee concessions for students from agricultural and labor backgrounds to support the next generation of leaders.</p>
                </div>
            </div>
            
            <a href="course.php" class="cta-button" style="background: linear-gradient(135deg, #F59E0B, #F59E0B); box-shadow: 0 15px 35px rgba(245,158,11,0.3);">
                <span>View All Degree Programs</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Computer Center Section -->
<section id="computer" class="institution-section">
    <div class="institution-container">
        <div class="institution-visual">
            <div class="main-image-wrapper">
                <img src="https://images.unsplash.com/photo-1517430816045-df4b7de11d1d?auto=format&fit=crop&q=80&w=1200" alt="SRM Computer Center Lab">
            </div>
            <div class="floating-badge">
                <span class="badge-number">100%</span>
                <span class="badge-label">Practical Exposure</span>
            </div>
        </div>

        <div class="institution-content">
            <div class="section-badge">Division 03</div>
            <h2 class="institution-title">
                SRM <span class="highlight">Computer Center</span>
            </h2>
            <p class="focus-subtitle">Focus: Digital Mastery & Industrial Accounting</p>
            <p class="institution-description">
                Transform into a tech professional with industry-recognized certifications and practical coding experience. Our computer center blends software development, digital finance, and networking skills to make students job-ready.
            </p>

            <div class="info-cards">
                <div class="info-card">
                    <div class="info-card-header">
                        <div class="info-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h4>High-Tech Environment</h4>
                    </div>
                    <p>Train in a fully digital ecosystem equipped with the latest software and high-speed infrastructure.</p>
                </div>

                <div class="info-card">
                    <div class="info-card-header">
                        <div class="info-icon">
                            <i class="fas fa-industry"></i>
                        </div>
                        <h4>Industry Standards</h4>
                    </div>
                    <p>Our curriculum focuses on high-demand skills including Tally ERP 9, Python, and Full-Stack development.</p>
                </div>

                <div class="info-card">
                    <div class="info-card-header">
                        <div class="info-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h4>Accessibility</h4>
                    </div>
                    <p>Quality tech education should not be expensive. Our center offers one of the lowest fee structures in the region with flexible installment options.</p>
                </div>
            </div>

            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="feature-text">Python Full Stack Development</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="feature-text">Tally Prime with GST</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <div class="feature-text">Server Administration (Windows/Linux)</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div class="feature-text">Network Configuration (Cisco CCNA)</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <div class="feature-text">Database Management (MySQL, MongoDB)</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="feature-text">Cybersecurity Fundamentals</div>
                </div>
            </div>

            <a href="course.php" class="cta-button">
                <span>Explore Computer Courses</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="final-cta">
    <div class="final-cta-content">
        <h2>One Campus.<br><span class="highlight">Endless Possibilities.</span></h2>
        <p>Join thousands of successful alumni who started their journey at SRM. Your future begins here.</p>
        
        <div class="cta-buttons">
            <a href="contact.php" class="btn-primary">
                <i class="fas fa-comments"></i> Speak to a Counselor
            </a>
            <a href="tel:7373733765" class="btn-secondary">
                <i class="fas fa-phone-alt"></i> Call Admissions Now
            </a>
        </div>
    </div>
</section>

<script>
// Smooth scroll with offset for sticky nav
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const offset = 100;
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Active nav pill on scroll
const sections = document.querySelectorAll('.institution-section, .computer-section');
const navPills = document.querySelectorAll('.nav-pill');

window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });

    navPills.forEach(pill => {
        pill.style.background = '#F8FAFC';
        pill.style.color = '#1E293B';
        pill.style.border = '1px solid #F8FAFC';
        if (pill.getAttribute('href').slice(1) === current) {
            pill.style.background = 'linear-gradient(135deg, #D32F2F, #D32F2F)';
            pill.style.color = '#F8FAFC';
            pill.style.border = '1px solid #D32F2F';
        }
    });
});

// Intersection Observer for scroll animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.info-card, .feature-item').forEach(el => {
    observer.observe(el);
});
</script>

<?php 
include_once '../includes/footer.php'; 
?>
