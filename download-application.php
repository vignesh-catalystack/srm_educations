<?php
require 'connect.php';          // ✅ root level

$stmt = $pdo->prepare("SELECT asset_value FROM admission_assets WHERE asset_key = 'application_form_pdf' LIMIT 1");
$stmt->execute();
$pdfPath     = $stmt->fetchColumn() ?: null;
$pdfFullPath = $pdfPath ? __DIR__ . '/' . $pdfPath : null;
$pdfExists   = $pdfFullPath && file_exists($pdfFullPath);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Application Form — SRM Education</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php include_once 'includes/header.php'; // ✅ root level ?>

<section class="min-h-screen bg-slate-50 flex items-center justify-center py-20 px-4">
    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-10 max-w-lg w-full text-center">

        <div class="w-20 h-20 rounded-2xl bg-red-50 flex items-center justify-center mx-auto mb-6">
            <i class="fa-solid fa-file-pdf text-red-500 text-4xl"></i>
        </div>

        <h1 class="text-2xl font-bold text-[#1A1A2E] mb-2">Application Form 2026</h1>
        <p class="text-sm text-slate-400 mb-8">
            Download the official admission application form, fill it out, and submit to the admissions office.
        </p>

        <?php if ($pdfExists): ?>

            <div class="flex items-center justify-center gap-4 text-xs text-slate-400 mb-8">
                <span><i class="fa-solid fa-file mr-1"></i> PDF Document</span>
                <span><i class="fa-solid fa-weight-hanging mr-1"></i> <?= round(filesize($pdfFullPath) / 1024, 1) ?> KB</span>
                <span><i class="fa-regular fa-calendar mr-1"></i> <?= date('d M Y', filemtime($pdfFullPath)) ?></span>
            </div>

            <!-- href is relative to root, no ../ needed -->
            <a href="<?= htmlspecialchars($pdfPath) ?>?v=<?= filemtime($pdfFullPath) ?>"
               download="SRM_Application_Form_2026.pdf"
               class="inline-flex items-center gap-3 bg-[#D32F2F] hover:bg-[#B71C1C] text-white
                      px-8 py-4 rounded-2xl text-sm font-bold transition-all
                      shadow-lg shadow-red-500/25">
                <i class="fa-solid fa-download"></i>
                Download Application Form
            </a>

            <p class="mt-4 text-xs text-slate-400">
                or
                <a href="<?= htmlspecialchars($pdfPath) ?>" target="_blank"
                   class="text-[#D32F2F] hover:underline font-semibold">
                    Preview in browser
                </a>
            </p>

        <?php else: ?>

            <div class="bg-amber-50 border border-amber-200 rounded-2xl px-6 py-5 text-sm text-amber-700 font-semibold">
                <i class="fa-solid fa-triangle-exclamation mr-2"></i>
                The application form is not available yet.<br>
                <span class="font-normal text-amber-600 text-xs mt-1 block">
                    Please check back later or contact the admissions office.
                </span>
            </div>

        <?php endif; ?>

    </div>
</section>

<?php include_once 'includes/footer.php'; // ✅ root level ?>

</body>
</html>