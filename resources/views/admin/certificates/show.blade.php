<x-app-layout>
    <x-slot name="header">Certificate Details</x-slot>

    <section class="space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-1">BARANGAY NORTH POBLACION &nbsp;&rsaquo;&nbsp; <span class="text-red-600">CERTIFICATE #{{ $cert->id }}</span></p>
                <h2 class="text-2xl font-bold text-gray-900">{{ $cert->reference_number }}</h2>
            </div>
            <a href="{{ route('admin.certificates.index') }}" class="flex items-center gap-2 border border-gray-200 rounded-md px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to List
            </a>
        </div>

        <div class="grid gap-4 xl:grid-cols-[2fr_1fr]">
            <div class="space-y-4">
                <div class="admin-card p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Requestor Information</h3>
                    <div class="grid grid-cols-2 gap-6 text-sm">
                        <div>
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Full Name</span>
                            <span class="font-bold text-gray-900">{{ $cert->full_name }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Date of Birth</span>
                            <span class="font-bold text-gray-900">{{ $cert->date_of_birth ? $cert->date_of_birth->format('M d, Y') : 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Gender</span>
                            <span class="font-bold text-gray-900">{{ ucfirst($cert->gender ?? 'N/A') }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Civil Status</span>
                            <span class="font-bold text-gray-900">{{ ucfirst($cert->civil_status ?? 'N/A') }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Contact Number</span>
                            <span class="font-bold text-gray-900">{{ $cert->contact_number ?? 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Address</span>
                            <span class="font-bold text-gray-900">{{ $cert->address ?? 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Purok</span>
                            <span class="font-bold text-gray-900">{{ $cert->purok ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <div class="admin-card p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Request Details</h3>
                    <div class="grid grid-cols-2 gap-6 text-sm">
                        <div>
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Document Type</span>
                            <span class="font-bold text-gray-900">{{ ucfirst($cert->certificate_type) }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Date Requested</span>
                            <span class="font-bold text-gray-900">{{ $cert->created_at->format('M d, Y h:i A') }}</span>
                        </div>
                        <div class="col-span-2">
                            <span class="block text-gray-500 font-medium text-[11px] uppercase tracking-wider">Purpose</span>
                            <span class="font-bold text-gray-900">{{ $cert->purpose }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="admin-card p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Status</h3>
                    @php
                        $badgeColors = ['pending' => 'bg-amber-100 text-amber-700', 'processing' => 'bg-sky-100 text-sky-700', 'ready' => 'bg-emerald-100 text-emerald-700', 'claimed' => 'bg-blue-100 text-blue-700', 'rejected' => 'bg-red-100 text-red-700'];
                        $color = $badgeColors[$cert->status] ?? 'bg-gray-100 text-gray-700';
                    @endphp
                    <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-sm font-semibold {{ $color }}">
                        <span class="h-2 w-2 rounded-full"></span>
                        {{ ucfirst($cert->status) }}
                    </span>

                    <div class="mt-6 space-y-3">
                        @if($cert->status === 'pending')
                            <form method="POST" action="{{ route('admin.certificates.updateStatus', $cert->id) }}">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="processing">
                                <button type="submit" class="w-full bg-blue-600 text-white font-semibold px-5 py-2.5 rounded-md hover:bg-blue-700 transition text-sm">Mark as Processing</button>
                            </form>
                        @endif
                        @if($cert->status === 'processing')
                            <form method="POST" action="{{ route('admin.certificates.updateStatus', $cert->id) }}">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="ready">
                                <button type="submit" class="w-full bg-emerald-600 text-white font-semibold px-5 py-2.5 rounded-md hover:bg-emerald-700 transition text-sm">Mark as Ready for Claiming</button>
                            </form>
                        @endif
                        @if($cert->status === 'ready')
                            <form method="POST" action="{{ route('admin.certificates.updateStatus', $cert->id) }}">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="claimed">
                                <button type="submit" class="w-full bg-gray-500 text-white font-semibold px-5 py-2.5 rounded-md hover:bg-gray-600 transition text-sm">Mark as Claimed</button>
                            </form>
                        @endif
                    </div>
                </div>

                @if($cert->valid_id_path)
                    <div class="admin-card p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Attachment</h3>
                        <a href="{{ route('admin.certificates.attachment', $cert->id) }}" target="_blank" class="flex items-center gap-3 bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition border border-gray-200">
                            <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900">Valid ID</p>
                                <p class="text-xs text-gray-500">Click to view attachment</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>
