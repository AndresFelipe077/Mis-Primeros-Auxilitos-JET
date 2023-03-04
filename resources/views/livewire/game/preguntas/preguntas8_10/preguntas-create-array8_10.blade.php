<link id="image-head" rel="shortcut icon" href="{{ asset('img/imgs/logo.png') }}" type="image/x-icon">
<x-app-layout>

    @section('title', 'Preguntitas 8 - 10')

    <x-slot name="header">
        <x-header />
    </x-slot>

    {{-- <script src="{{ asset('js/show-preguntas.js') }}"></script> --}}

    <div class="container text-center" id="container-padre">
        <h1>Edad 8 - 10</h1>
        <div class="alert alert-warning text-center" role="alert">
            Recuerda que no puedes saturar a los niños con muchas preguntas
        </div>

        <form action="{{ route('storePreguntas8_10') }}" method="post" enctype="multipart/form-data">
            @csrf

            <p>Aqui van las preguntas y respuestas</p>
        
        </form>


        <a class="btn btn-success" href="{{ route('game.preguntas8_10') }}"> Crear pregunta </a>
        <br>
        <button class="btn btn-outline-success m-3">Subir todas las pregutas</button>

    </div>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
