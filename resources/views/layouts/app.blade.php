<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webserver Infrastructure Management via Nginx and Zabbix">
    <title>@yield('title', 'WebServer Panel') — {{ config('app.name') }}</title>
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
<body class="min-h-screen bg-dark-950 text-white antialiased">
    {{-- ===== Flash Messages ===== --}}
    @if(session('success'))
        <div id="flash-success" class="fixed top-5 right-5 z-50 animate-slide-up">
            <div class="flex items-center gap-3 px-5 py-3.5 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-300 shadow-lg shadow-emerald-500/10">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-2 text-emerald-400 hover:text-white transition">&times;</button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div id="flash-error" class="fixed top-5 right-5 z-50 animate-slide-up">
            <div class="flex items-center gap-3 px-5 py-3.5 rounded-xl bg-red-500/20 border border-red-500/30 text-red-300 shadow-lg shadow-red-500/10">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                <span class="text-sm font-medium">{{ session('error') }}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-2 text-red-400 hover:text-white transition">&times;</button>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div id="flash-validation" class="fixed top-5 right-5 z-50 animate-slide-up max-w-md">
            <div class="px-5 py-3.5 rounded-xl bg-amber-500/20 border border-amber-500/30 text-amber-300 shadow-lg shadow-amber-500/10">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    <span class="text-sm font-semibold">Validation errors:</span>
                    <button onclick="this.closest('#flash-validation').remove()" class="ml-auto text-amber-400 hover:text-white transition">&times;</button>
                </div>
                <ul class="text-sm space-y-1 ml-7 list-disc">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @yield('content')

    {{-- Shared JS --}}
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
