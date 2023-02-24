<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistasController extends Controller
{
    public function preguntas5_7Show()
    {
        return view('livewire.game.preguntas.preguntas5_7');
    }

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
