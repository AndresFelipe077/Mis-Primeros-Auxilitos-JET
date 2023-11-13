<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="{{ asset('css/JuegosPreguntas.css') }}" />
    <script src="{{ asset('js/JuegoPreguntas.js') }}"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Juegos</title>
</head>
<body>
    <div id="pantalla-inicial">
        <h1>Adivina la Respuesta</h1>
        <button class="btn-1" onclick="comenzarJuego()">COMENZAR A JUGAR</button>
    </div>
    
    <div class="imagenlogo" id="imagenlogo">
        <img src="{{ asset('img/logo/logo.png') }}">
    </div>

    <!-- Pantalla juego -->
    <div class="pantalla-juego" id="pantalla-juego">
        <h4>¿Esto es....?</h4>
      
        <img src="{{ asset('img/games/img-reto2.png') }}" alt="" id="imgBandera">

        <div class="opciones">
            <div class="opcion" id="op0" onclick="comprobarRespuesta(0)">
                <div class="letra" id="l0">A</div>
                <div class="nombre" id="n0">OPCION A</div>
            </div>
            <div class="opcion" id="op1" onclick="comprobarRespuesta(1)">
                <div class="letra" id="l1">B</div>
                <div class="nombre" id="n1">OPCION B</div>
            </div> 
            <div class="opcion" id="op2" onclick="comprobarRespuesta(2)">
                <div class="letra" id="l2">C</div>
                <div class="nombre" id="n2">OPCION C</div>
            </div>
        </div>
    </div>
    
    <!-- Pantalla final -->
    <div id="pantalla-final">
        <h2>CORRECTAS: <span id="numCorrectas">3</span></h2>
        <h2>INCORRECTAS: <span id="numIncorrectas">2</span></h2>
        <button class="btn" onclick="mostrarResultados()">Ver Resultados</button>
        <button class="btn" onclick="volverAlInicio()">VOLVER AL INICIO</button>
    </div>

    <!-- Resultados Modal -->
    <div id="resultadoModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeResultadoModal" onclick="cerrarResultados()">&times;</span>
            <h2>Resultados del juego</h2>
            <p>Correctas: <span id="numCorrectasResultado"></span></p>
            <p>Incorrectas: <span id="numIncorrectasResultado"></span></p>
        </div>
    </div>
    
</body>
</html>
