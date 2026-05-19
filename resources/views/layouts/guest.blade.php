<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Barangay North System') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

    {{-- Site icon using official logo --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <meta name="theme-color" content="#7f0000">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="relative min-h-screen overflow-hidden bg-[linear-gradient(90deg,#1a0909_0%,#3b0f0f_26%,#7f1d1d_100%)]">
        <div class="mx-auto grid min-h-screen max-w-7xl items-center gap-10 px-4 py-8 lg:grid-cols-[1fr_470px] lg:px-8">
            <section class="hidden text-white lg:block">
                <div class="max-w-3xl">
                    <div class="mb-8 flex items-center gap-4">
                        <div class="overflow-hidden rounded-[18px] w-14 h-14">
                            <img src="{{ asset('images/logo.png') }}" alt="Barangay Norte Logo" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-white/65">Maramag, Bukidnon</p>
                            <h1 class="font-display text-4xl font-bold uppercase leading-none text-white">Barangay Norte Poblacion</h1>
                        </div>
                    </div>

                    <p class="font-display text-5xl font-extrabold uppercase leading-tight text-white">
                        Barangay Information
                        <span class="block text-[#d4a017]">& Services System</span>
                    </p>

                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/76">
                        A professional civic portal for residents, requests, reports, and daily barangay operations. Minimal, clear, and built for real office work.
                    </p>
                </div>
            </section>

            <section class="animate-rise-in">
                <div class="civic-panel mx-auto w-full max-w-[470px] p-6 sm:p-8">
                    <div class="mb-8 flex items-center gap-4 lg:hidden">
                        <div class="overflow-hidden rounded-[16px] w-12 h-12">
                            <img src="{{ asset('images/logo.png') }}" alt="Barangay Norte Logo" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[#7c84a0]">Maramag, Bukidnon</p>
                            <h1 class="font-display text-2xl font-bold uppercase text-[#191b2c]">Barangay Portal</h1>
                        </div>
                    </div>

                    {{ $slot }}
                </div>
            </section>
        </div>
    </div>
</body>
</html>
