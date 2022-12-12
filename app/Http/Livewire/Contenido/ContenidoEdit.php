<?php

namespace App\Http\Livewire\Contenido;

use Livewire\Component;
use App\Models\Contenido;
use Illuminate\Http\Request;

class ContenidoEdit extends Component
{



    public function render()
    {

        return view('livewire.contenido.contenido-edit');
    }
}
