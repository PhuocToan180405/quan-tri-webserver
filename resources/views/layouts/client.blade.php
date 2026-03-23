<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Client Panel — Hosting Management">
    <title>@yield('title', 'Client Panel') — {{ config('app.name') }}</title>
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
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-accent-500 flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-brand-500/30">
                        {{ mb_substr(Auth::user()->ten ?? 'C', 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-white truncate">{{ Auth::user()->username }}</p>
                        <p class="text-xs text-sidebar-text italic">{{ request()->ip() }}</p>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto sidebar-scroll py-4 px-3 space-y-6">

                {{-- Hosting Management --}}
                <div>
                    <p class="px-3 mb-2 text-[11px] font-semibold uppercase tracking-wider text-sidebar-heading">Hosting Management</p>
                    <ul class="space-y-0.5">
                        <li>
                            <a href="{{ route('client.dashboard') }}"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text {{ request()->routeIs('client.dashboard') ? 'active' : '' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/></svg>
                                My Domains
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                                My Websites (Nginx)
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                                SSL Certificates
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Monitoring & Support --}}
                <div>
                    <p class="px-3 mb-2 text-[11px] font-semibold uppercase tracking-wider text-sidebar-heading">Monitoring & Support</p>
                    <ul class="space-y-0.5">
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                                Zabbix Metrics
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/></svg>
                                Chatbot Support
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Account --}}
                <div>
                    <p class="px-3 mb-2 text-[11px] font-semibold uppercase tracking-wider text-sidebar-heading">Account</p>
                    <ul class="space-y-0.5">
                        <li>
                            <a href="#"
                               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-sidebar-text">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('password.change') }}"
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
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand-500 to-accent-500 flex items-center justify-center text-white text-xs font-bold shadow">
                            {{ mb_substr(Auth::user()->ten ?? 'C', 0, 1) }}
                        </div>
                        <div class="hidden sm:block text-left">
                            <p class="text-sm font-medium text-dark-200">{{ Auth::user()->ho_ten }}</p>
                            <p class="text-[11px] text-dark-500">Client</p>
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
