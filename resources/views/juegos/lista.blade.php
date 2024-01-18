<link rel="stylesheet" href="{{ asset('css/games2.css') }}">
    <x-app-layout>
    <x-slot name="header">
        <x-header />
    </x-slot>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;700&display=swap');
        .container {
            margin-top: 2rem;
            font-family: 'DynaPuff', cursive;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
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
            width: 20rem;
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
            border: 1px solid #0000;
            width: 100%;
            height: 80%; /* Ajusta la altura según tus necesidades */
            object-fit: cover;
            background-size: cover;
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
<div class="container">

    <h1>Lista de Juegos</h1>
    <div class="cards-container">
        @foreach($juegos as $juego)
          <a href="{{ route('juegos.niveles', ['juego' => $juego->id]) }}">
            <div class="card">
                <img src="{{ asset('storage/' . $juego->imagen) }}" alt="{{ $juego->nombre }}">
                <a href="{{ route('juegos.niveles', ['juego' => $juego->id]) }}">{{ $juego->nombre }}</a>
            </div>
          </a>
        @endforeach
    </div>
</div>



    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-app-layout>
