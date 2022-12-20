<x-guest-layout>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="mx-auto">
                <h1 class="text-center text-white mx-auto">Mis Primeros Auxilitos</h1>
                <img class="mx-auto" src="{{ asset('../img/logo/logo.png') }}" alt="" width="200" height="200">
            </div>
        </x-slot>

        <div class="card-body">
            <div x-data="{ recovery: false }">
                <div class="mb-3" x-show="! recovery">
                    {{ __('Confirma el acceso a tu cuenta ingresando el código de autenticación proporcionado por la aplicación de autenticación.') }}
                </div>

                <div class="mb-3" x-show="recovery">
                    {{ __('Confirma el acceso a tu cuenta ingresando uno de sus códigos de recuperación de emergencia.') }}
                </div>

                <x-jet-validation-errors class="mb-3" />

                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <div class="mb-3" x-show="! recovery">
                        <x-jet-label value="{{ __('Código') }}" />
                        <x-jet-input class="{{ $errors->has('code') ? 'is-invalid' : '' }}" type="text"
                            inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                        <x-jet-input-error for="code"></x-jet-input-error>
                    </div>

                    <div class="mb-3" x-show="recovery">
                        <x-jet-label value="{{ __('Código de recuperación') }}" />
                        <x-jet-input class="{{ $errors->has('recovery_code') ? 'is-invalid' : '' }}" type="text"
                            name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                        <x-jet-input-error for="recovery_code"></x-jet-input-error>
                    </div>

                    <div class="d-flex justify-content-end mt-3">

                        <button type="button" class="btn btn-danger mx-1"
                            onclick="location.href='{{ route('login') }}'">Cancelar</button>

                        <button type="button" class="btn btn-outline-secondary" x-show="! recovery"
                            x-on:click="
                                            recovery = true;
                                            $nextTick(() => { $refs.recovery_code.focus() })
                                        ">
                            {{ __('Usa un código de recuperación') }}
                        </button>

                        <button type="button" class="btn btn-outline-secondary" x-show="recovery"
                            x-on:click="
                                            recovery = false;
                                            $nextTick(() => { $refs.code.focus() })
                                        ">
                            {{ __('Usar un código de autenticación') }}
                        </button>

                        <button type="submit" class="btn btn-success mx-1">Iniciar sesión</button>

                    </div>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
