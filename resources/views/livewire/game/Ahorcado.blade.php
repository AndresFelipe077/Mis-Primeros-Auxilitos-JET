
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Adivina M-P-A</title>
    <link rel="stylesheet" href="{{ asset('css/Ahorcado.css') }}">
</head>
<body>


    <h1 class="title">Adivina la Palabra con "Mis Primeros Auxilitos"</h1>



    <a class="img-home" href="{{ url('dashboard/games') }}" >
    <img src="{{ asset('/img/icons/games.png') }}">
    </a>



<div>
    <canvas class="ahorcado" id="canvas"></canvas>
    <div class="subText" id="usedLetters"></div>
</div>
<div class="wordEdit" id="wordContainer"></div>
<button id="startButton">START</button>

<br>
<div class="slider-container">
  <div class="slides">
    <div class="slide"><img src="{{ asset('/img/games/Ahorcado-1.png') }}" alt="" width="300px" height="300px"></div>
    <div class="slide"><img src="{{ asset('/img/games/Ahorcado-2.png') }}" alt="" width="300px" height="300px"></div>
    <div class="slide"><img src="{{ asset('/img/games/Ahorcado-3.png') }}" alt="" width="300px" height="300px"></div>
    <div class="slide"><img src="{{ asset('/img/games/Ahorcado-4.png') }}" alt="" width="300px" height="300px"></div>
    <div class="slide"><img src="{{ asset('/img/games/Ahorcado-5.png') }}" alt="" width="300px" height="300px"></div>
    <div class="slide"><img src="{{ asset('/img/games/Ahorcado-6.png') }}" alt="" width="300px" height="300px"></div>
    <div class="slide"><img src="{{ asset('/img/games/Ahorcado-7.png') }}" alt="" width="300px" height="300px"></div>
    <div class="slide"><img src="{{ asset('/img/games/Ahorcado-8.png') }}" alt="" width="300px" height="300px"></div>
    <div class="slide"><img src="{{ asset('/img/games/Ahorcado-9.png') }}" alt="" width="300px" height="300px"></div>


    <!-- Agrega más slides según sea necesario -->
  </div>

  <div class="slider-nav">
    <button onclick="prevSlide()">&#8249;</button>
    <button onclick="nextSlide()">&#8250;</button>
  </div>
</div>


<script src="{{ asset('js/SliderAhorcado.js') }}"></script>
<script src="{{ asset('js/Ahorcado.js') }}"></script>
<script src="{{ asset('js/Ahorcado2Worlds.js') }}"></script>



</body>
</html>