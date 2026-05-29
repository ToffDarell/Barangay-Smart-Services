<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <section class="space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">BARANGAY NORTH POBLACION &nbsp;&rsaquo;&nbsp; <span class="text-red-600">PORTAL STATS</span></p>
                <h2 class="text-2xl font-bold text-gray-900">Admin Dashboard</h2>
            </div>
            <button class="flex items-center gap-2 border border-gray-200 rounded-md px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export Report
            </button>
        </div>

        <div class="grid gap-4 lg:grid-cols-4">
            <div class="admin-card p-5 relative overflow-hidden">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">Total Requests</p>
                <p class="text-3xl font-bold text-gray-900">{{ number_format($totalRequests) }}</p>
            </div>

            <div class="admin-card p-5">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">Pending</p>
                <p class="text-3xl font-bold text-gray-900">{{ number_format($pendingCount) }}</p>
            </div>

            <div class="admin-card p-5">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center text-sky-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">Processing</p>
                <p class="text-3xl font-bold text-gray-900">{{ number_format($processingCount) }}</p>
            </div>

            <div class="admin-card p-5 relative">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                <p class="text-sm font-medium text-gray-600 mb-1">Ready for Claiming</p>
                <p class="text-3xl font-bold text-gray-900">{{ number_format($readyCount) }}</p>
            </div>
        </div>

        <div class="grid gap-4 xl:grid-cols-[2fr_1fr]">
            <div class="admin-card p-5">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Resident Registration Trend</h3>
                    <div class="flex items-center gap-2">
                        <button type="button" class="rounded border border-gray-200 px-3 py-1.5 text-[11px] font-semibold text-gray-600 hover:bg-gray-50">
                            {{ now()->year }}
                        </button>
                    </div>
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
                            @forelse($recentResidents as $resident)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-3 text-sm font-medium text-gray-900">{{ $resident->first_name }} {{ $resident->last_name }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-500">{{ $resident->purok }}</td>
                                    <td class="px-2 py-3">
                                        @if($resident->status === 'active')
                                            <span class="inline-flex rounded bg-[#d1fae5] px-2 py-0.5 text-[11px] font-semibold text-[#047857]">Active</span>
                                        @else
                                            <span class="inline-flex rounded bg-[#fef3c7] px-2 py-0.5 text-[11px] font-semibold text-[#b45309]">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="py-4 text-center text-sm text-gray-500">No residents yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="admin-card p-5 relative">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Recent Document Requests</h3>
                    <a href="{{ route('admin.certificates.index') }}" class="text-xs font-semibold text-red-600 hover:text-red-700">View All</a>
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
                            @forelse($recentRequests as $req)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-3 text-sm font-medium text-gray-900">{{ ucfirst($req->certificate_type) }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-500">{{ $req->full_name }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-500">{{ $req->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="py-4 text-center text-sm text-gray-500">No requests yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
