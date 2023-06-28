<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::all()->random();
        return [
            'title'       => $this->faker->randomElement(['quiz 1', 'quiz 2', 'quiz 3']),
            'description' => $this->faker->text(),
            'user_id'     => $user_id,
        ];
    }
}
