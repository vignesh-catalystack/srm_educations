<?php 
// 1. Database Connection & Layout
require '../connect.php'; 
include_once 'includes/header.php'; 
include_once 'includes/sidebar.php'; 

// 2. Fetching Data using PDO
$stmt = $pdo->query("SELECT * FROM enquiries ORDER BY id DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="flex-1 flex flex-col min-h-screen bg-slate-50">
    <main class="flex-1 overflow-y-auto p-6 lg:p-10">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-bold text-[#1A1A2E] font-brand tracking-tight uppercase">
                    Admission <span class="text-[#FF6B2B]">Enquiries</span>
                </h1>
                <p class="text-sm text-[#666] mt-1">Review and respond to messages from prospective students.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="bg-white px-4 py-2 rounded-xl shadow-sm border border-slate-100">
                    <p class="text-[10px] font-bold text-[#666] uppercase text-center">New Messages</p>
                    <p class="text-lg font-bold text-[#FF6B2B] text-center"><?= count($rows) ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest">Sender</th>
                            <th class="px-6 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest">Contact Info</th>
                            <th class="px-6 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest">Interested Course</th>
                            <th class="px-6 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest">Message Preview</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-[#666] uppercase tracking-widest text-right">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <?php if(count($rows) > 0): ?>
                            <?php foreach($rows as $r): ?>
                            <tr class="group hover:bg-[#FFF0E8]/40 transition-all duration-300">
                                
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-xl bg-[#1A1A2E] flex items-center justify-center text-white font-bold text-xs shadow-md">
                                            <?= strtoupper(substr($r['full_name'], 0, 1)) ?>
                                        </div>
                                        <p class="text-sm font-bold text-[#1A1A2E]"><?= htmlspecialchars($r['full_name']) ?></p>
                                    </div>
                                </td>

                                <td class="px-6 py-6">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-xs text-[#1A1A2E] font-medium flex items-center gap-2">
                                            <i class="fa-solid fa-envelope text-[10px] text-[#FF6B2B]"></i>
                                            <?= htmlspecialchars($r['email']) ?>
                                        </span>
                                        <span class="text-xs text-[#666] flex items-center gap-2">
                                            <i class="fa-solid fa-phone text-[10px] text-[#FF6B2B]"></i>
                                            <?= htmlspecialchars($r['phone']) ?>
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-6">
                                    <span class="inline-block bg-slate-100 text-[#1A1A2E] text-[11px] font-bold px-3 py-1 rounded-full border border-slate-200">
                                        <?= htmlspecialchars($r['course']) ?>
                                    </span>
                                </td>

                                <td class="px-6 py-6 max-w-xs">
                                    <p class="text-xs text-[#666] line-clamp-2 italic bg-slate-50 p-2 rounded-lg border-l-2 border-[#FF6B2B]">
                                        "<?= htmlspecialchars($r['message']) ?>"
                                    </p>
                                </td>

                                <td class="px-8 py-6 text-right">
                                    <p class="text-[11px] font-bold text-[#1A1A2E] mb-1">
                                        <?= date('d M, Y', strtotime($r['created_at'])) ?>
                                    </p>
                                    <p class="text-[10px] text-[#666]">
                                        <?= date('h:i A', strtotime($r['created_at'])) ?>
                                    </p>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="h-16 w-16 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fa-solid fa-comment-slash text-2xl text-slate-300"></i>
                                        </div>
                                        <p class="text-slate-400 font-medium">No enquiry messages found.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include_once 'includes/footer.php'; ?>
</div>