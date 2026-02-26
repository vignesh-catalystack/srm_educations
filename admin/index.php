<?php 
// Include config first to establish database connection
include_once 'includes/config.php'; 
include_once 'includes/header.php'; 
include_once 'includes/sidebar.php'; 

/** * FETCH DATA FROM YOUR SPECIFIC TABLES
 * Note: Table names updated to match your phpMyAdmin screenshot
 */
// 1. Total Applications (from applications_2026)
$app_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM applications_2026");
$count_apps = ($app_query) ? mysqli_fetch_assoc($app_query)['total'] : 0;

// 2. New Enquiries (from enquiries)
$enq_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM enquiries");
$count_enq = ($enq_query) ? mysqli_fetch_assoc($enq_query)['total'] : 0;

// 3. Gallery Items (from gallery_media)
$gal_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM gallery_media");
$count_gal = ($gal_query) ? mysqli_fetch_assoc($gal_query)['total'] : 0;
?>

<div class="flex-1 flex flex-col min-h-screen overflow-hidden bg-slate-50">
    <main class="flex-1 overflow-y-auto p-6 lg:p-10">
        
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-[#1A1A2E] font-brand uppercase tracking-tight">Dashboard Overview</h1>
            <p class="text-sm text-[#666]">Real-time data from <span class="font-bold text-[#FF6B2B]">srm_educations</span> database.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 group hover:border-[#FF6B2B] transition-all">
                <div class="h-12 w-12 rounded-2xl bg-[#FFF0E8] flex items-center justify-center mb-4 group-hover:bg-[#FF6B2B] transition-all">
                    <i class="fa-solid fa-file-invoice text-[#FF6B2B] group-hover:text-white"></i>
                </div>
                <p class="text-[11px] font-bold text-[#666] uppercase tracking-widest">Applications 2026</p>
                <h3 class="text-2xl font-bold text-[#1A1A2E] mt-1"><?php echo $count_apps; ?></h3>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 group hover:border-[#FF6B2B] transition-all">
                <div class="h-12 w-12 rounded-2xl bg-[#FFF0E8] flex items-center justify-center mb-4 group-hover:bg-[#FF6B2B] transition-all">
                    <i class="fa-solid fa-envelope-open-text text-[#FF6B2B] group-hover:text-white"></i>
                </div>
                <p class="text-[11px] font-bold text-[#666] uppercase tracking-widest">Total Enquiries</p>
                <h3 class="text-2xl font-bold text-[#1A1A2E] mt-1"><?php echo $count_enq; ?></h3>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 group hover:border-[#FF6B2B] transition-all">
                <div class="h-12 w-12 rounded-2xl bg-[#FFF0E8] flex items-center justify-center mb-4 group-hover:bg-[#FF6B2B] transition-all">
                    <i class="fa-solid fa-images text-[#FF6B2B] group-hover:text-white"></i>
                </div>
                <p class="text-[11px] font-bold text-[#666] uppercase tracking-widest">Gallery Media</p>
                <h3 class="text-2xl font-bold text-[#1A1A2E] mt-1"><?php echo $count_gal; ?></h3>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                <h2 class="font-bold text-[#1A1A2E] font-brand uppercase tracking-tight">Recent Applications (2026)</h2>
                <a href="applications.php" class="text-xs font-bold text-[#FF6B2B] hover:underline">Manage All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="p-4 text-[10px] uppercase font-bold text-[#666]">Student Name</th>
                            <th class="p-4 text-[10px] uppercase font-bold text-[#666]">Course/Program</th>
                            <th class="p-4 text-[10px] uppercase font-bold text-[#666]">Submission Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <?php
                        // Fetching latest 5 from applications_2026
                        $query = "SELECT * FROM applications_2026 ORDER BY id DESC LIMIT 5";
                        $result = mysqli_query($conn, $query);

                        if($result && mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="p-4 text-sm font-semibold text-[#1A1A2E]"><?php echo htmlspecialchars($row['name'] ?? 'N/A'); ?></td>
                                    <td class="p-4 text-sm text-[#666]"><?php echo htmlspecialchars($row['course'] ?? 'General'); ?></td>
                                    <td class="p-4 text-sm text-[#666]">
                                        <?php echo isset($row['created_at']) ? date('M d, Y', strtotime($row['created_at'])) : 'Recent'; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='3' class='p-10 text-center text-sm text-slate-400 italic'>No records found in applications_2026 table.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <?php include_once 'includes/footer.php'; ?>