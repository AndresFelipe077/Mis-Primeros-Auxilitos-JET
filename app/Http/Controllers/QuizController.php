<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('livewire.game.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('livewire.game.quizzes.create');
    }

    public function store(Request $request)
    {
        $quiz = new Quiz;
        $quiz->title       = $request->input('title');
        $quiz->description = $request->input('description');
        $quiz->user_id     = Auth::user()->id;
        $quiz->save();
        return redirect()->route('quiz.index')->with('success', 'Quiz created successfully.');
    }

    public function show(Quiz $quiz)
    {
        // Obtén las preguntas relacionadas con el quiz
        $questions = $quiz->questions;

        // Retornar la vista con el quiz y las preguntas
        return view('livewire.game.quizzes.show', compact('quiz', 'questions'));
    }

    public function edit(Quiz $quiz)
    {
        return view('livewire.game.quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $quiz->title = $request->input('title');
        $quiz->description = $request->input('description');
        $quiz->update();
        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quizResults = $quiz->quizResults; // Obtén los registros relacionados en quiz_results

        foreach ($quizResults as $quizResult) {
            $quizResult->quiz_id = null; // Establece el campo quiz_id en NULL en lugar de eliminar el registro
            $quizResult->save();
        }

        $quiz->delete(); // Elimina el quiz deseado

        return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully.');
    }




    public function showQuiz(Quiz $quiz)
    {
        return view('livewire.game.responder_quiz.quiz_responder', compact('quiz'));
    }


    public function submit(Request $request, Quiz $quiz)
    {
        // Validar las respuestas del usuario y calcular la puntuación
        $userAnswers = $request->input('answers');
        $questions = $quiz->questions;
        $score = 0;

        foreach ($questions as $question) {
            $userAnswer = $userAnswers[$question->id] ?? null;
            $correctAnswer = $question->answers()->where('is_correct', true)->value('id');

            if ($userAnswer == $correctAnswer) {
                $score++;
            }
        }

        // Obtener el resultado existente del usuario para este cuestionario
        $quizResult = QuizResult::where('quiz_id', $quiz->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($quizResult) {
            // Si el resultado existe, actualizarlo
            $quizResult->score = $score;
            $quizResult->save();
        } else {
            // Si no existe, crear un nuevo resultado
            $quizResult = new QuizResult();
            $quizResult->quiz_id = $quiz->id;
            $quizResult->user_id = auth()->user()->id;
            $quizResult->score = $score;
            $quizResult->save();
        }

        // Redirigir al usuario a la página de inicio
        return redirect()->route('resultado');
    }





}
