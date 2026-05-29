<x-app-layout>
    <x-slot name="header">Certificates</x-slot>

    <section class="space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">BARANGAY NORTH POBLACION &nbsp;&rsaquo;&nbsp; <span class="text-red-600">DOCUMENT SERVICES</span></p>
                <h2 class="text-2xl font-bold text-gray-900">Certificate Requests</h2>
            </div>
            <a href="{{ route('admin.certificates.export.csv', request()->query()) }}"
               class="flex items-center gap-2 border border-gray-200 rounded-md px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export CSV
            </a>
        </div>

        <div class="admin-card">
            <div class="border-b border-gray-100 p-5">
                <form method="GET" action="{{ route('admin.certificates.index') }}" id="filter-form">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <div class="relative flex-1 md:w-80">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </span>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    oninput="debounceSearch(this)"
                                    class="w-full rounded-md border border-gray-200 bg-white px-3 py-2 pl-9 text-sm text-gray-700 outline-none transition focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                    placeholder="Search by name or reference..." />
                            </div>
                            <select name="type" onchange="this.form.submit()" class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-700 outline-none transition focus:border-red-500 focus:ring-1 focus:ring-red-500">
                                <option value="">All Document Types</option>
                                @php
                                    $types = \App\Models\CertificateRequest::select('certificate_type')->distinct()->pluck('certificate_type');
                                @endphp
                                @foreach($types as $t)
                                    <option value="{{ $t }}" {{ request('type') === $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
                                @endforeach
                            </select>
                            <select name="status" onchange="this.form.submit()" class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-700 outline-none transition focus:border-red-500 focus:ring-1 focus:ring-red-500">
                                <option value="">Status: All</option>
                                @foreach(['pending', 'processing', 'ready', 'claimed', 'rejected'] as $s)
                                    <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
                <script>
                    let searchTimer;
                    function debounceSearch(el) {
                        clearTimeout(searchTimer);
                        searchTimer = setTimeout(() => el.form.submit(), 300);
                    }
                </script>

                <div class="mt-6 flex gap-6 border-b border-gray-100">
                    @php
                        $tabs = [
                            'all' => ['label' => 'All Requests', 'count' => $totalCount],
                            'pending' => ['label' => 'Pending', 'count' => $pendingCount],
                            'processing' => ['label' => 'Processing', 'count' => $processingCount],
                            'ready' => ['label' => 'For Pick-up', 'count' => $readyCount],
                            'claimed' => ['label' => 'Completed', 'count' => $claimedCount],
                        ];
                        $currentTab = request('status', 'all');
                    @endphp
                    @foreach($tabs as $key => $tab)
                        <a href="{{ $key === 'all' ? route('admin.certificates.index', array_filter(request()->only(['search', 'type']))) : route('admin.certificates.index', array_merge(request()->only(['search', 'type']), ['status' => $key])) }}"
                           class="border-b-2 pb-2 text-sm font-semibold transition {{ $currentTab === $key ? 'border-red-600 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                            {{ $tab['label'] }} ({{ $tab['count'] }})
                        </a>
                    @endforeach
                </div>
            </div>

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
                        @forelse($requests as $cert)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 pr-4 align-top">
                                    <p class="text-sm font-bold text-gray-900">{{ $cert->reference_number }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $cert->created_at->format('M d, Y h:i A') }}</p>
                                </td>
                                <td class="py-4 px-4 align-top">
                                    <p class="text-sm font-bold text-gray-900">{{ $cert->full_name }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $cert->purok }}</p>
                                </td>
                                <td class="py-4 px-4 align-top">
                                    <p class="text-sm font-medium text-gray-800">{{ ucfirst($cert->certificate_type) }}</p>
                                </td>
                                <td class="py-4 px-4 align-top">
                                    <p class="text-sm text-gray-600">{{ $cert->purpose }}</p>
                                </td>
                                <td class="py-4 px-4 align-top">
                                    @php
                                        $statusColors = ['pending' => 'amber', 'processing' => 'sky', 'ready' => 'emerald', 'claimed' => 'blue', 'rejected' => 'red'];
                                        $color = $statusColors[$cert->status] ?? 'gray';
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-{{ $color }}-100 px-2.5 py-1 text-xs font-semibold text-{{ $color }}-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-{{ $color }}-500"></span>
                                        {{ ucfirst($cert->status) }}
                                    </span>
                                </td>
                                <td class="py-4 pl-4 align-top">
                                    <a href="{{ route('admin.certificates.show', $cert->id) }}" class="inline-block rounded border border-gray-200 px-3 py-1.5 text-[11px] font-semibold text-red-600 hover:bg-red-50 transition">
                                        Review
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-sm text-gray-500">No requests found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-gray-100 p-5">
                {{ $requests->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
