<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title'       => $this -> faker -> randomElement(['Curar Heridas','Botiquin','Accidentes']),
            'url'         => $this -> faker -> randomElement(['/storage/imagesFactory/policia.png', '/storage/imagesFactory/peluche.png','/storage/imagesFactory/logo.png', '/storage/imagesFactory/fondo.jpg']),
            'autor'       => $this -> faker -> randomElement(['Andres Felipe','Nicolas Felipe','Jhon Smith']),
            'description' => $this -> faker -> text('200'),
            'created_at'  => now(),
        ];
    }
}
