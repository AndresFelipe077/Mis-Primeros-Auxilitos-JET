<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegosAdivina extends Controller
{
    public function index2(){
        return view('livewire.game.juegos2');
    }
}
