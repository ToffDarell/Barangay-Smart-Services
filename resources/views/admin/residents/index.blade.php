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
                        @foreach ([
                            ['Juan Dela Cruz', '34', 'Purok 1', 'Married', 'Y', 'May 14, 2026'],
                            ['Maria Santos', '29', 'Purok 2', 'Single', 'Y', 'May 13, 2026'],
                            ['Pedro Reyes', '41', 'Purok 3', 'Widowed', 'N', 'May 12, 2026'],
                        ] as $row)
                            <tr class="hover:bg-gray-50">
                                @foreach ($row as $cell)
                                    <td class="px-3 py-3 admin-table-cell">{{ $cell }}</td>
                                @endforeach
                                <td class="px-3 py-3 admin-table-cell">
                                    <a href="#" class="font-semibold text-violet-600">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
