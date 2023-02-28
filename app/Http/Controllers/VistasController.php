<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistasController extends Controller
{

    public function showAyuda()
    {
        return view('profile.ayuda');
    }

    //Vista configuracion
    public function ajustes()
    {
        return view('profile.ajustes');
    }

    public function misionvision()
    {
        return view('mision_vision');
    }

    public function showCreditos()
    {
        return view('creditos');
    }
}
