<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('img/profile/profile2.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="{{ asset('css/registro.css') }}" /> --}}

</head>

<body>

    <section>
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <a class="btn btn-success" href="{{ route('dashboard.index') }}">regresar</a>
                    <div class="card-body text-center">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img wire:key="{{ Auth::user()->id }}" class="rounded-circle text-center" width="150px"
                                height="150px" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        @else
                            {{ Auth::user()->name }}

                            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endif
                        <h5 class="my-3"></h5>
                        <div class="d-flex justify-content-center mb-2">

                            <button type="button" wire:key="{{ Auth::user()->id }}" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Editar perfil
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar perfil</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <x-jet-form-section submit="updateProfileInformation">

                                                <x-slot name="form">


                                                    <!-- Profile Photo -->
                                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">

                                                            {{-- ID del usuario es:{{ Auth::user()->profile_photo_url }} --}}
                                                            <!-- Profile Photo File Input -->
                                                            <input type="file" hidden wire:model="photo"
                                                                x-ref="photo"
                                                                x-on:change="
                                                                photoName = $refs.photo.files[0].name;
                                                                const reader = new FileReader();
                                                                reader.onload = (e) => {
                                                                    photoPreview = e.target.result;
                                                                };
                                                                reader.readAsDataURL($refs.photo.files[0]);
                                                        " />
                                                            @error('photo')
                                                                {{ $message }}
                                                            @enderror
                                                            <x-jet-label for="photo"
                                                                value="{{ __('Imagen de perfil') }}" />

                                                            <!-- Current Profile Photo -->
                                                            <div class="mt-2" x-show="! photoPreview">
                                                                <img src="{{ $this->user->profile_photo_url }}"
                                                                    alt="{{ $this->user->name }}"
                                                                    class="rounded-full h-100 w-100 object-cover">
                                                            </div>

                                                            <!-- New Profile Photo Preview -->
                                                            <div class="mt-2" x-show="photoPreview">
                                                                <img x-bind:src="photoPreview"
                                                                    class="rounded-circle h-100 w-100">
                                                            </div>

                                                            <x-jet-secondary-button class="mt-2 mr-2" type="button"
                                                                wire:key="{{ Auth::user()->id }}"
                                                                x-on:click.prevent="$refs.photo.click() ">
                                                                {{ __('Seleccionar una imagen') }}
                                                            </x-jet-secondary-button>

                                                            {{-- Eliminar foto --}}
                                                            {{-- @if ($this->user->profile_photo_path)
                                                                <x-jet-secondary-button type="button" class="mt-1"
                                                                    wire:click="deleteProfilePhoto"
                                                                    wire:key="{{ Auth::user()->id }}">
                                                                    <div wire:loading wire:target="deleteProfilePhoto"
                                                                        class="spinner-border spinner-border-sm"
                                                                        role="status">
                                                                        <span class="visually-hidden">Cargando...</span>
                                                                    </div>

                                                                    {{ __('Eliminar imagen') }}
                                                                </x-jet-secondary-button>
                                                            @endif --}}
                                                            @if ($this->user->profile_photo_path)
                                                                <x-jet-secondary-button type="button" class="mt-2"
                                                                    wire:click="deleteProfilePhoto">
                                                                    {{ __('Eliminar foto') }}
                                                                </x-jet-secondary-button>
                                                            @endif

                                                            <x-jet-input-error for="photo" class="mt-2" />
                                                        </div>
                                                    @endif

                                                    <div class="w-md-75">
                                                        <!-- Name -->
                                                        <div class="mb-3">
                                                            <x-jet-label for="name" value="{{ __('Nombre') }}" />
                                                            <x-jet-input id="name" type="text"
                                                                class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                                wire:model.defer="state.name" autocomplete="name" />
                                                            <x-jet-input-error for="name" />
                                                        </div>

                                                        <!-- Email -->
                                                        {{-- <div class="mb-3">
                                                            <x-jet-label for="email"
                                                                value="{{ __('Correo') }}" />
                                                            <x-jet-input id="email" type="email"
                                                                class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                                wire:model.defer="state.email" />
                                                            <x-jet-input-error for="email" />
                                                        </div> --}}

                                                        <div class="col-span-6 sm:col-span-4">
                                                            <x-jet-label for="email"
                                                                value="{{ __('Correo') }}" />
                                                            <x-jet-input id="email" type="email"
                                                                class="mt-1 block w-full"
                                                                wire:model.defer="state.email" />
                                                            <x-jet-input-error for="email" class="mt-2" />

                                                            {{-- @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !$this->user->hasVerifiedEmail())
                                                                <p class="text-sm mt-2">
                                                                    {{ __('Su dirección de correo electrónico no está verificada.') }}
                                                
                                                                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                                                                        {{ __('Haga clic aquí para volver a enviar el correo electrónico de verificación.') }}
                                                                    </button>
                                                                </p>
                                                
                                                                @if ($this->verificationLinkSent)
                                                                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                                                                        {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                                                                    </p>
                                                                @endif
                                                            @endif --}}
                                                        </div>

                                                        <!-- Genero -->
                                                        <div class="form-group m-1">
                                                            <label for="" class="text-primary">Genero</label>
                                                            <div>
                                                            </div>
                                                            <label>
                                                                <input name="genero" class="custom-checkbox"
                                                                    value="Masculino" type="checkbox">
                                                                <span><label class="label1"
                                                                        for="">Masculino</label></span>
                                                            </label>
                                                            <label>
                                                                <input name="genero" class="custom-checkbox"
                                                                    value="Femenino" type="checkbox">
                                                                <span><label class="label1"
                                                                        for="">Femenino</label></span>
                                                            </label>
                                                            <label>
                                                                <input name="genero" class="custom-checkbox"
                                                                    value="Otro" type="checkbox">
                                                                <span><label class="label1"
                                                                        for="">Otro</label></span>
                                                            </label>
                                                            {{-- @error('genero')
                                                                    <br>
                                                                        <small class="text-danger">{{$message}}</small>
                                                                    <br>
                                                            @enderror --}}

                                                        </div>

                                                        <!-- Fecha Nacimiento -->
                                                        <div class="mb-3">
                                                            <x-jet-label for="fechaNacimiento"
                                                                value="{{ __('Fecha de nacimiento') }}" />
                                                            <x-jet-input id="fechaNacimiento" type="date"
                                                                class="{{ $errors->has('fechaNacimiento') ? 'is-invalid' : '' }}"
                                                                wire:model.defer="state.fechaNacimiento"
                                                                autocomplete="fechaNacimiento" />
                                                            <x-jet-input-error for="fechaNacimiento" />
                                                        </div>
                                                    </div>

                                                </x-slot>

                                                <div class="modal-footer">

                                                    {{-- <button type="button" class="btn btn-primary">Actualizar</button> --}}
                                                    <x-slot name="actions">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <div class="d-flex align-items-baseline">

                                                            <button type="submit" class="btn btn-success ml-3">
                                                                <div wire:loading role="status">
                                                                    <span class="visually-hidden">Cargando...</span>
                                                                </div>

                                                                {{ __('Actualizar') }}

                                                            </button>
                                                            <x-jet-action-message class="mr-3" on="saved">
                                                                {{ __('Actualizado.') }}
                                                            </x-jet-action-message>

                                                            {{-- <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                                                                {{ __('Actualizar') }}
                                                            </x-jet-button> --}}

                                                        </div>
                                                    </x-slot>
                                                </div>

                                            </x-jet-form-section>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- Eliminar usuario --}}
                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())                         
                            @livewire('profile.delete-user-form')
                        @endif

                        <!-- Authentication -->
                        <a class="btn btn-outline-danger mt-3" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                            <img src="{{ asset('img/profile/salida.png') }}" alt="" width="40px"
                                height="40px">
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>


                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <h4 class="card card-title">Descripción</h4>
                    <div class="card-body p-0">
                        <p class="mb-0">...</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nombre: </p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Correo: </p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Genero: </p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->genero }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Fecha de nacimiento: </p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->fechaNacimiento }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Juegos</span> Retos
                                    ganados: 10
                                </p>
                                <p class="mb-1" id="juegos">Trivias</p>
                                <div class="progress rounded" id="progreso-Padre">
                                    <div class="progress-bar" role="progressbar" id="progressBar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" id="juegos">Adivinar objeto</p>
                                <div class="progress rounded" id="progreso-Padre">
                                    <div class="progress-bar" role="progressbar" id="progressBar" aria-valuenow="72"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Progreso</span> Total
                                </p>
                                <p class="mb-1" id="juegos">Trivias</p>
                                <div class="progress rounded" id="progreso-Padre">
                                    <div class="progress-bar" role="progressbar" id="progressBar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mt-4 mb-1" id="juegos">Adivinar objetos</p>
                                <div class="progress rounded" id="progreso-Padre">
                                    <div class="progress-bar" role="progressbar" id="progressBar" aria-valuenow="72"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="{{ asset('js/checkCheckBox.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>
