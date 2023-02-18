<x-guest-layout>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <div class="mb-3">
                {{ __('¿Olvidaste tu contraseña? No hay problema 😎. Simplemente escribe tu correo electrónico y te enviaremos un enlace de restablecimiento de contraseña 😀.') }}
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/forgot-password">
                @csrf

                <div class="mb-3">
                    <x-jet-label value="Correo Electronico" />
                    <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="d-flex justify-content-end mt-4">

                    <a type="button" class="btn btn-outline-danger mx-auto" href=" {{ route('login') }}"><img
                            src="{{ asset('/img/icons/cancel2.png') }}" alt="Cancelar" width="50"
                            height="50"></a>

                    <button class="btn btn-outline-success mx-auto">
                        <img src="{{ asset('/img/icons/reestablecer.png') }}" alt="Cancelar" width="50" height="50">
                    </button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
