<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreguntasyRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Elimina datos existentes en la tabla
        DB::table('preguntasTrivias')->truncate();

        // Agrega datos de prueba
        DB::table('preguntasTrivias')->insert([


            /*
            Preguntas Trivas
            */
            [
                'pregunta' => '¿Es importante llamar a un adulto o a los servicios de emergencia si ves a alguien que se ha caído y no puede levantarse?',
                'respuestaCorrecta' => 'Si',
                'nivel_id' => 1, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => '¿Deberías tocar a una persona que parece estar inconsciente para ver si está bien?',
                'respuestaCorrecta' => 'No',
                'nivel_id' => 2, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => '¿Es seguro acercarse a un animal herido sin la ayuda de un adulto?',
                'respuestaCorrecta' => 'No',
                'nivel_id' => 3, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => '¿Deberías correr con tijeras en la mano para buscar ayuda en caso de emergencia?',
                'respuestaCorrecta' => 'No',
                'nivel_id' => 4, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => '¿Es adecuado aplicar hielo directamente sobre una quemadura?',
                'respuestaCorrecta' => 'No',
                'nivel_id' => 5, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => '¿Deberías esperar a que un adulto te dé permiso antes de usar el botiquín de primeros auxilios?',
                'respuestaCorrecta' => 'Si',
                'nivel_id' => 6, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],


            /*
            preguntas adivinanzas
            */

            [
                'pregunta' => 'Soy un vendaje que se pega en una herida. ¿Quién soy?',
                'respuestaCorrecta' => 'Cinta adhesiva',
                'nivel_id' => 7, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => 'Me usas para lavar una herida, ¡soy como un chapuzón en una piscina! ¿Quién soy?',
                'respuestaCorrecta' => 'Jabón',
                'nivel_id' => 8, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => '¿Qué debes hacer primero si encuentras a alguien que no responde?',
                'respuestaCorrecta' => 'Llamar al 911',
                'nivel_id' => 9, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => '¿Qué haces si ves a alguien que se está atragantando?',
                'respuestaCorrecta' => 'Darle palmadas en la espalda',
                'nivel_id' => 10, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => 'En una emergencia, me llaman para ayudar a respirar. ¿Quién soy?',
                'respuestaCorrecta' => 'Respirador',
                'nivel_id' => 11, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pregunta' => 'Me usan para tapar una herida, soy suave y protejo sin medida. ¿Quién soy?',
                'respuestaCorrecta' => 'Venda',
                'nivel_id' => 12, // Reemplaza con el ID del nivel correspondiente
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
