<!DOCTYPE html>
<html>
<head>
    <title>Trivia</title>
</head>
<body>
    <h1>Trivia</h1>
    <h2>Pregunta</h2>
    <p>{{ $pregunta->pregunta }}</p>
    <form action="{{ route('procesar_respuesta_trivia') }}" method="post">
        @csrf
        <input type="hidden" name="nivel" value="{{ $nivel }}">
        <label for="respuestaCorrecta">Respuesta:</label>
        <input type="text" name="respuestaCorrecta" id="respuestaCorrecta">
        <button type="submit">Enviar respuesta</button>
    </form>

    <a href="{{ route('jugar_nivel', ['nivel' => 2]) }}">Avanzar al Nivel 2</a>
</body>
</html>
