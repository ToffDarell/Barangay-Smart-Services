<x-public-layout>
    <section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
        <div class="bg-white rounded-2xl border border-gray-100 p-10 shadow-sm">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h1 class="text-2xl font-display font-bold text-gray-900">Request Submitted!</h1>
            <p class="text-gray-600 mt-2">Your reference number is:</p>
            <p class="text-3xl font-bold text-red-700 mt-4 font-mono">{{ $cert->reference_number }}</p>
            <p class="text-sm text-gray-500 mt-4">Save this number to track your request status.</p>
            <div class="mt-8 flex gap-4 justify-center">
                <a href="{{ route('track') }}" class="inline-flex items-center gap-2 bg-red-700 text-white font-semibold px-6 py-2.5 rounded-md hover:bg-red-800 transition text-sm">Track Request</a>
                <a href="{{ route('request.index') }}" class="inline-flex items-center gap-2 border border-gray-200 text-gray-700 font-semibold px-6 py-2.5 rounded-md hover:bg-gray-50 transition text-sm">New Request</a>
            </div>
        </div>
    </section>
</x-public-layout>
