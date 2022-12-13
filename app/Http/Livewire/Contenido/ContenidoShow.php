<?php

namespace App\Http\Livewire\Contenido;

use App\Models\Contenido;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ContenidoShow extends Component
{

    use WithFileUploads;

    public $contenido, $image;

    protected $rules = [
        'contenido.title'       => 'required',
        'contenido.url'         => 'required',
        'contenido.autor'       => 'required',
        'contenido.description' => 'required',
    ];


    public function render()
    {

        $contenidos = Contenido::orderBy('id','desc')->paginate(8);

        return view('livewire.contenido.contenido-show', compact('contenidos'));
    }
}
