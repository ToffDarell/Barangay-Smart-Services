<x-guest-layout>
    <div>
        <p class="civic-kicker">Staff Authentication</p>
        <h2 class="mt-2 font-display text-3xl font-bold uppercase leading-none text-[#191b2c]">
            Sign In
        </h2>
        <p class="mt-3 text-sm leading-7 text-[#687085]">
            Access the internal portal for residents, certificates, announcements, and reports.
        </p>
    </div>

    <div class="mt-8">
        <x-auth-session-status :status="session('status')" />

        @if ($errors->any())
            <div class="mt-4 rounded-[14px] border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700">
                Please check your email and password and try again.
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('login') }}" class="mt-8">
        @csrf

        <div>
            <label for="email" class="civic-label">Email Address</label>
            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@barangay.gov.ph" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-5">
            <label for="password" class="civic-label">Password</label>
            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-5 flex items-center justify-between gap-4">
            <label for="remember_me" class="inline-flex items-center gap-3 text-sm font-medium text-[#4d556c]">
                <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-[#ccd2e2] text-[#5c46d6] focus:ring-[#5c46d6]" name="remember">
                <span>Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-[#5c46d6] transition hover:text-[#4d38c4]" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <div class="mt-8">
            <x-primary-button class="w-full">
                Log In
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 rounded-[16px] border border-[#e6e8f2] bg-[#f7f8fc] p-5">
        <p class="civic-kicker">Seeded Accounts</p>
        <div class="mt-3 space-y-2 text-sm text-[#4f566d]">
            <p><span class="font-semibold text-[#191b2c]">Admin</span> - admin@barangaynorth.test</p>
            <p><span class="font-semibold text-[#191b2c]">Staff</span> - staff@barangaynorth.test</p>
            <p><span class="font-semibold text-[#191b2c]">Viewer</span> - viewer@barangaynorth.test</p>
        </div>
        <p class="mt-3 text-xs text-[#7c84a0]">Default password: <span class="font-semibold text-[#191b2c]">password</span></p>
    </div>
</x-guest-layout>
