<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="alert alert-warning text-center" role="alert">
            🤩 !!! Procura haber escrito bien tu correo electrónico !!! 😋
        </div>

        <div class="card-body">

            <div class="mb-3 h5">
                {{ __('¡¡¡ Gracias por registrarte !!! 😀 Antes de comenzar, verifiquemos tu correo electrónico 🤩, clic en el enlace que te acabamos de enviar. Si no recibiste el correo electrónico, con gusto te enviaremos otro 😎.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('Se te ha enviado un nuevo enlace de verificación a la dirección de correo electrónico 😄.') }}
                </div>
            @endif

            <p class="h5">Correo electronico: {{Auth::user()->email}}</p>

            <div class="mt-4 d-flex justify-content-between ">

                <form method="POST" action="/logout" class="mx-auto text-center">
                    @csrf

                    <button type="submit" class="btn btn-outline-danger text-white mx-2" id="btn">
                        {{-- {{ __('Cancelar') }} --}}
                        <img src="{{ asset('/img/icons/cancel2.png') }}" alt="Cancelar" width="50" height="50">
                    </button>
                </form>

                {{-- <form method="POST" action="{{ route('dashboard.index') }}" class="mx-auto  text-center">
                    @csrf

                    <button type="submit" class="btn bg-warning text-white mx-2 ">
                        {{ __('Más tarde') }}
                    </button>
                </form> --}}

                {{-- <a class="btn btn-warning text-white mx-2 text-center" href="{{ route('dashboard.index') }}">Más tarde</a> --}}


                <form method="POST" action="{{ route('verification.send') }}" class="mx-auto text-center">
                    @csrf

                    <div>

                        <button type="submit" class="btn btn-outline-success text-white mx-2">
                            {{-- {{ __('Reenviar correo electrónico') }} --}}
                            <img src="{{ asset('img/icons/reenviaremail.png') }}" alt="reenviar correo" width="50"
                                height="50">
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
