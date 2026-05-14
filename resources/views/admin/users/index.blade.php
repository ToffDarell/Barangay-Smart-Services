<x-app-layout>
    <x-slot name="header">Users</x-slot>

    <section class="space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="admin-page-kicker">Admin Staff Users</p>
                <h2 class="mt-1 admin-page-title">Users</h2>
            </div>
            <button type="button" class="admin-btn-primary">Create User</button>
        </div>

        <div class="admin-card p-4">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-gray-100">
                        <tr>
                            @foreach (['Name', 'Email', 'Role', 'Status', 'Last Login'] as $head)
                                <th class="px-3 py-3 text-left admin-table-head">{{ $head }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ([
                            ['Barangay Administrator', 'admin@barangaynorth.test', 'Admin', 'Active', 'May 14, 2026'],
                            ['Barangay Staff', 'staff@barangaynorth.test', 'Staff', 'Active', 'May 14, 2026'],
                            ['Barangay Viewer', 'viewer@barangaynorth.test', 'Viewer', 'Active', 'May 14, 2026'],
                        ] as $row)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 admin-table-cell font-medium">{{ $row[0] }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $row[1] }}</td>
                                <td class="px-3 py-3 admin-table-cell">{{ $row[2] }}</td>
                                <td class="px-3 py-3"><span class="badge-active">{{ $row[3] }}</span></td>
                                <td class="px-3 py-3 admin-table-cell">{{ $row[4] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
