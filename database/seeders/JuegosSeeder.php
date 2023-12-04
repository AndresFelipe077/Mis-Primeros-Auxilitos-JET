<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JuegosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Agrega datos de prueba
        DB::table('juegos')->insert([

           //TRIVIAS

           [
                'nombre' => 'Trivias',
                'descripcion' => 'Juego de Trivias',
                'imagen' => $this->storeImage('icons\1000X1000.jpg','img'),
                'created_at' => now(),
                'updated_at' => now(),
           ],
           [
                'nombre' => 'Adivinanzas',
                'descripcion' => 'Juego de Adivinanza',
                'imagen' => $this->storeImage('icons\adivinanza_icon.png','img'),
                'created_at' => now(),
                'updated_at' => now(),
           ],

           ]);
    }

    protected function storeImage($imageName, $sourceFolder)
    {
        $sourcePath = public_path($sourceFolder . '\\' . $imageName);
        $destinationPath = 'images/' . $imageName;

        // Almacena la imagen en la carpeta storage
        Storage::put($destinationPath, file_get_contents($sourcePath));

        // Retorna la ruta para almacenar en la base de datos
        return 'images/' . $imageName;
    }
}
