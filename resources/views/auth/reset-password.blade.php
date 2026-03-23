@extends('layouts.app')
@section('title', 'Reset Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="w-full max-w-md relative animate-fade-in">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-500 to-emerald-500 mb-4 shadow-lg shadow-primary-500/25">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <h1 class="text-2xl font-bold text-white">Reset Password</h1>
            <p class="text-dark-400 mt-1 text-sm">Enter a new password for your account</p>
        </div>

        <div class="glass rounded-2xl p-8 shadow-2xl">
            <form id="resetForm" method="POST" action="{{ route('password.update') }}" novalidate>
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-5">
                    <label class="block text-sm font-medium text-dark-300 mb-2">Email</label>
                    <input type="text" value="{{ $email }}" disabled
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/30 border border-dark-700 text-dark-400 cursor-not-allowed">
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-dark-300 mb-2">New Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition"
                        placeholder="Minimum 8 characters" autofocus>
                    <p id="password-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-dark-300 mb-2">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition"
                        placeholder="Re-enter new password">
                    <p id="confirm-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-primary-600 to-emerald-500 text-white font-semibold hover:from-primary-500 hover:to-emerald-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:ring-offset-dark-900 transition-all duration-200 shadow-lg shadow-primary-500/25">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('resetForm').addEventListener('submit', function(e) {
    let valid = true;
    const password = document.getElementById('password');
    const confirm  = document.getElementById('password_confirmation');
    const passErr  = document.getElementById('password-error');
    const confErr  = document.getElementById('confirm-error');

    passErr.classList.add('hidden');
    confErr.classList.add('hidden');

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
