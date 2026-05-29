<x-app-layout>
    <x-slot name="header">Clearance Types</x-slot>

    <section class="space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">BARANGAY NORTH POBLACION &nbsp;&rsaquo;&nbsp; <span class="text-red-600">SETTINGS</span></p>
                <h2 class="text-2xl font-bold text-gray-900">Clearance Types</h2>
            </div>
        </div>

        <div>
            <!-- Tabs & Button -->
            <div class="flex items-center justify-between border-b border-gray-200 pb-px mb-6">
                <div class="flex gap-8">
                    <a href="{{ route('settings.officials') }}" class="border-b-2 border-transparent pb-3 text-sm font-semibold text-gray-500 hover:text-gray-700">General Info</a>
                    <a href="{{ route('settings.purpose-types') }}" class="border-b-2 border-transparent pb-3 text-sm font-semibold text-gray-500 hover:text-gray-700">Purpose Types</a>
                    <a href="{{ route('settings.clearance-types') }}" class="border-b-2 border-red-600 pb-3 text-sm font-semibold text-red-600">Document Templates</a>
                </div>
                <button class="mb-3 rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700 transition shadow-[0_2px_8px_rgba(124,58,237,0.3)]">
                    + Create New Template
                </button>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                <div class="admin-card flex flex-col">
                    <div class="p-6 flex-1">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Barangay Clearance</h3>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-emerald-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Active
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-6">Standard clearance for general purposes, employment, and identification.</p>
                        <div class="space-y-3 border-t border-gray-100 pt-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Price:</span>
                                <span class="font-semibold text-gray-900">₱ 50.00</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Requirements:</span>
                                <span class="font-medium text-gray-700 text-right w-2/3">2 valid IDs, Cedula</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 p-4 bg-gray-50 rounded-b-xl flex justify-center">
                        <button class="text-sm font-semibold text-red-600 hover:text-red-700 transition">Edit Template</button>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="admin-card flex flex-col">
                    <div class="p-6 flex-1">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Certificate of Indigency</h3>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-emerald-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Active
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-6">For medical assistance, scholarships, and social welfare programs.</p>
                        <div class="space-y-3 border-t border-gray-100 pt-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Price:</span>
                                <span class="font-semibold text-emerald-600">Free</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Requirements:</span>
                                <span class="font-medium text-gray-700 text-right w-2/3">Proof of income, valid ID</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 p-4 bg-gray-50 rounded-b-xl flex justify-center">
                        <button class="text-sm font-semibold text-red-600 hover:text-red-700 transition">Edit Template</button>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="admin-card flex flex-col">
                    <div class="p-6 flex-1">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Business Clearance</h3>
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-emerald-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Active
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-6">Required for new business registration and permit renewal.</p>
                        <div class="space-y-3 border-t border-gray-100 pt-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Price:</span>
                                <span class="font-semibold text-gray-900">₱ 150.00</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Requirements:</span>
                                <span class="font-medium text-gray-700 text-right w-2/3">DTI/SEC Reg, Contract of Lease</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 p-4 bg-gray-50 rounded-b-xl flex justify-center">
                        <button class="text-sm font-semibold text-red-600 hover:text-red-700 transition">Edit Template</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
