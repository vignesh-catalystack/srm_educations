<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect with SRM Education</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1E293B; /* Professional Education Blue */
            --accent-color: #F59E0B;  /* Noticeable Yellow from your image */
            --text-dark: #1E293B;
            --bg-gradient: linear-gradient(135deg, #F8FAFC 0%, #F8FAFC 100%);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: #F8FAFC;
            width: 100%;
            max-width: 450px;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(30,41,59,0.1);
            overflow: hidden;
            text-align: center;
            padding: 40px 25px;
        }

        .header h1 {
            color: var(--primary-color);
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
            font-weight: 700;
        }

        .header p {
            color: #1E293B;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .address-section {
            display: grid;
            gap: 15px;
            margin-bottom: 35px;
        }

        .address-card {
            background: #F8FAFC; /* Light yellow tint to match branding */
            border-left: 5px solid var(--accent-color);
            padding: 15px;
            border-radius: 12px;
            text-align: left;
            transition: transform 0.2s;
        }

        .address-card:hover {
            transform: translateY(-3px);
        }

        .branch-name {
            font-weight: 700;
            color: var(--text-dark);
            font-size: 18px;
            display: block;
            margin-bottom: 5px;
        }

        .address-text {
            font-size: 13px;
            color: #1E293B;
            line-height: 1.4;
        }

        .phone-link {
            display: inline-block;
            margin-top: 8px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
        }

        .social-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .social-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px 10px;
            border-radius: 15px;
            text-decoration: none;
            color: #F8FAFC;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(30,41,59,0.1);
        }

        .social-btn i {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .facebook { background: #F59E0B; }
        .instagram { background: linear-gradient(45deg, #F59E0B 0%, #F59E0B 25%, #D32F2F 50%, #D32F2F 75%, #D32F2F 100%); }
        .whatsapp { background: #F59E0B; }

        .social-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(30,41,59,0.2);
        }

        .footer-note {
            margin-top: 30px;
            font-size: 12px;
            color: #1E293B;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>SRM EDUCATION</h1>
            <p>Empowering Your Future</p>
        </div>

        <div class="address-section">
            <div class="address-card">
                <span class="branch-name">AMBUR</span>
                <div class="address-text">
                    50, Anandha Nagar, Bye Pass Road<br>
                    Near Amirtham Hotel
                </div>
                <a href="tel:+917373733765" class="phone-link">
                    <i class="fa-solid fa-phone"></i> 73 73 73 37 65
                </a>
            </div>

            <div class="address-card">
                <span class="branch-name">VANIYAMBADI</span>
                <div class="address-text">
                    No. 275/1, Malangu Road, Noorullapet<br>
                    (Near City Union Bank)
                </div>
                <a href="tel:+917373733763" class="phone-link">
                    <i class="fa-solid fa-phone"></i> 73 73 73 37 63
                </a>
            </div>
        </div>

        <div class="social-grid">
            <a href="https://facebook.com/yourlink" class="social-btn facebook">
                <i class="fa-brands fa-facebook"></i>
                Facebook
            </a>
            <a href="https://instagram.com/yourlink" class="social-btn instagram">
                <i class="fa-brands fa-instagram"></i>
                Instagram
            </a>
            <a href="https://wa.me/917373733765" class="social-btn whatsapp">
                <i class="fa-brands fa-whatsapp"></i>
                WhatsApp
            </a>
        </div>

        <div class="footer-note">
            Scan for instant contact and location updates.
        </div>
    </div>

</body>
</html>
