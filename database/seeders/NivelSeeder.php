<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         // Agrega datos de prueba
         DB::table('niveles')->insert([

            //TRIVIAS

            [
                 'nombre' => 'Responde Correctamente',
                 'descripcion' => 'Nivel 1 Trivias',
                 'juego_id' => 1,
                 'nivel' => 1,
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'nombre' => 'Responde Correctamente',
                 'descripcion' => 'Nivel 2 Trivias',
                 'juego_id' => 1,
                 'nivel' => 2,
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'nombre' => 'Responde Correctamente',
                 'descripcion' => 'Nivel 3 Trivias',
                 'juego_id' => 1,
                 'nivel' => 3,
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'nombre' => 'Responde Correctamente',
                 'descripcion' => 'Nivel 4 Trivias',
                 'juego_id' => 1,
                 'nivel' => 4,
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'nombre' => 'Responde Correctamente',
                 'descripcion' => 'Nivel 5 Trivias',
                 'juego_id' => 1,
                 'nivel' => 5,
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'nombre' => 'Responde Correctamente',
                 'descripcion' => 'Nivel 6 Trivias',
                 'juego_id' => 1,
                 'nivel' => 6,
                 'created_at' => now(),
                 'updated_at' => now(),
             ],


             //ADIVINANZAS
             [
                'nombre' => 'Adivinanza',
                'descripcion' => 'Nivel 1 Adivinanza',
                'juego_id' => 2,
                'nivel' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'nombre' => 'Adivinanza',
                'descripcion' => 'Nivel 2 Adivinanza',
                'juego_id' => 2,
                'nivel' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'nombre' => 'Adivinanza',
                'descripcion' => 'Nivel 3 Adivinanza',
                'juego_id' => 2,
                'nivel' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'nombre' => 'Adivinanza',
                'descripcion' => 'Nivel 4 Adivinanza',
                'juego_id' => 2,
                'nivel' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'nombre' => 'Adivinanza',
                'descripcion' => 'Nivel 5 Adivinanza',
                'juego_id' => 2,
                'nivel' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'nombre' => 'Adivinanza',
                'descripcion' => 'Nivel 6 Adivinanza',
                'juego_id' => 2,
                'nivel' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

             ]);
    }

    // Schema::create('niveles', function (Blueprint $table) {
    //     $table->id();
    //     $table->unsignedBigInteger('juego_id');
    //     $table->string('nombre');
    //     $table->text('descripcion');
    //     $table->integer('nivel');
    //     // Otros campos relacionados con el nivel
    //     $table->timestamps();

    //     $table->foreign('juego_id')->references('id')->on('juegos');
    // });
}
