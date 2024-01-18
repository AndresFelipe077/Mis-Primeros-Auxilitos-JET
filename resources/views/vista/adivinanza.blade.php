<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adivinanza</title>
</head>
<body>
    <h1>Adivinanza</h1>
    <p>{{ $adivinanza }}</p>
    <form method="POST" action="{{ route('juego_adivinanza_procesar') }}">
        @csrf
        <label for="respuesta">Tu respuesta:</label>
        <input type="text" name="respuesta">
        <button type="submit">Comprobar</button>
    </form>
</body>
</html>
