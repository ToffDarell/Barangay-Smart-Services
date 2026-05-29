<x-public-layout>
    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <a href="{{ route('request.index') }}" class="text-sm font-medium text-red-600 hover:text-red-700">&larr; Back to document types</a>
            <h1 class="text-3xl font-display font-bold text-gray-900 mt-2">Request {{ ucfirst($type) }}</h1>
        </div>

        <form method="POST" action="{{ route('request.submit', $type) }}" enctype="multipart/form-data" class="bg-white rounded-2xl border border-gray-100 p-8 shadow-sm space-y-6">
            @csrf

            <div class="grid gap-6 sm:grid-cols-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" required class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                    @error('first_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" required class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                    @error('last_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid gap-6 sm:grid-cols-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Date of Birth</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                    @error('date_of_birth') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Civil Status</label>
                    <select name="civil_status" required class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                        <option value="">Select...</option>
                        @foreach (['Single', 'Married', 'Widowed', 'Separated'] as $s)
                            <option value="{{ $s }}" {{ old('civil_status') === $s ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                    @error('civil_status') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Gender</label>
                    <select name="gender" required class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                        <option value="">Select...</option>
                        @foreach (['Male', 'Female', 'Other'] as $g)
                            <option value="{{ $g }}" {{ old('gender') === $g ? 'selected' : '' }}>{{ $g }}</option>
                        @endforeach
                    </select>
                    @error('gender') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" required class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                    @error('address') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Purok</label>
                    <input type="text" name="purok" value="{{ old('purok') }}" required class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                    @error('purok') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Contact Number</label>
                    <input type="text" name="contact_number" value="{{ old('contact_number') }}" required class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                    @error('contact_number') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Purpose</label>
                    <input type="text" name="purpose" value="{{ old('purpose') }}" required class="w-full rounded-md border border-gray-200 px-3 py-2.5 text-sm focus:border-red-500 focus:ring-1 focus:ring-red-500">
                    @error('purpose') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Valid ID (photo/PDF)</label>
                <input type="file" name="valid_id" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                @error('valid_id') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-red-700 text-white font-bold py-3 rounded-md hover:bg-red-800 transition">Submit Request</button>
        </form>
    </section>
</x-public-layout>
