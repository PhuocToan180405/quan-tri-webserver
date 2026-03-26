@extends('layouts.client')
@section('title', 'Home')

@section('content')

    {{-- ==================== HERO SECTION ==================== --}}
    <section class="relative overflow-hidden">
        {{-- Background decorations --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-accent-500/10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-brand-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
            <div class="text-center max-w-4xl mx-auto">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-500/10 border border-brand-500/20 mb-6">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    <span class="text-xs font-medium text-brand-300 tracking-wide uppercase">System Online</span>
                </div>

                {{-- Main heading --}}
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    Manage Your
                    <span class="bg-gradient-to-r from-brand-400 via-orange-400 to-accent-400 bg-clip-text text-transparent">Webserver</span>
                    <br>Infrastructure With Ease
                </h1>

                {{-- Subtitle --}}
                <p class="text-lg sm:text-xl text-dark-400 mb-10 max-w-2xl mx-auto leading-relaxed">
                    InfraGate helps you manage <strong class="text-dark-300">DNS</strong>, configure <strong class="text-dark-300">Nginx</strong>, and monitor servers via <strong class="text-dark-300">Zabbix</strong> — all in a single unified interface.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ url('/client/dashboard') }}"
                       class="group inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-base font-semibold text-white bg-gradient-to-r from-brand-500 to-brand-600 hover:from-brand-600 hover:to-brand-700 shadow-xl shadow-brand-500/25 hover:shadow-brand-500/40 transition-all duration-300 transform hover:-translate-y-0.5">
                        Get Started Now
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                    <a href="{{ url('/#features') }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-base font-medium text-dark-300 border border-dark-700 hover:border-dark-600 hover:text-white hover:bg-dark-800/50 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                        Learn More
                    </a>
                </div>

                {{-- Stats row --}}
                <div class="mt-16 grid grid-cols-3 gap-6 max-w-lg mx-auto">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">99.9%</p>
                        <p class="text-xs text-dark-500 mt-1">Uptime</p>
                    </div>
                    <div class="text-center border-x border-dark-800">
                        <p class="text-2xl font-bold text-white">24/7</p>
                        <p class="text-xs text-dark-500 mt-1">Monitoring</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-white">100%</p>
                        <p class="text-xs text-dark-500 mt-1">Automation</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== FEATURES SECTION ==================== --}}
    <section id="features" class="py-20 lg:py-28 border-t border-dark-800/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section header --}}
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="inline-block px-3 py-1 rounded-full bg-accent-500/10 text-accent-400 text-xs font-semibold uppercase tracking-wider mb-4">Features</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">One Platform — Full Control</h2>
                <p class="text-dark-400">Built for both Clients and Admins, InfraGate delivers a comprehensive management experience.</p>
            </div>

            {{-- Feature cards - Client --}}
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-accent-500/15 flex items-center justify-center">
                        <svg class="w-4 h-4 text-accent-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white">For Clients</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    {{-- Card 1 --}}
                    <div class="group relative p-6 rounded-2xl bg-dark-900/50 border border-dark-800/60 hover:border-accent-500/30 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500/20 to-teal-500/20 flex items-center justify-center mb-4 group-hover:shadow-lg group-hover:shadow-emerald-500/10 transition-shadow">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/></svg>
                        </div>
                        <h4 class="text-base font-semibold text-white mb-2">Personal Website Management</h4>
                        <p class="text-sm text-dark-400 leading-relaxed">Create and manage websites on LEMP Stack (Linux, Nginx, MySQL, PHP) with just a few clicks.</p>
                    </div>
                    {{-- Card 2 --}}
                    <div class="group relative p-6 rounded-2xl bg-dark-900/50 border border-dark-800/60 hover:border-accent-500/30 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500/20 to-cyan-500/20 flex items-center justify-center mb-4 group-hover:shadow-lg group-hover:shadow-blue-500/10 transition-shadow">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                        </div>
                        <h4 class="text-base font-semibold text-white mb-2">SSL Certificate Management</h4>
                        <p class="text-sm text-dark-400 leading-relaxed">Automatically provision and renew free SSL certificates for all your domains.</p>
                    </div>
                    {{-- Card 3 --}}
                    <div class="group relative p-6 rounded-2xl bg-dark-900/50 border border-dark-800/60 hover:border-accent-500/30 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-500/20 to-purple-500/20 flex items-center justify-center mb-4 group-hover:shadow-lg group-hover:shadow-violet-500/10 transition-shadow">
                            <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                        </div>
                        <h4 class="text-base font-semibold text-white mb-2">Performance Monitoring</h4>
                        <p class="text-sm text-dark-400 leading-relaxed">Track server health in real-time via Zabbix Metrics — CPU, RAM, Disk, Uptime.</p>
                    </div>
                </div>
            </div>

            {{-- Feature cards - Admin --}}
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-brand-500/15 flex items-center justify-center">
                        <svg class="w-4 h-4 text-brand-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white">For Administrators</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    {{-- Card 1 --}}
                    <div class="group relative p-6 rounded-2xl bg-dark-900/50 border border-dark-800/60 hover:border-brand-500/30 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-brand-500/20 to-rose-500/20 flex items-center justify-center mb-4 group-hover:shadow-lg group-hover:shadow-brand-500/10 transition-shadow">
                            <svg class="w-6 h-6 text-brand-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/></svg>
                        </div>
                        <h4 class="text-base font-semibold text-white mb-2">DNS Automation</h4>
                        <p class="text-sm text-dark-400 leading-relaxed">Manage all DNS records: A, CNAME, MX, TXT... Automatically synced with the system.</p>
                    </div>
                    {{-- Card 2 --}}
                    <div class="group relative p-6 rounded-2xl bg-dark-900/50 border border-dark-800/60 hover:border-brand-500/30 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500/20 to-orange-500/20 flex items-center justify-center mb-4 group-hover:shadow-lg group-hover:shadow-amber-500/10 transition-shadow">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
                        </div>
                        <h4 class="text-base font-semibold text-white mb-2">Nginx Configuration</h4>
                        <p class="text-sm text-dark-400 leading-relaxed">Create Virtual Hosts, Reverse Proxy, and configure Load Balancing directly from the dashboard.</p>
                    </div>
                    {{-- Card 3 --}}
                    <div class="group relative p-6 rounded-2xl bg-dark-900/50 border border-dark-800/60 hover:border-brand-500/30 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-orange-500/20 to-red-500/20 flex items-center justify-center mb-4 group-hover:shadow-lg group-hover:shadow-orange-500/10 transition-shadow">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                        </div>
                        <h4 class="text-base font-semibold text-white mb-2">Zabbix Monitoring</h4>
                        <p class="text-sm text-dark-400 leading-relaxed">Real-time dashboard displaying CPU, RAM, Disk, Network. Automatic alerts when servers encounter issues.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== CTA SECTION ==================== --}}
    <section class="py-20 border-t border-dark-800/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-dark-900 via-dark-900 to-dark-800 border border-dark-800/60 p-10 lg:p-16">
                {{-- Decorations --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-accent-500/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative text-center max-w-2xl mx-auto">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Ready to Take Control?</h2>
                    <p class="text-dark-400 mb-8">Sign up for free and start managing your servers today. No credit card required.</p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ url('/client/dashboard') }}"
                           class="group inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-base font-semibold text-white bg-gradient-to-r from-brand-500 to-brand-600 hover:from-brand-600 hover:to-brand-700 shadow-xl shadow-brand-500/25 hover:shadow-brand-500/40 transition-all duration-300">
                            Get Started Now
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-base font-medium text-dark-300 border border-dark-700 hover:border-dark-600 hover:text-white transition-all duration-200">
                            Create Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
