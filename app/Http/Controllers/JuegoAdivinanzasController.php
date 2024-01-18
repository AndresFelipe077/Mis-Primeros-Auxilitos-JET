<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegoAdivinanzaController extends Controller
{
    public function mostrarAdivinanza()
    {
        // Lógica para obtener y mostrar una adivinanza
        $adivinanza = '¿Qué es alto como un árbol, pero no es un bosque?';
        $respuestaCorrecta = 'Un girasol';

        return view('vista.adivinanza', compact('adivinanza', 'respuestaCorrecta'));
    }

    public function procesarRespuesta(Request $request)
    {
        // Lógica para procesar la respuesta del usuario
        $respuesta = $request->input('respuesta');
        $respuestaCorrecta = 'Un girasol';

        // Realiza la lógica de verificación de la respuesta
        $resultado = ($respuesta == $respuestaCorrecta) ? 'Correcto' : 'Incorrecto';

        return redirect()->route('juego_resultado', ['juego' => 'Adivinanza', 'resultado' => $resultado]);
    }
}
