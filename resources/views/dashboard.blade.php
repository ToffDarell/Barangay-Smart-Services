<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <section class="space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">BARANGAY NORTE POBLACION &nbsp;&rsaquo;&nbsp; <span class="text-violet-600">PORTAL STATS</span></p>
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
                    <div class="w-10 h-10 rounded-xl bg-violet-100 flex items-center justify-center text-violet-600">
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
                    <div class="w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center text-sky-600">
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
                <div class="h-[280px] w-full">
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
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="text-2xl font-bold text-gray-900">850</span>
                        <span class="text-[11px] font-medium text-gray-500">Total</span>
                    </div>
                </div>
                <div class="mt-6 space-y-3 px-2">
                    @foreach ([
                        ['Clearance', 'bg-violet-600', '45%'],
                        ['Indigency', 'bg-sky-400', '35%'],
                        ['Residency', 'bg-amber-400', '20%'],
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
                    <a href="{{ route('residents.index') }}" class="text-xs font-semibold text-violet-600 hover:text-violet-700">View All</a>
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
                    <a href="{{ route('certificates.index') }}" class="text-xs font-semibold text-violet-600 hover:text-violet-700">View All</a>
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
                <button class="absolute bottom-6 right-6 w-12 h-12 bg-violet-600 hover:bg-violet-700 text-white rounded-full flex items-center justify-center shadow-lg shadow-violet-500/40">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.591 1.066c1.527-.94 3.31.843 2.37 2.37a1.724 1.724 0 001.065 2.591c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.591c.94 1.527-.843 3.31-2.37 2.37a1.724 1.724 0 00-2.591 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.591-1.066c-1.527.94-3.31-.843-2.37-2.37a1.724 1.724 0 00-1.065-2.591c-1.756-.426-1.756-2.924 0-3.35A1.724 1.724 0 005.364 7.75c-.94-1.527.843-3.31 2.37-2.37.996.613 2.296.07 2.591-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </button>
            </div>
        </div>
    </section>
</x-app-layout>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const residentTrendCtx = document.getElementById('residentTrendChart');
        if (residentTrendCtx) {
            new Chart(residentTrendCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                    datasets: [{
                        label: 'Registrations',
                        data: [20, 25, 23, 20, 15, 12, 10, 15, 25, 30],
                        borderColor: '#7c3aed',
                        backgroundColor: 'rgba(124, 58, 237, 0.15)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 4,
                        pointRadius: 0,
                        pointHoverRadius: 6,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { display: false },
                        y: { display: false, min: 0, max: 35 }
                    },
                    layout: { padding: 0 }
                }
            });
        }

        const requestTypeCtx = document.getElementById('requestTypeChart');
        if (requestTypeCtx) {
            new Chart(requestTypeCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Clearance', 'Indigency', 'Residency'],
                    datasets: [{
                        data: [45, 35, 20],
                        backgroundColor: ['#7c3aed', '#38bdf8', '#fbbf24'],
                        borderWidth: 0,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '80%',
                    plugins: { legend: { display: false } },
                    layout: { padding: 10 }
                }
            });
        }
    </script>
@endpush
