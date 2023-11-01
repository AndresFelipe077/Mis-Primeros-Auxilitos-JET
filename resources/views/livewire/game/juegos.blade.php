<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/juegosAdivina.css') }}">
    <title>Retos y Juegos</title>
</head>
<body>
    <h1>ADIVINA</h1>
    <div class="app" id="app"></div>
    <button class="btn-game" id="btn">Jugar De Nuevo</button>

    <div class="modal" id="myModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <p>¡Felicidades, has ganado!</p>
        </div>
    </div>

    <script src="{{ asset('js/JuegoAdivina.js') }}"></script>
</body>
</html>
