<?php

namespace Database\Factories;

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
  public function definition()
  {

    $user = User::all()->random();

    return [
      'user_id'             => $user->id,
      'subscription_status' => $this->faker->randomElement(['aprobado']),
      'price'               => $this->faker->randomElement(['40000']),
      'expires_at'          => $this->faker->randomElement(['2023-10-16 11:14:16']),
      'created_at'          => $this->faker->randomElement(['2023-10-16 11:14:16', '2023-08-24 11:14:16', '2023-04-24 11:14:16', '2023-10-24 11:14:16']),
      'updated_at'          => $this->faker->randomElement(['2023-01-10 11:14:16', '2022-10-16 11:14:16', '2023-10-24 11:14:16']),
    ];

  }
}
