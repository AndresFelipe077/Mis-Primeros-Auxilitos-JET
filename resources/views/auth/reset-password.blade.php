<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/reset-password">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <x-jet-label value="{{ __('Correo') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                 :value="old('email', $request->email)" required autofocus />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3 input-wrapper">
                    <x-jet-label value="{{ __('Contraseña') }}" />                   
                    <x-jet-input id="password" class="password input password w-full" type="password"  {{--{{ $errors->has('password') ? 'is-invalid' : '' }}--}}
                                 name="password" autocomplete="new-password" data-lpignore="true"/> 
                    <span class="togglePassword " id="icon">
                        <i data-feather="eye"></i>
                    </span>                            
                    <x-jet-input-error for="password"></x-jet-input-error>                   
                </div>
    
                <div class="mb-3 input-wrapper">
                    <x-jet-label value="{{ __('Confirmar contraseña') }}" />
                    <x-jet-input id="password" class="password input password w-full" type="password" {{--{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}--}}
                                 name="password_confirmation" autocomplete="new-password" data-lpignore="true"/>
                    <span class="togglePassword " id="icon">
                        <i data-feather="eye"></i>
                    </span>
                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                </div>

                @if ($errors->any('password'))
                    <div class="text-danger" role="alert">
                        <p class="text-center">Las constraseñas deben coincidir y ser iguales o mayores a 8 caracteres</p>
                    </div>
                @endif

                <div class="mb-0">
                    <div class="d-flex justify-content-end">
                        <x-jet-button>
                            {{ __('Restablecer la contraseña') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>