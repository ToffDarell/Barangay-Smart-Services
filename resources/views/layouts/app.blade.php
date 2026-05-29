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
    @stack('styles')
</head>
<body class="antialiased">
    <div x-data="{ sidebarOpen: false, profileOpen: false, logoutConfirm: false }" class="admin-shell">
        @include('layouts.navigation')

        <div class="lg:pl-[17rem]">
            <header class="sticky top-0 z-30 border-b border-gray-100 bg-white">
                <div class="mx-auto flex max-w-7xl items-center gap-4 px-4 py-4 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-3 lg:w-1/4">
                        <button type="button" @click="sidebarOpen = true" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-700 lg:hidden">
                            <span class="sr-only">Open navigation</span>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round" stroke-width="1.8" />
                            </svg>
                        </button>
                    </div>

                    <div class="hidden flex-1 lg:block">
                        <div class="mx-auto w-full max-w-2xl">
                            <label for="admin-search" class="sr-only">Search</label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" stroke-linecap="round" stroke-width="1.8" />
                                    </svg>
                                </span>
                                <input id="admin-search" type="text" class="w-full rounded-md border border-gray-200 bg-white px-3 py-2 pl-9 text-sm text-gray-700 outline-none transition focus:border-violet-500 focus:ring-1 focus:ring-violet-500" placeholder="Search..." />
                            </div>
                        </div>
                    </div>

                    <div class="ml-auto flex items-center gap-4">
                        <button type="button" class="text-gray-500 transition hover:text-violet-600">
                            <span class="sr-only">Fullscreen</span>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 1v4m0 0h-4m4 0l-5-5" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                            </svg>
                        </button>
                        
                        <button type="button" class="text-gray-500 transition hover:text-violet-600">
                            <span class="sr-only">Toggle theme</span>
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"></path>
                            </svg>
                        </button>

                        <div class="relative" x-data="{ notifOpen: false }">
                            <button type="button" @click="notifOpen = !notifOpen" class="text-gray-500 transition hover:text-violet-600 relative">
                                <span class="sr-only">Notifications</span>
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M15 17h5l-1.405-1.405A2.03 2.03 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V4a2 2 0 1 0-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 1 1-6 0m6 0H9" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                                </svg>
                                @if($unreadCount > 0)
                                    <span class="absolute -top-1 -right-1 h-4 w-4 rounded-full bg-red-500 text-[9px] font-bold text-white flex items-center justify-center">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</span>
                                @endif
                            </button>

                            <div x-cloak x-show="notifOpen" @click.outside="notifOpen = false" x-transition class="absolute right-0 mt-3 w-80 rounded-xl border border-gray-100 bg-white shadow-lg overflow-hidden z-50">
                                <div class="bg-gray-50 px-4 py-3 border-b border-gray-100 flex justify-between items-center">
                                    <span class="text-sm font-bold text-gray-800">Notifications</span>
                                    @if($unreadCount > 0)
                                        <span class="text-[10px] font-semibold bg-red-100 text-red-600 px-2 py-0.5 rounded-full">{{ $unreadCount }} New</span>
                                    @endif
                                </div>
                                <div class="divide-y divide-gray-50 max-h-[300px] overflow-y-auto">
                                    @forelse($notifications as $notif)
                                        <a href="{{ $notif->url }}" class="block px-4 py-3 hover:bg-gray-50 transition">
                                            <p class="text-sm text-gray-800 font-medium">{{ $notif->title }}</p>
                                            <p class="text-xs text-gray-500 mt-0.5">{{ $notif->message }}</p>
                                            <p class="text-[10px] text-gray-400 mt-1">{{ $notif->time }}</p>
                                        </a>
                                    @empty
                                        <div class="px-4 py-8 text-center text-sm text-gray-500">No notifications yet.</div>
                                    @endforelse
                                </div>
                                <div class="bg-gray-50 px-4 py-2 text-center border-t border-gray-100">
                                    <a href="{{ route('admin.certificates.index') }}" class="text-xs font-semibold text-violet-600 hover:text-violet-700">View All Requests</a>
                                </div>
                            </div>
                        </div>

                        <div class="h-8 w-px bg-gray-200 mx-1"></div>

                        <div class="relative">
                            <button type="button" @click="profileOpen = !profileOpen" class="flex items-center gap-3 bg-white pl-2 py-1">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#b91c1c] text-xs font-bold text-white">
                                    {{ \Illuminate\Support\Str::of(auth()->user()->name ?? 'Kerwin Figs')->explode(' ')->map(fn ($part) => \Illuminate\Support\Str::substr($part, 0, 1))->take(2)->implode('') }}
                                </div>
                                <div class="hidden text-left sm:block leading-tight">
                                    <p class="text-[11px] font-bold text-gray-800 uppercase tracking-wide">{{ auth()->user()->name ?? 'KERWIN FIGS' }}</p>
                                    <p class="text-[10px] text-gray-500">{{ auth()->user()->getRoleNames()->first() ?? 'Administrator' }}</p>
                                </div>
                            </button>

                            <div x-cloak x-show="profileOpen" @click.outside="profileOpen = false" x-transition class="absolute right-0 mt-3 w-72 rounded-xl border border-gray-100 bg-white p-3 shadow-lg">
                                <div class="rounded-xl bg-gray-50 p-4">
                                    <p class="admin-page-kicker">Signed In As</p>
                                    <p class="mt-2 text-base font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                    <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                                </div>

                                <div class="mt-3 space-y-1">
                                    <a href="{{ route('profile.edit') }}" class="flex items-center justify-between rounded-lg px-4 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-50">
                                        <span>Profile Settings</span>
                                        <span class="text-violet-600">Edit</span>
                                    </a>

                                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                    <button type="button"
                                        @click="logoutConfirm = true; profileOpen = false"
                                        class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-rose-700 transition hover:bg-rose-50">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                        </svg>
                                        <span>Log Out</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
                <x-flash-message />
                {{ $slot }}
            </main>
        </div>

        {{-- Logout Confirmation Modal (inside x-data scope) --}}
        <div
            x-show="logoutConfirm"
            x-cloak
            class="fixed inset-0 z-[999] flex items-center justify-center px-4"
            @keydown.escape.window="logoutConfirm = false"
        >
            {{-- Backdrop --}}
            <div
                x-show="logoutConfirm"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm"
                @click="logoutConfirm = false"
            ></div>

            {{-- Dialog Card --}}
            <div
                x-data="{ shake: false }"
                x-show="logoutConfirm"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90 translate-y-6"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-90 translate-y-6"
                :class="shake ? 'animate-[shake_0.35s_ease-in-out]' : ''"
                class="relative z-10 w-full max-w-sm rounded-2xl bg-white p-8 shadow-2xl"
            >
                {{-- Icon --}}
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-rose-100">
                    <svg class="h-8 w-8 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                    </svg>
                </div>

                <h3 class="text-center text-xl font-bold text-gray-900">Log Out?</h3>
                <p class="mt-2 text-center text-sm text-gray-500">Are you sure you want to end your session? Any unsaved changes will be lost.</p>

                <div class="mt-7 flex flex-col gap-3">
                    <button
                        type="button"
                        @click="document.getElementById('logout-form').submit()"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#b91c1c] px-4 py-3 text-sm font-semibold text-white shadow-md shadow-red-900/25 transition hover:bg-[#991b1b] active:scale-[0.97]"
                    >
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </svg>
                        Yes, Log Out
                    </button>

                    <button
                        type="button"
                        @click="shake = true; setTimeout(() => { shake = false }, 400); logoutConfirm = false"
                        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 active:scale-[0.97]"
                    >
                        Cancel, Stay Here
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-6px); }
            40% { transform: translateX(6px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }
    </style>

    <a href="{{ route('settings.system-configuration') }}" class="fixed bottom-6 right-6 inline-flex h-14 w-14 items-center justify-center rounded-full bg-[#b91c1c] text-white shadow-lg transition hover:bg-[#991b1b]">
        <span class="sr-only">Open settings</span>
        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.591 1.066c1.527-.94 3.31.843 2.37 2.37a1.724 1.724 0 0 0 1.065 2.591c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0-1.066 2.591c.94 1.527-.843 3.31-2.37 2.37a1.724 1.724 0 0 0-2.591 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0-2.591-1.066c-1.527.94-3.31-.843-2.37-2.37a1.724 1.724 0 0 0-1.065-2.591c-1.756-.426-1.756-2.924 0-3.35A1.724 1.724 0 0 0 5.364 7.75c-.94-1.527.843-3.31 2.37-2.37.996.613 2.296.07 2.591-1.065Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" />
            <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" />
        </svg>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.body.addEventListener('click', function(e) {
                // Ignore clicks inside the SweetAlert modal itself
                if (e.target.closest('.swal2-container')) return;

                const btn = e.target.closest('button');
                const link = e.target.closest('a');

                let target = null;
                if (btn) {
                    if (btn.type === 'submit' && btn.closest('form')) return;
                    if (btn.hasAttribute('@click') || 
                        btn.hasAttribute('x-on:click') || 
                        btn.hasAttribute('onclick')) {
                        return;
                    }
                    target = btn;
                } else if (link) {
                    const href = link.getAttribute('href');
                    if (!href || href === '#' || href === 'javascript:void(0)') {
                        target = link;
                    }
                }

                if (target) {
                    e.preventDefault();
                    const text = (target.innerText || target.getAttribute('title') || '').toLowerCase();

                    if (text.includes('delete') || text.includes('remove')) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#b91c1c',
                            cancelButtonColor: '#6b7280',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({ title: 'Deleted!', text: 'Record has been deleted.', icon: 'success', confirmButtonColor: '#b91c1c' });
                            }
                        });
                    } else if (text.includes('export') || text.includes('print')) {
                        Swal.fire({
                            title: 'Processing...',
                            text: 'Generating document for the demo...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                                setTimeout(() => {
                                    Swal.fire({ title: 'Success!', text: 'Document downloaded.', icon: 'success', confirmButtonColor: '#b91c1c' });
                                }, 1500);
                            }
                        });
                    } else if (text.includes('theme') || text.includes('fullscreen') || text.includes('view all') || text.includes('all requirements') || text.includes('pending') || text.includes('pick up') || text.includes('completed') || text.includes('filter')) {
                        Swal.fire({
                            title: 'Demo Feature',
                            text: 'This action is simulated for the barangay proposal demo.',
                            icon: 'info',
                            confirmButtonColor: '#b91c1c',
                            confirmButtonText: 'Got it!'
                        });
                    } else if (text.includes('settings')) {
                        Swal.fire({
                            title: 'Profile Settings',
                            html: `
                                <div class="text-left space-y-4 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Display Name</label><input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" value="Admin User"></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Email</label><input type="email" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" value="admin@norte.gov.ph"></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">New Password</label><input type="password" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" placeholder="••••••••"></div>
                                </div>
                            `,
                            showCancelButton: true, confirmButtonColor: '#b91c1c', cancelButtonColor: '#6b7280', confirmButtonText: 'Update Profile'
                        }).then((result) => { if(result.isConfirmed) Swal.fire({ title: 'Updated!', text: 'Profile settings saved.', icon: 'success', confirmButtonColor: '#b91c1c'}); });
                    } else if (text.includes('announcement') || text.includes('post')) {
                        Swal.fire({
                            title: 'Post Announcement',
                            html: `
                                <div class="text-left space-y-4 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Title</label><input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" placeholder="e.g. Barangay Assembly"></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Content</label><textarea class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" rows="3" placeholder="Announcement details..."></textarea></div>
                                </div>
                            `,
                            showCancelButton: true, confirmButtonColor: '#b91c1c', cancelButtonColor: '#6b7280', confirmButtonText: 'Post'
                        }).then((result) => { if(result.isConfirmed) Swal.fire({ title: 'Posted!', text: 'Announcement is live.', icon: 'success', confirmButtonColor: '#b91c1c'}); });
                    } else if (text.includes('user')) {
                        Swal.fire({
                            title: 'User Account',
                            html: `
                                <div class="text-left space-y-4 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label><input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]"></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label><input type="email" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]"></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Role</label><select class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]"><option>Admin</option><option>Staff</option></select></div>
                                </div>
                            `,
                            showCancelButton: true, confirmButtonColor: '#b91c1c', cancelButtonColor: '#6b7280', confirmButtonText: 'Save User'
                        }).then((result) => { if(result.isConfirmed) Swal.fire({ title: 'Saved!', text: 'User account created.', icon: 'success', confirmButtonColor: '#b91c1c'}); });
                    } else if (text.includes('official')) {
                        Swal.fire({
                            title: 'Barangay Official',
                            html: `
                                <div class="text-left space-y-4 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Name</label><input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]"></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Position</label><select class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]"><option>Barangay Captain</option><option>Kagawad</option><option>Secretary</option></select></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Contact No.</label><input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]"></div>
                                </div>
                            `,
                            showCancelButton: true, confirmButtonColor: '#b91c1c', cancelButtonColor: '#6b7280', confirmButtonText: 'Save Official'
                        }).then((result) => { if(result.isConfirmed) Swal.fire({ title: 'Saved!', text: 'Official added to roster.', icon: 'success', confirmButtonColor: '#b91c1c'}); });
                    } else if (text.includes('template')) {
                        Swal.fire({
                            title: 'Document Template',
                            html: `
                                <div class="text-left space-y-4 mt-4">
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Template Name</label><input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" placeholder="e.g. Clearance Format B"></div>
                                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Content</label><textarea class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" rows="4"></textarea></div>
                                </div>
                            `,
                            showCancelButton: true, confirmButtonColor: '#b91c1c', cancelButtonColor: '#6b7280', confirmButtonText: 'Save Template'
                        }).then((result) => { if(result.isConfirmed) Swal.fire({ title: 'Saved!', text: 'Template is ready to use.', icon: 'success', confirmButtonColor: '#b91c1c'}); });
                    } else if (text.includes('review') || text.includes('view')) {
                        Swal.fire({
                            title: 'Document Review',
                            html: `
                                <div class="text-left space-y-4 mt-4 bg-gray-50 p-4 rounded-lg border border-gray-100">
                                    <div class="grid grid-cols-2 gap-4 text-sm">
                                        <div>
                                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Requestor</span>
                                            <span class="font-bold text-gray-900">Juan Dela Cruz</span>
                                        </div>
                                        <div>
                                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Document Type</span>
                                            <span class="font-bold text-gray-900">Barangay Clearance</span>
                                        </div>
                                        <div>
                                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Date Requested</span>
                                            <span class="font-bold text-gray-900">Today, 09:30 AM</span>
                                        </div>
                                        <div>
                                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Status</span>
                                            <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Pending Review</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500 mt-4 text-left">This is a simulated review screen for the demo. In the actual system, you would see uploaded requirements and approval controls here.</p>
                            `,
                            showCancelButton: true,
                            showDenyButton: true,
                            confirmButtonColor: '#059669',
                            denyButtonColor: '#dc2626',
                            cancelButtonColor: '#6b7280',
                            confirmButtonText: 'Approve',
                            denyButtonText: 'Reject',
                            cancelButtonText: 'Close'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({ title: 'Approved!', text: 'The document request was approved.', icon: 'success', confirmButtonColor: '#b91c1c' });
                            } else if (result.isDenied) {
                                Swal.fire({ title: 'Rejected', text: 'The document request was rejected.', icon: 'error', confirmButtonColor: '#b91c1c' });
                            }
                        });
                    } else {
                        const isEdit = text.includes('edit') || text.includes('update');
                        const isResident = text.includes('resident');
                        const titleText = isEdit ? 'Update Details' : (isResident ? 'Add New Resident' : 'Enter Details');
                        
                        const nameVal = isEdit ? 'Juan Dela Cruz' : '';
                        const phoneVal = isEdit ? '0912 345 6789' : '';
                        const addressVal = isEdit ? 'Purok 1, North Poblacion' : '';

                        Swal.fire({
                            title: titleText,
                            html: `
                                <div class="text-left space-y-4 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                        <input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" placeholder="e.g. Juan Dela Cruz" value="${nameVal}">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                        <input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" placeholder="0912 345 6789" value="${phoneVal}">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                        <input type="text" class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-[#b91c1c] focus:outline-none focus:ring-1 focus:ring-[#b91c1c]" placeholder="Purok, Street..." value="${addressVal}">
                                    </div>
                                </div>
                            `,
                            showCancelButton: true,
                            confirmButtonColor: '#b91c1c',
                            cancelButtonColor: '#6b7280',
                            confirmButtonText: 'Save Details',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Saved Successfully!',
                                    text: 'The record was successfully processed in the system.',
                                    icon: 'success',
                                    confirmButtonColor: '#b91c1c'
                                });
                            }
                        });
                    }
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
