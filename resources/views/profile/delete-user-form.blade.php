<x-jet-action-section>

    <x-slot name="content">

        <div class="mt-3">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Eliminar cuenta') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('¿Seguro que quieres eliminar tu cuenta?') }}
            </x-slot>


            @if (Auth::user()->external_auth == 'google' || Auth::user()->external_auth == 'facebook')
                <x-slot name="content">
                    {{ __('Escribe tu correo electronico para confirmar. Ten encuenta que es una acción irreversible 😥') }}
                    <img class="mx-auto" src="{{ asset('img/users/caraTriste.png') }}" alt="¡¡¡QUE MAL!!!" width="250px"
                        height="250px">

                    <div class="mt-2 w-md-75" x-data="{}"
                        x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-jet-input type="email"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }} "
                            placeholder="{{ __('Correo electronico') }}" x-ref="password"
                            wire:model.defer="password" data-lpignore="true" wire:keydown.enter="deleteUser" />

                        @if ($errors->any('password'))
                            <div class="text-danger" role="alert">
                                <p class="text-center m-3">El correo electronico no coincide</p>
                            </div>
                        @endif
                    </div>
                </x-slot>
            @else
                <x-slot name="content">
                    {{ __('Escribe tu contraseña para confirmar. Ten encuenta que es una acción irreversible 😥') }}
                    <img class="mx-auto" src="{{ asset('img/users/caraTriste.png') }}" alt="¡¡¡QUE MAL!!!"
                        width="250px" height="250px">

                    <div class="mt-2 w-md-75" x-data="{}"
                        x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-jet-input type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="{{ __('Contraseña') }}" x-ref="password" wire:model.defer="password"
                            wire:keydown.enter="deleteUser" />

                        <x-jet-input-error for="password" />
                    </div>
                </x-slot>
            @endif

            <x-slot name="footer">

                <button type="button" class="btn btn-success" wire:click="$toggle('confirmingUserDeletion')"
                    wire:loading.attr="disabled">Cancelar</button>

                <x-jet-danger-button wire:click="deleteUser" wire:loading.attr="disabled">
                    <div wire:loading wire:target="deleteUser" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    {{ __('Sí, eliminar mi cuenta') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>

</x-jet-action-section>
