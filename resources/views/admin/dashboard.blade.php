@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="animate-fade-in">
        {{-- ==================== SERVER MONITORING WIDGET ==================== --}}
        <div class="rounded-2xl bg-dark-900/50 border border-dark-800/60 overflow-hidden mb-6">

            {{-- Widget Header --}}
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 px-6 py-4 border-b border-dark-800/60 bg-dark-900/30">
                {{-- Server Select --}}
                <div class="flex items-center gap-3">
                    <div
                        class="w-9 h-9 rounded-xl bg-gradient-to-br from-brand-500/20 to-orange-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-brand-400" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                        </svg>
                    </div>
                    <div>
                        <label for="serverSelect"
                            class="text-xs text-dark-500 font-medium uppercase tracking-wider">Server</label>
                        <select id="serverSelect"
                            class="block w-full sm:w-72 mt-1 bg-dark-800 border border-dark-700 text-dark-200 text-sm rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500/50 focus:border-brand-500/50 transition">
                            @foreach($servers as $server)
                                <option value="{{ $server->hostid }}">{{ $server->hostname }} — {{ $server->ip_address }}
                                </option>
                            @endforeach
                            @if($servers->isEmpty())
                                <option disabled selected>No servers available</option>
                            @endif
                        </select>
                    </div>
                </div>

                {{-- Status indicator --}}
                <div class="flex items-center gap-2">
                    <span id="pollingIndicator" class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    <span class="text-xs text-dark-500">Auto-refresh 5s</span>
                </div>
            </div>

            {{-- Widget Body — 4 metric columns --}}
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-dark-800/60">

                {{-- Column 1: Load (Circular Donut) --}}
                <div class="p-6 flex flex-col items-center">
                    <div class="flex items-center gap-2 mb-4 self-start">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/15 flex items-center justify-center">
                            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-dark-400 uppercase tracking-wider">Load</h3>
                    </div>
                    {{-- SVG Circular Progress --}}
                    <div class="relative w-32 h-32 mb-3">
                        <svg class="w-full h-full -rotate-90" viewBox="0 0 120 120">
                            {{-- Background circle --}}
                            <circle cx="60" cy="60" r="52" fill="none" stroke="#1e293b" stroke-width="10" />
                            {{-- Progress circle --}}
                            <circle id="loadCircle" cx="60" cy="60" r="52" fill="none" stroke="url(#loadGradient)"
                                stroke-width="10" stroke-linecap="round" stroke-dasharray="326.73"
                                stroke-dashoffset="326.73" class="transition-all duration-500" />
                            <defs>
                                <linearGradient id="loadGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#f59e0b" />
                                    <stop offset="100%" stop-color="#f97316" />
                                </linearGradient>
                            </defs>
                        </svg>
                        {{-- Center text --}}
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span id="loadText" class="text-2xl font-bold text-white">0</span>
                            <span class="text-xs text-dark-500">%</span>
                        </div>
                    </div>
                    <p class="text-xs text-dark-500">CPU Load Average</p>
                </div>

                {{-- Column 2: Memory --}}
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/15 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-dark-400 uppercase tracking-wider">Memory</h3>
                    </div>
                    <div class="flex items-baseline gap-1 mb-1">
                        <span id="ramPercent" class="text-4xl font-bold text-white">0</span>
                        <span class="text-lg font-semibold text-dark-500">%</span>
                    </div>
                    <div class="mt-3 w-full bg-dark-800 rounded-full h-2.5 overflow-hidden">
                        <div id="ramBar"
                            class="bg-gradient-to-r from-emerald-500 to-emerald-400 h-2.5 rounded-full transition-all duration-500"
                            style="width: 0%"></div>
                    </div>
                    <p id="ramText" class="text-xs text-dark-500 mt-2">0 GB used of 0 GB</p>
                </div>

                {{-- Column 3: Disk --}}
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/15 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-dark-400 uppercase tracking-wider">Disk</h3>
                    </div>
                    <div class="flex items-baseline gap-1 mb-1">
                        <span id="diskPercent" class="text-4xl font-bold text-white">0</span>
                        <span class="text-lg font-semibold text-dark-500">%</span>
                    </div>
                    <div class="mt-3 w-full bg-dark-800 rounded-full h-2.5 overflow-hidden">
                        <div id="diskBar"
                            class="bg-gradient-to-r from-emerald-500 to-emerald-400 h-2.5 rounded-full transition-all duration-500"
                            style="width: 0%"></div>
                    </div>
                    <p id="diskText" class="text-xs text-dark-500 mt-2">0 GB used of 0 GB</p>
                </div>

                {{-- Column 4: Uptime --}}
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 rounded-lg bg-blue-500/15 flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-dark-400 uppercase tracking-wider">Uptime</h3>
                    </div>
                    <p id="uptimeText" class="text-3xl font-bold text-white mb-3">—</p>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                        <span class="text-sm text-emerald-400 font-medium">Online</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add New Server button (below widget) --}}
        <div class="mb-8">
            <button type="button"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-medium text-white bg-gradient-to-r from-brand-500 to-brand-600 hover:from-brand-600 hover:to-brand-700 shadow-lg shadow-brand-500/20 hover:shadow-brand-500/35 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add New Server
            </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const CIRCLE_CIRCUMFERENCE = 2 * Math.PI * 52; // r=52 → ~326.73

        function fetchServerMetrics() {
            const select = document.getElementById('serverSelect');
            if (!select || !select.value) return;

            const hostid = select.value;

            fetch(`/admin/server-metrics/${hostid}`)
                .then(res => {
                    if (!res.ok) throw new Error('Network error');
                    return res.json();
                })
                .then(data => {
                    // -- Load (Circular Donut) --
                    const loadVal = parseFloat(data.load) || 0;
                    document.getElementById('loadText').textContent = loadVal.toFixed(1);
                    const offset = CIRCLE_CIRCUMFERENCE - (CIRCLE_CIRCUMFERENCE * loadVal / 100);
                    document.getElementById('loadCircle').setAttribute('stroke-dashoffset', offset);

                    // -- RAM --
                    const ramPct = parseFloat(data.ram_percent) || 0;
                    document.getElementById('ramPercent').textContent = Math.round(ramPct);
                    document.getElementById('ramBar').style.width = ramPct + '%';
                    document.getElementById('ramText').textContent =
                        data.ram_used + ' GB used of ' + data.ram_total + ' GB';

                    // -- Disk --
                    const diskPct = parseFloat(data.disk_percent) || 0;
                    document.getElementById('diskPercent').textContent = Math.round(diskPct);
                    document.getElementById('diskBar').style.width = diskPct + '%';
                    document.getElementById('diskText').textContent =
                        data.disk_used + ' GB used of ' + data.disk_total + ' GB';

                    // -- Uptime --
                    document.getElementById('uptimeText').textContent = data.uptime || '—';
                })
                .catch(err => {
                    console.error('Metrics fetch error:', err);
                });
        }

        // Listen for server change
        document.getElementById('serverSelect')?.addEventListener('change', fetchServerMetrics);

        // Initial fetch on page load
        fetchServerMetrics();

        // Polling every 5 seconds
        setInterval(fetchServerMetrics, 5000);
    </script>
@endpush