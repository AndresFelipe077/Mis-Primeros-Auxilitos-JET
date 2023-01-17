<div>
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
        <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/icon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/icon2.css') }}">
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>

    <body>

        <section>
            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <a class="btn btn-success" href="{{ route('dashboard.index') }}">regresar</a>
                        <div class="card-body text-center">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img wire:key="{{ Auth::user()->id }}" class="rounded-circle mx-auto" width="150px"
                                    height="150px" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            @else
                                {{ Auth::user()->name }}

                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
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
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar perfil
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- Componente Perfil --}}
                                               
                                                @livewire('profile.update-profile-information-form')
                                                
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
                                        <div class="progress-bar" role="progressbar" id="progressBar"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" id="juegos">Adivinar objeto</p>
                                    <div class="progress rounded" id="progreso-Padre">
                                        <div class="progress-bar" role="progressbar" id="progressBar"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">Progreso</span>
                                        Total
                                    </p>
                                    <p class="mb-1" id="juegos">Trivias</p>
                                    <div class="progress rounded" id="progreso-Padre">
                                        <div class="progress-bar" role="progressbar" id="progressBar"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" id="juegos">Adivinar objetos</p>
                                    <div class="progress rounded" id="progreso-Padre">
                                        <div class="progress-bar" role="progressbar" id="progressBar"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 mb-lg-0">
                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                            @livewire('profile.two-factor-authentication-form')
                        @endif
                    </div>


                </div>
            </div>
</div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
{{-- <script src="{{asset('js/noSeleccionar.js')}}"></script> --}}
<script src="{{ asset('js/checkCheckBox.js') }}"></script>


</body>

</html>

</div>
