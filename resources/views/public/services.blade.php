<x-public-layout>
    <section class="space-y-5">
        <div>
            <p class="admin-page-kicker">Public Request Forms</p>
            <h2 class="mt-1 admin-page-title">Services</h2>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach ([
                'Barangay Clearance Request',
                'Barangay Indigency Request',
                'Barangay Residency Request',
                'Barangay ID Request',
                'First Time Job Seeker Request',
                'Business Clearance Request',
            ] as $service)
                <div class="admin-card p-5">
                    <h3 class="admin-card-title">{{ $service }}</h3>
                    <p class="mt-2 admin-body">Public form page will be connected in the next module build.</p>
                    <a href="{{ route('login') }}" class="mt-4 inline-flex text-sm font-semibold text-violet-600">Open Form -></a>
                </div>
            @endforeach
        </div>
    </section>
</x-public-layout>
