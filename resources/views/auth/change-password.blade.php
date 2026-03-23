@extends('layouts.app')
@section('title', 'Change Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="w-full max-w-md relative animate-fade-in">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-primary-600 mb-4 shadow-lg shadow-cyan-500/25">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.573-1.066z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h1 class="text-2xl font-bold text-white">Change Password</h1>
            <p class="text-dark-400 mt-1 text-sm">Update password for {{ auth()->user()->username }}</p>
        </div>

        <div class="glass rounded-2xl p-8 shadow-2xl">
            <form id="changeForm" method="POST" action="{{ route('password.change.submit') }}" novalidate>
                @csrf

                <div class="mb-5">
                    <label for="current_password" class="block text-sm font-medium text-dark-300 mb-2">Current Password</label>
                    <input type="password" id="current_password" name="current_password"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-cyan-500 focus:outline-none transition"
                        placeholder="Enter current password" autofocus>
                    <p id="current-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-dark-300 mb-2">New Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-cyan-500 focus:outline-none transition"
                        placeholder="Minimum 8 characters">
                    <p id="password-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-dark-300 mb-2">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-cyan-500 focus:outline-none transition"
                        placeholder="Re-enter new password">
                    <p id="confirm-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-cyan-600 to-primary-600 text-white font-semibold hover:from-cyan-500 hover:to-primary-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 focus:ring-offset-dark-900 transition-all duration-200 shadow-lg shadow-cyan-500/25">
                    Update Password
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="text-primary-400 hover:text-primary-300 transition">← Back to Dashboard</a>
                @else
                    <a href="{{ route('client.dashboard') }}" class="text-primary-400 hover:text-primary-300 transition">← Back to Dashboard</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('changeForm').addEventListener('submit', function(e) {
    let valid = true;
    const current  = document.getElementById('current_password');
    const password = document.getElementById('password');
    const confirm  = document.getElementById('password_confirmation');
    const curErr   = document.getElementById('current-error');
    const passErr  = document.getElementById('password-error');
    const confErr  = document.getElementById('confirm-error');

    curErr.classList.add('hidden');
    passErr.classList.add('hidden');
    confErr.classList.add('hidden');

    if (!current.value) {
        curErr.textContent = 'Please enter your current password.';
        curErr.classList.remove('hidden');
        valid = false;
    }

    if (!password.value) {
        passErr.textContent = 'Please enter a new password.';
        passErr.classList.remove('hidden');
        valid = false;
    } else if (password.value.length < 8) {
        passErr.textContent = 'Password must be at least 8 characters.';
        passErr.classList.remove('hidden');
        valid = false;
    }

    if (password.value && password.value !== confirm.value) {
        confErr.textContent = 'Password confirmation does not match.';
        confErr.classList.remove('hidden');
        valid = false;
    }

    if (!valid) e.preventDefault();
});
</script>
@endpush
