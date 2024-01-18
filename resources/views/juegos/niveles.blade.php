<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/mapaNiveles.css') }}">
    <title>Niveles de Juego</title>
</head>

<body>

    @php
        $ultimoNivelCompletado = end($nivelesCompletados);
    @endphp
    <div class="fondo">
        <img src="{{ asset('img/mapaDeJuego/mapaDeJuego6.png') }}" width="100%" height="100%" alt="">
    </div>


    <div class="back">
        <a href="/juegos">
            <img src="{{ asset('img/icons/regresar2.png') }}" width="100" alt="">
        </a>
    </div>
    <ul class="level-list">
        @foreach ($todosLosNiveles as $nivel)
            <li class="level-item">
                @if (in_array($nivel->id, $nivelesCompletados))
                    <a href="{{ route('juegos.nivel', ['nivel' => $nivel->id]) }}" class="level-link completed">
                        <div class="level-number completed">{{ $nivel->nivel }}</div>
                        <div class="level-status">
                            {{ in_array($nivel->id, $nivelesCompletados) ? 'Completado' : 'Pendiente' }}</div>
                        @if ($nivel->id == $ultimoNivelCompletado)
                            <img src="{{ asset('img/doct.png') }}" alt="Muñequito" class="muñequito"
                                style="top: {{ $nivel->top }}; left: {{ $nivel->left }};">
                        @endif
                    </a>
                @else
                    <a href="{{ route('juegos.nivel', ['nivel' => $nivel->id]) }}"
                        onclick="return verificarCompletado({{ json_encode($nivelesCompletados) }}, {{ $nivel->id }})"
                        class="level-link">
                        <div class="level-number">{{ $nivel->nivel }}</div>
                        <div class="level-status">
                            {{ in_array($nivel->id, $nivelesCompletados) ? 'Completado' : 'Pendiente' }}</div>
                    </a>
                @endif

            </li>
        @endforeach
    </ul>

    @if (count($nivelesCompletados) === count($todosLosNiveles))
        <div class="completion-notice">
            ¡Felicidades! Has completado todos los niveles del juego.
        </div>
    @endif

</body>

</html>
