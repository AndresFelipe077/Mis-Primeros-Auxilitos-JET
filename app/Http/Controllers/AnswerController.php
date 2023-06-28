<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function create(Question $question, Answer $answer)
    {
        return view('livewire.game.answers.create', compact('question', 'answer'));
    }

    public function store(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'content' => 'required|max:50',
            'is_correct' => 'boolean'
        ]);

        $answer = new Answer();
        $answer->content = $validatedData['content'];
        $answer->question_id = $question->id;

        if (isset($validatedData['is_correct']) && $validatedData['is_correct']) {
            // Desmarcar cualquier respuesta anteriormente marcada como correcta para la misma pregunta
            $question->answers()->where('is_correct', true)->update(['is_correct' => false]);

            $answer->is_correct = true;
        }

        $answer->save();

        return redirect()->route('questions.show', $question)
            ->with('success', 'Answer submitted successfully.');
    }

    public function edit(Answer $answer)
    {
        return view('livewire.game.answers.edit', compact('answer'));
    }


    public function update(Request $request, Answer $answer)
    {
        $validatedData = $request->validate([
            'content' => 'required|max:50',
            'is_correct' => 'boolean'
        ]);

        $answer->content = $validatedData['content'];

        // Marcar la respuesta como correcta si el campo is_correct está presente y es verdadero
        if ($request->has('is_correct') && $validatedData['is_correct']) {
            // Desmarcar cualquier respuesta anteriormente marcada como correcta para la misma pregunta
            $answer->question->answers()->where('is_correct', true)->update(['is_correct' => false]);
            $answer->is_correct = true;
        } else {
            $answer->is_correct = false;
        }

        $answer->update();

        $question = $answer->question;

        return redirect()->route('questions.show', $question)
            ->with('success', 'Answer updated successfully.');
    }



    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->route('questions.show', $answer->question)->with('success', 'Answer deleted successfully.');
    }
}
