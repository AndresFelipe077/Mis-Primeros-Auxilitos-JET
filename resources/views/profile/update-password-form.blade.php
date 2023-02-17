<x-jet-form-section submit="updatePassword">

    <x-slot name="title">
        {{ __('Actualizar contraseña') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Asegúrate de que tu cuenta esté usando una contraseña larga 🤗 y aleatoria para mantenerse seguro. 😎') }}
    </x-slot>

    <x-slot name="form">
        <div class="w-md-75">
            <div class="mb-3 input-wrapper">
                <x-jet-label for="current_password" value="{{ __('Contraseña actual') }}" />
                <x-jet-input name="password" id="current_password password" data-lpignore="true" type="password"
                    class="{{ $errors->has('current_password') ? 'is-invalid' : '' }} password input password"
                    wire:model.defer="state.current_password" autocomplete="current-password" />
                <span class="togglePassword" id="icon">
                    <i data-feather="eye"></i>
                </span>
                <x-jet-input-error for="current_password" />
            </div>

            <div class="mb-3 input-wrapper">
                <x-jet-label for="password" value="{{ __('Nueva contraseña') }}" />
                <x-jet-input id="password" type="password"
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }} password input password"
                    wire:model.defer="state.password" autocomplete="new-password" data-lpignore="true" />
                <span class="togglePassword" id="icon">
                    <i data-feather="eye"></i>
                </span>
                <x-jet-input-error for="password" />
            </div>

            <div class="mb-3 input-wrapper">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-jet-input id="password_confirmation" type="password"
                    class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }} password input password"
                    wire:model.defer="state.password_confirmation" autocomplete="new-password" data-lpignore="true" />
                <span class="togglePassword" id="icon">
                    <i data-feather="eye"></i>
                </span>
                <x-jet-input-error for="password_confirmation" />
            </div>
        </div>

        <x-jet-action-message on="saved">
            {{ __('Contraseña actualizada') }}
        </x-jet-action-message>


    </x-slot>

    <x-slot name="actions">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar
            <img class="mx-auto" src=" {{ asset('img/icons/cancel2.png') }} " alt="Actualizar contraseña" width="50px" height="50px"/>
        </button>
        <x-jet-button>
            <div wire:loading class="" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>

            {{ __('Actualizar') }}
            <img class="mx-auto" src=" {{ asset('img/icons/changePassword.png') }} " alt="Actualizar contraseña" width="50px" height="50px"/>
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
