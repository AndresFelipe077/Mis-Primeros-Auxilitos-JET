<?php

namespace App\Http\Livewire\Contenido;

use App\Models\Contenido;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContenidoCreate extends Component
{

    use WithFileUploads;

    public $title, $url, $autor, $description;

    protected $rules = [
        // 'title'   => 'required|max:10',
        // 'content' => 'required|min:100'
        'title'       => 'required',
        'url'         => 'required|image|max:2048',
        'autor'       => 'required',
        'description' => 'required',
        
    ];

    public function save()
    {

        $this->validate();

        $url = $this->url->store('contenidos');

        Contenido::create([
            'title'       => $this->title,
            'url'         => $url,
            'autor'       => $this->autor,
            'description' => $this->description,
        ]);

        $this->reset(['url']);

        return redirect()->route('dashboard.index');

        // $this->identificador = rand();

        // $this->emitTo('show-posts', 'render');
        // $this->emit('alert', 'Se creo correctamente el contenido');
    }

    public function render()
    {
        return view('livewire.contenido.contenido-create');
    }
}
