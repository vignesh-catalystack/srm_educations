<?php include '../../includes/header.php'; ?>

<style>
.student-wrapper {
    padding: 80px 20px 100px;
    background: linear-gradient(to bottom, #D32F2F 0%, #B71C1C 260px, #F8FAFC 260px, #F8FAFC 100%);
}

.student-container {
    max-width: 1100px;
    margin: auto;
    text-align: center;
}

.student-title {
    font-family: var(--font-head);
    font-size: 42px;
    color: #fff;
    letter-spacing: .05em;
    margin-bottom: 10px;
}

.student-subtitle {
    color: rgba(255,255,255,.9);
    font-size: 15px;
    margin-bottom: 60px;
}

.student-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 40px;
}

.student-card {
    background: #fff;
    border-radius: 20px;
    padding: 50px 40px;
    box-shadow: 0 25px 60px rgba(30,41,59,.12);
    transition: all .35s ease;
    position: relative;
    overflow: hidden;
}

.student-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(211,47,47,.04), transparent 60%);
}

.student-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 35px 70px rgba(30,41,59,.18);
}

.student-icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 25px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    background: rgba(211,47,47,.1);
    color: #D32F2F;
}

.student-card h3 {
    font-family: var(--font-head);
    font-size: 22px;
    margin-bottom: 14px;
}

.student-card p {
    font-size: 14px;
    color: #64748B;
    line-height: 1.6;
    margin-bottom: 28px;
}

.student-btn {
    display: inline-block;
    padding: 12px 30px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .06em;
    text-decoration: none;
    transition: all .3s ease;
}

.btn-result {
    background: #D32F2F;
    color: #fff;
}

.btn-result:hover {
    background: #B71C1C;
}

.btn-doc {
    background: #1E293B;
    color: #fff;
}

.btn-doc:hover {
    background: #0F172A;
}

@media(max-width:768px){
    .student-title {
        font-size: 30px;
    }
}
</style>

<section class="student-wrapper">

    <div class="student-container">

        <h1 class="student-title">Student Corner</h1>
        <p class="student-subtitle">
            Access your results and download official documents securely.
        </p>

        <div class="student-cards">

            <!-- RESULTS -->
            <div class="student-card">
                <div class="student-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <h3>View Results</h3>
                <p>
                    Check semester results, subject-wise marks,
                    grades and academic performance.
                </p>

                <a href="results.php" class="student-btn btn-result">
                    View Results
                </a>
            </div>

            <!-- DOCUMENTS -->
            <div class="student-card">
                <div class="student-icon" style="background:rgba(30,41,59,.08);color:#1E293B;">
                    <i class="fas fa-file-download"></i>
                </div>

                <h3>Download Documents</h3>
                <p>
                    Download certificates, mark sheets and
                    official documents issued by SRM.
                </p>

                <a href="documents.php" class="student-btn btn-doc">
                    Download Now
                </a>
            </div>

        </div>

    </div>

</section>

<?php include '../../includes/footer.php'; ?>