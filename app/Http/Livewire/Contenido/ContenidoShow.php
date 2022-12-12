<?php

namespace App\Http\Livewire\Contenido;

use App\Models\Contenido;
use Livewire\Component;

class ContenidoShow extends Component
{


    public function render()
    {

        $contenidos = Contenido::orderBy('id','desc')->paginate(8);

        return view('livewire.contenido.contenido-show', compact('contenidos'));
    }
}
