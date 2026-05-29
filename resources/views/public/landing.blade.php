<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay North Poblacion</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-gray-800 bg-gray-50">

    <!-- Hero Section -->
    <div class="relative min-h-screen bg-[#7f0000] overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10" style="background-image: linear-gradient(rgba(255,255,255,0.2) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.2) 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="absolute inset-0 z-0 bg-gradient-to-br from-[#5a0000]/80 via-[#7f0000]/60 to-[#a00000]/40"></div>

        <div class="relative z-10 flex flex-col min-h-[90vh]">
            <nav class="flex items-center justify-between px-8 py-6">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center p-1">
                        <svg class="w-full h-full text-[#7f0000]" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4z"/>
                        </svg>
                    </div>
                    <span class="text-white font-display font-bold text-xl tracking-wide">Barangay North Poblacion</span>
                </div>
                <div class="hidden md:flex items-center gap-8">
                    <a href="#services" class="text-white font-medium text-sm border-b-2 border-yellow-400 pb-1">Services</a>
                    <a href="{{ route('public.announcements') }}" class="text-white/80 hover:text-white font-medium text-sm transition pb-1">Announcements</a>
                    <a href="{{ route('public.transparency') }}" class="text-white/80 hover:text-white font-medium text-sm transition pb-1">Transparency</a>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('login') }}" class="text-white font-medium text-sm hover:text-yellow-400 transition">Login</a>
                    <a href="{{ route('request.index') }}" class="bg-yellow-400 text-[#7f0000] font-bold text-sm px-6 py-2.5 rounded hover:bg-yellow-300 transition shadow-lg">Request Documents</a>
                </div>
            </nav>

            <div class="flex-1 flex flex-col md:flex-row items-center justify-between px-8 lg:px-16 max-w-7xl mx-auto w-full pt-12 lg:pt-0">
                <div class="w-full md:w-1/2 space-y-6">
                    <h1 class="text-5xl lg:text-6xl font-display font-bold text-white leading-[1.1]">
                        Smart Services for<br>
                        <span class="text-yellow-400">Barangay North<br>Poblacion</span><br>
                        Residents
                    </h1>
                    <p class="text-lg text-white/90 max-w-lg font-medium leading-relaxed">
                        Request certificates, stay informed, and connect with your community anytime, anywhere. A modern approach to local governance.
                    </p>
                    <div class="flex flex-wrap items-center gap-4 pt-4">
                        <a href="{{ route('request.index') }}" class="inline-flex items-center gap-2 bg-yellow-400 text-[#7f0000] font-bold px-6 py-3.5 rounded hover:bg-yellow-300 transition shadow-[0_0_20px_rgba(250,204,21,0.3)]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Request Documents
                        </a>
                        <a href="#announcements" class="inline-flex items-center gap-2 border border-white/10 bg-[#5a0000]/40 text-white font-bold px-6 py-3.5 rounded hover:bg-[#5a0000]/60 transition backdrop-blur-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                            View Announcements
                        </a>
                    </div>

                </div>

                <div class="w-full md:w-5/12 mt-12 md:mt-0 relative flex justify-center lg:justify-end">
                    <div class="bg-white rounded-xl shadow-2xl p-8 w-80 transform rotate-3 z-10 border border-gray-100">
                        <div class="flex flex-col items-center text-center space-y-4">
                            <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center text-red-800">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div>
                                <p class="text-[8px] font-bold uppercase tracking-widest text-red-800/60">Barangay North Poblacion</p>
                                <p class="text-[7px] text-gray-400 tracking-wider">{{ \App\Helpers\Settings::get('municipality', 'Maramag') }}, {{ \App\Helpers\Settings::get('province', 'Bukidnon') }}</p>
                            </div>
                            <div class="w-full h-px bg-gray-100 my-2"></div>
                            <h3 class="text-xl font-display font-bold text-gray-800 leading-tight">CERTIFICATE OF<br>RESIDENCY</h3>
                            <div class="w-full space-y-2 pt-4">
                                <div class="h-2 bg-gray-100 rounded w-full"></div>
                                <div class="h-2 bg-gray-100 rounded w-5/6"></div>
                                <div class="h-2 bg-gray-100 rounded w-4/6"></div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 z-20">
                        <div class="w-14 h-14 bg-yellow-400 rounded-xl shadow-lg flex items-center justify-center text-[#7f0000] transform -rotate-3 border-2 border-[#7f0000]">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Bar -->
        <div class="relative z-10 border-t border-white/10 bg-black/15 backdrop-blur-sm">
            <div class="mx-auto max-w-7xl px-8 py-6 lg:px-16">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6 divide-x divide-white/10 text-center md:text-left">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-4">
                        <div class="w-12 h-10 bg-yellow-600/30 rounded flex items-center justify-center text-yellow-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div class="pt-1">
                            <p class="text-[11px] font-bold text-white tracking-wide">Our Community</p>
                            <p class="text-[9px] font-semibold tracking-wider text-white mt-0.5">Stronger Together</p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-4 pl-0 md:pl-6">
                        <div class="text-yellow-400 pt-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <p class="text-3xl font-display font-bold text-white">{{ number_format($residentCount) }}+</p>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-white mt-1">Active Residents</p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-4 pl-0 md:pl-6">
                        <div class="text-yellow-400 pt-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-3xl font-display font-bold text-white">{{ number_format($totalRequests) }}+</p>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-white mt-1">Requests Processed</p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-4 pl-0 md:pl-6">
                        <div class="text-yellow-400 pt-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <p class="text-3xl font-display font-bold text-white">100%</p>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-white mt-1">Transparent</p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-4 pl-0 md:pl-6">
                        <div class="text-yellow-400 pt-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-3xl font-display font-bold text-white">24/7</p>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-white mt-1">Accessibility</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- E-Services Section -->
    <section id="services" class="py-24 bg-white">
        <div class="mx-auto max-w-7xl px-8 lg:px-16">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-4xl font-display font-bold text-gray-900">Available E-Services</h2>
                <p class="mt-4 text-gray-600 font-medium">Fast, secure, and convenient access to essential barangay documents. Request online and track your application status.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['title' => 'Barangay Clearance', 'desc' => 'Official document certifying that the resident has no derogatory record within the barangay jurisdiction.', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                    ['title' => 'Certificate of Residency', 'desc' => 'Proof of current address and residency within the barangay for various legal and administrative purposes.', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['title' => 'Certificate of Indigency', 'desc' => 'Certification for low-income residents required for medical, educational, or financial assistance programs.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ['title' => 'Barangay ID', 'desc' => 'Official identification card issued to registered residents for local transactions and verification.', 'icon' => 'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2'],
                    ['title' => 'First Time Job Seeker', 'desc' => 'Special certification granting fee exemptions for first-time job applicants under RA 11261.', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ['title' => 'Business Clearance', 'desc' => 'Prerequisite clearance for securing a Mayor\'s Permit to operate a business within the barangay.', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4']
                ] as $service)
                    <div class="group relative rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-xl hover:border-red-100">
                        <div class="absolute top-0 right-0 p-0">
                            <div class="w-16 h-16 bg-[#fdf5f5] rounded-bl-2xl rounded-tr-xl transition group-hover:bg-red-50"></div>
                        </div>
                        <div class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-gray-50 text-[#991b1b] transition group-hover:bg-red-100 relative z-10">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service['icon'] }}" />
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-bold text-gray-900 relative z-10">{{ $service['title'] }}</h3>
                        <p class="mb-6 text-sm text-gray-600 leading-relaxed relative z-10">{{ $service['desc'] }}</p>
                        <a href="{{ route('request.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#b91c1c] hover:text-[#7f0000] relative z-10">
                            Request Now
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <div class="inline-flex items-center gap-3 bg-gray-50 border border-gray-200 rounded-2xl px-8 py-5 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-10 h-10 bg-[#7f0000]/10 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#7f0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-gray-700 font-medium">
                        Already submitted a request?
                        <a href="{{ route('track') }}" class="text-[#b91c1c] font-bold hover:text-[#7f0000] underline underline-offset-2 transition">Track its status &rarr;</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
