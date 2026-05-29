<x-app-layout>
    <x-slot name="header">Purpose Types</x-slot>

    <section x-data="{ open: false }" class="space-y-5">
        <div>
            <p class="admin-page-kicker">Settings</p>
            <h2 class="mt-1 admin-page-title">Purpose Types</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-[240px_1fr]">
            <x-settings-nav />

            <div class="admin-card p-4">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500">Settings <span class="mx-1">></span> Purpose Types</p>
                        <h3 class="mt-2 admin-card-title">Manage Purpose Types</h3>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="text" class="admin-input w-56" placeholder="Search purpose name..." />
                        <button type="button" @click="open = true" class="admin-btn-primary">+ Add New Purpose</button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="border-b border-gray-100">
                            <tr>
                                @foreach (['#', 'Name', 'Price (₱)', 'Status', 'Action'] as $head)
                                    <th class="px-3 py-3 text-left admin-table-head">{{ $head }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($purposes as $index => $p)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-3 admin-table-cell">{{ $index + 1 }}</td>
                                    <td class="px-3 py-3 admin-table-cell font-medium">{{ $p->name }}</td>
                                    <td class="px-3 py-3 admin-table-cell">₱ {{ number_format($p->price, 2) }}</td>
                                    <td class="px-3 py-3">
                                        <span class="{{ $p->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $p->is_active ? 'ACTIVE' : 'INACTIVE' }}</span>
                                    </td>
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
                            @empty
                                <tr><td colspan="5" class="py-8 text-center text-sm text-gray-500">No purpose types yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div x-cloak x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 p-4 backdrop-blur-sm">
            <div @click.outside="open = false" class="w-full max-w-md rounded-xl bg-white shadow-2xl">
                <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4">
                    <h3 class="text-lg font-bold text-gray-900">Add Purpose Type</h3>
                    <button type="button" @click="open = false" class="text-gray-400 hover:text-gray-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
                <div class="space-y-4 px-6 py-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Purpose Name</label>
                        <input type="text" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500" placeholder="e.g., Local Employment" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Price (₱)</label>
                        <input type="number" step="0.01" class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-800 placeholder-gray-400 outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500" placeholder="0.00" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                        <select class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-800 outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-3 border-t border-gray-100 px-6 py-4 bg-gray-50 rounded-b-xl">
                    <button type="button" @click="open = false" class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">Cancel</button>
                    <button type="button" class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700 transition shadow-[0_2px_8px_rgba(124,58,237,0.3)]">Save Purpose</button>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
