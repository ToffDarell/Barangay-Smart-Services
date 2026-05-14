@props(['value'])

<label {{ $attributes->merge(['class' => 'civic-label']) }}>
    {{ $value ?? $slot }}
</label>
