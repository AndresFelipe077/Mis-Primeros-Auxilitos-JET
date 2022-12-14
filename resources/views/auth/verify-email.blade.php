<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">
            <div class="mb-3 h5">
                {{ __('隆隆隆 Gracias por registrarte !!! 馃榾 Antes de comenzar, verifica su direcci贸n de correo electr贸nico 馃ぉ haciendo clic en el enlace que le acabamos de enviar. Si no recibiste el correo electr贸nico, con gusto te enviaremos otro 馃槑.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('Se te ha enviado un nuevo enlace de verificaci贸n a la direcci贸n de correo electr贸nico 馃槃.') }}
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
                            {{ __('Reenviar correo electr贸nico') }}
                        </button>
                    </div>
                </form>

                
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
