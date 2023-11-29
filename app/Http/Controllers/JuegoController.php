<?php
namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Nivel;
use App\Models\ProgresoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JuegoController extends Controller
{




    public function registrarJuego()
{
    return view('juegos.registrar');
}

public function guardarJuego(Request $request)
{
    // Valida los datos del formulario, incluyendo la imagen
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta los tipos y tamaños de archivo según tus necesidades
    ]);

    // Crea un nuevo juego
    $juego = new Juego;
    $juego->nombre = $request->input('nombre');
    $juego->descripcion = $request->input('descripcion');

    // Maneja la carga de la imagen
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
        $rutaImagen = 'images/' . $nombreImagen;

        // Almacena la imagen en el sistema de archivos
        Storage::disk('public')->put($rutaImagen, file_get_contents($imagen));

        // Guarda la ruta de la imagen en la base de datos
        $juego->imagen = $rutaImagen;
    }

    $juego->save();

    return redirect()->route('juegos.lista')->with('success', 'Juego registrado exitosamente.');
}
}
