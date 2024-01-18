<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('css/games2.css') }}">
@section('title', 'Juegos')
<x-app-layout>

    <x-slot name="header">
        <x-header />
    </x-slot>
    <div class="header2">
        <div class="container">
            <div class="row">
                <div class="row mt-5 mx-auto text-center">
                    <div class="col-sm-4">
                        <img class="mx-auto" src="{{ asset('img/icons/games.png') }}" alt="Games" />
                    </div>
                    <div class="col-sm-4">
                        <h2>Juegos</h2>
                    </div>
                    <div class="col-sm-4">
                        <img class="mx-auto" src="{{ asset('img/icons/games.png') }}" alt="Games" />
                    </div>
                </div>


                <div class="col-sm-6 mb-5" data-aos="fade-right">
                    <div class="card1 m-4 text-center">
                        <div class=" card-body shadow ">

                            <div class="circles">
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                            </div> <br>
                            <br>

                            <div class="cartita m-4 text-center">
                                <div class="  cont card-body shadow ">
                                    <div class="h4">Juego Adivina la pareja</div>
                                    <div class="contenedor rounded">
                                        <a href="{{ url('juegos3') }}" class="btn mt-2">
                                            <img class="imagen rounded img-fluid mx-auto d-block"
                                                src="{{ asset('img/icons/empearejar.jpg') }}" alt="Image of adivinanza"
                                                width="250px" height="250px">
                                        </a>
                                    </div>
                                    <br>
                                    <br>
                                </div>

                            </div>

                        </div>

                        <div class="line"></div>
                    </div>


                    <div class="card1 m-4 text-center">
                        <div class=" card-body shadow ">

                        <div class="circles">
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                            </div> <br>
                            <br>
                            <div class="cartita m-4 text-center">
                                <div class="cont card-body shadow ">
                                    <div class="h4">Ahorcado</div>
                                    <div class="contenedor rounded">
                                        <a href="{{ url('ahorcado') }}" class="btn mt-2">
                                            <img class="imagen rounded img-fluid mx-auto d-block"
                                                src="{{ asset('img/games/ahorcado.png') }}" alt="Image of trivia"
                                                width="250px" height="250px">
                                        </a>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>

                        </div>
                        <div class="line"></div>
                    </div>



                    {{-- <div class="card1 m-4 text-center">
                        <div class=" card-body shadow ">
                        <div class="circles">
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                            </div> <br>
                            <br>

                            <div class="h4">Preguntitas 11 - 12 años</div>
                            <div class="contenedor rounded">
                                <a href="{{ route('triviaShow11_12') }}" class="btn mt-2">
                                    <img class="imagen rounded img-fluid mx-auto d-block"
                                        src="{{ asset('img/icons/trivia_icon.png') }}" alt="Image of trivia"
                                        width="250px" height="250px">
                                </a>
                            </div>
                        </div>
                        <div class="line"></div>
                    </div> --}}






                </div>

                <div class="col-sm-6 mb-5" data-aos="fade-left">
                    <div class="card1 m-4 text-center">
                        <div class=" card-body shadow ">
                        <div class="circles">
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                            </div> <br>
                            <br>
                            <div class="cartita m-4 text-center  ">
                                <div class="cont card-body shadow ">
                                    <div class="h4">Juegos Preguntas</div>
                                    <div class="contenedor rounded">
                                        <a href="{{ url('juegos2') }}" class="btn mt-2">
                                            <img class="imagen rounded img-fluid mx-auto d-block"
                                                src="{{ asset('img/icons/1000x1000.jpg') }}" alt="Image of trivia"
                                                width="250px" height="250px">
                                        </a>

                                    </div>
                                    <br>
                                    <br>
                                </div>

                            </div>
                        </div>
                        <div class="line"></div>
                    </div>


                    @if (auth()->check() && auth()->user()->subscription && auth()->user()->subscription->subscription_status === 'aprobado')
                        <div class="card1 m-4 text-center">
                            <div class=" card-body shadow ">
                            <div class="circles">
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                                <div class="half-circle1"></div>
                                <div class="half-circle2"></div>
                                <div class="half-circle3"></div>
                            </div> <br>
                            <br>
                                <div class="cartita m-4 text-center">
                                    <div class=" cont card-body shadow ">
                                        <div class="h4">Dibujar - adivina</div>
                                        <div class="contenedor rounded">
                                            <a href="{{ url('adivina') }}" class="btn mt-2">
                                                <img class="imagen rounded img-fluid mx-auto d-block"
                                                    src="{{ asset('img/games/dibujar.png') }}" alt="Image of trivia"
                                                    width="250px" height="250px">
                                            </a>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                        </div>
                    @endif



                    {{-- <div class="card m-4 text-center">
                        <div class=" card-body shadow ">
                            <div class="h4">Adivinanzas 8 - 12 años</div>
                            <div class="contenedor rounded">
                                <a href="{{ route('adivinanzaShow') }}" class="btn mt-2">
                                    <img class="imagen rounded img-fluid mx-auto d-block"
                                        src="{{ asset('img/icons/adivinanza_icon.png') }}" alt="Image of adivinanza"
                                        width="250px" height="250px">
                                </a>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
