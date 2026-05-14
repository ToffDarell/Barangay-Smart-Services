<button {{ $attributes->merge(['type' => 'submit', 'class' => 'civic-button-danger']) }}>
    {{ $slot }}
</button>
