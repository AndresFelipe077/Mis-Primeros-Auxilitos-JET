<link id="image-head" rel="shortcut icon" href="{{ asset('img/menu/challengue2.png') }}" type="image/x-icon">
@section('title', 'Games')
<x-app-layout>

    <x-slot name="header">
        <x-header />
    </x-slot>

    <div class="container">

        <div class="row">
            <div class="col-sm-6 mt-5">
                <div class="card m-4 text-center">
                    <div class=" card-body shadow ">
                        <div class="contenedor rounded">
                            <img class="imagen rounded img-fluid mx-auto d-block" src="{{asset('img/icons/trivia_icon.png')}}" alt="Image of mision"
                                width="250px" height="250px">
                        </div>
                        <a href="{{route('dashboard.trivia')}}" class="btn btn-primary mt-2">Trivias</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mt-5">
                <div class="card m-4 text-center">
                    <div class=" card-body shadow ">
                        <div class="contenedor rounded">
                            <img class="imagen rounded img-fluid mx-auto d-block" src="{{asset('img/icons/adivinanza_icon.png')}}" alt="Image of vision"
                                width="250px" height="250px">
                        </div>
                        <a href="#" class="btn btn-primary mt-2">Adivinanza</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
