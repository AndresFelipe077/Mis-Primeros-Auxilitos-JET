<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado del Juego</h1>
    <p>Juego: {{ $juego }}</p>
    <p>Resultado: {{ $resultado }}</p>
    <a href="{{ route('mostrar_juegos_niveles') }}">Volver a la lista de juegos y niveles</a>
</body>
</html>
