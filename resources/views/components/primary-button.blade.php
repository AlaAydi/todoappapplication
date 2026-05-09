<button {{ $attributes->merge(['type' => 'submit', 'class' => 'premium-button w-full']) }}>
    {{ $slot }}
</button>
