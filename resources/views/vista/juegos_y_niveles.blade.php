<!DOCTYPE html>
<html>
<head>
    <title>Juegos y Niveles</title>
</head>
<body>
    <h1>Juegos y Niveles Disponibles</h1>

    <ul>
        @foreach ($juegos as $juego)
            <li>
                <strong>{{ $juego->nombre }}</strong>
                <ul>
                    @if (isset($nivelesDisponibles[$juego->id]))
                        @foreach ($nivelesDisponibles[$juego->id] as $nivel)
                            <li>
                                Nivel {{ $nivel }}
                                @if ($usuarioPuedeJugarNivel)
                                <!-- Debes implementar esta verificación -->
                                    <a href="{{ route('jugar_nivel', ['nivel' => $nivel]) }}">Jugar</a>
                                @else
                                    <!-- Puedes mostrar un mensaje de que el usuario no puede jugar este nivel -->
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
        @endforeach
    </ul>
</body>
</html>
