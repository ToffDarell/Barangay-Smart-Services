<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <section class="space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">BARANGAY NORTE POBLACION &nbsp;&rsaquo;&nbsp; <span class="text-red-600">PORTAL STATS</span></p>
                <h2 class="text-2xl font-bold text-gray-900">Admin Dashboard</h2>
            </div>
            <button class="flex items-center gap-2 border border-gray-200 rounded-md px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export Report
            </button>
        </div>

        <div class="grid gap-4 lg:grid-cols-3">
            <!-- Card 1 -->
            <div class="admin-card p-5 relative overflow-hidden">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded-full flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        12%
                    </span>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">Portal Transactions</p>
                <p class="text-3xl font-bold text-gray-900">1,248</p>
            </div>

            <!-- Card 2 -->
            <div class="admin-card p-5">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">For Verification</p>
                <p class="text-3xl font-bold text-gray-900">42</p>
            </div>

            <!-- Card 3 -->
            <div class="admin-card p-5 relative">
                <div class="absolute top-4 right-4 text-xs font-semibold text-gray-500">Today</div>
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">Today's Appointments</p>
                <p class="text-3xl font-bold text-gray-900">18</p>
            </div>
        </div>

        <div class="grid gap-4 xl:grid-cols-[2fr_1fr]">
            <div class="admin-card p-5">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Resident Registration Trend</h3>
                    <div class="flex items-center gap-2">
                        <button type="button" class="rounded border border-gray-200 px-3 py-1.5 text-[11px] font-semibold text-gray-600 hover:bg-gray-50">
                            This Year
                        </button>
                    </div>
                </div>
                <div class="relative h-[280px] w-full">
                    <canvas id="residentTrendChart"></canvas>
                </div>
            </div>

            <div class="admin-card p-5 relative">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Requests by Type</h3>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                    </button>
                </div>
                <div class="relative mx-auto h-[200px] w-[200px]">
                    <canvas id="requestTypeChart"></canvas>
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none"
                        x-data="{
                            count: 0,
                            init() {
                                const target = 850;
                                const duration = 1200;
                                const start = performance.now();
                                const easeOutBack = (t) => {
                                    const c1 = 1.70158;
                                    const c3 = c1 + 1;
                                    return 1 + c3 * Math.pow(t - 1, 3) + c1 * Math.pow(t - 1, 2);
                                };
                                const tick = (now) => {
                                    const elapsed = Math.min((now - start) / duration, 1);
                                    this.count = Math.round(easeOutBack(elapsed) * target);
                                    if (elapsed < 1) requestAnimationFrame(tick);
                                    else this.count = target;
                                };
                                requestAnimationFrame(tick);
                            }
                        }"
                        x-init="init()"
                    >
                        <span class="text-2xl font-bold text-gray-900" x-text="count">0</span>
                        <span class="text-[11px] font-medium text-gray-500">Total</span>
                    </div>
                </div>
                <div class="mt-6 space-y-3 px-2">
                    @foreach ([
                        ['Clearance', 'bg-red-700', '45%'],
                        ['Indigency', 'bg-[#854d0e]', '35%'],
                        ['Residency', 'bg-yellow-400', '20%'],
                    ] as $item)
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center gap-2 text-gray-700">
                                <span class="h-2 w-2 rounded-full {{ $item[1] }}"></span>
                                <span>{{ $item[0] }}</span>
                            </div>
                            <span class="font-medium text-gray-900">{{ $item[2] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid gap-4 xl:grid-cols-2">
            <div class="admin-card p-5">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Latest Residents</h3>
                    <a href="{{ route('residents.index') }}" class="text-xs font-semibold text-red-600 hover:text-red-700">View All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="border-b border-gray-100">
                            <tr>
                                <th class="px-2 py-3 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500">Name</th>
                                <th class="px-2 py-3 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500">Purok</th>
                                <th class="px-2 py-3 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ([
                                ['Maria Santos', 'Purok 1', 'Verified'],
                                ['Juan Dela Cruz', 'Purok 3', 'Pending'],
                                ['Ana Reyes', 'Purok 2', 'Verified'],
                                ['Pedro Garcia', 'Purok 5', 'Verified'],
                            ] as $resident)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-3 text-sm font-medium text-gray-900">{{ $resident[0] }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-500">{{ $resident[1] }}</td>
                                    <td class="px-2 py-3">
                                        @if($resident[2] === 'Verified')
                                            <span class="inline-flex rounded bg-[#d1fae5] px-2 py-0.5 text-[11px] font-semibold text-[#047857]">Verified</span>
                                        @else
                                            <span class="inline-flex rounded bg-[#fef3c7] px-2 py-0.5 text-[11px] font-semibold text-[#b45309]">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="admin-card p-5 relative">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Recent Document Requests</h3>
                    <a href="{{ route('certificates.index') }}" class="text-xs font-semibold text-red-600 hover:text-red-700">View All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="border-b border-gray-100">
                            <tr>
                                <th class="px-2 py-3 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500">Document</th>
                                <th class="px-2 py-3 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500">Requestor</th>
                                <th class="px-2 py-3 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ([
                                ['Brgy Clearance', 'L. Bautista', 'Today, 09:30 AM'],
                                ['Cert of Indigency', 'M. Santos', 'Today, 08:15 AM'],
                                ['Business Permit', 'R. Fernandez', 'Yesterday'],
                                ['Brgy Clearance', 'J. Dela Cruz', 'Yesterday'],
                            ] as $request)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-3 text-sm font-medium text-gray-900">{{ $request[0] }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-500">{{ $request[1] }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-500">{{ $request[2] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Floating action button overlay (decorative) -->
                <button class="absolute bottom-6 right-6 w-12 h-12 bg-[#b91c1c] hover:bg-[#991b1b] text-white rounded-md flex items-center justify-center shadow-lg shadow-red-900/40">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.591 1.066c1.527-.94 3.31.843 2.37 2.37a1.724 1.724 0 001.065 2.591c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.591c.94 1.527-.843 3.31-2.37 2.37a1.724 1.724 0 00-2.591 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.591-1.066c-1.527.94-3.31-.843-2.37-2.37a1.724 1.724 0 00-1.065-2.591c-1.756-.426-1.756-2.924 0-3.35A1.724 1.724 0 005.364 7.75c-.94-1.527.843-3.31 2.37-2.37.996.613 2.296.07 2.591-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </button>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                function initDashboardCharts() {
                    if (typeof Chart === 'undefined') {
                        setTimeout(initDashboardCharts, 50);
                        return;
                    }

                    // ── 1. LINE CHART: Resident Registration Trend ─────────────────
                    const trendCanvas = document.getElementById('residentTrendChart');
                    if (trendCanvas && !trendCanvas._initialized) {
                        trendCanvas._initialized = true;
                        const trendCtx = trendCanvas.getContext('2d');

                        // Vertical gradient fill: 18% → 0% opacity
                        const gradient = trendCtx.createLinearGradient(0, 0, 0, 280);
                        gradient.addColorStop(0, 'rgba(166, 28, 28, 0.18)');
                        gradient.addColorStop(1, 'rgba(166, 28, 28, 0.00)');

                        const chartData = [20, 25, 23, 20, 15, 12, 10, 15, 25, 30];
                        const totalDuration = 1400;
                        const delay = totalDuration / chartData.length;

                        // Tracks the previous y pixel so each segment draws from where the last ended
                        const previousY = (ctx) =>
                            ctx.index === 0
                                ? ctx.chart.scales.y.getPixelForValue(100)
                                : ctx.chart.getDatasetMeta(ctx.datasetIndex)
                                    .data[ctx.index - 1]
                                    .getProps(['y'], true).y;

                        new Chart(trendCtx, {
                            type: 'line',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                                datasets: [{
                                    label: 'Registrations',
                                    data: chartData,
                                    borderColor: '#A61C1C',
                                    backgroundColor: gradient,
                                    fill: true,
                                    tension: 0.4,
                                    borderWidth: 3,
                                    pointRadius: 0,
                                    pointHoverRadius: 7,
                                    pointHoverBackgroundColor: '#A61C1C',
                                    pointHoverBorderColor: '#fff',
                                    pointHoverBorderWidth: 2,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                // Left-to-right progressive draw
                                animations: {
                                    x: {
                                        type: 'number',
                                        easing: 'linear',
                                        duration: delay,
                                        from: NaN,
                                        delay(ctx) {
                                            if (ctx.type !== 'data' || ctx.xStarted) return 0;
                                            ctx.xStarted = true;
                                            return ctx.index * delay;
                                        }
                                    },
                                    y: {
                                        type: 'number',
                                        easing: 'easeInOutCubic',
                                        duration: delay,
                                        from: previousY,
                                        delay(ctx) {
                                            if (ctx.type !== 'data' || ctx.yStarted) return 0;
                                            ctx.yStarted = true;
                                            return ctx.index * delay;
                                        }
                                    }
                                },
                                plugins: {
                                    legend: { display: false },
                                    tooltip: {
                                        mode: 'index',
                                        intersect: false,
                                        backgroundColor: 'rgba(166,28,28,0.92)',
                                        titleColor: '#fff',
                                        bodyColor: '#fecaca',
                                        borderColor: '#A61C1C',
                                        borderWidth: 1,
                                        padding: 10,
                                        displayColors: false,
                                    }
                                },
                                scales: {
                                    x: { display: false },
                                    y: { display: false, min: 0, max: 35 }
                                },
                                interaction: { mode: 'nearest', axis: 'x', intersect: false },
                                layout: { padding: 0 }
                            }
                        });
                    }

                    // ── 2. DONUT CHART: Requests by Type ──────────────────────────
                    const donutCanvas = document.getElementById('requestTypeChart');
                    if (donutCanvas && !donutCanvas._initialized) {
                        donutCanvas._initialized = true;

                        new Chart(donutCanvas.getContext('2d'), {
                            type: 'doughnut',
                            data: {
                                labels: ['Clearance', 'Indigency', 'Residency'],
                                datasets: [{
                                    data: [45, 35, 20],
                                    backgroundColor: ['#A61C1C', '#734A12', '#F2C11D'],
                                    borderWidth: 0,
                                    hoverOffset: 6,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                cutout: '78%',
                                animation: {
                                    animateRotate: true,
                                    animateScale: false,
                                    duration: 1200,
                                    easing: 'easeOutBack',
                                },
                                plugins: {
                                    legend: { display: false },
                                    tooltip: {
                                        backgroundColor: 'rgba(24,24,24,0.88)',
                                        titleColor: '#fff',
                                        bodyColor: '#d1d5db',
                                        padding: 10,
                                        displayColors: true,
                                    }
                                },
                                layout: { padding: 10 }
                            }
                        });
                    }
                }

                initDashboardCharts();
            });
        </script>
    @endpush
</x-app-layout>
