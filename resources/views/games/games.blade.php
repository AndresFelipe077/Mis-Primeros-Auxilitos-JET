<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
@section('title', 'Juegos')
<x-app-layout>

    <x-slot name="header">
        <x-header />
    </x-slot>

    <div class="container animate__animated animate__fadeInUp">

        <div class="row">
            <div class="col-sm-6 mt-5">
                <div class="card m-4 text-center">
                    <div class=" card-body shadow ">
                        <div class="h4">Trivias</div>
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

            <div class="col-sm-6 mt-5">
                <div class="card m-4 text-center">
                    <div class=" card-body shadow ">
                        <div class="h4">Adivinanzas</div>
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
