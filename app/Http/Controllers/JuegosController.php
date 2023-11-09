<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegosController extends Controller
{
    public function index(){
        return view('livewire.game.juegos');
    }
}
