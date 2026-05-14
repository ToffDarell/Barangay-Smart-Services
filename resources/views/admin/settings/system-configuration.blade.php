<x-app-layout>
    <x-slot name="header">System Configuration</x-slot>

    <section class="space-y-5">
        <div>
            <p class="admin-page-kicker">Settings</p>
            <h2 class="mt-1 admin-page-title">System Configuration</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-[240px_1fr]">
            <x-settings-nav />

            <div class="admin-card p-4">
                <div class="mb-4">
                    <h3 class="admin-card-title">Barangay Information</h3>
                    <p class="admin-body">Basic system identity and contact details</p>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="admin-label">Barangay Name</label>
                        <input type="text" class="admin-input" value="Barangay Norte Poblacion" />
                    </div>
                    <div>
                        <label class="admin-label">Barangay Captain</label>
                        <input type="text" class="admin-input" value="Hon. Sample Captain" />
                    </div>
                    <div>
                        <label class="admin-label">Address</label>
                        <input type="text" class="admin-input" value="Maramag, Bukidnon" />
                    </div>
                    <div>
                        <label class="admin-label">Contact Number</label>
                        <input type="text" class="admin-input" value="0912 345 6789" />
                    </div>
                </div>

                <div class="mt-5 flex justify-end">
                    <button type="button" class="admin-btn-primary">Save Configuration</button>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
