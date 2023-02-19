<link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/logo.png') }}" type="image/x-icon">
@section('title', 'Home')
<x-app-layout>

    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <title>Mis primeros Auxilitos</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- CUSTOM CSS -->

    <link id="image-head" rel="shortcut icon" href="{{ asset('img/botiquin.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/noSeleccionar.css') }}">


    {{-- animations css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    {{-- Script de notificacion --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <x-slot name="header">
        <x-header />
    </x-slot>



    <div class="menu-btn ">
        <i class="fas fa-bars fa-2x"></i>
    </div>

    <div class="container mt-5">
        {{-- <!-- Navigation -->
    <nav class="nav-main">
      <!-- Brand -->
      <img src="img/logo.png" alt="TechNews Logo" class="nav-brand">
      <!-- Left Nav -->
      <ul class="nav-menu">
        <li>
          <a href="#">Videos</a>
        </li>
        <li>
          <a href="#">Imagenes</a>
        </li>
        <li>
          <a href="#">Material de apoyo</a>
        </li>
        <li>
          <a href="#">actividades</a>
        </li>
       
      </ul>

      <!-- Right Nav -->
      <ul class="nav-menu-right">
        <li>
          <a href="#">
            <i class="fas fa-search"></i>
          </a>
        </li>
      </ul>
    </nav>
    <hr> --}}

        <!-- SHOWCASE -->


        <header class="showcase mt-5">
            <h2 class="titulo">Mis primeros Auxilitos</h2>
            <p class="subtitulo">Enseñando al
                héroe del mañana</p>
            <a class="btn btn-info h4" href="{{ route('menu') }}">
                Entrar <i class="fas fa-chevron-right"></i>
            </a>
        </header>
        <div class="contenedor">
            <a href="#">
                <figure>
                    <img src="img/1 card.webp" alt="" />
                    <div class="capa">
                        <h3>Niños</h3>
                        <p>CONOCIMIENTOS EN PRIMEROS AUXILIOS.</p>
                    </div>
                </figure>
            </a>
        </div>
        <div class="contenedor2">
            <a href="#">
                <figure>
                    <img src="img/card 2.jpg" alt="" />
                    <div class="capa2">
                        <h3>Titulo</h3>
                        <p>Enseñar Primeros Auxilios desde edades tempranas es una manera de prepararles
                            ante situaciones
                            de emergencia.</p>
                    </div>
                </figure>
            </a>
        </div>

        <div class="contenedor3">
            <a href="#">
                <figure>
                    <img src="img/card3.jpeg" alt="" />
                    <div class="capa3">
                        <h3>Titulo</h3>
                        <p>Todos sabemos lo importante que es aprender matemáticas, lengua, ciencias…
                            Es imprescindible para la vida, pero también lo es aprender primeros
                            auxilios,por ello es ncesesario
                            que se aprenda también desde la infancia la reanimación cardiopulmonar (RCP)
                            que es una técnica útil
                            para salvar vidas en emergencias.</p>
                    </div>
                </figure>
            </a>
        </div>
        <!-- HOVER -4 -->
        <div class="contenedor4">
            <a href="#">
                <figure>
                    <img src="img/card.jpg" alt="" />
                    <div class="capa4">
                        <h3>Titulo</h3>
                        <p>los niños aprendan todas éstas técnicas y les de la confianza necesaria para
                            poder intervenir o
                            ayudar a alguien en un caso extremo, donde podrían salvar una vida.</p>
                    </div>
                </figure>
            </a>
        </div>
        </body>
        <!-- HOVER -5 -->

        <div class="contenedor5">
            <a href="#">
                <figure>
                    <img src="img/niños 5hover.avif" alt="" />
                    <div class="capa5">
                        <h3>Titulo</h3>
                        <p>los niños aprendan todas éstas técnicas y les de la confianza necesaria para poder
                            intervenir o
                            ayudar a alguien en un caso extremo, donde podrían salvar una vida.</p>
                    </div>
                </figure>
            </a>
        </div>
        </body>

        <!-- Card Banner 1-->
        <section class="cards-banner-one">
            <div class="content">
                <h2>Mis primeros Auxilitos.</h2>
                <!-- lorem 20 -->
                <p>Tiene como finalidad poder instruir de manera practica,didactica a uestros heroes del mañana</p>
                <a href="{{ route('menu') }}" class="btn">Comenzar<i class="fas fa-chevron-right"></i></a>
            </div>
        </section>


        <!-- Follow -->
        <section class="social">
            <p>Redes sociales</p>
            <div class="links">
                <img class="m-2" src="{{ asset('img/icons/twitter.png') }}" onclick="location.href=''" alt="Twitter"
                    height="60px" width="60px">
                <img class="m-2" src="{{ asset('img/icons/facebook.png') }}" onclick="location.href=''"
                    alt="Facebook" height="60px" width="60px">
                <img class="m-2" src="{{ asset('img/icons/tiktok.png') }}" onclick="location.href=''" alt="Tiktok"
                    height="60px" width="60px">
            </div>
        </section>
    </div>

    <!-- Footer Links -->
    <div class="footer-links">
        <div class="footer-container">
            <ul>
                <li>
                    <a href="#">
                        <h3>
                            Información</h3>
                    </a>
                </li>
                <li>
                    <a href="#">Correo</a>
                </li>
                <li>
                    <a href="#">Telefonos</a>
                </li>
                <li>
                    <a href="#">Materiales de apoyo</a>
                </li>
                <li>
                    <a href="#">Informacion acerca de nosotros</a>
                </li>
                <li>
                    <a href="#">Institución</a>
                </li>
                <li>
                    <a href="#">Credenciales</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">
                        <h3>Lenguaje</h3>
                    </a>
                </li>
                <li>
                    <a href="#">Español</a>
                </li>
                <li>
                    <a href="#">Ingles</a>
                </li>
                <li>
                    <a href="#">Proximamente Frances</a>
                </li>
                <li>
                    <a href="#">Proximamente Portugues</a>
                </li>
                <li>
                    <a href="#">Proximamente Russo</a>
                </li>
                <li>
                    <a href="#">Proximamente Mandarin</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">
                        <h3>Donaciones</h3>
                    </a>
                </li>
                <li>
                    <a href="#">Voluntarias</a>
                </li>
                <li>
                    <a href="#">Targeta</a>
                </li>
                <li>
                    <a href="#">suscripción</a>
                </li>
                <li>
                    <a href="#"> </a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">
                        <h3>Integrantes</h3>
                    </a>
                </li>
                <li>
                    <a href="#">Institución</a>
                </li>
                <li>
                    <a href="#">Aprendices</a>
                </li>
                <li>
                    <a href="#">Instructores</a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <h3>Mis primeros Auxilitos Copyright</h3>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.3.slim.js"
        integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scroll Reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <x-slot name="footer">
        {{-- <x-footer /> --}}
    </x-slot>

</x-app-layout>
