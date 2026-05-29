<x-app-layout>
    <x-slot name="header">Reports & Analytics</x-slot>

    <section class="space-y-5">
        <div>
            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">BARANGAY NORTH POBLACION &nbsp;&rsaquo;&nbsp; <span class="text-red-600">REPORTS</span></p>
            <h2 class="mt-1 admin-page-title">Reports & Analytics</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-4">
            <div class="admin-card p-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100 text-red-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M7.5 3.75h6l3 3v13.5h-12v-16.5h3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" /></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Total Requests</p>
                        <p class="text-2xl font-bold text-gray-800">{{ number_format($totalRequests) }}</p>
                    </div>
                </div>
            </div>
            <div class="admin-card p-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-100 text-sky-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M7.5 3.75h6l3 3v13.5h-12v-16.5h3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" /></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Approved</p>
                        <p class="text-2xl font-bold text-gray-800">{{ number_format($approvedCount) }}</p>
                    </div>
                </div>
            </div>
            <div class="admin-card p-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M7.5 3.75h6l3 3v13.5h-12v-16.5h3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" /></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Released</p>
                        <p class="text-2xl font-bold text-gray-800">{{ number_format($releasedCount) }}</p>
                    </div>
                </div>
            </div>
            <div class="admin-card p-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-rose-100 text-rose-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M7.5 3.75h6l3 3v13.5h-12v-16.5h3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" /></svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Rejected</p>
                        <p class="text-2xl font-bold text-gray-800">{{ number_format($rejectedCount) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-4 xl:grid-cols-[2fr_1fr]">
            <div class="admin-card p-5">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Resident Registration Trend</h3>
                    <button type="button" class="rounded border border-gray-200 px-3 py-1.5 text-[11px] font-semibold text-gray-600 hover:bg-gray-50">{{ now()->year }}</button>
                </div>
                <div class="relative h-[280px] w-full">
                    <canvas id="residentTrendChart"
                        data-labels='@json($chartLabels)'
                        data-values='@json($chartData)'>
                    </canvas>
                </div>
            </div>
            <div class="admin-card p-5 relative">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Requests by Type</h3>
                </div>
                <div class="relative mx-auto h-[200px] w-[200px]">
                    <canvas id="requestTypeChart"
                        data-labels='@json($typeLabels)'
                        data-values='@json($typeData)'
                        data-colors='@json($typeColors)'>
                    </canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="text-2xl font-bold text-gray-900">{{ number_format($totalTypeCount) }}</span>
                        <span class="text-[11px] font-medium text-gray-500">Total</span>
                    </div>
                </div>
                <div class="mt-6 space-y-3 px-2">
                    @forelse($typeLabels as $i => $label)
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center gap-2 text-gray-700">
                                <span class="h-2 w-2 rounded-full" style="background: {{ $typeColors[$i % count($typeColors)] }}"></span>
                                <span>{{ $label }}</span>
                            </div>
                            <span class="font-medium text-gray-900">{{ number_format($typeData[$i]) }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 text-center">No data yet.</p>
                    @endforelse
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
                        @forelse($recentRequests as $req)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 admin-table-cell font-medium text-red-600">{{ $req->reference_number }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $req->full_name }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ ucfirst($req->certificate_type) }}</td>
                                <td class="px-3 py-3">
                                    <span class="{{ $req->status === 'ready' || $req->status === 'claimed' ? 'badge-ready' : 'badge-pending' }}">{{ ucfirst($req->status) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="py-8 text-center text-sm text-gray-500">No requests found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                function initCharts() {
                    if (typeof Chart === 'undefined') { setTimeout(initCharts, 50); return; }

                    const trendCanvas = document.getElementById('residentTrendChart');
                    if (trendCanvas && !trendCanvas._initialized) {
                        trendCanvas._initialized = true;
                        const labels = JSON.parse(trendCanvas.dataset.labels);
                        const values = JSON.parse(trendCanvas.dataset.values);
                        const ctx = trendCanvas.getContext('2d');
                        const gradient = ctx.createLinearGradient(0, 0, 0, 280);
                        gradient.addColorStop(0, 'rgba(166, 28, 28, 0.18)');
                        gradient.addColorStop(1, 'rgba(166, 28, 28, 0.00)');
                        const totalDuration = 1400;
                        const delay = totalDuration / values.length;
                        const previousY = (ctx) => ctx.index === 0 ? ctx.chart.scales.y.getPixelForValue(100) : ctx.chart.getDatasetMeta(ctx.datasetIndex).data[ctx.index - 1].getProps(['y'], true).y;
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels,
                                datasets: [{
                                    label: 'Registrations', data: values,
                                    borderColor: '#A61C1C', backgroundColor: gradient, fill: true,
                                    tension: 0.4, borderWidth: 3, pointRadius: 0,
                                    pointHoverRadius: 7, pointHoverBackgroundColor: '#A61C1C',
                                    pointHoverBorderColor: '#fff', pointHoverBorderWidth: 2,
                                }]
                            },
                            options: {
                                responsive: true, maintainAspectRatio: false,
                                animations: {
                                    x: { type: 'number', easing: 'linear', duration: delay, from: NaN, delay(ctx) { if (ctx.type !== 'data' || ctx.xStarted) return 0; ctx.xStarted = true; return ctx.index * delay; } },
                                    y: { type: 'number', easing: 'easeInOutCubic', duration: delay, from: previousY, delay(ctx) { if (ctx.type !== 'data' || ctx.yStarted) return 0; ctx.yStarted = true; return ctx.index * delay; } }
                                },
                                plugins: { legend: { display: false }, tooltip: { mode: 'index', intersect: false, backgroundColor: 'rgba(166,28,28,0.92)', titleColor: '#fff', bodyColor: '#fecaca', borderColor: '#A61C1C', borderWidth: 1, padding: 10, displayColors: false } },
                                scales: { x: { display: false }, y: { display: false, min: 0 } },
                                interaction: { mode: 'nearest', axis: 'x', intersect: false },
                                layout: { padding: 0 }
                            }
                        });
                    }

                    const donutCanvas = document.getElementById('requestTypeChart');
                    if (donutCanvas && !donutCanvas._initialized) {
                        donutCanvas._initialized = true;
                        const labels = JSON.parse(donutCanvas.dataset.labels);
                        const values = JSON.parse(donutCanvas.dataset.values);
                        const colors = JSON.parse(donutCanvas.dataset.colors);
                        new Chart(donutCanvas.getContext('2d'), {
                            type: 'doughnut',
                            data: { labels, datasets: [{ data: values, backgroundColor: colors, borderWidth: 0, hoverOffset: 6 }] },
                            options: {
                                responsive: true, maintainAspectRatio: false, cutout: '78%',
                                animation: { animateRotate: true, animateScale: false, duration: 1200, easing: 'easeOutBack' },
                                plugins: { legend: { display: false }, tooltip: { backgroundColor: 'rgba(24,24,24,0.88)', titleColor: '#fff', bodyColor: '#d1d5db', padding: 10, displayColors: true } },
                                layout: { padding: 10 }
                            }
                        });
                    }
                }
                initCharts();
            });
        </script>
    @endpush
</x-app-layout>
