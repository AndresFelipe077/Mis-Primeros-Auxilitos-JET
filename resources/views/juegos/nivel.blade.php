<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nivel</title>
</head>
<body>

    <h1>Nivel: {{$nivel}}</h1>

    <h1>Pregunta: {{$pregunta->pregunta}}</h1>

    <form action="{{route('juegos.nivel.procesar', ['nivel'=> $nivel])}}" method="POST">
    @csrf
    <label for="respuestaCorrecta">Respuesta</label>
    <input type="text" name="respuestaCorrecta" id="respuestaCorrecta">
    <button type="submit">Enviar respuesta</button>
    </form>

</body>
</html>
