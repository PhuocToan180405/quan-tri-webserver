<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panel — Webserver Infrastructure Management">
    <title>@yield('title', 'Admin Panel') — {{ config('app.name') }}</title>
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    {{-- Tailwind CDN + Config --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('styles')
</head>
<body class="bg-dark-950 text-dark-200 antialiased">

    {{-- ===== Flash Messages ===== --}}
    @if(session('success'))
        <div id="flash-success" class="fixed top-5 right-5 z-[100] animate-slide-down">
            <div class="flex items-center gap-3 px-5 py-3 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-300 shadow-lg">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-2 hover:text-white">&times;</button>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div id="flash-error" class="fixed top-5 right-5 z-[100] animate-slide-down">
            <div class="flex items-center gap-3 px-5 py-3 rounded-xl bg-red-500/20 border border-red-500/30 text-red-300 shadow-lg">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                <span class="text-sm font-medium">{{ session('error') }}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-2 hover:text-white">&times;</button>
            </div>
        </div>
    @endif

    <div class="flex min-h-screen">
        {{-- ===================== SIDEBAR ===================== --}}
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-sidebar flex flex-col border-r border-sidebar-border
                   transform -translate-x-full lg:translate-x-0 lg:static lg:inset-auto
                   transition-transform duration-300 ease-in-out">

            {{-- Profile Section --}}
            <div class="px-5 py-5 border-b border-sidebar-border">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-orange-500 flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-brand-500/30">
                        {{ mb_substr(Auth::user()->ten ?? 'A', 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-white truncate">{{ Auth::user()->username }}</p>
                        <p class="text-xs text-sidebar-text italic">{{ request()->ip() }}</p>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto sidebar-scroll py-4 px-3 space-y-6">

                {{-- Main Navigation --}}
                <div>
                    <p class="px-3 mb-2 text-[11px] font-semibold uppercase tracking-wider text-sidebar-heading">Main Navigation</p>
                    <ul class="space-y-0.5">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                Account
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                                Management Account
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                                Backup
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Utility Items --}}
                <div>
                    <p class="px-3 mb-2 text-[11px] font-semibold uppercase tracking-wider text-sidebar-heading">Utility</p>
                    <ul class="space-y-0.5">
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Cronjob
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/></svg>
                                Supervisor
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z"/></svg>
                                SSH
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- More Items --}}
                <div>
                    <p class="px-3 mb-2 text-[11px] font-semibold uppercase tracking-wider text-sidebar-heading">More</p>
                    <ul class="space-y-0.5">
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                                Activity Log
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                                Security
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/></svg>
                                Notification
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- Logout --}}
            <div class="px-3 py-4 border-t border-sidebar-border">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="sidebar-link w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-red-400 hover:!text-red-300 hover:!bg-red-500/10 hover:!border-l-red-500 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Sidebar overlay for mobile --}}
        <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm hidden lg:hidden" onclick="toggleSidebar()"></div>

        {{-- ===================== MAIN WRAPPER ===================== --}}
        <div class="flex-1 flex flex-col min-h-screen lg:min-w-0">

            {{-- ========== HEADER ========== --}}
            <header class="sticky top-0 z-30 h-16 bg-dark-900/80 backdrop-blur-md border-b border-dark-800 flex items-center justify-between px-4 lg:px-6">
                {{-- Left: Hamburger + Search --}}
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="lg:hidden text-dark-400 hover:text-white transition p-1.5 rounded-lg hover:bg-dark-800" aria-label="Toggle sidebar">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                    </button>
                    <div class="hidden sm:flex items-center gap-2 bg-dark-800/50 rounded-xl px-3.5 py-2 border border-dark-700 focus-within:border-brand-500/50 transition w-72">
                        <svg class="w-4 h-4 text-dark-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                        <input type="text" placeholder="Search..." class="bg-transparent text-sm text-dark-200 placeholder-dark-500 outline-none w-full">
                    </div>
                </div>

                {{-- Right: User dropdown --}}
                <div class="relative">
                    <button onclick="toggleDropdown()" id="user-menu-btn"
                        class="flex items-center gap-2.5 px-3 py-1.5 rounded-xl hover:bg-dark-800 transition">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand-500 to-orange-500 flex items-center justify-center text-white text-xs font-bold shadow">
                            {{ mb_substr(Auth::user()->ten ?? 'A', 0, 1) }}
                        </div>
                        <div class="hidden sm:block text-left">
                            <p class="text-sm font-medium text-dark-200">{{ Auth::user()->ho_ten }}</p>
                            <p class="text-[11px] text-dark-500">Administrator</p>
                        </div>
                        <svg class="w-4 h-4 text-dark-500 hidden sm:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                    </button>

                    {{-- Dropdown menu --}}
                    <div id="user-dropdown"
                        class="hidden absolute right-0 mt-2 w-56 bg-dark-800 border border-dark-700 rounded-xl shadow-2xl shadow-black/40 overflow-hidden animate-slide-down">
                        <div class="px-4 py-3 border-b border-dark-700">
                            <p class="text-sm font-medium text-white">{{ Auth::user()->ho_ten }}</p>
                            <p class="text-xs text-dark-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="py-1">
                            <a href="#" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-dark-300 hover:bg-dark-700 hover:text-white transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                Profile
                            </a>
                            <a href="{{ route('password.change') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-dark-300 hover:bg-dark-700 hover:text-white transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                                Change Password
                            </a>
                        </div>
                        <div class="border-t border-dark-700 py-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 hover:text-red-300 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            {{-- ========== MAIN CONTENT ========== --}}
            <main class="flex-1 p-4 lg:p-6">
                @yield('content')
            </main>

            {{-- ========== FOOTER ========== --}}
            <footer class="border-t border-dark-800 px-4 lg:px-6 py-4">
                <p class="text-xs text-dark-500 text-center">© 2026 Webserver Infrastructure Management Project</p>
            </footer>
        </div>
    </div>

    {{-- Shared JS --}}
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
