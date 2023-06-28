<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Answer;
use App\Models\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $question_id = Question::all()->random();
        return [
            'content' => $this->faker->randomElement(['respuesta 1', 'Respuesta 2', 'Respuesta 3', 'Respuesta 4']),
            'question_id' => $question_id,
        ];
    }
}
