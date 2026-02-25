<footer style="background:#F8FAFC;color:#1E293B;border-top:3px solid var(--red, #D32F2F);">
    <div style="max-width:1280px;margin:0 auto;padding:48px 20px;">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:28px;">
            <div>
                <h3 style="font-family:'Rajdhani',sans-serif;font-size:30px;letter-spacing:.05em;margin:0 0 10px;">SRM Education</h3>
                <p style="color:rgba(30,41,59,.75);font-size:14px;line-height:1.7;margin:0 0 16px;">Empowering students with quality education and industry-relevant skills in healthcare and technology.</p>
                <div style="display:flex;gap:10px;">
                    <a href="#" style="width:36px;height:36px;border-radius:8px;background:#F8FAFC;border:1px solid #F8FAFC;display:flex;align-items:center;justify-content:center;color:#1E293B;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" style="width:36px;height:36px;border-radius:8px;background:#F8FAFC;border:1px solid #F8FAFC;display:flex;align-items:center;justify-content:center;color:#1E293B;"><i class="fab fa-instagram"></i></a>
                    <a href="#" style="width:36px;height:36px;border-radius:8px;background:#F8FAFC;border:1px solid #F8FAFC;display:flex;align-items:center;justify-content:center;color:#1E293B;"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div>
                <h4 style="font-family:'Rajdhani',sans-serif;font-size:22px;margin:0 0 12px;">Quick Links</h4>
                <p style="margin:0 0 8px;"><a href="index.php" style="color:#1E293B;">Home</a></p>
                <p style="margin:0 0 8px;"><a href="course.php" style="color:#1E293B;">Courses</a></p>
                <p style="margin:0 0 8px;"><a href="institution.php" style="color:#1E293B;">Institutions</a></p>
                <p style="margin:0 0 8px;"><a href="scholarship.php" style="color:#1E293B;">Scholarships</a></p>
                <p style="margin:0;"><a href="contact.php" style="color:#1E293B;">Contact</a></p>
            </div>

            <div>
                <h4 style="font-family:'Rajdhani',sans-serif;font-size:22px;margin:0 0 12px;">Ambur Campus</h4>
                <p style="color:#1E293B;font-size:14px;line-height:1.7;margin:0 0 8px;">#50, Anantha Nagar, Bye Pass Road, Near Amirtham Hotel</p>
                <p style="margin:0;"><a href="tel:+917373733765" style="color:#1E293B;font-weight:800;">+91 73 73 73 37 65</a></p>
            </div>

            <div>
                <h4 style="font-family:'Rajdhani',sans-serif;font-size:22px;margin:0 0 12px;">Vaniyambadi Campus</h4>
                <p style="color:#1E293B;font-size:14px;line-height:1.7;margin:0 0 8px;">No. 275/1, Malangu Road, Noorullapet (Near City Union Bank)</p>
                <p style="margin:0;"><a href="tel:+917373733763" style="color:#1E293B;font-weight:800;">+91 73 73 73 37 63</a></p>
            </div>
        </div>

        <div style="margin-top:28px;padding-top:16px;border-top:1px solid #F8FAFC;display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap;">
            <p style="margin:0;color:rgba(30,41,59,.75);font-size:13px;">&copy; 2026 SRM Education. All Rights Reserved.</p>
            <div style="display:flex;gap:16px;">
                <a href="#" style="color:rgba(30,41,59,.75);font-size:13px;">Privacy Policy</a>
                <a href="#" style="color:rgba(30,41,59,.75);font-size:13px;">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>

<button id="backToTopBtn" type="button" aria-label="Back to top" style="position:fixed;right:16px;bottom:16px;width:44px;height:44px;border:none;border-radius:999px;background:var(--red, #D32F2F);color:#F8FAFC;box-shadow:0 10px 22px rgba(var(--red-rgb, 211,47,47),.35);cursor:pointer;display:none;z-index:60;">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
(function () {
    const btn = document.getElementById('backToTopBtn');
    if (!btn) return;

    const toggle = () => {
        btn.style.display = window.scrollY > 280 ? 'inline-flex' : 'none';
        btn.style.alignItems = 'center';
        btn.style.justifyContent = 'center';
    };

    window.addEventListener('scroll', toggle, { passive: true });
    toggle();

    btn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
})();
</script>
</body>
</html>
