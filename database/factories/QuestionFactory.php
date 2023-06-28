<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;
use App\Models\Quiz;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quiz_id = Quiz::all()->random();
        return [
            'title' => $this->faker->randomElement(['Botiquin de primeros auxilios', 'Accidentes casuales']),
            'quiz_id' => $quiz_id,
        ];
    }

}
