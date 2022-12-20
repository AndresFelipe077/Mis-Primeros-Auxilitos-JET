<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success text-uppercase mx-1']) }}>
    {{ $slot }}
</button>
