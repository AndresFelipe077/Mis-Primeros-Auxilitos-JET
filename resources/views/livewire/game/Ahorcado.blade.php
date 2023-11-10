
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

<div>
    <canvas class="ahorcado" id="canvas"></canvas>
    <div class="subText" id="usedLetters"></div>
</div>
<div class="wordEdit" id="wordContainer"></div>
<button id="startButton">START</button>

<img class="medicimg" src="{{ asset('img/games/medicoGames.png') }}">





<script src="{{ asset('js/Ahorcado.js') }}"></script>
<script src="{{ asset('js/Ahorcado2Worlds.js') }}"></script>

</body>
</html>