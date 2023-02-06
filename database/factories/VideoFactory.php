<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $video_title = $this -> faker -> randomElement(['Video auxilitos niños']);
        $video_url   = Str::slug($video_title ,'-');

        return [
            'video_title' => $video_title,
            'slug'        => $video_url,
            'video_url'   => $this -> faker -> randomElement(['/storage/videos/auxilios.mp4']),
            'description' => $this -> faker -> text('200'),
            'status'      => $this -> faker -> randomElement(['1','0']),
            'created_at'  => now(),
        ];
    }
}
