<x-app-layout>
    <x-slot name="header">Officials</x-slot>

    <section class="space-y-5">
        <div>
            <p class="admin-page-kicker">Settings</p>
            <h2 class="mt-1 admin-page-title">Officials</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-[240px_1fr]">
            <x-settings-nav />

            <div class="admin-card p-4">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h3 class="admin-card-title">Barangay Officials</h3>
                        <p class="admin-body">Maintain current official records</p>
                    </div>
                    <button type="button" class="admin-btn-primary">Add Official</button>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="border-b border-gray-100">
                            <tr>
                                @foreach (['Name', 'Position', 'Status', 'Action'] as $head)
                                    <th class="px-3 py-3 text-left admin-table-head">{{ $head }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($officials as $o)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-3 admin-table-cell font-medium">{{ $o->name }}</td>
                                    <td class="px-3 py-3 admin-table-cell">{{ $o->position }}</td>
                                    <td class="px-3 py-3">
                                        <span class="{{ $o->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $o->is_active ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                    <td class="px-3 py-3 admin-table-cell"><a href="#" class="font-semibold text-violet-600">Edit</a></td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="py-8 text-center text-sm text-gray-500">No officials yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
