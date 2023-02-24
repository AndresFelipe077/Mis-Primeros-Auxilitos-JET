<link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/logo.png') }}" type="image/x-icon">
@section('title', 'Ayuda')
<x-app-layout>

    <x-slot name="header">
        {{-- <x-header /> --}}
    </x-slot>

    <div class="menu-btn">
        <i class="fas fa-bars fa-2x"></i>
    </div>

    <div class="container1">

        <div class="animate__animated animate__bounceInUp">
            <header class="showcase ">
                <h2 class="titulo">Mis primeros Auxilitos</h2>
                <p class="subtitulo">Enseñando al
                    héroe del mañana</p>
                <a class="btn btn-info h4" href="{{ route('dashboard.index') }}">
                    Entrar <i class="fas fa-chevron-right"></i>
                </a>
            </header>
        </div>

        <p class="h4 m-4">😋 Los primeros auxilios son muy importantes para nuestra bienestar 😊</p>

        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <div class="contenedor" data-aos="fade-right">
                        <a href="#">
                            <figure>
                                <img src="{{ asset('img/card3.jpeg') }}">
                                <div class="capa">
                                    <h3>SLee Dw</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores,
                                        vero!
                                    </p>
                                </div>
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="contenedor" data-aos="fade-left">
                        <a href="#">
                            <figure>
                                <img src="{{ asset('img/card3.jpeg') }}">
                                <div class="capa">
                                    <h3>SLee Dw</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores,
                                        vero!
                                    </p>
                                </div>
                            </figure>
                        </a>
                    </div>
                </div>
            </div>

        </div>


        <div class="container1">
            <header class="showcase2 ">
                <h2 class="titulo2">Mis primeros Auxilitos</h2>
                <p class="subtitulo2" data-aos="fade-down">Tiene como finalidad poder instruir de manera
                    practica,
                    didactica a nuestros
                    heroes
                    del mañana</p>
                <a class="btn2 btn-info h4" href="{{ route('dashboard.index') }}">
                    Regresar <i class="fas fa-chevron-right"></i>
                </a>
            </header>
        </div>

    </div>

    <div class="d-flex flex-column">
        <footer class="w-100 py-4 flex-shrink-0 rounded">
            <div class="container py-4">
                <div class="row gy-4 gx-5">
                    <div class="col-lg-4 col-md-6">
                        <h5 class="h1 text-white">MIS PRIMEROS AUXILITOS</h5>
                        <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do
                            eiusmod tempor incididunt.</p>
                        <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved. <a class="text-primary"
                                href="#">Bootstrapious.com</a></p>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <h5 class="text-white mb-2">Quick links</h5>
                        <ul class="list-unstyled text-muted">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Get started</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>


                        <!-- Follow -->
                        <section class="text-center mx-auto">
                            <p class="text-white h5">Redes sociales</p>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4"><img class="m-1" src="{{ asset('img/icons/twitter.png') }}"
                                            onclick="location.href=''" alt="Twitter" height="60px" width="60px">
                                    </div>
                                    <div class="col-sm-4"><img class="m-1"
                                            src="{{ asset('img/icons/facebook.png') }}" onclick="location.href=''"
                                            alt="Facebook" height="60px" width="60px"></div>
                                    <div class="col-sm-4"><img class="m-1" src="{{ asset('img/icons/tiktok.png') }}"
                                            onclick="location.href=''" alt="Tiktok" height="60px" width="60px">
                                    </div>
                                </div>
                            </div>
                        </section>



                    </div>

                    <div class="col-lg-2 col-md-6">
                        <h5 class="text-white mb-3">Quick links</h5>
                        <ul class="list-unstyled text-muted">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Get started</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-3">Newsletter</h5>
                        <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do
                            eiusmod tempor incididunt.</p>
                        <form action="#">
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="Recipient's username"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-primary" id="button-addon2" type="button"><i
                                        class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <x-slot name="footer">
        {{-- <x-footer /> --}}
    </x-slot>

</x-app-layout>
