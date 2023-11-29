<?php
namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Nivel;
use App\Models\ProgresoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuegoController extends Controller
{




    public function registrarJuego()
{
    return view('juegos.registrar');
}

public function guardarJuego(Request $request)
{
    // Valida los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
    ]);

    // Crea un nuevo juego
    $juego = new Juego;
    $juego->nombre = $request->input('nombre');
    $juego->descripcion = $request->input('descripcion');
    $juego->save();

    return redirect()->route('juegos.lista')->with('success', 'Juego registrado exitosamente.');
}
}
