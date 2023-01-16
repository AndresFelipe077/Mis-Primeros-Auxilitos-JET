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
                    <x-jet-input id="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }} password input password block mt-1 w-full" type="password"
                                 name="password" required autocomplete="new-password" data-lpignore="true"
                                 /> 
                                 <span class="togglePassword input-icon password">
                                    <i data-feather="eye" style="cursor: pointer"></i>
                                </span>                                            
                    <x-jet-input-error for="password"></x-jet-input-error>                   
                </div>

                <div class="form-floating mb-3 input-wrapper">
                    <input type="password" class="form-control block mt-1 w-full password input password" data-lpignore="true" id="floatingPassword password" name="password" placeholder="Password">
                    <label for="floatingPassword" class="texto-login">Contraseña</label>
                        <span class="togglePassword mr-2 input-icon password">
                            <i data-feather="eye" style="cursor: pointer"></i>
                        </span>
                </div>
    
                <div class="mb-3">
                    <x-jet-label value="{{ __('Confirmar contraseña') }}" />

                    <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                                 name="password_confirmation" required autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                </div>

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