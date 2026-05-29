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
                    <img src="{{ asset('images/logo.png') }}" alt="Barangay North Logo" class="w-full h-full object-cover">
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-gray-400">North Poblacion</p>
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
</body>
</html>
