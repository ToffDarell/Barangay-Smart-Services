<x-app-layout>
    <x-slot name="header">Clearance Types</x-slot>

    <section x-data="{ open: false }" class="space-y-5">
        <div>
            <p class="admin-page-kicker">Settings</p>
            <h2 class="mt-1 admin-page-title">Clearance Types</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-[240px_1fr]">
            <x-settings-nav />

            <div class="admin-card p-4">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">Settings <span class="mx-1">></span> Clearance Types</p>
                        <h3 class="mt-2 admin-card-title">Manage Clearance Types</h3>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="text" class="admin-input w-56" placeholder="Search type name..." />
                        <button type="button" @click="open = true" class="admin-btn-primary">+ Add New Type</button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="border-b border-gray-100">
                            <tr>
                                @foreach (['#', 'Name', 'Status', 'Action'] as $head)
                                    <th class="px-3 py-3 text-left admin-table-head">{{ $head }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ([
                                'Barangay Clearance',
                                'Barangay ID',
                                'Barangay Indigency',
                                'Barangay Residency',
                                'Business Clearance',
                                'First Time Jobseeker Certificate',
                            ] as $index => $type)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-3 admin-table-cell">{{ $index + 1 }}</td>
                                    <td class="px-3 py-3 admin-table-cell font-medium">{{ $type }}</td>
                                    <td class="px-3 py-3"><span class="badge-active">ACTIVE</span></td>
                                    <td class="px-3 py-3">
                                        <div class="flex items-center gap-3">
                                            <a href="#" class="text-sky-500">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m16.862 4.487 2.651 2.651M7.5 16.5l-3 3m0 0 3-10.5 10.5-3-3 10.5-10.5 3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" /></svg>
                                            </a>
                                            <a href="#" class="text-rose-400">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0 0 1 15.916 21.75H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0A48.11 48.11 0 0 1 8.25 5.393m8.978.397a48.11 48.11 0 0 0-8.978-.397" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" /></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                    <div>Show <span class="rounded border border-gray-200 px-2 py-1">10</span> entries</div>
                    <div class="flex items-center gap-2">
                        <button type="button" class="admin-btn-secondary px-3 py-2">Previous</button>
                        <span class="rounded-lg bg-violet-600 px-3 py-2 text-white">1</span>
                        <button type="button" class="admin-btn-secondary px-3 py-2">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <div x-cloak x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/35 p-4">
            <div @click.outside="open = false" class="w-full max-w-xl rounded-xl bg-white shadow-xl">
                <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4">
                    <h3 class="text-lg font-semibold text-gray-800">Add Clearance Type</h3>
                    <button type="button" @click="open = false" class="text-gray-400">X</button>
                </div>
                <div class="space-y-4 px-6 py-5">
                    <div>
                        <label class="admin-label">Type Name</label>
                        <input type="text" class="admin-input" placeholder="Enter type name" />
                    </div>
                    <div>
                        <label class="admin-label">Status</label>
                        <select class="admin-input">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-2 border-t border-gray-100 px-6 py-4">
                    <button type="button" @click="open = false" class="admin-btn-secondary">Close</button>
                    <button type="button" class="admin-btn-primary">Add Type</button>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
