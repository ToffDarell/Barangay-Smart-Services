<x-app-layout>
    <x-slot name="header">Announcements</x-slot>

    <section class="space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="admin-page-kicker">Announcements</p>
                <h2 class="mt-1 admin-page-title">Announcements</h2>
            </div>
            <button type="button" class="admin-btn-primary">Post Announcement</button>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($announcements as $item)
                <div class="admin-card p-5">
                    <p class="text-xs font-semibold uppercase tracking-wide text-violet-600">{{ $item->category }}</p>
                    <h3 class="mt-2 admin-card-title">{{ $item->title }}</h3>
                    <p class="mt-3 admin-body">{{ $item->body }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="badge-active">{{ $item->is_active ? 'Active' : 'Inactive' }}</span>
                        <a href="#" class="text-sm font-semibold text-violet-600">Edit</a>
                    </div>
                </div>
            @empty
                <div class="admin-card p-8 text-center col-span-full">
                    <p class="text-gray-500">No announcements yet.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-6">
            {{ $announcements->links() }}
        </div>
    </section>
</x-app-layout>
