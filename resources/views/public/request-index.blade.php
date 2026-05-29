<x-public-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-display font-bold text-gray-900">Request a Document</h1>
            <p class="mt-2 text-gray-600">Choose the type of document you need.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 max-w-5xl mx-auto">
            @foreach ([
                'clearance'     => ['Barangay Clearance', 'Official document certifying good moral character and residency.', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                'residency'     => ['Certificate of Residency', 'Proof of current address within the barangay.', 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                'indigency'     => ['Certificate of Indigency', 'Certification for low-income residents for assistance programs.', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                'barangay_id'   => ['Barangay ID', 'Official ID for registered residents.', 'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2'],
                'job_seeker'    => ['First Time Job Seeker', 'Fee exemption cert for first-time job applicants (RA 11261).', 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                'business'      => ['Business Clearance', 'Prerequisite for Mayor\'s Permit to operate a business.', 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
            ] as $key => [$title, $desc, $icon])
                <a href="{{ route('request.form', $key) }}" class="group relative rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-xl hover:border-red-100">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-gray-50 text-[#991b1b] transition group-hover:bg-red-100">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $icon }}" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-900">{{ $title }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                </a>
            @endforeach
        </div>
    </section>
</x-public-layout>
