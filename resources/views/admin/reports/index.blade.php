<x-app-layout>
    <x-slot name="header">Reports & Analytics</x-slot>

    <section class="space-y-5">
        <div>
            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">BARANGAY NORTE POBLACION &nbsp;&rsaquo;&nbsp; <span class="text-red-600">REPORTS</span></p>
            <h2 class="mt-1 admin-page-title">Reports & Analytics</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-4">
            @foreach ([
                ['Total Requests', '5', 'bg-red-100 text-red-600'],
                ['Approved', '1', 'bg-sky-100 text-sky-600'],
                ['Released', '0', 'bg-emerald-100 text-emerald-600'],
                ['Rejected', '0', 'bg-rose-100 text-rose-600'],
            ] as $stat)
                <div class="admin-card p-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full {{ $stat[2] }}">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M7.5 3.75h6l3 3v13.5h-12v-16.5h3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">{{ $stat[0] }}</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $stat[1] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Charts Section -->
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

        <div class="admin-card p-4">
            <div class="mb-4 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="grid gap-3 md:grid-cols-4">
                    <input type="date" class="admin-input" />
                    <input type="date" class="admin-input" />
                    <select class="admin-input"><option>All Services</option></select>
                    <select class="admin-input"><option>All Status</option></select>
                </div>
                <div class="flex gap-2">
                    <button type="button" class="admin-btn-primary">Export Excel</button>
                    <button type="button" class="admin-btn-secondary" onclick="window.print()">Export PDF</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-gray-100">
                        <tr>
                            @foreach (['Reference ID', 'Resident Name', 'Service Type', 'Status'] as $head)
                                <th class="px-3 py-3 text-left admin-table-head">{{ $head }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ([
                            ['#REQ-202605140001', 'Jupiter A. Desuyo', 'Barangay Clearance', 'Pending'],
                            ['#REQ-202605140002', 'Maria Santos', 'Barangay ID', 'Ready'],
                        ] as $row)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 admin-table-cell font-medium text-red-600">{{ $row[0] }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $row[1] }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $row[2] }}</td>
                                <td class="px-3 py-3">
                                    <span class="{{ $row[3] === 'Ready' ? 'badge-ready' : 'badge-pending' }}">{{ $row[3] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                function initReportsCharts() {
                    if (typeof Chart === 'undefined') {
                        setTimeout(initReportsCharts, 50);
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

                initReportsCharts();
            });
        </script>
    @endpush
</x-app-layout>
