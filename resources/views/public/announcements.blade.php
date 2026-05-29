<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Announcements - Barangay North Poblacion</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-white bg-gray-50">

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
                    <a href="{{ route('public.announcements') }}" class="text-white font-medium text-sm border-b-2 border-yellow-400 pb-1">Announcements</a>
                    <a href="{{ route('public.transparency') }}" class="text-white/80 hover:text-white font-medium text-sm transition pb-1">Transparency</a>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('login') }}" class="text-white font-medium text-sm hover:text-yellow-400 transition">Login</a>
                    <a href="{{ route('request.index') }}" class="bg-yellow-400 text-[#7f0000] font-bold text-sm px-6 py-2.5 rounded hover:bg-yellow-300 transition shadow-lg">Request Documents</a>
                </div>
            </nav>

            <div class="max-w-7xl mx-auto px-8 lg:px-16 py-16 lg:py-20 text-center">
                <p class="text-yellow-400 text-sm font-bold uppercase tracking-[0.25em]">Community Updates</p>
                <h1 class="mt-4 text-4xl lg:text-5xl font-display font-bold text-white">Announcements</h1>
                <p class="mt-4 text-lg text-white/80 max-w-2xl mx-auto">Stay informed with the latest news, events, and advisories from Barangay North Poblacion.</p>
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
                </div>
            </div>
        </div>
    </div>

    <section class="py-16 bg-white">
        <div class="mx-auto max-w-7xl px-8 lg:px-16">
            @if ($announcements->count())
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($announcements as $item)
                        <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm hover:shadow-lg hover:border-red-100 transition">
                            <span class="inline-block text-[11px] font-bold uppercase tracking-wider text-violet-600 bg-violet-50 px-3 py-1 rounded-full">{{ $item->category }}</span>
                            <h3 class="mt-4 text-lg font-bold text-gray-900 leading-snug">{{ $item->title }}</h3>
                            <p class="mt-3 text-sm text-gray-600 leading-relaxed">{{ $item->body }}</p>
                            @if ($item->published_at)
                                <p class="mt-4 text-xs text-gray-400">{{ $item->published_at->format('M d, Y') }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="mt-10">
                    {{ $announcements->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    </div>
                    <h3 class="mt-4 text-lg font-bold text-gray-900">No Announcements Yet</h3>
                    <p class="mt-2 text-sm text-gray-500">Check back later for updates from the barangay.</p>
                </div>
            @endif

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
            <p>&copy; {{ date('Y') }} Barangay North Poblacion, {{ \App\Helpers\Settings::get('municipality', 'Maramag') }}, {{ \App\Helpers\Settings::get('province', 'Bukidnon') }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>