<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'video_title' => $this -> faker -> randomElement(['Video auxilitos niños']),
            'video_url'   => $this -> faker -> randomElement(['/storage/videos/auxilios.mp4']),
            'description' => $this -> faker -> text('200'),
            'status'      => $this -> faker -> randomElement(['1','0']),
            'created_at'  => now(),
        ];
    }
}
