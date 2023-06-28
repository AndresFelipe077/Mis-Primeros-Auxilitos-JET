<?php

namespace App\Http\Controllers;

use App\Models\Preguntita;
use Illuminate\Http\Request;

class PreguntitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntitas = Preguntita::all();
        return view('livewire.game.preguntas.preguntas8_10.preguntas-show8_10', compact('preguntitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'respuestas' => 'required|array',
        ]);
    
        foreach ($request->respuestas as $pregunta_id => $respuesta) {
            $pregunta = Pregunta::find($pregunta_id);
    
            $respuesta = new Respuesta;
            $respuesta->pregunta_id = $pregunta_id;
            $respuesta->texto = $request->respuestas[$pregunta_id];
            $respuesta->save();
        }

        return $quiz;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Preguntita $quiz)
    {
        //return view('quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preguntita $quiz)
    {
        // $quiz->pregunta = $request->pregunta;
        // $quiz->respuesta1 = $request->respuesta1;
        // $quiz->respuesta2 = $request->respuesta2;
        // $quiz->respuesta3 = $request->respuesta3;
        // $quiz->respuesta_correcta = $request->respuesta_correcta;
        // $quiz->save();

        // return redirect()->route('quizzes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preguntita $quiz)
    {
        // $quiz->delete();

        // return redirect()->route('quizzes.index');
    }
}
