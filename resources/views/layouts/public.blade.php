<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Barangay North System') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

    {{-- Site icon using official logo --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <meta name="theme-color" content="#7f0000">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f7f8fc] text-gray-900 antialiased">
    <div class="border-b border-gray-100 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('landing') }}" class="flex items-center gap-3">
                <div class="overflow-hidden rounded-xl w-12 h-12 shadow">
                    <img src="{{ asset('images/logo.png') }}" alt="Barangay Norte Logo" class="w-full h-full object-cover">
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-gray-400">Norte Poblacion</p>
                    <p class="font-display text-2xl font-bold uppercase leading-none text-gray-800">Maramag</p>
                </div>
            </a>

            <div class="hidden items-center gap-6 md:flex">
                <a href="{{ route('public.services') }}" class="text-sm font-medium text-gray-600 hover:text-violet-600">Services</a>
                <a href="{{ route('public.announcements') }}" class="text-sm font-medium text-gray-600 hover:text-violet-600">Announcements</a>
                <a href="{{ route('public.transparency') }}" class="text-sm font-medium text-gray-600 hover:text-violet-600">Transparency</a>
                <a href="{{ route('login') }}" class="admin-btn-primary">Login</a>
            </div>
        </div>
    </div>

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>
</body>
</html>
