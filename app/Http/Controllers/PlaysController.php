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

    public function procesarRespuesta(Request $request, $nivelId)
    {
        $nivel = Nivel::find($nivelId);
        $juego = $nivel->juego;

        $nombreDelJuego = $juego->nombre;

        $respuesta = $request->input('respuestaCorrecta');
        $respuestaCorrecta = $this->obtenerRespuestaCorrectaSegunNivel($nivel);


        $resultado = ($respuesta === $respuestaCorrecta) ? 'Correcto' : 'Incorrecto';

        if ($resultado === 'Correcto') {
            $this->completarNivel($nivelId);
        }

        return redirect()->route('juegos.resultado', compact('nombreDelJuego', 'resultado'));
    }



    public function mostrarResultado($nombreDelJuego, $resultado)
    {
        return view('juegos.resultado', compact('nombreDelJuego','resultado'));

    }

    public function completarNivel($nivelId)
    {
        $usuario = Auth::user();
        $nivel = Nivel::find($nivelId);

        if ($nivel) {
            $nivelCompletado = ProgresoUsuario::where('user_id', $usuario->id)
                ->where('nivel_id', $nivel->id)
                ->exists();

            if (!$nivelCompletado) {
                $progreso = new ProgresoUsuario();
                $progreso->user_id = $usuario->id;
                $progreso->nivel_id = $nivel->id;
                $progreso->juego_id = $nivel->juego->id;
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

        $respuestaCorrecta = PreguntaTrivia::where('nivel_id', $nivel->id)->pluck('respuestaCorrecta')->first();

        return $respuestaCorrecta;

    }
}
