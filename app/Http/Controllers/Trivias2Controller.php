<?php
namespace App\Http\Controllers;

use App\Models\PreguntaTrivia;
use Illuminate\Http\Request;
use App\Models\Nivel;
use Illuminate\Support\Facades\Auth;

class Trivias2Controller extends Controller
{
    public function mostrarPregunta($nivel,Request $request)
{
    // Lógica para obtener una pregunta aleatoria del nivel
    $pregunta = PreguntaTrivia::where('nivel_id', $nivel)
        ->inRandomOrder()
        ->first();
    $respuestaCorrecta =$request->input('respuestaCorrecta');

    return view('vista.jugar_trivia', [
        'pregunta' => $pregunta,
        'respuestaCorrecta' => $respuestaCorrecta,
        'nivel' => $nivel,  // Asegúrate de que $nivel sea un objeto
    ]);
}

public function procesarRespuesta(Request $request)
{
    $respuesta = $request->input('respuestaCorrecta');
    $nivel = (int)$request->input('nivel');
    $pregunta = PreguntaTrivia::where('nivel_id', $nivel)
        ->where('respuestaCorrecta', $respuesta)
        ->first();

    if ($pregunta) {
        // Respuesta correcta
        // Llama al método completarNivel en JuegoController
        app(\App\Http\Controllers\JuegoController::class)->completarNivel($nivel);

    } else {
        // Respuesta incorrecta
        $resultado = 'Incorrecto';
    }

    return redirect()->route('jugar_trivia', ['nivel' => $nivel]);
}

    // Otras funciones específicas de Trivias2

    public function jugarNivel($nivel)
    {
        $usuario = Auth::user();

        // Implementa la lógica para determinar el nivel actual y cargar la vista correspondiente
        $pregunta = $this->obtenerPreguntaSegunNivel($nivel);
        $respuestaCorrecta = $this->obtenerRespuestaCorrectaSegunNivel($nivel);

        if ($pregunta) {
            return view('vista.jugar_trivia', compact('pregunta', 'respuestaCorrecta', 'nivel'));
        } else {
            // Maneja el caso en el que no se encuentra el nivel
            // Puedes redirigir o mostrar un mensaje de error
        }
    }


    private function obtenerPreguntaSegunNivel($nivel)
    {
        // Implementa la lógica para obtener la pregunta según el nivel.
        // Supongamos que tienes una tabla 'preguntas_trivias' con las preguntas y un campo 'nivel_id'.

        $pregunta = PreguntaTrivia::where('nivel_id', $nivel)
            ->inRandomOrder()
            ->first();

        return $pregunta;
    }

    private function obtenerRespuestaCorrectaSegunNivel($nivel)
    {
        // Implementa la lógica para obtener la respuesta correcta según el nivel.
        // Supongamos que tienes una tabla 'preguntas_trivias' con las respuestas correctas.

        $respuestaCorrecta = PreguntaTrivia::where('nivel_id', $nivel)
            ->inRandomOrder()
            ->value('respuesta_correcta');

        return $respuestaCorrecta;
    }
}
