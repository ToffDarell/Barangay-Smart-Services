<x-app-layout>
    <x-slot name="header">Certificates</x-slot>

    <section class="space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">BARANGAY NORTE POBLACION &nbsp;&rsaquo;&nbsp; <span class="text-violet-600">DOCUMENT SERVICES</span></p>
                <h2 class="text-2xl font-bold text-gray-900">Certificate Requests</h2>
            </div>
            <button class="flex items-center gap-2 border border-gray-200 rounded-md px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export List
            </button>
        </div>

        <div class="admin-card">
            <!-- Toolbar -->
            <div class="border-b border-gray-100 p-5">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="relative flex-1 md:w-80">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                            <input type="text" class="w-full rounded-md border border-gray-200 bg-white px-3 py-2 pl-9 text-sm text-gray-700 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500" placeholder="Search by name or reference..." />
                        </div>
                        <select class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-700 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500">
                            <option>All Document Types</option>
                        </select>
                        <select class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-700 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500">
                            <option>Status: All</option>
                        </select>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="mt-6 flex gap-6 border-b border-gray-100">
                    <button class="border-b-2 border-violet-600 pb-2 text-sm font-semibold text-violet-600">All Requests (234)</button>
                    <button class="border-b-2 border-transparent pb-2 text-sm font-semibold text-gray-500 hover:text-gray-700">Pending (45)</button>
                    <button class="border-b-2 border-transparent pb-2 text-sm font-semibold text-gray-500 hover:text-gray-700">For Pick-up (12)</button>
                    <button class="border-b-2 border-transparent pb-2 text-sm font-semibold text-gray-500 hover:text-gray-700">Completed (177)</button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto p-5 pt-2">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="py-4 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500 pr-4">REF NO. / DATE</th>
                            <th class="py-4 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500 px-4">REQUESTOR</th>
                            <th class="py-4 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500 px-4">DOCUMENT TYPE</th>
                            <th class="py-4 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500 px-4">PURPOSE</th>
                            <th class="py-4 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500 px-4">STATUS</th>
                            <th class="py-4 text-left text-[11px] font-bold uppercase tracking-wider text-gray-500 pl-4">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ([
                            ['REF-2024-089', 'Today, 10:30 AM', 'Maria Clara Santos', 'Purok 4', 'Barangay Clearance', 'Local Employment', 'Pending', 'amber'],
                            ['REF-2024-088', 'Yesterday, 02:15 PM', 'Juan Dela Cruz', 'Purok 2', 'Certificate of Indigency', 'Medical Assistance', 'For Pick-up', 'sky'],
                            ['REF-2024-087', 'Oct 12, 2024', 'Elena Gomez', 'Purok 1', 'Business Clearance', 'New Business', 'Completed', 'emerald'],
                        ] as $row)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 pr-4 align-top">
                                    <p class="text-sm font-bold text-gray-900">{{ $row[0] }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $row[1] }}</p>
                                </td>
                                <td class="py-4 px-4 align-top">
                                    <p class="text-sm font-bold text-gray-900">{{ $row[2] }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $row[3] }}</p>
                                </td>
                                <td class="py-4 px-4 align-top">
                                    <p class="text-sm font-medium text-gray-800">{{ $row[4] }}</p>
                                </td>
                                <td class="py-4 px-4 align-top">
                                    <p class="text-sm text-gray-600">{{ $row[5] }}</p>
                                </td>
                                <td class="py-4 px-4 align-top">
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-{{ $row[7] }}-100 px-2.5 py-1 text-xs font-semibold text-{{ $row[7] }}-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-{{ $row[7] }}-500"></span>
                                        {{ $row[6] }}
                                    </span>
                                </td>
                                <td class="py-4 pl-4 align-top">
                                    <button class="rounded border border-gray-200 px-3 py-1.5 text-[11px] font-semibold text-violet-600 hover:bg-violet-50 transition">
                                        Review
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Placeholder -->
            <div class="border-t border-gray-100 p-5 flex items-center justify-between">
                <p class="text-sm text-gray-500">Showing <span class="font-medium text-gray-900">1</span> to <span class="font-medium text-gray-900">10</span> of <span class="font-medium text-gray-900">234</span> results</p>
                <div class="flex gap-1">
                    <button class="h-8 w-8 rounded flex items-center justify-center border border-gray-200 text-gray-400 hover:bg-gray-50"><svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>
                    <button class="h-8 w-8 rounded flex items-center justify-center bg-violet-600 text-white font-medium text-sm">1</button>
                    <button class="h-8 w-8 rounded flex items-center justify-center border border-gray-200 text-gray-600 font-medium text-sm hover:bg-gray-50">2</button>
                    <button class="h-8 w-8 rounded flex items-center justify-center border border-gray-200 text-gray-600 font-medium text-sm hover:bg-gray-50">3</button>
                    <button class="h-8 w-8 rounded flex items-center justify-center border border-gray-200 text-gray-400 hover:bg-gray-50"><svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
