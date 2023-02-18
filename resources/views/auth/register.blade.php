<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro=</title>
    <link rel="stylesheet" href="{{ asset('css/noSeleccionar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
    <link id="image-head" rel="shortcut icon" href="{{ asset('img/registro/faviconRegistro.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- cdn icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    {{-- animations css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>


    {{-- Material design css --}}
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">

    {{-- icons google --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    {{-- Estilos --}}
    <link rel="stylesheet" href="{{ asset('css/eye.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iconCalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/noSeleccionar.css') }}">




</head>

<body class="body-registro">

    <div class="container mt-5 animate__animated animate__swing shadow rounded">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block d-lg-block col-md-5 col-lg-5 col-xl-6">
                <div class="col rounded">
                    {{--  --}}
                    <div id="carouselExampleCaptions" class="carousel slide" data-interval="3500"
                        data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner mt-5">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/imgs/logo.png') }}"
                                    class="d-block d-flex align-items-center animate__animated animate__heartBeat rounded"
                                    alt="..." width="100%" height="100%">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="bg-secondary rounded">Aprendamos juntos de los primeros auxilios</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/imgs/doctor-auxilitos.png') }}"
                                    class="d-block d-flex align-items-center animate__animated animate__heartBeat rounded"
                                    alt="..." width="100%" height="100%">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="bg-secondary rounded">¡Una curita te ayudará a protegerte de infecciones!
                                    </h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/imgs/fondo-auxilitos.jpg') }}"
                                    class="d-block d-flex align-items-center animate__animated animate__heartBeat rounded"
                                    alt="..." width="100%" height="100%">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="bg-secondary rounded">¡Aprender de primeros auxilios es divertido!</h5>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    {{--  --}}
                </div>
            </div>

            <div id="container-login" class="col p-5 rounded">

                <form action="{{ route('register') }}" method="POST" id="formulario"
                    class="animate__animated animate__jackInTheBox">

                    {{-- Input oculto --}}
                    @csrf

                    <div class="form">
                        <h1 id="tituloAuxilitos">MIS PRIMEROS AUXILITOS</h1>
                        <h1 id="tituloRegistro">Registro</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <ul>
                                        <strong>* {{ $error }}</strong>
                                    </ul>
                                @endforeach
                            </div>
                        @endif

                        <div class="grupo">
                            <input class="input" type="text" name="name" id="name" required
                                value="{{ old('name') }}"><span class="barra"></span>
                            <label class="label" for="">Nombre</label>
                        </div>
                        <div class="grupo">
                            <input class="input" type="email" name="email" id="name" required
                                value="{{ old('email') }}"><span class="barra"></span>
                            <label class="label" for="">Correo</label>
                        </div>
                        <div class="grupo">
                            <h4 class="text-primary">Escoge tu genero </h4>
                            <label>
                                <input name="genero" class="custom-checkbox" value="Masculino" type="checkbox">
                                <span><label class="text-primary" for="">Masculino</label></span>
                            </label>
                            <label>
                                <input name="genero" class="custom-checkbox" value="Femenino" type="checkbox">
                                <span><label class="text-primary" for="">Femenino</label></span>
                            </label>
                            <label>
                                <input name="genero" class="custom-checkbox" value="Otro" type="checkbox">
                                <span><label class="text-primary" for="">Otro</label></span>
                            </label>
                        </div>
                        
                        
                        <div class="grupo">
                            <input type="date" class="input" name="fechaNacimiento" id="name" required
                                value="{{ old('fechaNacimiento') }}"><span class="barra"></span>
                                <label class="label" for="">Fecha de nacimiento</label>
                        </div>

                        <div class="grupo input-wrapper">
                            <input class="input password input password" data-lpignore="true" type="password" name="password" id="name password" ><span
                                class="barra"></span>
                            <label class="label" for="">Contraseña</label>
                            <span class="togglePassword mr-2 input-icon password">
                                <i data-feather="eye" style="cursor: pointer"></i>
                            </span>
                            
                        </div>

                        <div class="grupo input-wrapper">
                            <input class="input password input password" data-lpignore="true" type="password" name="password_confirmation" id="name password"
                                ><span class="barra"></span>
                            <label class="label" for="">Confirmar contraseña</label>
                            <span class="togglePassword mr-2 input-icon password">
                                <i data-feather="eye" style="cursor: pointer"></i>
                            </span>
                        </div>

                        @if ($errors->any('password'))
                            <div class="text-danger" role="alert">
                                <p class="text-center m-3">Las constraseñas deben coincidir y ser mayores o iguales a 8 carácteres 😀😎</p>
                            </div>
                        @endif

                        <div class="grupo">
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div>
                                    <x-jet-label for="terms">
                                        <div class="row">

                                          <div class="ml-3">
                                            <x-jet-checkbox name="terms"  required />

                                          </div>
                                            
                                            <div class="ml-3" >
                                                {!! __('Estoy de acuerdo con los :terms_of_service y :privacy_policy', [
                                                    'terms_of_service' =>
                                                        '<a target="_blank" href="' .
                                                        route('terms.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                        __('Terminos de servicio') .
                                                        '</a>',
                                                    'privacy_policy' =>
                                                        '<a target="_blank" href="' .
                                                        route('policy.show') .
                                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                        __('Politica de privacidad') .
                                                        '</a>',
                                                ]) !!}
                                            </div>


                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif
                        </div>


                        <button type="submit" id="btn_Registrar">Registrarse</button>
                        <button type="submit" id="btn_Regresar"
                            onclick="location.href='{{ route('login') }}'">Regresar</button>

                    </div>

                </form>
            </div>


        </div>
    </div>

    <script src="{{ asset('js/checkCheckBox.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/noSeleccionar.js') }}"></script>

    
<!-- Required Material Web JavaScript library -->
<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
<script src="{{asset('js/eye.js')}}"></script>



</body>

</html>
