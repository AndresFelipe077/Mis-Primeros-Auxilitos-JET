<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class QuizResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(QuizResult $quizResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuizResult $quizResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuizResult $quizResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuizResult $quizResult)
    {
        //
    }

    public function submitQuiz(Request $request, Quiz $quiz)
    {
        $userAnswers = $request->input('answers');
        $totalScore = 0;

        // Calcular el puntaje total y otras operaciones necesarias

        // Guardar las respuestas y el puntaje en la tabla quiz_results
        $quizResult = new QuizResult();
        $quizResult->user_id = Auth::user()->id; // Si tienes autenticación de usuarios
        $quizResult->quiz_id = $quiz->id;
        $quizResult->score = $totalScore;
        $quizResult->save();

        // Otras operaciones necesarias

        return redirect()->route('quiz.result', $quiz)->with('success', 'Quiz submitted successfully. Your score: ' . $totalScore);
    }


    public function mostrarResultado()
    {
        $userId = Auth::id(); // Obtiene el ID del usuario actual autenticado

        // Obtén el resultado de quiz correspondiente al usuario actual
        $quizResult = QuizResult::where('user_id', $userId)->first();

        if ($quizResult) {
            $score = $quizResult->score;
            // $questions = $quizResult->quiz->questions;, 'questions'

            return view('livewire.game.responder_quiz.vista_resultado', compact('score'));
        } else {
            return redirect()->back()->with('error', 'No se encontró un resultado de quiz.');
        }
    }

}
