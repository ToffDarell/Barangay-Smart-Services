<div x-cloak x-show="sidebarOpen" class="fixed inset-0 z-40 bg-slate-950/45 lg:hidden" @click="sidebarOpen = false"></div>

<aside
    x-data="{ settingsOpen: {{ request()->routeIs('settings.*') ? 'true' : 'false' }} }"
    class="fixed inset-y-0 left-0 z-50 flex w-[17rem] flex-col bg-[#383443] text-white transition duration-300 lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
>
    <div class="px-6 py-6 border-b border-white/5">
        <div class="flex items-center justify-between">
            <a href="{{ route('landing') }}" class="flex items-center gap-3">
                <div class="overflow-hidden rounded-xl w-10 h-10 shadow-lg bg-white">
                    <img src="{{ asset('images/logo.png') }}" alt="Barangay Norte Logo" class="w-full h-full object-cover">
                </div>
                <div>
                    <h2 class="font-display text-[15px] font-bold leading-tight text-white tracking-wide">Barangay Norte<br>Poblacion<br><span class="text-[9px] font-medium uppercase tracking-widest text-gray-400 mt-0.5 block">Official Portal</span></h2>
                </div>
            </a>

            <button type="button" class="rounded-lg p-2 text-white/60 hover:bg-white/10 lg:hidden" @click="sidebarOpen = false">
                <span class="sr-only">Close navigation</span>
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M6 6l12 12M18 6L6 18" stroke-linecap="round" stroke-width="1.8" />
                </svg>
            </button>
        </div>
    </div>

    <div class="px-6 pt-5 pb-2">
        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">Menu</p>
    </div>

    <nav class="mt-2 flex-1 space-y-1 px-4">
        <a href="{{ route('dashboard') }}" class="admin-sidebar-link {{ request()->routeIs('dashboard') ? 'bg-[#b91c1c] text-white font-medium rounded-lg shadow-[0_4px_12px_rgba(185,28,28,0.2)]' : 'text-gray-300 hover:text-white font-medium hover:bg-white/5 rounded-lg' }}">
            <svg class="h-5 w-5 {{ request()->routeIs('dashboard') ? 'opacity-100' : 'opacity-80' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M3.75 3.75h7.5v7.5h-7.5v-7.5Zm9 0h7.5v7.5h-7.5v-7.5Zm-9 9h7.5v7.5h-7.5v-7.5Zm9 0h7.5v7.5h-7.5v-7.5Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
            </svg>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('residents.index') }}" class="admin-sidebar-link {{ request()->routeIs('residents.*') ? 'bg-[#b91c1c] text-white font-medium rounded-lg shadow-[0_4px_12px_rgba(185,28,28,0.2)]' : 'text-gray-300 hover:text-white font-medium hover:bg-white/5 rounded-lg' }}">
            <svg class="h-5 w-5 {{ request()->routeIs('residents.*') ? 'opacity-100' : 'opacity-80' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M17 20a5 5 0 0 0-10 0M12 10a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm8 10a4 4 0 0 0-3-3.87M16.5 3.2a3.5 3.5 0 0 1 0 6.8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
            </svg>
            <span>Residents</span>
        </a>

        <a href="{{ route('certificates.index') }}" class="admin-sidebar-link {{ request()->routeIs('certificates.*') ? 'bg-[#b91c1c] text-white font-medium rounded-lg shadow-[0_4px_12px_rgba(185,28,28,0.2)]' : 'text-gray-300 hover:text-white font-medium hover:bg-white/5 rounded-lg' }}">
            <svg class="h-5 w-5 {{ request()->routeIs('certificates.*') ? 'opacity-100' : 'opacity-80' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M7.5 3.75h6l3 3v13.5h-12v-16.5h3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                <path d="M13.5 3.75v3h3" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
            </svg>
            <span>Certificates</span>
        </a>

        <a href="{{ route('reports.index') }}" class="admin-sidebar-link {{ request()->routeIs('reports.*') ? 'bg-[#b91c1c] text-white font-medium rounded-lg shadow-[0_4px_12px_rgba(185,28,28,0.2)]' : 'text-gray-300 hover:text-white font-medium hover:bg-white/5 rounded-lg' }}">
            <svg class="h-5 w-5 {{ request()->routeIs('reports.*') ? 'opacity-100' : 'opacity-80' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M3.75 19.5h16.5M7.5 15.75V9m4.5 6.75V5.25m4.5 10.5v-3.75" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
            </svg>
            <span>Reports & Analytics</span>
        </a>

        <a href="{{ route('announcements.index') }}" class="admin-sidebar-link {{ request()->routeIs('announcements.*') ? 'bg-[#b91c1c] text-white font-medium rounded-lg shadow-[0_4px_12px_rgba(185,28,28,0.2)]' : 'text-gray-300 hover:text-white font-medium hover:bg-white/5 rounded-lg' }}">
            <svg class="h-5 w-5 {{ request()->routeIs('announcements.*') ? 'opacity-100' : 'opacity-80' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M10.34 3.94 3.75 8.25v7.5l6.59 4.31m0-16.12v16.12m0-16.12 9.91-1.19v18.5l-9.91-1.19" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
            </svg>
            <span>Announcements</span>
        </a>

        <a href="{{ route('users.index') }}" class="admin-sidebar-link {{ request()->routeIs('users.*') ? 'bg-[#b91c1c] text-white font-medium rounded-lg shadow-[0_4px_12px_rgba(185,28,28,0.2)]' : 'text-gray-300 hover:text-white font-medium hover:bg-white/5 rounded-lg' }}">
            <svg class="h-5 w-5 {{ request()->routeIs('users.*') ? 'opacity-100' : 'opacity-80' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M15 19.128a9.38 9.38 0 0 0 2.625.372c1.035 0 2.03-.166 2.963-.472A6.97 6.97 0 0 0 18 14.25M15 19.128v-.003a6.256 6.256 0 0 0-3-5.373A6.256 6.256 0 0 0 9 19.125v.003m6 0a6.257 6.257 0 0 1-6 0M12 12a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
            </svg>
            <span>Users</span>
        </a>

        <div class="pt-1">
            <button type="button" @click="settingsOpen = !settingsOpen" class="admin-sidebar-link w-full justify-between {{ request()->routeIs('settings.*') ? 'bg-[#b91c1c] text-white font-medium rounded-lg shadow-[0_4px_12px_rgba(185,28,28,0.2)]' : 'text-gray-300 hover:text-white font-medium hover:bg-white/5 rounded-lg' }}">
                <span class="flex items-center gap-3">
                    <svg class="h-5 w-5 {{ request()->routeIs('settings.*') ? 'opacity-100' : 'opacity-80' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.592c.55 0 1.02.398 1.11.94l.213 1.278a1.125 1.125 0 0 0 1.523.874l1.19-.476c.514-.205 1.1-.01 1.39.463l1.296 2.12c.291.474.205 1.085-.204 1.46l-1.01.926a1.125 1.125 0 0 0-.273 1.307l.492 1.233c.205.514.01 1.1-.463 1.39l-2.12 1.296c-.474.291-1.085.205-1.46-.204l-.926-1.01a1.125 1.125 0 0 0-1.307-.273l-1.233.492c-.514.205-1.1.01-1.39-.463l-1.296-2.12c-.291-.474-.205-1.085.204-1.46l1.01-.926a1.125 1.125 0 0 0 .273-1.307l-.492-1.233c-.205-.514-.01-1.1.463-1.39l2.12-1.296c.474-.291 1.085-.205 1.46.204l.926 1.01a1.125 1.125 0 0 0 1.307.273l1.233-.492c.514-.205 1.1-.01 1.39.463l1.296 2.12c.291.474.205 1.085-.204 1.46l-1.01.926a1.125 1.125 0 0 0-.273 1.307l.492 1.233c.205.514.01 1.1-.463 1.39l-2.12 1.296c-.474.291-1.085.205-1.46-.204l-.926-1.01a1.125 1.125 0 0 0-1.307-.273l-1.233.492c-.514.205-1.1.01-1.39-.463l-1.296-2.12c-.291-.474-.205-1.085.204-1.46l1.01-.926a1.125 1.125 0 0 0 .273-1.307l-.492-1.233c-.205-.514-.01-1.1.463-1.39l2.12-1.296c.474-.291 1.085-.205 1.46.204l.926 1.01a1.125 1.125 0 0 0 1.307.273l1.233-.492c.514-.205 1.1-.01 1.39.463" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" />
                        <path d="M12 15.75A3.75 3.75 0 1 0 12 8.25a3.75 3.75 0 0 0 0 7.5Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" />
                    </svg>
                    <span>Settings</span>
                </span>
                <svg class="h-4 w-4 transition" :class="settingsOpen ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 011.08 1.04l-4.25 4.513a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
            </button>

            <div x-cloak x-show="settingsOpen" class="mt-1 space-y-1 pl-11 pb-4">
                <a href="{{ route('settings.officials') }}" class="block rounded-lg px-3 py-2 text-[13px] {{ request()->routeIs('settings.officials') ? 'text-white font-medium' : 'text-gray-400 hover:text-white' }}">
                    General Info
                </a>
                <a href="{{ route('settings.purpose-types') }}" class="block rounded-lg px-3 py-2 text-[13px] {{ request()->routeIs('settings.purpose-types') ? 'text-white font-medium' : 'text-gray-400 hover:text-white' }}">
                    Purpose Types
                </a>
                <a href="{{ route('settings.clearance-types') }}" class="block rounded-lg px-3 py-2 text-[13px] {{ request()->routeIs('settings.clearance-types') ? 'text-white font-medium' : 'text-gray-400 hover:text-white' }}">
                    Document Templates
                </a>
            </div>
        </div>
    </nav>
</aside>
