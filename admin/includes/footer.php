</main> <footer class="mt-auto w-full border-t border-slate-100 bg-white/50 py-6 px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-[#1A1A2E] font-brand tracking-tighter uppercase">
                        SRM <span class="text-[#FF6B2B]">Central</span>
                    </span>
                    <span class="h-4 w-[1px] bg-slate-200 mx-2"></span>
                    <p class="text-[11px] text-[#666] font-medium">
                        &copy; <?= date('Y'); ?> SRM Education. All rights reserved.
                    </p>
                </div>

                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        <span class="text-[10px] font-bold text-[#1A1A2E] uppercase tracking-widest">v1.0.4 Stable</span>
                    </div>
                    <div class="flex gap-4">
                        <a href="#" class="text-[11px] font-bold text-[#666] hover:text-[#FF6B2B] transition-colors uppercase tracking-tighter">Support</a>
                        <a href="#" class="text-[11px] font-bold text-[#666] hover:text-[#FF6B2B] transition-colors uppercase tracking-tighter">Privacy</a>
                    </div>
                </div>
            </div>
        </footer>
    </div> </div> <script>
    /**
     * Mobile Sidebar Toggle
     */
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) {
            sidebar.classList.toggle('-translate-x-full');
        }
    }

    /**
     * Smooth UI Transitions
     * Prevents content flickering on page load
     */
    document.addEventListener('DOMContentLoaded', () => {
        document.body.classList.add('loaded');
        
        // Auto-close sidebar on mobile when a link is clicked
        const navLinks = document.querySelectorAll('.nav-item');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    toggleSidebar();
                }
            });
        });
    });
</script>

</body>
</html>