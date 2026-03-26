<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="InfraGate — Ultimate Webserver Infrastructure Management">
    <title>@yield('title', 'InfraGate') — {{ config('app.name') }}</title>
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    {{-- Tailwind CDN + Config --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('styles')
</head>
<body class="bg-dark-950 text-dark-200 antialiased flex flex-col min-h-screen">

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

    {{-- ===================== FIXED HEADER ===================== --}}
    <header class="fixed top-0 left-0 right-0 z-50 bg-dark-950/80 backdrop-blur-xl border-b border-dark-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">

                {{-- Left: Logo --}}
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-brand-500 to-orange-500 flex items-center justify-center shadow-lg shadow-brand-500/25 group-hover:shadow-brand-500/40 transition-shadow">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                    </div>
                    <div>
                        <span class="text-white font-bold text-lg tracking-tight hidden sm:inline">InfraGate</span>
                        <span class="text-dark-500 font-medium text-xs hidden md:inline ml-1">— Ultimate Management</span>
                    </div>
                </a>

                {{-- Center: Navigation --}}
                <nav class="hidden md:flex items-center gap-1">
                    <a href="{{ url('/') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800/50 transition-all duration-200">Home</a>
                    <a href="{{ url('/#features') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800/50 transition-all duration-200">Features</a>
                    <a href="{{ route('client.dashboard') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800/50 transition-all duration-200">Client Portal</a>
                    <a href="{{ url('/#contact') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800/50 transition-all duration-200">Contact</a>
                </nav>

                {{-- Right: Auth buttons --}}
                <div class="flex items-center gap-3">
                    @auth
                        {{-- Authenticated user --}}
                        <div class="relative">
                            <button onclick="toggleClientDropdown()" id="client-user-btn"
                                class="flex items-center gap-2.5 px-3 py-1.5 rounded-xl hover:bg-dark-800 transition">
                                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand-500 to-accent-500 flex items-center justify-center text-white text-xs font-bold shadow">
                                    {{ mb_substr(Auth::user()->ten ?? 'U', 0, 1) }}
                                </div>
                                <span class="hidden sm:block text-sm font-medium text-dark-200">{{ Auth::user()->ho_ten }}</span>
                                <svg class="w-4 h-4 text-dark-500 hidden sm:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                            </button>
                            <div id="client-user-dropdown"
                                class="hidden absolute right-0 mt-2 w-56 bg-dark-800 border border-dark-700 rounded-xl shadow-2xl shadow-black/40 overflow-hidden">
                                <div class="px-4 py-3 border-b border-dark-700">
                                    <p class="text-sm font-medium text-white">{{ Auth::user()->ho_ten }}</p>
                                    <p class="text-xs text-dark-400 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="py-1">
                                    <a href="{{ route('client.dashboard') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-dark-300 hover:bg-dark-700 hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6z"/></svg>
                                        Dashboard
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
                    @else
                        {{-- Guest --}}
                        <a href="{{ route('login') }}"
                           class="px-4 py-2 rounded-lg text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800/50 transition-all duration-200 border border-transparent hover:border-dark-700">
                            Log In
                        </a>
                        <a href="{{ route('register') }}"
                           class="px-5 py-2 rounded-lg text-sm font-semibold text-white bg-gradient-to-r from-brand-500 to-brand-600 hover:from-brand-600 hover:to-brand-700 shadow-lg shadow-brand-500/25 hover:shadow-brand-500/40 transition-all duration-200">
                            Sign Up
                        </a>
                    @endauth

                    {{-- Mobile hamburger --}}
                    <button onclick="toggleMobileMenu()" class="md:hidden text-dark-400 hover:text-white transition p-1.5 rounded-lg hover:bg-dark-800" aria-label="Toggle menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Navigation --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-dark-800/60 bg-dark-950/95 backdrop-blur-xl">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ url('/') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800/50 transition">Home</a>
                <a href="{{ url('/#features') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800/50 transition">Features</a>
                <a href="{{ route('client.dashboard') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800/50 transition">Client Portal</a>
                <a href="{{ url('/#contact') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800/50 transition">Contact</a>
            </div>
        </div>
    </header>

    {{-- Spacer for fixed header --}}
    <div class="h-16 lg:h-20"></div>

    {{-- ===================== MAIN CONTENT ===================== --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- ===================== FOOTER ===================== --}}
    <footer id="contact" class="border-t border-dark-800/60 bg-dark-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                {{-- Brand column --}}
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-brand-500 to-orange-500 flex items-center justify-center shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                        </div>
                        <span class="text-white font-bold">InfraGate</span>
                    </div>
                    <p class="text-sm text-dark-400 leading-relaxed">
                        Comprehensive Webserver infrastructure management platform. Automate, monitor, and secure your servers.
                    </p>
                </div>

                {{-- System summary --}}
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider">System</h4>
                    <ul class="space-y-2.5 text-sm text-dark-400">
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Automated DNS Management
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                            Nginx Reverse Proxy Configuration
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                            Server Monitoring via Zabbix
                        </li>
                    </ul>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h4 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider">Contact</h4>
                    <ul class="space-y-3 text-sm text-dark-400">
                        <li>
                            <p class="text-white font-medium">Trương Phước Toàn</p>
                            <p>Phone: 0345472083</p>
                            <p>Email: toantp.23it@vku.udn.vn</p>
                        </li>
                        <li class="pt-2 border-t border-dark-800/40">
                            <p class="text-white font-medium">Phan Hữu Khôi Nguyên</p>
                            <p>Phone: 0358626541</p>
                            <p>Email: nguyenphk.23itb@vku.udn.vn</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-dark-800/60 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-xs text-dark-500">© 2026 InfraGate — Webserver Infrastructure Management Project.</p>
                <p class="text-xs text-dark-500">DNS Management · Nginx · Zabbix</p>
            </div>
        </div>
    </footer>

    {{-- Shared JS --}}
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        // Client dropdown toggle
        function toggleClientDropdown() {
            const dd = document.getElementById('client-user-dropdown');
            if (dd) dd.classList.toggle('hidden');
        }
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            if (menu) menu.classList.toggle('hidden');
        }
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            const btn = document.getElementById('client-user-btn');
            const dd = document.getElementById('client-user-dropdown');
            if (btn && dd && !btn.contains(e.target) && !dd.contains(e.target)) {
                dd.classList.add('hidden');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
