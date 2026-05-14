<x-app-layout>
    <x-slot name="header">Reports & Analytics</x-slot>

    <section class="space-y-5">
        <div>
            <p class="admin-page-kicker">Reports & Analytics</p>
            <h2 class="mt-1 admin-page-title">Reports & Analytics</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-4">
            @foreach ([
                ['Total Requests', '5', 'bg-violet-100 text-violet-600'],
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
                                <td class="px-3 py-3 admin-table-cell font-medium text-violet-600">{{ $row[0] }}</td>
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
</x-app-layout>
