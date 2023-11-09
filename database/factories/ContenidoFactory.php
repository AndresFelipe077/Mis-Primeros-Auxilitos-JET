<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contenido>
 */
class ContenidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random();
        $url_title = $this -> faker -> randomElement(['Curar Heridas','Botiquin','Accidentes']);
        $slug_title_url = Str::random(1) . " " . $url_title;
        return [
            'title'       => $url_title,
            'slug'        => Str::slug($slug_title_url, '-'),
            'url'         => $this -> faker -> randomElement(['/storage/imagesFactory/botiquin.png', '/storage/imagesFactory/curas.png','/storage/imagesFactory/medallita.png' ,'/storage/imagesFactory/logo.png', '/storage/videosFactory/video_auxilito.mp4']),
            'autor'       => $user -> name,
            'description' => $this -> faker -> text('200'),
            'user_id'     => $user -> id,
            'verified'    => 1,
            'created_at'  => now(),
        ];
    }
}

