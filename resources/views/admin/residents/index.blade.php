<x-app-layout>
    <x-slot name="header">Residents</x-slot>

    <section class="space-y-5">
        <div>
            <p class="admin-page-kicker">Residents Master List</p>
            <h2 class="mt-1 admin-page-title">Residents</h2>
        </div>

        <div class="admin-card p-4">
            <div class="mb-4 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="w-full max-w-sm">
                    <input type="text" class="admin-input" placeholder="Search residents..." />
                </div>
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="admin-btn-secondary">Import CSV</button>
                    <button type="button" class="admin-btn-secondary">Export PDF</button>
                    <button type="button" class="admin-btn-primary">Add Resident</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-gray-100">
                        <tr>
                            @foreach (['Full Name', 'Age', 'Purok', 'Civil Status', 'Voter', 'Date Added', 'Actions'] as $head)
                                <th class="px-3 py-3 text-left admin-table-head">{{ $head }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($residents as $r)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 admin-table-cell font-medium">{{ $r->first_name }} {{ $r->last_name }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $r->date_of_birth ? now()->diffInYears($r->date_of_birth) : 'N/A' }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $r->purok }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $r->civil_status ?? 'N/A' }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $r->is_voter ? 'Y' : 'N' }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $r->created_at->format('M d, Y') }}</td>
                                <td class="px-3 py-3 admin-table-cell">
                                    <a href="#" class="font-semibold text-violet-600">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="py-8 text-center text-sm text-gray-500">No residents yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $residents->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
