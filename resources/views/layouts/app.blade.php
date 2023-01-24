<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">

    <link rel="shortcut icon" href="{{ asset('img/botiquin.png') }}" type="image/x-icon">

    {{-- link de guest --}}
    <link rel="stylesheet" href="{{ asset('css/plantillaGuest.css') }}">

    {{-- Estilos de jquery --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- Script de notificacion --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--estilos-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Fuente --}}
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!-- cdn icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    {{-- animations css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Scripts -->
    <script src="{{ asset('build/assets/app.js') }}" defer></script>
    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

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


    {{-- @if(Auth::user()->cancion == 1) --}}
        <audio autoplay loop>
            <source src="{{ asset('music/musicaDivertida.mp3') }}" type="audio/mpeg" >
            Tu navegador no es compatible para reproducir audio.
        </audio>
    {{-- @endif --}}
    {{-- <audio src="{{ asset('music/musicaDivertida.mp3') }}" autoplay loop="true"></audio> --}}


        <!-- Page Heading -->
        <header>
            <div class="container">
                {{ $header }}
            </div>
        </header>


        <!-- Page Content -->
        <main class="container my-5">

            {{ $slot }}
            

        </main>

        <!-- Page Heading -->
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

    @stack('scripts')

</body>

</html>
