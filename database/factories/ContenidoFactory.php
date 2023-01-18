<?php

namespace Database\Factories;

use App\Models\User;
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
        $user = User::all()->random();

        // $collection = User::where('user_id', 1)->pluck('name');
        // if (!$collection->isEmpty()) {
        //     $user = $collection->random();
        // }

        return [
            'title'       => $this -> faker -> randomElement(['Curar Heridas','Botiquin','Accidentes']),
            'url'         => $this -> faker -> randomElement(['/storage/imagesFactory/policia.png', '/storage/imagesFactory/peluche.png','/storage/imagesFactory/logo.png', '/storage/imagesFactory/fondo.jpg']),
            'autor'       => $this -> faker -> randomElement(['Andres Felipe','Nicolas Felipe','Jhon Smith']),
            'description' => $this -> faker -> text('200'),
            'user_id'     => $user->id,
            'created_at'  => now(),
        ];
    }
}
