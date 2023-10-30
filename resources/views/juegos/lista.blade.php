<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Juegos y Niveles</title>
</head>
<body>

    <h1>Juegos y Niveles</h1>

    <ul>
        @foreach ($juegos as $juego )

        <li>
            Juego: {{$juego->nombre}}
        <ul>
            @foreach ($juego->niveles as $nivel)

                <li>
                    Nivel {{$nivel->numero}} - {{$nivel->nombre}}
                    @if ($nivel->completado)

                    (Completado)
                    @else
                    <a href="{{route('juegos.nivel', ['nivel' => $nivel->id])}}">Jugar</a>
                    @endif
                </li>
            @endforeach
        </ul>
        </li>
        @endforeach
    </ul>
</body>
</html>
