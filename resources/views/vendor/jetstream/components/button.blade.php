<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-blue text-uppercase']) }}>
    {{ $slot }}
</button>
