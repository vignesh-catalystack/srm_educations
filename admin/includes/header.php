<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRM Admin | Management Suite</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --se-orange: #FF6B2B;
            --se-orange-light: #FF8C55;
            --se-orange-pale: #FFF0E8;
            --se-navy: #1A1A2E;
            --se-muted: #666;
            --bg: #FFFFFF;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #FDFDFD;
            color: var(--se-navy);
            margin: 0;
        }

        .srm-font { font-family: 'Rajdhani', sans-serif; }

        /* Premium Header Glassmorphism */
        .header-main {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 107, 43, 0.1);
        }

        /* Search Bar Interaction */
        .search-container {
            background: var(--se-orange-pale);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid transparent;
        }
        .search-container:focus-within {
            background: #fff;
            border-color: var(--se-orange);
            box-shadow: 0 0 0 4px rgba(255, 107, 43, 0.1);
            width: 320px !important;
        }

        /* Avatar Squircle Shape */
        .avatar-box {
            background: var(--se-navy);
            clip-path: path('M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0Z');
            /* Optimized for 48px height in tailwind */
        }

        .badge-pulse {
            animation: pulse-orange 2s infinite;
        }
        @keyframes pulse-orange {
            0% { box-shadow: 0 0 0 0 rgba(255, 107, 43, 0.5); }
            70% { box-shadow: 0 0 0 8px rgba(255, 107, 43, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 107, 43, 0); }
        }
    </style>
</head>
<body class="antialiased">

<header class="header-main sticky top-0 z-[100] h-20 shadow-[0_4px_20px_rgba(0,0,0,0.03)]">
    <div class="h-full max-w-[1920px] mx-auto px-6 lg:px-10 flex items-center justify-between">
        
        <div class="flex items-center gap-8">
            <button onclick="toggleSidebar()" class="lg:hidden text-se-navy hover:text-se-orange transition">
                <i class="fa-solid fa-bars-staggered text-2xl"></i>
            </button>
            
            <a href="index.php" class="flex items-center gap-4 group">
                <div class="relative transition-transform duration-300 group-hover:scale-105">
                    <img src="./../assets/images/srm-main-logo.png" alt="SRM Logo" class="h-10 lg:h-12 w-auto object-contain">
                </div>
                <div class="hidden xl:block h-8 w-[1px] bg-slate-200 mx-2"></div>
                <div class="hidden md:block">
                    <h1 class="text-se-navy text-xl font-bold srm-font leading-none tracking-tight">
                        ADMIN <span class="text-[#FF6B2B]">CENTRAL</span>
                    </h1>
                    <p class="text-se-muted text-[10px] uppercase tracking-[3px] mt-1 font-bold">Educational Excellence</p>
                </div>
            </a>
        </div>

        <div class="flex items-center gap-4 lg:gap-6">
            
            <div class="hidden lg:flex items-center px-4 py-2.5 rounded-2xl w-56 search-container group">
                <i class="fa-solid fa-magnifying-glass text-se-orange/60 group-focus-within:text-se-orange"></i>
                <input type="text" placeholder="Search data..." class="bg-transparent border-none text-sm focus:outline-none ml-3 text-se-navy placeholder-se-muted w-full">
            </div>

            <button class="relative p-3 text-se-navy/70 hover:text-se-orange hover:bg-se-orange-pale rounded-2xl transition">
                <i class="fa-regular fa-bell text-xl"></i>
                <span class="absolute top-2.5 right-2.5 w-2.5 h-2.5 bg-se-orange rounded-full border-2 border-white badge-pulse"></span>
            </button>

            <div class="flex items-center gap-4 pl-6 border-l border-slate-100">
                <div class="hidden lg:block text-right">
                    <p class="text-se-navy font-bold text-sm leading-none srm-font uppercase">Admin User</p>
                    <p class="text-se-orange text-[11px] font-bold mt-1 uppercase tracking-tighter">System Manager</p>
                </div>
                
                <div class="relative group">
                    <div class="h-12 w-12 rounded-2xl bg-se-orange p-[2px] shadow-lg transition-all duration-500 group-hover:rotate-[10deg]">
                        <div class="h-full w-full rounded-[14px] bg-white overflow-hidden flex items-center justify-center">
                            <i class="fa-solid fa-user-gear text-se-navy text-xl"></i>
                        </div>
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="flex min-h-[calc(100vh-80px)]">