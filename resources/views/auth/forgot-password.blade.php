@extends('layouts.app')
@section('title', 'Forgot Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-primary-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="w-full max-w-md relative animate-fade-in">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-600 mb-4 shadow-lg shadow-amber-500/25">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
            </div>
            <h1 class="text-2xl font-bold text-white">Forgot Password?</h1>
            <p class="text-dark-400 mt-1 text-sm">Enter your email to receive a password reset link</p>
        </div>

        <div class="glass rounded-2xl p-8 shadow-2xl">
            <form id="forgotForm" method="POST" action="{{ route('password.sendResetLink') }}" novalidate>
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-dark-300 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-amber-500 focus:outline-none transition"
                        placeholder="Enter your registered email" autofocus>
                    <p id="email-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-amber-600 to-orange-500 text-white font-semibold hover:from-amber-500 hover:to-orange-400 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 focus:ring-offset-dark-900 transition-all duration-200 shadow-lg shadow-amber-500/25">
                    Send Reset Link
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <a href="{{ route('login') }}" class="text-primary-400 hover:text-primary-300 transition">
                    ← Back to Sign In
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('forgotForm').addEventListener('submit', function(e) {
    const email = document.getElementById('email');
    const errEl = document.getElementById('email-error');
    errEl.classList.add('hidden');

    if (!email.value.trim()) {
        errEl.textContent = 'Please enter your email address.';
        errEl.classList.remove('hidden');
        e.preventDefault();
        return;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
        errEl.textContent = 'Invalid email format.';
        errEl.classList.remove('hidden');
        e.preventDefault();
    }
});
</script>
@endpush
