<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Barangay North System') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-white">
    <div class="public-hero-bg">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <nav class="flex items-center justify-between">
                <a href="{{ route('landing') }}" class="flex items-center gap-3">
                    <div class="rounded-2xl bg-white/10 p-2.5 ring-1 ring-white/10">
                        <x-application-logo class="h-11 w-11" />
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-white/65">Norte Poblacion</p>
                        <p class="font-display text-3xl font-bold uppercase leading-none text-white">Maramag</p>
                    </div>
                </a>

                <div class="hidden items-center gap-8 md:flex">
                    <a href="{{ route('public.services') }}" class="text-sm font-medium text-white/80 hover:text-white">Services</a>
                    <a href="{{ route('public.announcements') }}" class="text-sm font-medium text-white/80 hover:text-white">Announcements</a>
                    <a href="{{ route('public.transparency') }}" class="text-sm font-medium text-white/80 hover:text-white">Transparency</a>
                    <a href="{{ route('login') }}" class="rounded-lg border border-white/20 px-4 py-2 text-sm font-semibold text-white hover:bg-white/10">Login</a>
                </div>
            </nav>

            <section class="grid gap-10 py-16 lg:grid-cols-[1.1fr_0.9fr] lg:py-20">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-[0.18em] text-white/80">
                        <span class="h-2 w-2 rounded-full bg-violet-400"></span>
                        Official Digital Services
                    </div>

                    <h1 class="mt-6 font-display text-5xl font-extrabold leading-tight text-white sm:text-6xl">
                        Smart Services for
                        <span class="block text-violet-400">Barangay Norte Poblacion</span>
                        <span class="block text-white">Residents</span>
                    </h1>

                    <p class="mt-5 max-w-xl text-base leading-8 text-white/74">
                        Request certificates, stay informed, and connect with your community anytime, anywhere.
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('public.services') }}" class="admin-btn-primary bg-violet-600 hover:bg-violet-700">Request Documents</a>
                        <a href="{{ route('public.announcements') }}" class="inline-flex items-center justify-center rounded-lg border border-white/20 px-4 py-2.5 text-sm font-semibold text-white hover:bg-white/10">View Announcements</a>
                    </div>
                </div>

                <div class="relative">
                    <div class="relative mx-auto max-w-md rounded-[28px] border border-white/12 bg-white/5 p-6 shadow-2xl backdrop-blur">
                        <div class="rounded-[22px] bg-[linear-gradient(180deg,#1f2147,#232559)] p-5">
                            <div class="rounded-full border border-white/15 px-4 py-2 text-xs font-semibold uppercase tracking-[0.16em] text-white/70">
                                Barangay Residency Certificate
                            </div>
                            <div class="mt-6 rounded-[20px] bg-white px-6 py-7 text-slate-800">
                                <p class="text-center text-xs font-semibold uppercase tracking-[0.2em] text-gray-500">Barangay Norte Poblacion</p>
                                <p class="mt-1 text-center text-xs font-semibold uppercase tracking-[0.2em] text-gray-500">Maramag, Bukidnon</p>
                                <h3 class="mt-6 text-center font-display text-2xl font-bold uppercase text-slate-800">Certificate of Residency</h3>
                                <p class="mt-6 text-sm leading-7 text-gray-600">
                                    This certifies that <span class="font-semibold text-slate-800">Juan Dela Cruz</span> is a bonafide resident of Barangay Norte Poblacion, Maramag, Bukidnon.
                                </p>
                                <div class="mt-8 flex items-center justify-between">
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.16em] text-gray-400">Issued</p>
                                        <p class="text-sm font-semibold">May 14, 2026</p>
                                    </div>
                                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-violet-100 text-violet-600">
                                        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path d="m9 12.75 2.25 2.25L15 9.75" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                            <path d="M12 3 4.5 6v6c0 5.25 3.57 10.11 7.5 11.25 3.93-1.14 7.5-6 7.5-11.25V6L12 3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="-mt-4">
                <div class="rounded-2xl border border-white/12 bg-white/8 p-5 backdrop-blur">
                    <div class="grid gap-5 md:grid-cols-5">
                        <div>
                            <p class="text-sm font-semibold text-white">Our Community</p>
                            <p class="mt-1 text-sm text-white/65">Stronger together</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-white">2,500+</p>
                            <p class="text-sm text-white/65">Active Residents</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-white">6</p>
                            <p class="text-sm text-white/65">Services Online</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-white">100%</p>
                            <p class="text-sm text-white/65">Transparent</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-white">24/7</p>
                            <p class="text-sm text-white/65">Accessibility</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="bg-white py-16 text-slate-900">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <p class="admin-page-kicker">Services</p>
                <h2 class="mt-1 text-2xl font-bold text-gray-800">Our Services</h2>
            </div>

            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                @foreach ([
                    ['Barangay Clearance', 'General-purpose barangay certification'],
                    ['Barangay Indigency', 'For assistance and aid requirements'],
                    ['Barangay Residency', 'Proof of address and residency'],
                    ['Barangay ID', 'Barangay-issued identification'],
                    ['First Time Job Seeker', 'For first-time employment needs'],
                    ['Business Clearance', 'For local business processing'],
                ] as $service)
                    <div class="admin-card p-5">
                        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-violet-100 text-violet-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M7.5 3.75h6l3 3v13.5h-12v-16.5h3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-base font-semibold text-gray-800">{{ $service[0] }}</h3>
                        <p class="mt-2 text-sm text-gray-500">{{ $service[1] }}</p>
                        <a href="{{ route('public.services') }}" class="mt-4 inline-flex text-sm font-semibold text-violet-600">Request Now →</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-[#f7f8fc] py-16 text-slate-900">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <p class="admin-page-kicker">Community Updates</p>
                    <h2 class="mt-1 text-2xl font-bold text-gray-800">Latest Announcements</h2>
                </div>
                <a href="{{ route('public.announcements') }}" class="text-sm font-semibold text-violet-600">View All Announcements →</a>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                @foreach ([
                    ['Vaccination Drive', 'May 20, 2026', 'Free vaccination at the barangay hall starting 8:00 AM.'],
                    ['Community Cleanup', 'May 18, 2026', 'Residents are invited to join the cleanup campaign this Saturday.'],
                    ['Curfew Reminder', 'May 15, 2026', 'Please observe local safety rules and report issues immediately.'],
                ] as $post)
                    <div class="admin-card p-5">
                        <p class="text-xs font-semibold uppercase tracking-wide text-violet-600">{{ $post[1] }}</p>
                        <h3 class="mt-3 text-base font-semibold text-gray-800">{{ $post[0] }}</h3>
                        <p class="mt-2 text-sm text-gray-500">{{ $post[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="bg-[#111223] py-10 text-white">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 md:grid-cols-3 lg:px-8">
            <div>
                <h3 class="font-display text-2xl font-bold uppercase">Barangay Norte Poblacion</h3>
                <p class="mt-3 text-sm text-white/70">Maramag, Bukidnon</p>
                <p class="text-sm text-white/70">0912 345 6789</p>
            </div>
            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-white/50">Quick Links</p>
                <div class="mt-3 space-y-2 text-sm text-white/70">
                    <a href="{{ route('public.services') }}" class="block">Services</a>
                    <a href="{{ route('public.transparency') }}" class="block">Verify Document</a>
                    <a href="{{ route('login') }}" class="block">Login</a>
                </div>
            </div>
            <div class="text-sm text-white/60 md:text-right">
                Copyright 2025 Barangay Norte Poblacion
            </div>
        </div>
    </footer>
</body>
</html>
