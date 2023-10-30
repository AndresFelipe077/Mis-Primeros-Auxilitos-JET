<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('juegos.guardar') }}" method="POST">
        @csrf
        <label for="nombre">Nombre del juego:</label>
        <input type="text" name="nombre" required>
        <label for="descripcion">Descripción del juego:</label>
        <textarea name="descripcion" required></textarea>
        <button type="submit">Registrar Juego</button>
    </form>

</body>
</html>
