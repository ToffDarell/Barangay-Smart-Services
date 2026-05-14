<div class="admin-card p-4">
    <p class="admin-page-kicker">Settings</p>
    <div class="mt-4 space-y-2">
        <a href="{{ route('settings.officials') }}" class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('settings.officials') ? 'bg-violet-600 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            Officials
        </a>
        <a href="{{ route('settings.purpose-types') }}" class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('settings.purpose-types') ? 'bg-violet-600 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            Purpose Type
        </a>
        <a href="{{ route('settings.clearance-types') }}" class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('settings.clearance-types') ? 'bg-violet-600 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            Clearance Type
        </a>
        <a href="{{ route('settings.system-configuration') }}" class="block rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('settings.system-configuration') ? 'bg-violet-600 text-white' : 'text-gray-600 hover:bg-gray-50' }}">
            System Configuration
        </a>
    </div>
</div>
