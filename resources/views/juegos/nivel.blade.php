<!-- juegos.nivel.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/niveles.css') }}">
    <title>Nivel {{ $nivels->nivel }} de {{ $nivels->juego->nombre }}</title>
</head>
<style>

</style>

<body>

    <div class="fondo"></div>


    <h1>Nivel {{ $nivels->nivel }} de {{ $nivels->juego->nombre }}</h1>


    <!-- Formulario del nivel con estilos personalizados -->
    <form method="post" action="{{ route('juegos.procesar', ['nivel' => $nivel]) }}">
        @csrf

        <!-- Contenedor principal -->
        @if ($nivels->juego->nombre === 'Trivias')
            <div class="form-container {{ $nivels->juego->nombre }}">
                <p>{{ $pregunta->pregunta }}</p>
                <!-- Contenedor para el input y su label -->
                <div class="input-container">
                    <div class="mario"></div>
                    <label for="respuestaCorrecta">Respuesta:</label>
                    <input type="text" id="respuestaCorrecta" name="respuestaCorrecta"
                        placeholder="Escribe tu respuesta" required>
                </div>

                <!-- Contenedor para los botones -->
                <div class="button-container">
                    <button type="button" class="button" data-text="Awesome" onclick="enviarRespuesta()">
                        <span class="actual-text">&nbsp;Enviar Respuesta&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Enviar Respuesta&nbsp;</span>
                    </button>
                </div>



                @if ($nivelCompletado)
                    <div class="button-container">
                        <div class="prev-next">
                            @isset($prevLevel)
                                <!-- Redirige al nivel anterior -->
                                <button class="fadeIn" id="prevButton">Nivel anterior</button>
                                <script>
                                    document.getElementById('prevButton').addEventListener('click', function() {
                                        enviarRespuesta();
                                        location.href = '{{ route('juegos.nivel', ['nivel' => $prevLevel]) }}';
                                    });
                                    console.log({{$prevLevel}});
                                </script>
                            @endisset

                            @if(isset($nextLevel) && $nextLevel !== '')
                            <button class="fadeIn" id="nextButton">Siguiente nivel</button>
                            <script>
                                document.getElementById('nextButton').addEventListener('click', function() {
                                    enviarRespuesta();
                                    location.href = '{{ route('juegos.nivel', ['nivel' => $nextLevel]) }}';
                                });
                            </script>
                        @endif
                    </div>

                        <a class="fadeIn goBack" href='/juegos'>Volver a listado de juegos</a>
                    </div>
                @endif

            </div>
        @endif


        @if ($nivels->juego->nombre === 'Adivinanzas')
            <div class="game-container {{ $nivels->juego->nombre }}">


                <div class="pantalla-inicio" id="pantalla-inicio">



                    <p>{{ $nivels->nombre }}</p>
                    <button type="button" class="btn" onclick="comenzarJuego()">COMENZAR EL JUEGO</button><br>

                    <div id="mensaje-felicitaciones" style="display: none;">
                        ¡Felicidades! Has completado el nivel.
                    </div>

                </div>
                <div class="pantalla-juego" id="pantalla-juego">

                    <p class="pregunta">{{$pregunta->pregunta}}</p>

                    @php
                        // Define las opciones e imágenes por nivel
                        $datosPorNivel = [
                            1 => [
                                'opciones' => ['Chicle', 'Papel', 'Algodón'],
                                'imagen' => 'img/FPreguntas/cinta1.png',
                            ],
                            2 => [
                                'opciones' => ['Esponja', 'Pincel', 'Pañuelo'],
                                'imagen' => 'img/FPreguntas/jabon.png',
                            ],
                            3 => [
                                'opciones' => [' Darle agua', 'Ponerle una venda', 'Darle palmadas en la espalda'],
                                // 'imagen' => 'img/doct.png',
                            ],
                            4 => [
                                'opciones' => ['Darle un vaso de agua', 'Ponerle una venda', 'Pedirle que respire profundamente'],
                                // 'imagen' => 'img/doct.png',
                            ],
                            5 => [
                                'opciones' => ['Teléfono', 'Bolsa de hielo', 'Linterna'],
                                'imagen' => 'img/FPreguntas/respirador.png',
                            ],
                            6 => [
                                'opciones' => ['Peluche', 'Pegamento', 'Papel aluminio'],
                                'imagen' => 'img/FPreguntas/venda.png',
                            ],
                            // Agrega más niveles y sus opciones según sea necesario
                        ];

                        // Obtén los datos para el nivel actual
                        $datosNivel = $datosPorNivel[$nivels->nivel] ?? [];

                        // Obtén las opciones e imagen para el nivel actual
                        $opciones = $datosNivel['opciones'] ?? [];
                        $imagen = $datosNivel['imagen'] ?? '';
                        $opciones[] = $pregunta->respuestaCorrecta;
                        shuffle($opciones);
                    @endphp

                    <img src="{{ asset($imagen) }}" width="100" alt="" id="imgDoc">

                    <div class="opciones">
                        @foreach ($opciones as $key => $opcion)
                            <div class="opcion" data-value="{{ $opcion }}">
                                <div class="letra">{{ chr(65 + $key) }}</div>
                                <div class="nombre">{{ $opcion }}</div>
                            </div>
                        @endforeach
                    </div>


                    <button type="button" class="button" data-text="Awesome" onclick="enviarRespuesta()">
                        <span class="actual-text">&nbsp;Enviar Respuesta&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Enviar Respuesta&nbsp;</span>
                    </button>
                </div>

                <input type="hidden" name="respuestaCorrecta" id="respuestaCorrecta">


                @if ($nivelCompletado)
                <div class="button-container">
                    <div class="prev-next">
                    @isset($prevLevel)
                        <!-- Redirige al nivel anterior -->
                        <button class="fadeIn" id="prevButton">Nivel anterior</button>
                        <script>
                            document.getElementById('prevButton').addEventListener('click', function() {
                                enviarRespuesta();
                                location.href = '{{ route('juegos.nivel', ['nivel' => $prevLevel]) }}';
                            });
                            console.log({{$prevLevel}});
                        </script>
                    @endisset

                    @if(isset($nextLevel) && $nextLevel !== '')
                    <button class="fadeIn" id="nextButton">Siguiente nivel</button>
                    <script>
                        document.getElementById('nextButton').addEventListener('click', function() {
                            enviarRespuesta();
                            location.href = '{{ route('juegos.nivel', ['nivel' => $nextLevel]) }}';
                        });
                    </script>
                @endif
            </div>

                    <!-- Botón para volver a listado de juegos -->
                    <a class="fadeIn goBack" href='/juegos'>Volver a listado de juegos</a>
                </div>
            @endif




        @endif
        </div>
    </form>



    <script>

