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
                            <a href="{{ route('triviaShow') }}" class="btn mt-2">
                                <img class="imagen rounded img-fluid mx-auto d-block"
                                    src="{{ asset('img/icons/trivia_icon.png') }}" alt="Image of trivia" width="250px"
                                    height="250px">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card m-4 text-center">
                  <div class=" card-body shadow ">
                      <div class="h4">Preguntitas 8 - 12 años</div>
                      <div class="contenedor rounded">
                          <a href="{{ route('triviaShow') }}" class="btn mt-2">
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
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
