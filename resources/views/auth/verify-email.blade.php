<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">
            <div class="mb-3 h5">
                {{ __('¡¡¡ Gracias por registrarte !!! 😀 Antes de comenzar, verifica su dirección de correo electrónico 🤩 haciendo clic en el enlace que le acabamos de enviar. Si no recibiste el correo electrónico, con gusto te enviaremos otro 😎.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('Se te ha enviado un nuevo enlace de verificación a la dirección de correo electrónico 😄.') }}
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between mx-auto">

                <form method="POST" action="/logout">
                    @csrf

                    <button type="submit" class="btn bg-danger text-white mx-auto">
                        {{ __('Cancelar') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        
                        <button type="submit" class="btn bg-success text-white mx-auto">
                            {{ __('Reenviar correo electrónico') }}
                        </button>
                    </div>
                </form>

                
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
