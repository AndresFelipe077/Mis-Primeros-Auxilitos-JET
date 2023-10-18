<!-- Sección para incluir el icono de la página y una hoja de estilos -->
<link rel="shortcut icon" href="{{ asset('img/profile/profile2.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('css/eye.css') }}">

<!-- Inicio de la página de la aplicación -->
<x-app-layout>

    <!-- Definición del título de la página -->
    @section('title', 'Perfil')

    <!-- Ranura para el encabezado de la página -->
    <x-slot name="header">
    </x-slot>

    <!-- Contenido de la página -->
    <div>

        <!-- Verificación de la posibilidad de actualizar la información del perfil -->
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())

            <!-- Modal para cambiar o actualizar la contraseña -->
            <div class="modal fade" id="staticBackdropCambiarContrasena" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- Título del modal -->
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Cambia o actualiza tu contraseña 😎😄!!!</h1>
                            <!-- Botón para cerrar el modal -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Verificación de la posibilidad de actualizar contraseñas -->
                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                <!-- Componente para actualizar la contraseña -->
                                @livewire('profile.update-password-form')
                            @endif
                        </div>
                    </div>
                </div>
            </div>


                    <!-- Verificación de si el género o la fecha de nacimiento del usuario están en blanco -->
            @if (Auth::user()->genero == null || Auth::user()->fechaNacimiento == null)
            <!-- Mensaje de advertencia para actualizar el perfil -->
            <div class="alert alert-warning text-center animate__animated animate__bounceIn" role="alert">
                ¡¡¡ Actualicemos más nuestro perfil 😎😮😀 !!!
            </div>
            @endif


            <section>
              <!-- Inicio de la sección de información del perfil -->
<div class="row mt-3">
    <!-- Columna izquierda -->
    <div class="col-lg-4">
        <div class="card mb-4">
            <a class="btn btn-success" href="{{ route('dashboard.index') }}">
                Regresar
                <!-- Imagen de regresar (se encuentra comentada) -->
                {{-- <img class="mx-auto" src="{{ asset('img/icons/regresar2.png') }}" alt="Regresar" width="50px" height="50px"> --}}
            </a>

            <div class="card-body text-center">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    @if (Auth::user()->external_auth == 'google' || Auth::user()->external_auth == 'facebook')
                        @if (Auth::user()->profile_photo_path != null)
                            <!-- Imagen de perfil del usuario (cambia dinámicamente) -->
                            <img class="rounded-circle mx-auto" width="150px" height="150px"
                                src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        @else
                            <!-- Imagen de perfil de usuario de respaldo (cambia dinámicamente) -->
                            <img class="rounded-circle mx-auto" width="150px" height="150px"
                                src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                referrerpolicy="no-referrer" />
                        @endif
                    @else
                        <!-- Imagen de perfil del usuario (cambia dinámicamente) -->
                        <img class="rounded-circle mx-auto" width="150px" height="150px"
                            src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    @endif
                @else
                    <!-- Nombre de usuario (si no tiene imagen de perfil) -->
                    {{ Auth::user()->name }}
                    <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                @endif
                <!-- Botón para actualizar la cuenta -->
                <div class="actualizar-boton">
                    <button type="button" class="btn btn-primary text-center mt-3" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                        <!-- Icono para editar la cuenta (se encuentra comentado) -->
                        <img src=" {{ asset('/img/icons/editarCuenta.png') }} " alt="Editar cuenta"
                            width="60px" height="50px">
                    </button>
                </div>

                <div class="d-flex justify-content-center mb-2">
                    <!-- Modal para actualizar perfil -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                        Actualizar perfil
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- Componente para actualizar información del perfil --}}
                                    @livewire('profile.update-profile-information-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección para eliminar usuario -->
                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    @livewire('profile.delete-user-form')
                @endif

                <!-- Botón de autenticación -->
                <a class="btn btn-outline-danger mt-3" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <!-- Icono para cerrar sesión (se encuentra comentado) -->
                    <img src="{{ asset('img/profile/salida.png') }}" alt="" width="40px"
                        height="40px">
                </a>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Descripción del usuario -->
        <div class="card mb-4 mb-lg-0 animate__animated animate__bounceIn">
            <h4 class="card card-title">Descripción</h4>
            <div class="card-body p-0">
                <p class="mb-0">{{ Auth::user()->description }}</p>
            </div>
        </div>
    </div>

    <!-- Columna derecha -->
    <div class="col-lg-8">
        <!-- Información detallada del usuario -->
        <div class="card mb-4 animate__animated animate__bounceIn">
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
                <div class "row">
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

        <!-- Estadísticas y progreso del usuario -->
        <div class="row">
            <div class="col-md-6 animate__animated animate__bounceIn">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <p class="mb-4"><span class="text-primary font-italic me-1">Juegos</span>
                            Retos ganados: 10
                        </p>
                        <p class="mb-1" id="juegos">Trivias</p>
                        <div class="progress rounded" id="progreso-Padre">
                            <div class="progress-bar" role="progressbar" id="progressBar"
                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <p class="mt-4 mb-1" id="juegos">Adivinar objeto</p>
                        <div class="progress rounded" id="progreso-Padre">
                            <div class="progress-bar" role="progressbar" id="progressBar"
                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 animate__animated animate__bounceIn">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <p class="mb-4"><span class="text-primary font-italic me-1">Progreso</span>
                            Total
                        </p>
                        <p class="mb-1" id="juegos">Trivias</p>
                        <div class="progress rounded" id="progreso-Padre">
                            <div class="progress-bar" role="progressbar" id="progressBar"
                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <p class="mt-4 mb-1" id="juegos">Adivinar objetos</p>
                        <div class="progress rounded" id="progreso-Padre">
                            <div class="progress-bar" role="progressbar" id="progressBar"
                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección para administrar la autenticación de dos factores -->
        <div class="card mt-4 mb-lg-0">
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                @livewire('profile.two-factor-authentication-form')
            @endif
        </div>
    </div>
</div>
<!-- Fin de la sección de información del perfil -->

    </div>
    </section>
    @endif

    {{-- @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                @livewire('profile.delete-user-form')
            @endif 

    @endif 
     @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')

            <x-jet-section-border />
        @endif

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            @livewire('profile.two-factor-authentication-form')

            <x-jet-section-border />
        @endif

        @livewire('profile.logout-other-browser-sessions-form')
    --}}

    <script src="{{ asset('js/eye.js') }}"></script>


    <x-slot name="footer">
    </x-slot>

</x-app-layout>
