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
        
        return [
            'title'       => $url_title,
            'slug'        => Str::slug($url_title, '-'),
            'url'         => $this -> faker -> randomElement(['/storage/imagesFactory/policia.png', '/storage/imagesFactory/peluche.png','/storage/imagesFactory/logo.png', '/storage/imagesFactory/fondo.jpg', '/storage/videoFactory/auxilios.mp4']),
            'autor'       => $user -> name,
            'description' => $this -> faker -> text('200'),
            'user_id'     => $user -> id,
            'created_at'  => now(),
        ];
    }
}

