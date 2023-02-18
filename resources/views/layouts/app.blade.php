<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>

    {{-- <link rel="shortcut icon" href="{{ asset('img/botiquin.png') }}" type="image/x-icon"> --}}


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/eye.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iconPasswordReset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iconCalendar.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/video.css') }}"> --}}



    {{-- link de guest --}}
    <link rel="stylesheet" href="{{ asset('css/plantillaGuest.css') }}">

    {{-- Estilos de jquery --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- Script de notificacion --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--estilos-->
    <link rel="stylesheet" href="{{ asset('css/cursor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hoverImage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/input-file.css') }}">
    <link rel="stylesheet" href="{{ asset('css/btn-height.css') }}">
    <link rel="stylesheet" href="{{ asset('css/img-size.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card-size.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/modal.css') }}"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Fuente --}}
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!-- cdn icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    {{-- animations css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.slim.js"
        integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Scripts -->
    <script src="{{ asset('build/assets/app.js') }}" defer></script>
    <script src="{{ asset('js/audio_context.js') }}"></script>
    <script src="{{ asset('js/img-noseleccionar.js') }}"></script>
    
    {{-- <script src="{{asset('js/noSeleccionar.js')}}"></script> --}}


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js"
        integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body class="font-sans antialiased bg-light">

    @auth
        {{-- @if (Auth::user()->cancion == 1)
            
            <object type="text/html" id="music" data=" {{ asset('music/musicaDivertida.mp3') }} " width="1px" height="1px"></object> 
        @endif --}}
        {{-- <audio id="music" src="{{ asset('music/musicaDivertida.mp3') }}" autoplay loop></audio> --}}
        <!-- Header -->
        <header>
            <div class="container">
                {{ $header }}
            </div>
        </header>


        <!-- Page Content -->
        <main class="container mt-5">

            <!-- Modal -->
            <div class="modal fade" id="microphone" tabindex="-1" aria-labelledby="microphoneLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="microphoneLabel">😋Busquemos algo divertido!!!🤗</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img class="mx-auto" src="{{ asset('img/gifs/microfono.gif') }}" alt="microfono" width="100px" height="100px">
                            </div>
                        </div>
                        <div class="modal-footer mx-auto">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                <img class="mx-auto" src="{{ asset('img/icons/cancel2.png') }}" alt="Cancelar" width="40px" height="40px">
                            </button>
                            {{-- <button type="button" class="btn btn-success">Aceptar</button> --}}
                        </div>
                    </div>
                </div>
            </div> {{--exampleModalLabel--}}

            {{ $slot }}

        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                {{ $footer }}
            </div>
        </footer>

    @endauth

    {{-- Excepcion cuando el usuario quiere entrar sin loguearse --}}

    @guest
        <div class="py-5 animate__animated animate__rubberBand">

            <div class="text-center">
                <img class="rounded" src="{{ asset('img/imgs/logo.png') }}" alt="">
            </div>
            <div class="text-center">
                <h4 id="h4-text" class="animate__animated animate__tada">¡Es muy importante cuidarse!</h4>
            </div>
            <div class="text-center animate__animated animate__backInDown">
                <a id="href-iniciarSesion" class="h2 text-light rounded btn btn-danger btn-lg"
                    href="{{ route('login') }}"><strong id="text-IniciarSesion">Iniciar sesión</strong></a>
            </div>

        </div>
    @endguest

    @stack('modals')

    @livewireScripts

    @stack('js')
    {{-- Escuchar evento de Scritp --}}
    {{-- <script src="{{ asset('js/alert-modal.js') }}"></script> --}}
    @stack('scripts')

    {{-- <script src="{{ asset('js/sound.js') }}"></script> --}}
    <script src="{{ asset('js/checkCheckBox.js') }}"></script>
    <script src="{{ asset('js/eye.js') }}"></script>
    <script src="{{ asset('js/toast-delete.js') }}"></script>
    <script src="{{ asset('js/imageview.js') }}"></script>
    {{-- <script src="{{ asset('js/modal.js') }}"></script> --}}

</body>

</html>
