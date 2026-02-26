<aside id="sidebar" class="fixed inset-y-0 left-0 z-[90] w-72 bg-white transform -translate-x-full lg:translate-x-0 lg:static transition-transform duration-300 ease-in-out border-r border-slate-100 flex flex-col shadow-sm">
    
    <div class="flex-1 overflow-y-auto px-4 py-6 custom-sidebar">
        
        <div class="mb-8">
            <div class="flex items-center justify-between px-4 mb-4">
                <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Main</p>
                <button onclick="toggleSidebar()" class="lg:hidden text-slate-300 hover:text-red-500">
                    <i class="fa-solid fa-circle-xmark text-lg"></i>
                </button>
            </div>

            <nav class="space-y-1">
                <a href="index.php" class="nav-item group active">
                    <i class="fa-solid fa-compass w-6 text-center"></i>
                    <span>Dashboard</span>
                    <span class="ml-auto bg-[#FF6B2B] text-[9px] text-white px-2 py-0.5 rounded-md font-bold uppercase tracking-tighter">active</span>
                </a>

                <a href="applications.php" class="nav-item group">
                    <i class="fa-solid fa-file-lines w-6 text-center"></i>
                    <span>Applications</span>
                </a>

                <a href="enquiries.php" class="nav-item group">
                    <i class="fa-solid fa-envelope-open w-6 text-center"></i>
                    <span>Enquiries</span>
                </a>

                <a href="gallery.php" class="nav-item group">
                    <i class="fa-solid fa-images w-6 text-center"></i>
                    <span>Gallery</span>
                </a>
            </nav>
        </div>

        <div>
            <p class="px-4 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-4">Account</p>
            <nav class="space-y-1">
                <a href="settings.php" class="nav-item group">
                    <i class="fa-solid fa-circle-info w-6 text-center"></i>
                    <span>Settings</span>
                </a>
                <a href="profile.php" class="nav-item group">
                    <i class="fa-solid fa-plus w-6 text-center"></i>
                    <span>Profile Setup</span>
                </a>
                <a href="logout.php" class="nav-item group text-red-500 hover:bg-red-50">
                    <i class="fa-solid fa-gear w-6 text-center"></i>
                    <span>Logout.app</span>
                </a>
            </nav>
        </div>
    </div>
</aside>

<style>
    /* Premium Sidebar Nav Styles */
    .nav-item {
        display: flex;
        align-items: center;
        padding: 12px 16px;
        border-radius: 12px;
        color: #64748B;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .nav-item i {
        color: #94A3B8;
        transition: all 0.2s ease;
    }

    /* Hover States */
    .nav-item:hover {
        background-color: #F8FAFC;
        color: #1A1A2E;
    }
    
    .nav-item:hover i {
        color: #FF6B2B;
    }

    /* Active State (As per your image) */
    .nav-item.active {
        background-color: #F8FAFC;
        color: #1A1A2E;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }
    
    .nav-item.active i {
        color: #FF6B2B;
    }

    .custom-sidebar::-webkit-scrollbar { width: 4px; }
    .custom-sidebar::-webkit-scrollbar-thumb { background: #F1F5F9; border-radius: 10px; }
</style>