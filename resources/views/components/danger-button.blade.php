<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-danger mt-1 mb-2']) }}>
    {{ $slot }}
</button>
