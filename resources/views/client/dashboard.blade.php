@extends('layouts.client')
@section('title', 'Client Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Page header --}}
    <div class="mb-8">
        <h1 class="text-2xl lg:text-3xl font-bold text-white">
            Welcome, {{ Auth::user()->ho_ten }}
        </h1>
        <p class="text-dark-400 mt-2 text-sm">Manage your personal websites and hosting.</p>
    </div>

    {{-- Quick stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        {{-- Websites --}}
        <div class="p-5 rounded-2xl bg-dark-900/50 border border-dark-800/60">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3"/></svg>
                </div>
                <span class="text-xs font-medium text-emerald-400 bg-emerald-500/10 px-2 py-1 rounded-full">Active</span>
            </div>
            <p class="text-2xl font-bold text-white">0</p>
            <p class="text-xs text-dark-500 mt-1">Active Websites</p>
        </div>

        {{-- Domains --}}
        <div class="p-5 rounded-2xl bg-dark-900/50 border border-dark-800/60">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-blue-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-white">0</p>
            <p class="text-xs text-dark-500 mt-1">Domains</p>
        </div>

        {{-- SSL --}}
        <div class="p-5 rounded-2xl bg-dark-900/50 border border-dark-800/60">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-violet-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-white">0</p>
            <p class="text-xs text-dark-500 mt-1">SSL Certificates</p>
        </div>

        {{-- Support --}}
        <div class="p-5 rounded-2xl bg-dark-900/50 border border-dark-800/60">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-amber-500/15 flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-white">0</p>
            <p class="text-xs text-dark-500 mt-1">Support Requests</p>
        </div>
    </div>

    {{-- Getting started --}}
    <div class="p-6 rounded-2xl bg-dark-900/50 border border-dark-800/60">
        <h2 class="text-lg font-semibold text-white mb-4">Quick Start</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="#" class="flex items-center gap-3 p-4 rounded-xl bg-dark-800/50 border border-dark-700/50 hover:border-accent-500/30 transition group">
                <div class="w-10 h-10 rounded-lg bg-accent-500/15 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-accent-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-white group-hover:text-accent-400 transition">Create New Website</p>
                    <p class="text-xs text-dark-500">Set up a LEMP website</p>
                </div>
            </a>
            <a href="#" class="flex items-center gap-3 p-4 rounded-xl bg-dark-800/50 border border-dark-700/50 hover:border-blue-500/30 transition group">
                <div class="w-10 h-10 rounded-lg bg-blue-500/15 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747"/></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-white group-hover:text-blue-400 transition">Add Domain</p>
                    <p class="text-xs text-dark-500">Attach a domain to your website</p>
                </div>
            </a>
            <a href="#" class="flex items-center gap-3 p-4 rounded-xl bg-dark-800/50 border border-dark-700/50 hover:border-violet-500/30 transition group">
                <div class="w-10 h-10 rounded-lg bg-violet-500/15 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-white group-hover:text-violet-400 transition">View Metrics</p>
                    <p class="text-xs text-dark-500">Monitor server performance</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
