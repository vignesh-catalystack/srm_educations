<?php include '../../includes/header.php'; ?>

<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #F9F5E9;
        color: #082713;
        --red: #094E29;
        --red2: #094E29;
    }

    .bg-forest { background-color: #094E29; }
    .text-forest { color: #094E29; }
    .border-forest { border-color: #094E29; }

    .site-header .logo-badge {
        width: 260px;
        height: 90px;
        background-image: url('../../assets/images/srm-hs-logo.png') !important;
        background-repeat: no-repeat !important;
        background-position:  right !important;
        background-size: auto 100% !important;
        box-shadow: none;
        border-radius: 0;
        color: transparent;
        font-size: 0;
        letter-spacing: 0;
    }

    .site-header .logo-text-wrap {
        display: none;
    }

    .site-header .logo-link {
        gap: 0;
    }

    .site-header .nav-cta {
        box-shadow: 0 4px 14px rgba(9, 78, 41, 0.3) !important;
    }

    @media (max-width: 768px) {
        .site-header .logo-badge {
            width: 190px;
            height: 50px;
        }
    }

    .hero-gradient {
        background: linear-gradient(135deg, #F9F5E9 0%, #E9EED9 100%);
    }

    footer {
        border-top-color: #094E29 !important;
    }

    #backToTopBtn {
        background: #094E29 !important;
        box-shadow: 0 10px 22px rgba(9, 78, 41, 0.35) !important;
    }

    .card-shadow {
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(8, 39, 19, 0.05);
    }

    .card-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(8, 39, 19, 0.1);
    }

    .btn-primary {
        background-color: #094E29;
        color: white;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 600;
        transition: opacity 0.3s;
    }

    .inst-brand {
        display: block;
        margin-bottom: 14px;
    }

    .inst-brand img {
        width: clamp(150px, 20vw, 240px);
        max-width: 100%;
        height: auto;
        display: block;
    }

    @media (max-width: 768px) {
        .inst-brand img {
            width: clamp(120px, 40vw, 180px);
        }
    }
</style>

<header class="hero-gradient min-h-[80vh] flex flex-col md:flex-row items-center px-10 md:px-20 py-10 overflow-hidden">
    <div class="md:w-1/2 space-y-6">
        <div class="inst-brand">
            <img src="../../assets/images/srm-hs-logo.png" alt="SRM Institute of Allied Health Science - Affiliated with SSDVCA">
        </div>
      
        <span class="inline-flex self-start bg-white/50 border border-forest/20 text-forest px-4 py-1 rounded-full text-sm font-semibold text-left">
            Excellence in Healthcare Education
        </span>
        <h1 class="text-5xl md:text-7xl font-bold leading-tight">
            Shape Your Future in <span class="text-forest">Medical Care.</span>
        </h1>
        <p class="text-lg text-gray-600 max-w-lg">
            Empowering the next generation of healthcare professionals with world-class clinical training and advanced paramedical curriculum.
        </p>
        <div class="flex space-x-4 pt-4">
            <button class="btn-primary">Explore Courses</button>
            <button class="flex items-center space-x-2 font-semibold text-forest">
                <span class="w-10 h-10 rounded-full border border-forest flex items-center justify-center">
                    <i class="fa-solid fa-play text-xs"></i>
                </span>
                <span>Watch Campus Tour</span>
            </button>
        </div>
    </div>
    <div class="md:w-1/2 mt-12 md:mt-0 relative">
        <div class="w-full h-[500px] bg-[#C4C6B5] rounded-[40px] overflow-hidden shadow-2xl">
            <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&q=80&w=1000" alt="Paramedical Students" class="w-full h-full object-cover">
        </div>
        <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl flex items-center space-x-4">
            <div class="bg-forest/10 p-3 rounded-xl">
                <i class="fa-solid fa-user-doctor text-forest text-2xl"></i>
            </div>
            <div>
                <p class="text-2xl font-bold">15k+</p>
                <p class="text-sm text-gray-500">Graduates Placed</p>
            </div>
        </div>
    </div>
</header>

<section id="about" class="py-24 px-10 md:px-20 bg-white">
    <div class="grid md:grid-cols-2 gap-16 items-center">
        <div class="grid grid-cols-2 gap-4">
            <img src="https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&q=80&w=600" class="rounded-3xl h-64 w-full object-cover mt-8" alt="Lab">
            <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?auto=format&fit=crop&q=80&w=600" class="rounded-3xl h-64 w-full object-cover" alt="Classroom">
        </div>
        <div class="space-y-6">
            <h3 class="text-forest font-bold tracking-widest uppercase text-sm">Our Legacy</h3>
            <h2 class="text-4xl font-bold">A Trusted Foundation for Clinical Excellence</h2>
            <p class="text-gray-600 leading-relaxed">
                Founded in 1998, MediCure Paramedical Institute has been at the forefront of healthcare education. We combine rigorous academic theory with hands-on clinical internships at leading multispecialty hospitals.
            </p>
            <ul class="space-y-4">
                <li class="flex items-center space-x-3">
                    <i class="fa-solid fa-circle-check text-forest"></i>
                    <span class="font-medium">UGC & MCI Recognized Programs</span>
                </li>
                <li class="flex items-center space-x-3">
                    <i class="fa-solid fa-circle-check text-forest"></i>
                    <span class="font-medium">100% Internship Guarantee</span>
                </li>
                <li class="flex items-center space-x-3">
                    <i class="fa-solid fa-circle-check text-forest"></i>
                    <span class="font-medium">State-of-the-Art Simulation Labs</span>
                </li>
            </ul>
            <button class="mt-4 border-2 border-forest text-forest px-8 py-3 rounded-full font-bold hover:bg-forest hover:text-white transition">Read Our Story</button>
        </div>
    </div>
</section>

<section id="courses" class="py-24 px-10 md:px-20">
    <div class="text-center mb-16 space-y-4">
        <h2 class="text-4xl font-bold text-forest">Professional Courses</h2>
        <p class="text-gray-500 max-w-2xl mx-auto">Choose from our wide range of diploma and degree programs designed to make you industry-ready from day one.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-[32px] card-shadow border border-gray-100">
            <div class="w-14 h-14 bg-[#E9EED9] rounded-2xl flex items-center justify-center mb-6">
                <i class="fa-solid fa-user-nurse text-forest text-xl"></i>
            </div>
            <h4 class="text-xl font-bold mb-3">Diploma in General Duty Assistant</h4>
            <p class="text-gray-500 mb-6 text-sm leading-relaxed">Foundational training in bedside patient care, ward support, and essential nursing assistance.</p>
            <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                <span class="font-bold">2 Years</span>
                <a href="#" class="text-forest font-semibold flex items-center">Apply <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[32px] card-shadow border border-gray-100">
            <div class="w-14 h-14 bg-[#E9EED9] rounded-2xl flex items-center justify-center mb-6">
                <i class="fa-solid fa-microscope text-forest text-xl"></i>
            </div>
            <h4 class="text-xl font-bold mb-3">Diploma in Medical Laboratory Technology</h4>
            <p class="text-gray-500 mb-6 text-sm leading-relaxed">Comprehensive diagnostics training in pathology, microbiology, and modern lab practices.</p>
            <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                <span class="font-bold">2 Years</span>
                <a href="#" class="text-forest font-semibold flex items-center">Apply <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[32px] card-shadow border border-gray-100">
            <div class="w-14 h-14 bg-[#E9EED9] rounded-2xl flex items-center justify-center mb-6">
                <i class="fa-solid fa-heart-pulse text-forest text-xl"></i>
            </div>
            <h4 class="text-xl font-bold mb-3">Diploma in Operation Theatre Technology</h4>
            <p class="text-gray-500 mb-6 text-sm leading-relaxed">Professional OT training focused on surgical support, sterilization, and theatre workflow.</p>
            <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                <span class="font-bold">2 Years</span>
                <a href="#" class="text-forest font-semibold flex items-center">Apply <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[32px] card-shadow border border-gray-100">
            <div class="w-14 h-14 bg-[#E9EED9] rounded-2xl flex items-center justify-center mb-6">
                <i class="fa-solid fa-truck-medical text-forest text-xl"></i>
            </div>
            <h4 class="text-xl font-bold mb-3">Diploma in Accident & Emergency Technology</h4>
            <p class="text-gray-500 mb-6 text-sm leading-relaxed">Skill-based emergency care training for trauma response and acute patient stabilization.</p>
            <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                <span class="font-bold">2 Years</span>
                <a href="#" class="text-forest font-semibold flex items-center">Apply <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[32px] card-shadow border border-gray-100">
            <div class="w-14 h-14 bg-[#E9EED9] rounded-2xl flex items-center justify-center mb-6">
                <i class="fa-solid fa-x-ray text-forest text-xl"></i>
            </div>
            <h4 class="text-xl font-bold mb-3">Diploma in X-Ray Technology</h4>
            <p class="text-gray-500 mb-6 text-sm leading-relaxed">Hands-on radiography training with patient positioning and radiation safety protocols.</p>
            <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                <span class="font-bold">2 Years</span>
                <a href="#" class="text-forest font-semibold flex items-center">Apply <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>

        <div class="bg-white p-8 rounded-[32px] card-shadow border border-gray-100">
            <div class="w-14 h-14 bg-[#E9EED9] rounded-2xl flex items-center justify-center mb-6">
                <i class="fa-solid fa-laptop-medical text-forest text-xl"></i>
            </div>
            <h4 class="text-xl font-bold mb-3">Diploma in CT Scan Technician</h4>
            <p class="text-gray-500 mb-6 text-sm leading-relaxed">Focused CT imaging course with scanner operation and diagnostic workflow training.</p>
            <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                <span class="font-bold">1 Year</span>
                <a href="#" class="text-forest font-semibold flex items-center">Apply <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>
    </div>

    <div class="mt-12 bg-white border border-gray-200 rounded-2xl p-6">
        <p class="text-gray-700 text-lg leading-relaxed text-center">
            100% Project Based Training | Well Qualified Faculties | Complete Placement Assistance | State-of-the-Art Lab
        </p>
    </div>

</section>

<?php include '../../includes/footer.php'; ?>
