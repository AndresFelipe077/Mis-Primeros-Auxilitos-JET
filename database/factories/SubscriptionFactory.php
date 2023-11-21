<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  protected $model = Subscription::class;

    public function definition()
    {
        $user = User::factory()->create();

        return [
            'user_id' => $user->id,
            'subscription_status' => $this->faker->randomElement(['aprobado']),
            'price' => $this->faker->randomElement(['40000']),
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d H:i:s'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function forUser()
    {
        return $this->state(function (array $attributes) {
            $user = User::factory()->create();
            return [
                'user_id' => $user->id,
            ];
        });
    }

}
