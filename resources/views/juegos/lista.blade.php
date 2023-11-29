<link rel="stylesheet" href="{{ asset('css/games2.css') }}">
    <x-app-layout>
    <x-slot name="header">
        <x-header />
    </x-slot>


    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            margin: 10px;
            width: 200px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            cursor: pointer;
            overflow: hidden;
            position: relative;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Cambiado el color del sombreado en hover */
        }

        .card img {
            width: 100%;
            height: 150px; /* Ajusta la altura según tus necesidades */
            object-fit: cover;
        }

        .card a {
            display: block;
            padding: 15px;
            text-align: center;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }
    </style>

    <h1>Lista de Juegos</h1>
    <div class="cards-container">
        @foreach($juegos as $juego)
            <div class="card">
                <img src="{{ asset($juego->imagen) }}" alt="{{ $juego->nombre }}">
                <a href="{{ route('juegos.niveles', ['juego' => $juego->id]) }}">{{ $juego->nombre }}</a>
            </div>
        @endforeach
    </div>


    @foreach($juegos as $juego)

    <div class="cartita m-4 text-center">
        <div class=" cont card-body shadow ">
            <div class="h4">{{$juego->nombre}}</div>
            <div class="contenedor rounded">
                <a href="{{ route('juegos.niveles', ['juego' => $juego->id]) }}" class="btn mt-2">
                    <img class="imagen rounded img-fluid mx-auto d-block"
                        src="{{asset('storage/' . $juego->imagen)}}" alt="Image of trivia"
                        width="250px" height="250px">
                </a>
            </div>
            <br>
            <br>
        </div>
    </div>

    @endforeach


    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
