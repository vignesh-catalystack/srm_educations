<?php 
// 1. Database Connection
require '../connect.php'; 

// ============================================================
// PDF UPLOAD LOGIC — using admission_assets table
// ============================================================
$assetKey = 'application_form_pdf';

// Ensure row exists in admission_assets
$pdo->prepare("INSERT IGNORE INTO admission_assets (asset_key, asset_value) VALUES (?, '')")
    ->execute([$assetKey]);

$pdfMessage = '';
$pdfMsgType = '';

// Handle Upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['pdf_file']['name'])) {
    $file = $_FILES['pdf_file'];
    $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $pdfMessage = 'Upload error. Please try again.';
        $pdfMsgType = 'error';
    } elseif ($ext !== 'pdf') {
        $pdfMessage = 'Only PDF files are allowed.';
        $pdfMsgType = 'error';
    } elseif ($file['size'] > 20 * 1024 * 1024) {
        $pdfMessage = 'File must be under 20 MB.';
        $pdfMsgType = 'error';
    } else {
        $uploadDir = __DIR__ . '/../assets/uploads/forms/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        // Fixed filename — DB path never changes
        $fileName   = 'application.pdf';
        $targetPath = $uploadDir . $fileName;
        $dbPath     = 'assets/uploads/forms/' . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $pdo->prepare("UPDATE admission_assets SET asset_value = ? WHERE asset_key = ?")
                ->execute([$dbPath, $assetKey]);
            $pdfMessage = 'Application PDF uploaded successfully!';
            $pdfMsgType = 'success';
        } else {
            $pdfMessage = 'Could not save file. Check assets/uploads/forms/ permissions.';
            $pdfMsgType = 'error';
        }
    }
}

// Handle Remove
if (isset($_GET['remove_pdf'])) {
    $stmt = $pdo->prepare("SELECT asset_value FROM admission_assets WHERE asset_key = ? LIMIT 1");
    $stmt->execute([$assetKey]);
    $oldPath = $stmt->fetchColumn();
    if ($oldPath && file_exists(__DIR__ . '/../' . $oldPath)) {
        @unlink(__DIR__ . '/../' . $oldPath);
    }
    $pdo->prepare("UPDATE admission_assets SET asset_value = '' WHERE asset_key = ?")
        ->execute([$assetKey]);
    header('Location: applications.php');
    exit;
}

// Fetch current PDF status
$stmt = $pdo->prepare("SELECT asset_value FROM admission_assets WHERE asset_key = ? LIMIT 1");
$stmt->execute([$assetKey]);
$currentPdfPath = $stmt->fetchColumn() ?: null;
$pdfFullPath    = $currentPdfPath ? __DIR__ . '/../' . $currentPdfPath : null;
$pdfExists      = $pdfFullPath && file_exists($pdfFullPath);
// ============================================================

// 2. Layout Parts (after upload logic so messages show)
include_once 'includes/header.php'; 
include_once 'includes/sidebar.php';

// 3. Fetch applications
$result = $pdo->query("SELECT * FROM applications_2026 ORDER BY id DESC");
?>

