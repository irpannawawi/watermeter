<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary mt-1 mb-2']) }}>
    {{ $slot }}
</button>
