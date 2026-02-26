<?php 
include_once '../includes/header.php'; 
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    :root {
        --srm-navy: #1E293B;
        --srm-blue: #F59E0B;
        --srm-gold: #F59E0B;
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
    .contact-hero {
        min-height: 70vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image:
            linear-gradient(135deg, rgba(30,41,59,0.9) 0%, rgba(30,41,59,0.8) 50%, rgba(30,41,59,0.9) 100%),
            url('../assets/images/contact-hero-bg.png');
        background-size: cover;
        background-position: center 10%;
        background-repeat: no-repeat;
        overflow: hidden;
    }

    .contact-hero::before {
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

    .hero-content {
        position: relative;
        z-index: 10;
        text-align: center;
        padding: 0 1.5rem;
        max-width: 900px;
        margin: 0 auto;
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
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .hero-title {
        font-size: clamp(2.5rem, 8vw, 4.5rem);
        font-weight: 900;
        color: #F8FAFC;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        font-family: 'Space Grotesk', sans-serif;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .hero-subtitle {
        font-size: clamp(1rem, 3vw, 1.25rem);
        color: rgba(248,250,252,0.8);
        line-height: 1.7;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    /* Contact Section */
    .contact-section {
        padding: 6rem 1.5rem;
        background: linear-gradient(180deg, #F8FAFC 0%, #F8FAFC 100%);
    }

    .contact-container {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: start;
    }

    /* Contact Info Side */
    .contact-info {
        position: sticky;
        top: 120px;
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
    }

    .contact-title {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 900;
        color: #1E293B;
        margin-bottom: 1.5rem;
        font-family: 'Space Grotesk', sans-serif;
        line-height: 1.2;
    }

    .contact-description {
        font-size: 1.125rem;
        color: #1E293B;
        line-height: 1.8;
        margin-bottom: 3rem;
    }

    .info-card {
        background: #F8FAFC;
        padding: 2rem;
        border-radius: 1.5rem;
        border: 2px solid #F8FAFC;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        border-color: #F59E0B;
        box-shadow: 0 20px 50px rgba(245,158,11,0.1);
        transform: translateY(-5px);
    }

    .info-card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #F8FAFC;
        font-size: 1.25rem;
    }

    .info-card h3 {
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

    .info-card a {
        color: #F59E0B;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .info-card a:hover {
        color: #1E293B;
    }

    /* Form Side */
    .contact-form-wrapper {
        background: #F8FAFC;
        padding: 3rem;
        border-radius: 2rem;
        box-shadow: 0 30px 60px rgba(30,41,59,0.1);
        border: 1px solid #F8FAFC;
    }

    .form-title {
        font-size: 1.75rem;
        font-weight: 900;
        color: #1E293B;
        margin-bottom: 0.5rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .form-subtitle {
        color: #1E293B;
        margin-bottom: 2rem;
        font-size: 0.9375rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #1E293B;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .form-input,
    .form-textarea,
    .form-select {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid #F8FAFC;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        background: #F8FAFC;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
        outline: none;
        border-color: #F59E0B;
        box-shadow: 0 0 0 4px rgba(245,158,11,0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%230a1628' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        padding-right: 3rem;
    }

    .submit-btn {
        width: 100%;
        padding: 1.25rem 2rem;
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #F8FAFC;
        border: none;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 15px 35px rgba(245,158,11,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 45px rgba(245,158,11,0.4);
    }

    /* Branches Section */
    .branches-section {
        padding: 6rem 1.5rem;
        background: #F8FAFC;
    }

    .branches-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 900;
        color: #1E293B;
        margin-bottom: 1rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .section-subtitle {
        font-size: 1.125rem;
        color: #1E293B;
    }

    .branches-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2.5rem;
    }

    .branch-card {
        background: #F8FAFC;
        border-radius: 1.5rem;
        overflow: hidden;
        border: 2px solid #F8FAFC;
        box-shadow: 0 15px 40px rgba(30,41,59,0.08);
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
    }

    .branch-card:hover {
        transform: translateY(-10px);
        border-color: #F59E0B;
        box-shadow: 0 25px 60px rgba(245,158,11,0.15);
    }

    .branch-header {
        height: 6px;
        background: linear-gradient(90deg, #F59E0B, #F59E0B);
    }

    /* Map iframe replacing image */
    .branch-map {
        width: 100%;
        height: 200px;
        border: none;
        display: block;
    }

    .branch-content {
        padding: 2rem;
        flex-grow: 1;
    }

    .branch-tag {
        display: inline-block;
        padding: 0.375rem 0.875rem;
        background: rgba(245,158,11,0.1);
        color: #F59E0B;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 1rem;
    }

    .branch-name {
        font-size: 1.75rem;
        font-weight: 900;
        color: #1E293B;
        margin-bottom: 1.5rem;
        font-family: 'Space Grotesk', sans-serif;
    }

    .branch-info-item {
        display: flex;
        align-items: start;
        gap: 1rem;
        margin-bottom: 1rem;
        color: #1E293B;
    }

    .branch-info-item i {
        color: #F59E0B;
        font-size: 1rem;
        margin-top: 0.25rem;
        flex-shrink: 0;
    }

    .branch-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-top: 2rem;
    }

    .map-btn,
    .call-btn {
        padding: 1rem;
        border-radius: 0.75rem;
        font-weight: 700;
        font-size: 0.875rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .map-btn {
        background: rgba(245,158,11,0.1);
        color: #F59E0B;
        border: 2px solid rgba(245,158,11,0.2);
    }

    .map-btn:hover {
        background: #F59E0B;
        color: #F8FAFC;
        border-color: #F59E0B;
    }

    .call-btn {
        background: linear-gradient(135deg, #F59E0B, #F59E0B);
        color: #F8FAFC;
        border: 2px solid transparent;
    }

    .call-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(245,158,11,0.3);
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
        background: radial-gradient(circle, rgba(245,158,11,0.2), transparent);
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
        line-height: 1.2;
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

    .btn-primary,
    .btn-outline {
        padding: 1.5rem 3rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.125rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-primary {
        background: #F8FAFC;
        color: #F59E0B;
        box-shadow: 0 15px 40px rgba(248,250,252,0.2);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 50px rgba(248,250,252,0.3);
    }

    .btn-outline {
        background: transparent;
        color: #F8FAFC;
        border: 2px solid rgba(248,250,252,0.8);
    }

    .btn-outline:hover {
        background: #F8FAFC;
        color: #1E293B;
        border-color: #F8FAFC;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .contact-container,
        .branches-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        .contact-info {
            position: relative;
            top: 0;
        }
    }

    @media (max-width: 768px) {
        .contact-hero {
            min-height: 60vh;
        }

        .contact-section,
        .branches-section,
        .cta-section {
            padding: 4rem 1.5rem;
        }

        .contact-form-wrapper {
            padding: 2rem;
        }

        .branch-actions {
            grid-template-columns: 1fr;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .btn-primary,
        .btn-outline {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- Hero Section -->
<section class="contact-hero">
    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-paper-plane"></i> Get In Touch
        </div>
        <h1 class="hero-title">
            Let's Start Your Journey
        </h1>
        <p class="hero-subtitle">
            Have questions? We're here to help you choose the right path for your career. Reach out to our expert counselors today.
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="contact-container">
        <!-- Contact Info -->
        <div class="contact-info">
            <span class="section-badge">Contact Information</span>
            <h2 class="contact-title">We'd Love to Hear From You</h2>
            <p class="contact-description">
                Whether you have questions about our courses, scholarships, or admission process, our team is ready to answer all your queries.
            </p>

            <div class="info-card">
                <div class="info-card-header">
                    <div class="info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Call Us</h3>
                </div>
                <p>
                 Vaniyambadi: <a href="tel:7373733763">73 73 73 37 63</a> 
                 <br>   
                Ambur: <a href="tel:7373733765">73 73 73 37 65</a><br>
                   
                </p>
            </div>

            <div class="info-card">
                <div class="info-card-header">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                </div>
                <p>
                    <a href="mailto:info@srmeducation.in">info@srmeducation.in</a><br>
                    <a href="mailto:admissions@srmeducation.in">admissions@srmeducation.in</a>
                </p>
            </div>

            <div class="info-card">
                <div class="info-card-header">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Office Hours</h3>
                </div>
                <p>
                    Monday - Saturday: 9:00 AM - 6:00 PM<br>
                    Sunday: Closed
                </p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-wrapper">
            <h3 class="form-title">Send Us a Message</h3>
            <p class="form-subtitle">Fill out the form below and we'll get back to you within 24 hours</p>

            <form id="enquiryForm" onsubmit="submitEnquiry(event)">
                <div class="form-group">
                    <label class="form-label" for="full_name">Full Name *</label>
                    <input type="text" id="full_name" name="full_name" class="form-input" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email Address *</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="your.email@example.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" class="form-input" placeholder="+91 98765 43210" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="course">Interested Course</label>
                    <select id="course" name="course" class="form-select">
                        <option value="">Select a course</option>
                        <option value="paramedical">Paramedical Sciences</option>
                        <option value="degree">Degree Programs</option>
                        <option value="computer">Computer Courses</option>
                        <option value="other">Other / Not Sure</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="message">Your Message *</label>
                    <textarea id="message" name="message" class="form-textarea" placeholder="How can we help you?" required></textarea>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-paper-plane"></i>
                    <span>Send Message</span>
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Branches Section -->
<section class="branches-section">
    <div class="branches-container">
        <div class="section-header">
            <span class="section-badge">Our Campuses</span>
            <h2 class="section-title">Visit Our Branches</h2>
            <p class="section-subtitle">Choose the campus nearest to you and start your educational journey</p>
        </div>

        <div class="branches-grid">

            <!-- Ambur Branch -->
            <div class="branch-card">
                <div class="branch-header"></div>

                <!-- Google Map — Ambur -->
                <iframe
                    class="branch-map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.0!2d78.6833!3d12.7833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDQ3JzAwLjAiTiA3OMKwNDEnMDAuMCJF!5e0!3m2!1sen!2sin!4v1!5m2!1sen!2sin&q=SRM+Education+Ambur+Anantha+Nagar+Bye+Pass+Road"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

                <div class="branch-content">
                    <span class="branch-tag">Main Branch</span>
                    <h3 class="branch-name">Ambur Campus</h3>
                    
                    <div class="branch-info-item">
                        <i class="fas fa-location-dot"></i>
                        <div>
                            <strong>Address:</strong><br>
                            #50, Anantha Nagar, Bye Pass Road<br>
                            Near Amirtham Hotel, Ambur
                        </div>
                    </div>

                    <div class="branch-info-item">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <strong>Phone:</strong><br>
                            <a href="tel:7373733765">73 73 73 37 65</a>
                        </div>
                    </div>

                    <div class="branch-actions">
                        <a href="https://maps.app.goo.gl/ZBmaTmjGtuJY674RA" target="_blank" class="map-btn">
                            <i class="fas fa-map-location-dot"></i>
                            <span>Open Map</span>
                        </a>
                        <a href="tel:7373733765" class="call-btn">
                            <i class="fas fa-phone-alt"></i>
                            <span>Call Now</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Vaniyambadi Branch -->
            <div class="branch-card">
                <div class="branch-header"></div>

                <!-- Google Map — Vaniyambadi -->
                <iframe
                    class="branch-map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.0!2d78.6200!3d12.6833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDQxJzAwLjAiTiA3OMKwMzcnMTIuMCJF!5e0!3m2!1sen!2sin!4v1!5m2!1sen!2sin&q=SRM+Education+Vaniyambadi+Malangu+Road+Noorullapet"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

                <div class="branch-content">
                    <span class="branch-tag">City Branch</span>
                    <h3 class="branch-name">Vaniyambadi Campus</h3>
                    
                    <div class="branch-info-item">
                        <i class="fas fa-location-dot"></i>
                        <div>
                            <strong>Address:</strong><br>
                            No. 275/1, Malangu Road<br>
                            Noorullapet (Near City Union Bank), Vaniyambadi
                        </div>
                    </div>

                    <div class="branch-info-item">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <strong>Phone:</strong><br>
                            <a href="tel:7373733763">73 73 73 37 63</a>
                        </div>
                    </div>

                    <div class="branch-actions">
                        <a href="https://maps.app.goo.gl/d9CoMPqxD6wKN5VW9" target="_blank" class="map-btn">
                            <i class="fas fa-map-location-dot"></i>
                            <span>Open Map</span>
                        </a>
                        <a href="tel:7373733763" class="call-btn">
                            <i class="fas fa-phone-alt"></i>
                            <span>Call Now</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="cta-section">
    <div class="cta-content">
        <h2 class="cta-title">
            Admissions <span class="highlight">Open Now!</span>
        </h2>
        <p class="cta-text">
            Enroll today and take your first step toward a high-growth career with guidance from our expert faculty.
        </p>
        
        <div class="cta-buttons">
            <a href="#" onclick="openApplyModal(); return false;" class="btn-primary">
                <i class="fas fa-file-alt"></i>
                <span>Apply Online</span>
            </a>
            <a href="tel:7373733765" class="btn-outline">
                <i class="fas fa-comments"></i>
                <span>Talk to Counselor</span>
            </a>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
async function submitEnquiry(event) {
    event.preventDefault();
    
    const form = event.target;
    const btn = document.getElementById('submitBtn');
    const btnText = btn.querySelector('span');
    const originalText = btnText.innerText;
    
    btn.disabled = true;
    btnText.innerText = 'Sending...';

    const formData = new FormData(form);

    try {
        const response = await fetch('../save-enquiry.php', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) throw new Error('Server error');
        
        const result = await response.json();

        if (result.success === true) {
            Swal.fire({
                icon: 'success',
                title: 'Enquiry Sent!',
                text: 'We have received your message and will contact you shortly.',
                confirmButtonColor: '#F59E0B'
            });
            form.reset();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Missing Fields',
                text: 'Please ensure all required fields are filled out correctly.',
                confirmButtonColor: '#1E293B'
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Submission Failed',
            text: 'Connection error. Please try again later.',
            confirmButtonColor: '#1E293B'
        });
    } finally {
        btn.disabled = false;
        btnText.innerText = originalText;
    }
}
</script>