<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body h5">

            <div class="mb-4 text-lg h4">
                {{ __('Esta es un área segura de la aplicación. Por favor confirma tu contraseña antes de continuar. 😎') }}
            </div>

            <x-jet-validation-errors class="mb-2" />

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div>
                    <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                    <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" autofocus />
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-jet-button class="ms-4">
                        {{ __('Confirmar') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