document.addEventListener('DOMContentLoaded', function () {
        // Obtener el parámetro 'audio' de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const audioParam = urlParams.get('audio');

        // Verificar si el parámetro 'audio' está presente y reproducir el audio
        if (audioParam === '1') {
            var audio = new Audio('{{ asset('music/congratulations1.mp3') }}');
            audio.play();
        }
    });


        let respuestaSeleccionada = null;

        document.querySelectorAll('.opcion').forEach(option => {
            option.addEventListener('click', () => {
                if (respuestaSeleccionada) {
                    respuestaSeleccionada.classList.remove('selected');
                    document.querySelector('.nombreAcertada').classList.remove('nombreAcertada');
                    document.querySelector('.letraAcertada').classList.remove('letraAcertada');
                }
                option.classList.add('selected');

                respuestaSeleccionada = option;

                const letraDiv = option.querySelector('.letra');
                if (letraDiv) {
                    letraDiv.classList.add('letraAcertada');
                }
                const nombreDiv = option.querySelector('.nombre');
                if (nombreDiv) {
                    nombreDiv.classList.add('nombreAcertada');
                }
                document.getElementById('respuestaCorrecta').value = option.dataset.value;

            });
        });




    function enviarRespuesta() {
        event.preventDefault();

        // Verificar si se ha seleccionado una respuesta y si es la correcta
        if (respuestaSeleccionada) {
            if (respuestaSeleccionada.dataset.value === "{{ $pregunta->respuestaCorrecta }}") {
                // La respuesta es correcta, puedes realizar acciones adicionales si es necesario
                console.log('Respuesta correcta');
                alert('Respuesta correcta');
                var audio = new Audio('{{ asset('music/congratulations1.mp3') }}');
                audio.play();
            } else {
                alert('Respuesta incorrecta');
            }
        }

        // Envía el formulario
        document.querySelector('form').submit();
        console.log('Formulario enviado');
    }

        let posActual = 0;
        let cantidadAcertadas = 0;

        function comenzarJuego() {

            document.getElementById("pantalla-inicio").style.display = "none";
            document.getElementById("pantalla-juego").style.display = "block";

        }
    </script>

</body>

</html>
