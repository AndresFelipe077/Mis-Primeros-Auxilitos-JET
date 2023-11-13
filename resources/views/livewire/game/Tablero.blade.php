<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/tablero.css') }}">

    <title>Tablero</title>
</head>


<body>
<a class="img-home" href="{{ url('') }}" >
    <img src="{{ asset('/img/icons/games.png') }}">
    </a>



<input class="colors" type="color" id="color-picker" value="#000000">COLORES</input>
<button class="rnc" id="reset-button">Reiniciar Dibujo</button>



    <main class="main-container">
        <canvas id="main-canvas" width="900" height="900"></canvas>
    </main>
    <script src="{{ asset('js/tablero.js') }}"></script>

</body>
</html>