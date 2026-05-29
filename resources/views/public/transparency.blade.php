<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transparency - Barangay North Poblacion</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-gray-800 bg-gray-50">

    <div class="relative bg-[#7f0000] overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10" style="background-image: linear-gradient(rgba(255,255,255,0.2) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.2) 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="absolute inset-0 z-0 bg-gradient-to-br from-[#5a0000]/80 via-[#7f0000]/60 to-[#a00000]/40"></div>

        <div class="relative z-10">
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
                    <a href="{{ route('landing') }}#services" class="text-white/80 hover:text-white font-medium text-sm transition pb-1">Services</a>
                    <a href="{{ route('public.announcements') }}" class="text-white/80 hover:text-white font-medium text-sm transition pb-1">Announcements</a>
                    <a href="{{ route('public.transparency') }}" class="text-white font-medium text-sm border-b-2 border-yellow-400 pb-1">Transparency</a>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('login') }}" class="text-white font-medium text-sm hover:text-yellow-400 transition">Login</a>
                    <a href="{{ route('request.index') }}" class="bg-yellow-400 text-[#7f0000] font-bold text-sm px-6 py-2.5 rounded hover:bg-yellow-300 transition shadow-lg">Request Documents</a>
                </div>
            </nav>

            <div class="max-w-7xl mx-auto px-8 lg:px-16 py-16 lg:py-20 text-center">
                <p class="text-yellow-400 text-sm font-bold uppercase tracking-[0.25em]">Open Information</p>
                <h1 class="mt-4 text-4xl lg:text-5xl font-display font-bold text-white">Transparency</h1>
                <p class="mt-4 text-lg text-white/80 max-w-2xl mx-auto">Committed to open governance, accountability, and accessible public information.</p>
            </div>
        </div>

        <div class="relative z-10 border-t border-white/10 bg-black/15 backdrop-blur-sm">
            <div class="mx-auto max-w-7xl px-8 py-5 lg:px-16">
                <div class="flex items-center justify-center gap-8 text-sm text-white/70">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span class="text-white font-semibold">{{ number_format($residentCount) }}+</span> Active Residents
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span class="text-white font-semibold">{{ number_format($totalRequests) }}+</span> Requests Processed
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        100% Transparent
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="py-16 bg-white">
        <div class="mx-auto max-w-7xl px-8 lg:px-16">
            <div class="grid gap-8 md:grid-cols-2">
                <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm">
                    <div class="w-12 h-12 bg-[#7f0000]/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-[#7f0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-gray-900">Barangay Information</h3>
                    <dl class="mt-6 space-y-4 text-sm">
                        <div class="flex justify-between border-b border-gray-100 pb-3">
                            <dt class="text-gray-500">Barangay</dt>
                            <dd class="font-semibold text-gray-900">{{ $config['barangay_name'] }}</dd>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-3">
                            <dt class="text-gray-500">Municipality</dt>
                            <dd class="font-semibold text-gray-900">{{ $config['municipality'] }}</dd>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-3">
                            <dt class="text-gray-500">Province</dt>
                            <dd class="font-semibold text-gray-900">{{ $config['province'] }}</dd>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-3">
                            <dt class="text-gray-500">Contact</dt>
                            <dd class="font-semibold text-gray-900">{{ $config['contact'] }}</dd>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-3">
                            <dt class="text-gray-500">Email</dt>
                            <dd class="font-semibold text-gray-900">{{ $config['email'] }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-500">Office Hours</dt>
                            <dd class="font-semibold text-gray-900">{{ $config['office_hours'] }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm">
                    <div class="w-12 h-12 bg-[#7f0000]/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-[#7f0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-gray-900">Barangay Officials</h3>

                    @if ($officials->count())
                        <ul class="mt-6 space-y-3">
                            @foreach ($officials as $official)
                                <li class="flex items-center justify-between border-b border-gray-100 pb-3 last:border-0 last:pb-0">
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $official->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $official->position }}</p>
                                    </div>
                                    @if ($official->contact)
                                        <span class="text-xs text-gray-400">{{ $official->contact }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-6 text-sm text-gray-500">No officials listed yet.</p>
                    @endif
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#b91c1c] hover:text-[#7f0000] transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Home
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-400 py-8">
        <div class="mx-auto max-w-7xl px-8 lg:px-16 text-center text-sm">
            <p>&copy; {{ date('Y') }} Barangay North Poblacion, {{ $config['municipality'] }}, {{ $config['province'] }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>