@if (session('success') || session('error') || session('status'))
    @php
        $message = session('success') ?? session('error') ?? session('status');
        $variant = session('error') ? 'error' : 'success';
    @endphp

    <div class="mb-6 rounded-[1.6rem] border px-5 py-4 text-sm font-medium {{ $variant === 'error' ? 'border-rose-200 bg-rose-50 text-rose-700' : 'border-emerald-200 bg-emerald-50 text-emerald-700' }}">
        {{ $message }}
    </div>
@endif
