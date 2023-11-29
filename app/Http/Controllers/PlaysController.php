<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Nivel;
use App\Models\PreguntaTrivia;
use App\Models\ProgresoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlaysController extends Controller
{

    public function mostrarJuegos()
    {
        $juegos = Juego::all();
        return view('juegos.lista', ['juegos' => $juegos]);

    }

    public function mostrarNiveles($juegoId)
    {
        $usuario = Auth::user();
        $juego = Juego::findOrFail($juegoId);

        // Obtén todos los niveles del juego ordenados por número
        $todosLosNiveles = Nivel::where('juego_id', $juego->id)->orderBy('nivel')->get();

        // Obtén los niveles completados por el usuario
        $nivelesCompletados = ProgresoUsuario::where('user_id', $usuario->id)
            ->whereIn('nivel_id', $todosLosNiveles->pluck('id'))
            ->pluck('nivel_id')
            ->toArray();

        // Encuentra el último nivel completado
        $ultimoNivelCompletado = end($nivelesCompletados);

        // Encuentra el próximo nivel al último completado
        $siguienteNivel = Nivel::where('juego_id', $juego->id)
            ->where('nivel', '>', function ($query) use ($ultimoNivelCompletado) {
                $query->select('nivel')
                    ->from('niveles')
                    ->where('id', $ultimoNivelCompletado);
            })
            ->orderBy('nivel')
            ->first();


            $nivelAnterior = Nivel::where('juego_id', $juego->id)
            ->where('nivel', '<', function ($query) use ($ultimoNivelCompletado) {
                $query->select('nivel')
                ->from('niveles')
                ->where('id', $ultimoNivelCompletado);
            })
            ->orderBy('nivel')
            ->first();

            $todosCompletados = count($nivelesCompletados) === count($todosLosNiveles);


        return view('juegos.niveles', compact('juego', 'todosLosNiveles', 'nivelesCompletados', 'siguienteNivel', 'nivelAnterior'));
    }

public function mostrarResultado($nombreDelJuego, $resultado)
{
    return view('juegos.resultado', compact('nombreDelJuego','resultado'));

}

    public function jugarNivel($nivel)
    {

        $nivelId = (int)$nivel;



        // Obtén el modelo Nivel por su ID
        $nivels = Nivel::find($nivelId);

        // Verifica si el nivel existe
        if (!$nivel) {
            // Manejo de error, por ejemplo, redirigir a una página de error 404
            abort(404);
        }


        $pregunta = $this->obtenerPreguntaSegunNivel($nivel);

        $nivelCompletado = $this->verificarNivelCompletado($nivel);

        $nextLevel = $this->calcularSiguienteNivel($nivel);

        $prevLevel = $this->obtenerNivelAnterior($nivel);


        return view('juegos.nivel', compact('pregunta', 'nivel', 'nivels','nivelCompletado','nextLevel','prevLevel'))->with('audio', 1);
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

        $pregunta = $this->obtenerPreguntaSegunNivel($nivel);

        return redirect()->route('juegos.nivel', compact('nivel', 'pregunta'));
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

    private function verificarNivelCompletado($nivelId)
    {
        // Lógica para verificar si el nivel está completado, por ejemplo, consulta la base de datos
        $usuario = Auth::user();
        $nivel = Nivel::find($nivelId);

        // Verificar si el nivel existe antes de acceder a sus propiedades
        if ($nivel) {
            return ProgresoUsuario::where('user_id', $usuario->id)
                ->where('nivel_id', $nivel->id)
                ->exists();
        }

        // Si el nivel no existe, puedes considerar que no está completado
        return false;
    }


    private function calcularSiguienteNivel($nivelActual)
    {
        // Obtener el juego actual del nivel actual
        $nivel = Nivel::find($nivelActual);
        $juegoActual = $nivel->juego;

        // Encontrar el siguiente nivel para el mismo juego con un ID mayor al del nivel actual
        $siguienteNivel = Nivel::where('juego_id', $juegoActual->id)
            ->where('id', '>', $nivelActual)
            ->min('id');



        return $siguienteNivel;
    }


    private function obtenerNivelAnterior($nivelActual)
    {
        // Obtener el juego actual del nivel actual
        $nivel = Nivel::find($nivelActual);
        $juegoActual = $nivel->juego;

        // Encontrar el nivel anterior para el mismo juego con un ID menor al del nivel actual
        $nivelAnterior = Nivel::where('juego_id', $juegoActual->id)
            ->where('id', '<', $nivelActual)
            ->max('id');

        // Si no hay un nivel anterior, puedes manejarlo según tus necesidades


        return $nivelAnterior;
    }
}
