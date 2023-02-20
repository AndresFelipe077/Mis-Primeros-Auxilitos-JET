<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\trivia>
 */
class TriviaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name_title = $this -> faker -> randomElement(['Heridas','Suplementos','Analgesicos']);
        $slug_title_url = Str::random(1) . " " . $name_title;
        return [
            'title'       => $name_title,
            'slug'        => Str::slug($slug_title_url, '-'),
            'image'       => $this -> faker -> randomElement(['/storage/imagesFactory/policia.png', '/storage/imagesFactory/peluche.png','/storage/imagesFactory/logo.png', '/storage/imagesFactory/fondo.png']),
            'content'     => $this -> faker -> text,
            'created_at'  => now(),
        ];
    }
}
