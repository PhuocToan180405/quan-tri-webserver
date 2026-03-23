@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-primary-700/10 rounded-full blur-3xl"></div>
    </div>

    <div class="w-full max-w-md relative animate-fade-in">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 mb-4 shadow-lg shadow-primary-500/25">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/></svg>
            </div>
            <h1 class="text-2xl font-bold text-white">Sign In</h1>
            <p class="text-dark-400 mt-1 text-sm">Webserver Infrastructure Management</p>
        </div>

        <div class="glass rounded-2xl p-8 shadow-2xl">
            <form id="loginForm" method="POST" action="{{ route('login.submit') }}" novalidate>
                @csrf

                <div class="mb-5">
                    <label for="login" class="block text-sm font-medium text-dark-300 mb-2">Username or Email</label>
                    <input type="text" id="login" name="login" value="{{ old('login') }}"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition"
                        placeholder="Enter username or email" autofocus>
                    <p id="login-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-dark-300 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition pr-12"
                            placeholder="Enter password">
                        <button type="button" onclick="togglePassword('password', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-dark-500 hover:text-dark-300 transition">
                            <svg class="w-5 h-5 eye-off" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                    <p id="password-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <button type="submit" id="loginBtn"
                    class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-primary-600 to-primary-500 text-white font-semibold hover:from-primary-500 hover:to-primary-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:ring-offset-dark-900 transition-all duration-200 shadow-lg shadow-primary-500/25">
                    Sign In
                </button>
            </form>

            <div class="mt-6 flex items-center justify-between text-sm">
                <a href="{{ route('password.forgot') }}" class="text-primary-400 hover:text-primary-300 transition">Forgot Password?</a>
                <a href="{{ route('register') }}" class="text-primary-400 hover:text-primary-300 transition">Create Account</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    input.type = input.type === 'password' ? 'text' : 'password';
}

document.getElementById('loginForm').addEventListener('submit', function(e) {
    let valid = true;
    const login = document.getElementById('login');
    const password = document.getElementById('password');
    const loginErr = document.getElementById('login-error');
    const passErr = document.getElementById('password-error');

    loginErr.classList.add('hidden');
    passErr.classList.add('hidden');

    if (!login.value.trim()) {
        loginErr.textContent = 'Please enter your username or email.';
        loginErr.classList.remove('hidden');
        valid = false;
    }

    if (!password.value) {
        passErr.textContent = 'Please enter your password.';
        passErr.classList.remove('hidden');
        valid = false;
    }

    if (!valid) e.preventDefault();
});
</script>
@endpush
