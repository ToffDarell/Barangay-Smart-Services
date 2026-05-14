<button {{ $attributes->merge(['type' => 'submit', 'class' => 'civic-button']) }}>
    {{ $slot }}
</button>
