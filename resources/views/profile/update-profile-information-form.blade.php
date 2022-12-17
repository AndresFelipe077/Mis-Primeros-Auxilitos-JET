<x-jet-form-section submit="updateProfileInformation">
        <x-slot name="form">

            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">

                    {{-- ID del usuario es:{{ Auth::user()->profile_photo_url }} --}}
                    <!-- Profile Photo File Input -->
                    <input type="file" hidden wire:model="photo" x-ref="photo"
                        x-on:change="
                          photoName = $refs.photo.files[0].name;
                          const reader = new FileReader();
                          reader.onload = (e) => {
                              photoPreview = e.target.result;
                          };
                          reader.readAsDataURL($refs.photo.files[0]);
                        "
                        class="mx-auto" />
                    @error('photo')
                        {{ $message }}
                    @enderror
                    
                    <x-jet-label for="photo" value="{{ __('Imagen de perfil') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                            class="rounded-full object-cover mx-auto" width="250px" height="250px">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                        <img x-bind:src="photoPreview" class="rounded-circle mx-auto" width="250px" height="250px">
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" wire:key="{{ Auth::user()->id }}"
                        x-on:click.prevent="$refs.photo.click() ">
                        {{ __('Seleccionar una imagen') }}
                    </x-jet-secondary-button>

                    {{-- Eliminar foto --}}

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Eliminar foto') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
            @endif

            <div class="w-md-75">
                <!-- Name -->
                <div class="mb-3 mt-4">
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.name" autocomplete="name" />
                    <x-jet-input-error for="name" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="email" value="{{ __('Correo') }}" />
                    <x-jet-input id="email" type="email" class="mt-1 block w-full"
                        wire:model.defer="state.email" />
                    <x-jet-input-error for="email" class="mt-2" />

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                        !$this->user->hasVerifiedEmail())
                        <p class="text-sm mt-2">
                            {{ __('Su dirección de correo electrónico no está verificada.') }}

                            <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900"
                                wire:click.prevent="sendEmailVerification">
                                {{ __('Haga clic aquí para volver a enviar el correo electrónico de verificación.') }}
                            </button>
                        </p>

                        @if ($this->verificationLinkSent)
                            <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                                {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                            </p>
                        @endif
                    @endif
                </div>

                <!-- Genero -->
                <div class="form-group m-1">
                    <label for="" class="text-primary">Genero</label>
                    
                    {{-- <label>
                        <input name="genero" class="custom-checkbox" value="Masculino" type="checkbox">
                        <span><label class="label1" for="">Masculino</label></span>
                    </label>
                    <label>
                        <input name="genero" class="custom-checkbox" value="Femenino" type="checkbox">
                        <span><label class="label1" for="">Femenino</label></span>
                    </label>
                    <label>
                        <input name="genero" class="custom-checkbox" value="Otro" type="checkbox">
                        <span><label class="label1" for="">Otro</label></span>
                    </label> --}}
                    <div class="mb-3">
                    <x-jet-label for="genero" value="masculino" />
                    <x-jet-input id="genero" type="checkbox"
                        class="{{ $errors->has('genero') ? 'is-invalid' : '' }}"
                        wire:model="genero" />
                    <x-jet-input-error for="genero" />
                  </div>
                  <div class="mb-3">
                    <x-jet-label for="genero" value="{{ __('Femenino') }}" />
                    <x-jet-input id="genero" type="checkbox"
                        class="{{ $errors->has('genero') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.genero" autocomplete="genero" />
                    <x-jet-input-error for="genero" />
                  </div>
                    @error('genero')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                        <br>
                    @enderror

                </div>

                <!-- Fecha Nacimiento -->
                <div class="mb-3">
                    <x-jet-label for="fechaNacimiento" value="{{ __('Fecha de nacimiento') }}" />
                    <x-jet-input id="fechaNacimiento" type="date"
                        class="{{ $errors->has('fechaNacimiento') ? 'is-invalid' : '' }}"
                        wire:model.defer="state.fechaNacimiento" autocomplete="fechaNacimiento" />
                    <x-jet-input-error for="fechaNacimiento" />
                </div>
                <x-jet-action-message on="saved">
                  {{ __('Actualizado') }}
              </x-jet-action-message>
            </div>

        </x-slot>

    <div class="modal-footer">
      

        {{-- <button type="button" class="btn btn-primary">Actualizar</button> --}}
        <x-slot name="actions">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <div class="d-flex align-items-baseline">

                <button type="submit" class="btn btn-success ml-3" wire:loading.attr="disabled" wire:target="photo">
                    <div wire:loading role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>

                    {{ __('Actualizar') }}
                </button>

                

                {{-- <x-jet-button  >
                    {{ __('Actualizar') }}
                </x-jet-button> --}}

            </div>
        </x-slot>
    </div>
</x-jet-form-section>
