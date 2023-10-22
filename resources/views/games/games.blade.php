<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
@section('title', 'Juegos')
<x-app-layout>

    <x-slot name="header">
        <x-header />
    </x-slot>

    <div class="container">

        <div class="row">

            <div class="row mt-5 mx-auto text-center">
                <div class="col-sm-4">
                    <img class="mx-auto" src="{{ asset('img/icons/games.png') }}" alt="Games"/>
                </div>
                <div class="col-sm-4">
                    <h2>Juegos</h2>
                </div>
                <div class="col-sm-4">
                    <img class="mx-auto" src="{{ asset('img/icons/games.png') }}" alt="Games"/>
                </div>
            </div>

            <div class="col-sm-6 mb-5" data-aos="fade-right">
                <div class="card m-4 text-center">
                    <div class=" card-body shadow ">
                        <div class="h4">Preguntitas 5 - 7 años</div>
                        <div class="contenedor rounded">
                            <a href="{{ route('triviaShow5_7') }}" class="btn mt-2">
                                <img class="imagen rounded img-fluid mx-auto d-block"
                                    src="{{ asset('img/icons/trivia_icon.png') }}" alt="Image of trivia" width="250px"
                                    height="250px">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card m-4 text-center">
                  <div class=" card-body shadow ">
                      <div class="h4">Preguntitas 8 - 10 años</div>
                      <div class="contenedor rounded">
                          <a href="{{ route('triviaShow8_10') }}" class="btn mt-2">
                              <img class="imagen rounded img-fluid mx-auto d-block"
                                  src="{{ asset('img/icons/trivia_icon.png') }}" alt="Image of trivia" width="250px"
                                  height="250px">
                          </a>
                      </div>
                  </div>
              </div>


              <div class="card m-4 text-center">
                <div class=" card-body shadow ">
                    <div class="h4">Preguntitas 11 - 12 años</div>
                    <div class="contenedor rounded">
                        <a href="{{ route('triviaShow11_12') }}" class="btn mt-2">
                            <img class="imagen rounded img-fluid mx-auto d-block"
                                src="{{ asset('img/icons/trivia_icon.png') }}" alt="Image of trivia" width="250px"
                                height="250px">
                        </a>
                    </div>
                </div>
            </div>

            </div>

            <div class="col-sm-6 mb-5" data-aos="fade-left">
                <div class="card m-4 text-center">
                    <div class=" card-body shadow ">
                        <div class="h4">Adivinanzas 5 - 7 años</div>
                        <div class="contenedor rounded">
                            <a href="{{ route('adivinanzaShow') }}" class="btn mt-2">
                                <img class="imagen rounded img-fluid mx-auto d-block"
                                    src="{{ asset('img/icons/adivinanza_icon.png') }}" alt="Image of adivinanza"
                                    width="250px" height="250px">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card m-4 text-center">
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
              </div>

              @if (auth()->check() && auth()->user()->subscription && auth()->user()->subscription->subscription_status === 'aprobado')
              <!-- La condición se cumple -->
              <div class="card m-4 text-center">
                <div class=" card-body shadow ">
                    <div class="h4">Juego Advina la pareja</div>
                    <div class="contenedor rounded">
                        <a href="{{ url('juegos') }}" class="btn mt-2">
                            <img class="imagen rounded img-fluid mx-auto d-block"
                                src="{{ asset('img/icons/empearejar.jpg') }}" alt="Image of adivinanza"
                                width="250px" height="250px">
                        </a>
                    </div>
                </div>
            </div>
    
            <div class="card m-4 text-center">
                <div class=" card-body shadow ">
                    <div class="h4">Juegos Preguntas</div>
                    <div class="contenedor rounded">
                        <a href="{{ url('juegos2') }}" class="btn mt-2">
                            <img class="imagen rounded img-fluid mx-auto d-block"
                                src="{{ asset('img/icons/1000x1000.jpg') }}" alt="Image of trivia" width="250px"
                                height="250px">
                        </a>
                    </div>
                </div>
            </div>
           
          @else
       

        
          @endif

           




            </div>
        </div>
    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