<div class="flex-1 flex flex-col min-h-screen bg-slate-50">
    <main class="flex-1 overflow-y-auto p-6 lg:p-10">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-bold text-[#1A1A2E] font-brand tracking-tight uppercase">
                    Applications <span class="text-[#FF6B2B]">2026</span>
                </h1>
                <p class="text-sm text-[#666] mt-1">Manage and review student enrollment submissions.</p>
            </div>
            
            <div class="flex items-center gap-4 bg-white p-2 rounded-2xl shadow-sm border border-slate-100">
                <div class="px-4 py-2 text-center border-r border-slate-100">
                    <p class="text-[10px] font-bold text-[#666] uppercase">Total</p>
                    <p class="text-lg font-bold text-[#1A1A2E]"><?= $result->rowCount() ?></p>
                </div>
                <button class="bg-[#FF6B2B] hover:bg-[#FF8C55] text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-all shadow-lg shadow-[#FF6B2B]/20">
                    <i class="fa-solid fa-file-export mr-2"></i> Export CSV
                </button>
            </div>
        </div>

        <!-- ============================================================
             SUCCESS / ERROR MESSAGE
             ============================================================ -->
        <?php if ($pdfMessage): ?>
        <div class="mb-4 flex items-center gap-3 px-5 py-3.5 rounded-2xl text-sm font-semibold
            <?= $pdfMsgType === 'success'
                ? 'bg-green-50 text-green-700 border border-green-200'
                : 'bg-red-50 text-red-700 border border-red-200' ?>">
            <i class="fa-solid fa-<?= $pdfMsgType === 'success' ? 'circle-check' : 'circle-exclamation' ?>"></i>
            <?= htmlspecialchars($pdfMessage) ?>
        </div>
        <?php endif; ?>

        <!-- ============================================================
             APPLICATION PDF UPLOAD CARD
             ============================================================ -->
        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-6 mb-6 flex flex-wrap items-center gap-6">

            <!-- Icon + label -->
            <div class="flex items-center gap-3 flex-shrink-0">
                <div class="w-11 h-11 rounded-xl bg-red-50 flex items-center justify-center">
                    <i class="fa-solid fa-file-pdf text-red-500 text-lg"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-[#1A1A2E]">Application Form PDF</p>
                    <p class="text-[11px] text-slate-400">Shown on public download page</p>
                </div>
            </div>

            <!-- Current file status -->
            <div class="flex items-center gap-2">
                <div class="w-2 h-2 rounded-full <?= $pdfExists ? 'bg-green-400' : 'bg-slate-300' ?>"></div>
                <span class="text-xs font-bold <?= $pdfExists ? 'text-green-600' : 'text-slate-400' ?>">
                    <?php if ($pdfExists): ?>
                        Live &nbsp;·&nbsp; <?= round(filesize($pdfFullPath) / 1024, 1) ?> KB
                        &nbsp;·&nbsp; Updated <?= date('d M Y', filemtime($pdfFullPath)) ?>
                    <?php else: ?>
                        No PDF uploaded yet
                    <?php endif; ?>
                </span>
            </div>

            <!-- Upload form -->
            <form method="POST" enctype="multipart/form-data"
                  class="flex items-center gap-3 ml-auto flex-wrap">
                <label class="flex items-center gap-2 cursor-pointer bg-slate-50 border border-slate-200
                              hover:border-[#FF6B2B] hover:bg-[#FFF8F5] transition-all
                              px-4 py-2.5 rounded-xl text-sm font-bold text-slate-500 hover:text-[#FF6B2B]">
                    <i class="fa-solid fa-folder-open text-xs"></i>
                    <span id="pdfFileName">Choose PDF</span>
                    <input type="file" name="pdf_file" accept="application/pdf,.pdf" class="hidden"
                           onchange="document.getElementById('pdfFileName').textContent = this.files[0] ? this.files[0].name : 'Choose PDF'">
                </label>
                <button type="submit"
                        class="bg-[#FF6B2B] hover:bg-[#e05a1f] text-white px-5 py-2.5 rounded-xl
                               text-sm font-bold transition-all shadow-md shadow-[#FF6B2B]/20
                               flex items-center gap-2">
                    <i class="fa-solid fa-upload text-xs"></i>
                    <?= $pdfExists ? 'Replace' : 'Upload' ?>
                </button>
            </form>

            <!-- Preview + Remove (only when PDF exists) -->
            <?php if ($pdfExists): ?>
            <div class="flex gap-2">
                <a href="../<?= htmlspecialchars($currentPdfPath) ?>" target="_blank"
                   class="p-2.5 bg-white border border-slate-200 text-slate-500 hover:text-[#FF6B2B]
                          hover:border-[#FF6B2B] rounded-xl transition-all text-xs"
                   title="Preview PDF">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <a href="applications.php?remove_pdf=1"
                   onclick="return confirm('Remove the current application PDF?')"
                   class="p-2.5 bg-white border border-slate-200 text-slate-500 hover:text-red-500
                          hover:border-red-300 rounded-xl transition-all text-xs"
                   title="Remove PDF">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </div>
            <?php endif; ?>

        </div>
        <!-- END PDF UPLOAD CARD -->

        <!-- ============================================================
             APPLICATIONS TABLE
             ============================================================ -->
        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest">App No</th>
                            <th class="px-6 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest">Student Details</th>
                            <th class="px-6 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest">Selected Course</th>
                            <th class="px-6 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest">Contact</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <?php if ($result->rowCount() > 0): ?>
                            <?php foreach ($result as $row): ?>
                            <tr class="group hover:bg-[#FFF0E8]/30 transition-all duration-300">
                                <td class="px-8 py-6">
                                    <span class="bg-[#1A1A2E] text-white text-[10px] font-bold px-3 py-1.5 rounded-lg">
                                        #<?= htmlspecialchars($row['application_no']) ?>
                                    </span>
                                </td>

                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-full bg-[#FFF0E8] flex items-center justify-center text-[#FF6B2B] font-bold text-sm shadow-inner">
                                            <?= strtoupper(substr($row['applicant_name'], 0, 1)) ?>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-[#1A1A2E]"><?= htmlspecialchars($row['applicant_name']) ?></p>
                                            <p class="text-[11px] text-[#666]">
                                                Submitted: <?= isset($row['created_at']) ? date('d M, Y', strtotime($row['created_at'])) : '—' ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-6">
                                    <span class="text-sm font-semibold text-[#1A1A2E] bg-slate-100 px-3 py-1 rounded-md">
                                        <?= htmlspecialchars($row['course']) ?>
                                    </span>
                                </td>

                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-2 text-[#666] text-sm">
                                        <i class="fa-solid fa-phone text-[10px] text-[#FF6B2B]"></i>
                                        <?= htmlspecialchars($row['mobile']) ?>
                                    </div>
                                </td>

                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="../generate-pdf.php?id=<?= $row['id'] ?>" target="_blank" 
                                           class="p-2.5 bg-white border border-slate-200 text-[#FF6B2B] hover:bg-[#FF6B2B] hover:text-white rounded-xl transition-all shadow-sm"
                                           title="Download PDF">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </a>
                                        <button class="p-2.5 bg-white border border-slate-200 text-blue-500 hover:bg-blue-500 hover:text-white rounded-xl transition-all shadow-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fa-solid fa-folder-open text-4xl text-slate-200 mb-4"></i>
                                        <p class="text-slate-400 font-medium">No applications found for 2026 yet.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="bg-slate-50/50 px-8 py-4 border-t border-slate-100">
                <p class="text-[10px] text-[#666] uppercase font-bold tracking-widest">End of results</p>
            </div>
        </div>

    </main>

    <?php include_once 'includes/footer.php'; ?>
</div>