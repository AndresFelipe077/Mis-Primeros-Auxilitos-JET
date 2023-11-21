<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Juegos y Niveles</title>
</head>
<body>

    {{-- <h1>Juegos y Niveles</h1>

    <ul>
        @foreach ($juegos as $juego )

        <li>
            Juego: {{$juego->nombre}}
        <ul>
            @foreach ($juego->niveles as $nivel)

                <li>
                    Nivel {{$nivel->numero}} - {{$nivel->nombre}}
                    @if ($nivel->completado)

                    (Completado)
                    @else
                    <a href="{{route('juegos.nivel', ['nivel' => $nivel->id])}}">Jugar</a>
                    @endif
                </li>
            @endforeach
        </ul>
        </li>
        @endforeach
    </ul> --}}
    <div class="container">
        <h1>Selecciona un Juego</h1>
        <div class="juegos">
            @foreach($juegos as $juego)
                <div class="juego-container">
                    <div class="juego" data-juego="{{ $juego->id }}" onclick="toggleNiveles(this)">
                        {{ $juego->nombre }}
                    </div>
                    <div class="conector"></div>
                    <div class="niveles" data-juego="{{ $juego->id }}">
                        @foreach($juego->niveles as $index => $nivel)
                            <a href="{{ route('juegos.nivel', ['nivel' => $nivel->id]) }}">
                                <div class="nivel" data-nivel="{{ $nivel->id }}">
                                    <!-- Línea adicional entre elementos "a" -->
                                    <hr>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
   .container {
            position: relative;
        }

        .juegos {
            width: 10rem;
        }

        .juego-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            position: relative;
        }

        .juego {
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
            width: 5rem;
        }

        .conector {
            transform: translateY(-50%);
            border: none;
            width: 0;
            height: 2px; /* Grosor de la línea */
            background-color: #000;
            transition: width 0.3s ease-in-out;
            z-index: -1;
            position: absolute;
            top: 40%;
            left: 0; /* Cambiado de 'left: 100%' a 'left: 0' para iniciar desde el div juego */
        }

        .niveles {
            display: flex;
            gap: 20px;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            position: absolute;
            left: 100%; /* Posición a la derecha del div juego */
            top: 40%; /* Ajuste para alinear niveles con el juego superior */
            transform: translateY(-50%); /* Ajuste para centrar los niveles */
            z-index: 1; /* Colocar niveles encima de las líneas */
        }

        .nivel {
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            background-color: #c60808;
            position: relative; /* Agregado para posicionar el hr dentro del nivel */
        }

        .nivel hr {
            left: 100%;
            border: none;
            height: 2px; /* Grosor de la línea */
            background-color: #000;
            width: 0; /* Inicialmente la línea tiene ancho cero */
            transition: width 0.3s ease-in-out;
            position: absolute;
            bottom: 10px; /* Posicionar la línea en la parte inferior del nivel */
        }

        .niveles.visible .nivel hr {
            width: 100%;
        }

        .niveles.visible a:last-child .nivel hr {
            width: 0;
        }

        .niveles.visible a {
            pointer-events: auto;
        }

        .niveles.visible {
            opacity: 1;
        }
    </style>

    <script>
 function toggleNiveles(elementoJuego) {
            var contenedorJuego = elementoJuego.parentNode;
            var conector = contenedorJuego.querySelector('.conector');
            var niveles = contenedorJuego.querySelector('.niveles');

            // Alternar visibilidad de los niveles
            niveles.classList.toggle('visible');

            // Mostrar/ocultar niveles con animación de opacidad
            niveles.style.opacity = niveles.classList.contains('visible') ? 1 : 0;

            // Ajustar la anchura del conector
            conector.style.width = niveles.classList.contains('visible') ? '100%' : '0';
        }
    </script>
</body>
</html>
