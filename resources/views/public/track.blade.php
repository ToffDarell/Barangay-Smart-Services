<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Track Request - Barangay North Poblacion</title>
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
                    <a href="{{ route('public.transparency') }}" class="text-white/80 hover:text-white font-medium text-sm transition pb-1">Transparency</a>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('login') }}" class="text-white font-medium text-sm hover:text-yellow-400 transition">Login</a>
                    <a href="{{ route('request.index') }}" class="bg-yellow-400 text-[#7f0000] font-bold text-sm px-6 py-2.5 rounded hover:bg-yellow-300 transition shadow-lg">Request Documents</a>
                </div>
            </nav>

            <div class="max-w-7xl mx-auto px-8 lg:px-16 py-16 lg:py-20 text-center">
                <p class="text-yellow-400 text-sm font-bold uppercase tracking-[0.25em]">Request Status</p>
                <h1 class="mt-4 text-4xl lg:text-5xl font-display font-bold text-white">Track Your Request</h1>
                <p class="mt-4 text-lg text-white/80 max-w-2xl mx-auto">Enter your reference number to see the real-time status of your document request.</p>
            </div>
        </div>
    </div>

    <section class="py-16 bg-white">
        <div class="mx-auto max-w-3xl px-8 lg:px-16">
            <form method="POST" action="{{ route('track.search') }}" class="flex gap-3">
                @csrf
                <input type="text" name="reference_number" value="{{ old('reference_number') }}"
                       placeholder="e.g. CLR-2026-000001" required
                       class="flex-1 rounded-xl border border-gray-200 px-5 py-4 text-sm focus:border-red-400 focus:ring-2 focus:ring-red-100 transition shadow-sm">
                <button type="submit" class="bg-[#7f0000] text-white font-bold px-8 py-4 rounded-xl hover:bg-[#5a0000] transition text-sm shadow-sm">
                    Search
                </button>
            </form>

            @error('reference_number')
                <p class="text-sm text-red-600 text-center mt-3">{{ $message }}</p>
            @enderror

            @isset($cert)
                @if ($cert)
                    <div class="mt-10 bg-white rounded-2xl border border-gray-100 p-8 shadow-sm">
                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-gray-500">Reference</span>
                                <span class="font-bold text-gray-900 text-lg">{{ $cert->reference_number }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-gray-500">Status</span>
                                @php
                                    $statusColors = [
                                        'pending'    => 'bg-amber-100 text-amber-700',
                                        'processing' => 'bg-blue-100 text-blue-700',
                                        'ready'      => 'bg-emerald-100 text-emerald-700',
                                        'claimed'    => 'bg-gray-100 text-gray-700',
                                        'rejected'   => 'bg-red-100 text-red-700',
                                    ];
                                    $color = $statusColors[$cert->status] ?? 'bg-gray-100 text-gray-700';
                                @endphp
                                <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1.5 text-sm font-semibold {{ $color }}">
                                    {{ ucfirst($cert->status) }}
                                </span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-gray-500">Document Type</span>
                                <span class="font-semibold text-gray-900">{{ $cert->certificate_type }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-gray-500">Requestor</span>
                                <span class="font-semibold text-gray-900">{{ $cert->full_name }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-gray-500">Date Requested</span>
                                <span class="font-semibold text-gray-900">{{ $cert->created_at->format('M d, Y h:i A') }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-gray-500">Purpose</span>
                                <span class="font-semibold text-gray-900">{{ $cert->purpose }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endisset

            @if (!empty($searched) && !$cert)
                <div class="mt-10 text-center py-16 px-8 bg-gray-50 rounded-2xl border border-gray-100">
                    <div class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-10 h-10 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-gray-900">No Request Found</h3>
                    <p class="mt-2 text-gray-500 max-w-md mx-auto">
                        We couldn't find any request matching
                        <span class="font-semibold text-gray-700">"{{ old('reference_number') }}"</span>.
                        Double-check your reference number and try again.
                    </p>
                    <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                        <a href="{{ route('request.index') }}"
                           class="inline-flex items-center gap-2 bg-[#7f0000] text-white font-bold px-6 py-3 rounded-xl hover:bg-[#5a0000] transition text-sm shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Submit a Request
                        </a>
                        <a href="{{ route('landing') }}"
                           class="inline-flex items-center gap-2 border border-gray-200 text-gray-700 font-semibold px-6 py-3 rounded-xl hover:bg-gray-50 transition text-sm">
                            Back to Home
                        </a>
                    </div>
                </div>
            @endif

            <div class="mt-10 text-center">
                <a href="{{ route('landing') }}"
                   class="inline-flex items-center gap-2 text-sm font-bold text-[#b91c1c] hover:text-[#7f0000] transition">
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