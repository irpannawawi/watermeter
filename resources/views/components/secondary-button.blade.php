<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-primary mt-1 mb-2']) }}>
    {{ $slot }}
</button>
