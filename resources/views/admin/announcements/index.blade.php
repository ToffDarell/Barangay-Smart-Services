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
            @foreach ([
                ['Health Advisory', 'Vaccination drive scheduled this Friday at the barangay hall.', 'Health'],
                ['Community Cleanup', 'Residents are encouraged to join the weekend cleanup drive.', 'Events'],
                ['Safety Reminder', 'Please observe curfew and report concerns to the barangay office.', 'Safety'],
            ] as $item)
                <div class="admin-card p-5">
                    <p class="text-xs font-semibold uppercase tracking-wide text-violet-600">{{ $item[2] }}</p>
                    <h3 class="mt-2 admin-card-title">{{ $item[0] }}</h3>
                    <p class="mt-3 admin-body">{{ $item[1] }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="badge-active">Active</span>
                        <a href="#" class="text-sm font-semibold text-violet-600">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
