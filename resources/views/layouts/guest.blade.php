<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/eye.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        

        <!-- Scripts -->
        

        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500&display=swap" rel="stylesheet">
    
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
    <link rel="stylesheet" href="{{asset('css/fondologo.css')}}">
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    


    </head>
    <body class="bg-light font-sans antialiased animate__animated animate__swing">
        {{-- <script src="{{asset('js/datepicker.js')}}"></script> --}}
        {{ $slot }}


    {{-- <script src="{{asset('js/app_material.js')}}"></script> --}}
    {{-- <script src="{{asset('js/eye.js')}}"></script> --}}
    <script src="{{asset('js/noSeleccionar.js')}}"></script>
    

    </body>
</html>