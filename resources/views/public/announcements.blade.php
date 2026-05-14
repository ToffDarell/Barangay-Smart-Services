<x-public-layout>
    <section class="space-y-5">
        <div>
            <p class="admin-page-kicker">Community Updates</p>
            <h2 class="mt-1 admin-page-title">Announcements</h2>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach ([
                ['Vaccination Drive', 'Health'],
                ['Community Cleanup Program', 'Events'],
                ['Flood Preparedness Reminder', 'Safety'],
            ] as $item)
                <div class="admin-card p-5">
                    <p class="text-xs font-semibold uppercase tracking-wide text-violet-600">{{ $item[1] }}</p>
                    <h3 class="mt-3 admin-card-title">{{ $item[0] }}</h3>
                    <p class="mt-2 admin-body">Latest official advisory from Barangay Norte Poblacion.</p>
                </div>
            @endforeach
        </div>
    </section>
</x-public-layout>
