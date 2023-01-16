<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link id="image-head" rel="shortcut icon" href="{{ asset('img/botiquin.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> 

    {{-- Material design css --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css"> --}}

    {{-- icons google --}}
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> --}}

    {{-- Estilos --}}
    <link rel="stylesheet" href="{{ asset('css/eye.css') }}">
    <link rel="stylesheet" href="{{ asset('css/noSeleccionar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}">
    

    {{-- animations css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    {{-- Script de notificacion --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

<body>

    <div class="intro text-center">
        <h1 class="logo-header">
            <span class="logo"><img src="{{ asset('img/logo/logo.png') }}" alt="Auxilitos"></span>
            <span class="logo">MIS PRIMEROS</span> <span class="logo">AUXILITOS</span>
        </h1>
    </div>

    <div class="container mt-5 animate__animated animate__swing rounded">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block d-lg-block col-md-5 col-lg-5 col-xl-6">
                <div class="col rounded">
                <div id="carouselExampleCaptions" class="carousel slide" data-interval="3500" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner mt-5">
                      <div class="carousel-item active">
                        <img src="{{asset('img/imgs/logo.png')}}" class="d-block d-flex align-items-center animate__animated animate__heartBeat rounded" alt="..." width="100%" height="100%">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="bg-secondary rounded">Aprendamos juntos de los primeros auxilios</h5>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('img/imgs/bomberito-auxilitos.png')}}" class="d-block d-flex align-items-center animate__animated animate__heartBeat rounded" alt="..." width="100%" height="100%"> 
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="bg-secondary rounded">Es muy importante aprender de primeros auxilios</h5>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('img/imgs/imagenavatar1.png')}}" class="d-block d-flex align-items-center animate__animated animate__heartBeat rounded" alt="..." width="100%" height="100%"> 
                        <div class="carousel-caption d-none d-md-block">
                          <h5 class="bg-secondary rounded">Aprendamos observando</h5>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                  
            </div> 
            </div>
            
            <div id="container-login" class="col p-5 rounded">
                <div class="text-end">
                    <img class="animate__animated animate__heartBeat" src="{{asset('img/logo/logo.png')}}" width="48" alt="">
                </div>
                <h2 id="container-login" class="fw-bold text-center py-5 text-primary rounded">Bienvenido</h2>

                <!-- Login -->
                @if($errors->any())
                <div class="alert alert-danger animate__animated animate__swing" role="alert">                 
                        @foreach($errors->all() as $error)
                            <strong>* {{$error}}</strong>
                        @endforeach 
                </div>                          
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="{{old('email')}}">
                      <label for="floatingInput" class="texto-login">Correo</label>
                    </div>
                    <div class="form-floating mb-3 input-wrapper">
                      <input type="password" class="form-control block mt-1 w-full password input password" data-lpignore="true" id="floatingPassword password" name="password" placeholder="Password">
                      <label for="floatingPassword" class="texto-login">Contraseña</label>
                      <span class="togglePassword mr-2 input-icon password">
                        <i data-feather="eye" style="cursor: pointer"></i>
                    </span>
                    </div>

                   <div class="d-grid">
                       <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                   </div>
                   <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <label class="custom-control-label" for="remember_me">
                            {{ __('Recuérdame') }}
                        </label>
                    </div>
                </div>
                   <div class="text-center my-3">
                       <span>¿No tienes cuenta? <a class="text-primary h5" href="{{ route('register') }}">Registrate</a></span><br>
                       <span><a class="text-primary h5" href="{{ route('password.request') }}">He olvidado mi contraseña</a></span>
                   </div>
                </form>

                <!-- Login con redes sociales -->
                <div class="container w-100 my-3">
                    <div class="row text-center">
                        <div class="col-12 h5">Iniciar sesion</div>
                        
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <button class="btn rounded">
                               <div class="row align-items-center">
                                    <div class="col-2 ">
                                        <img src="{{ asset('img/Facebook.svg') }}" onclick="location.href='{{route('facebook')}}'" alt="..." height="75px" width="75px">
                                    </div>                      
                               </div>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn rounded">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="{{ asset('img/Google.svg') }}" onclick="location.href='{{route('google')}}'" alt="..." height="75px" width="75px">
                                    </div>
                                </div>
                             </button>
                        </div>
                    </div>
                    <div class="row text-center bg-dark text-light rounded ">
                        <div class="col-12">Copyright &copy; 2022</div>
                    </div>
                </div>

            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

<!--Script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/splahScreen.js')}}"></script>


<!-- Required Material Web JavaScript library -->
{{-- <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script> --}}
<script src="{{asset('js/eye.js')}}"></script>
<script src="{{asset('js/noSeleccionar.js')}}"></script>



</body>
</html>