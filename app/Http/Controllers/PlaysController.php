<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Nivel;
use App\Models\PreguntaTrivia;
use App\Models\ProgresoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaysController extends Controller
{

    public function mostrarJuegos()
    {
        $juegos = Juego::all();
        return view('juegos.lista', ['juegos' => $juegos]);

    }

    public function jugarNivel($nivel)
    {
        $pregunta = $this->obtenerPreguntaSegunNivel($nivel);

        return view('juegos.nivel', compact('pregunta', 'nivel'));
    }

    public function procesarRespuesta(Request $request, $nivel)
    {

        $nivel = Nivel::find($nivel);
        $juego = $nivel->juego;

        $nombreDelJuego = $juego->nombre;

        $respuesta = (int)$request->input('respuestaCorrecta');

        $respuestaCorrecta = $this->obtenerRespuestaCorrectaSegunNivel($nivel);
        $pregunta = $this->obtenerPreguntaSegunNivel($nivel);

        if ($respuesta === $respuestaCorrecta) {
            $resultado = 'Correcto';

            $this->completarNivel($nivel);
            return redirect()->route('juegos.resultado', compact('nombreDelJuego','resultado'));
        } else {
            $resultado = 'Incorrecto';
            return redirect()->route('juegos.nivel', compact('pregunta','nivel'));
        }

        // $resultado = ($respuesta == $respuestaCorrecta) ? 'Correcto' : 'Incorrecto';




    }

    public function mostrarResultado($nombreDelJuego, $resultado)
    {
        return view('juegos.resultado', compact('nombreDelJuego','resultado'));

    }

    public function completarNivel(Nivel $nivel)
    {
        $usuario = Auth::user();

        if ($nivel) {
            $nivelCompletado = ProgresoUsuario::where('user_id', $usuario->id)
                ->where('nivel_id', $nivel->id)
                ->exists();

            if (!$nivelCompletado) {
                $progreso = new ProgresoUsuario();
                $progreso->user_id = $usuario->id;
                $progreso->nivel_id = $nivel->id;

                 $juegoId = $nivel->juego->id;

                $progreso->juego_id = $juegoId;
                $progreso->save();
            }
        }
    }

    private function obtenerPreguntaSegunNivel($nivel)
    {

        $pregunta = PreguntaTrivia::where('nivel_id', $nivel)->inRandomOrder()->first();

        return $pregunta;

    }

    private function obtenerRespuestaCorrectaSegunNivel($nivel)
    {

        $respuestaCorrecta = PreguntaTrivia::where('nivel_id', $nivel)->pluck('respuestaCorrecta')->first();

        return $respuestaCorrecta;

    }
}
