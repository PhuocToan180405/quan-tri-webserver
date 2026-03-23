@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="w-full max-w-lg relative animate-fade-in">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-primary-600 mb-4 shadow-lg shadow-primary-500/25">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <h1 class="text-2xl font-bold text-white">Create Account</h1>
            <p class="text-dark-400 mt-1 text-sm">Register to use our Hosting services</p>
        </div>

        <div class="glass rounded-2xl p-8 shadow-2xl">
            <form id="registerForm" method="POST" action="{{ route('register.submit') }}" novalidate>
                @csrf

                <div class="grid grid-cols-2 gap-4 mb-5">
                    <div>
                        <label for="ho" class="block text-sm font-medium text-dark-300 mb-2">Last Name</label>
                        <input type="text" id="ho" name="ho" value="{{ old('ho') }}"
                            class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition"
                            placeholder="Nguyen">
                        <p id="ho-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                    </div>
                    <div>
                        <label for="ten" class="block text-sm font-medium text-dark-300 mb-2">First Name</label>
                        <input type="text" id="ten" name="ten" value="{{ old('ten') }}"
                            class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition"
                            placeholder="Van A">
                        <p id="ten-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="username" class="block text-sm font-medium text-dark-300 mb-2">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition"
                        placeholder="username">
                    <p id="username-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-dark-300 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition"
                        placeholder="email@example.com">
                    <p id="email-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <div class="mb-5">
                    <label for="sdt" class="block text-sm font-medium text-dark-300 mb-2">Phone Number <span class="text-dark-500">(optional)</span></label>
                    <input type="text" id="sdt" name="sdt" value="{{ old('sdt') }}"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition"
                        placeholder="0901234567">
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-dark-300 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition pr-12"
                            placeholder="Minimum 8 characters">
                        <button type="button" onclick="togglePassword('password')" class="absolute right-3 top-1/2 -translate-y-1/2 text-dark-500 hover:text-dark-300 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                        </button>
                    </div>
                    <p id="password-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-dark-300 mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-3 rounded-xl bg-dark-800/50 border border-dark-700 text-white placeholder-dark-500 input-focus focus:border-primary-500 focus:outline-none transition"
                        placeholder="Re-enter password">
                    <p id="confirm-error" class="text-red-400 text-xs mt-1.5 hidden"></p>
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-600 to-primary-600 text-white font-semibold hover:from-emerald-500 hover:to-primary-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 focus:ring-offset-dark-900 transition-all duration-200 shadow-lg shadow-primary-500/25">
                    Create Account
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <span class="text-dark-400">Already have an account?</span>
                <a href="{{ route('login') }}" class="text-primary-400 hover:text-primary-300 transition ml-1">Sign In</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
}

document.getElementById('registerForm').addEventListener('submit', function(e) {
    let valid = true;
    const fields = {
        ho:       { el: document.getElementById('ho'),       errEl: document.getElementById('ho-error'),       msg: 'Please enter your last name.' },
        ten:      { el: document.getElementById('ten'),      errEl: document.getElementById('ten-error'),      msg: 'Please enter your first name.' },
        username: { el: document.getElementById('username'), errEl: document.getElementById('username-error'), msg: 'Please enter a username.' },
        email:    { el: document.getElementById('email'),    errEl: document.getElementById('email-error'),    msg: 'Please enter an email address.' },
        password: { el: document.getElementById('password'), errEl: document.getElementById('password-error'), msg: 'Please enter a password.' },
    };

    Object.values(fields).forEach(f => f.errEl.classList.add('hidden'));
    document.getElementById('confirm-error').classList.add('hidden');

    Object.entries(fields).forEach(([key, f]) => {
        if (!f.el.value.trim()) { f.errEl.textContent = f.msg; f.errEl.classList.remove('hidden'); valid = false; }
    });

    const emailVal = fields.email.el.value.trim();
    if (emailVal && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
        fields.email.errEl.textContent = 'Invalid email format.';
        fields.email.errEl.classList.remove('hidden');
        valid = false;
    }

    if (fields.password.el.value && fields.password.el.value.length < 8) {
        fields.password.errEl.textContent = 'Password must be at least 8 characters.';
        fields.password.errEl.classList.remove('hidden');
        valid = false;
    }

    const confirm = document.getElementById('password_confirmation');
    const confirmErr = document.getElementById('confirm-error');
    if (fields.password.el.value && fields.password.el.value !== confirm.value) {
        confirmErr.textContent = 'Password confirmation does not match.';
        confirmErr.classList.remove('hidden');
        valid = false;
    }

    if (!valid) e.preventDefault();
});
</script>
@endpush
