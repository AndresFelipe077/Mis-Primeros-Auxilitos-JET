<?php

namespace App\Http\Livewire\Game;

use App\Models\Trivia;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTrivia extends Component
{
    use WithFileUploads;

    public $open = false;

    public $title, $content, $image, $identificador;

    public function mount() //funcion para resetear el input del file ya que como es inmutable no se cambia
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'title'   => 'required',
        'content' => 'required',
        'image'   => 'required|image|max:2048'
    ];

    // Funcion para mostrar un mensaje cuando no se cumpla los $rules
    // public function update($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function save()
    {

        $this->validate();

        $image = $this->image->store('trivias');

        Trivia::create([
            'title'   => $this->title,
            'content' => $this->content,
            'image'   => $image
        ]);

        $this->reset(['open', 'title', 'content', 'image']);

        $this->identificador = rand();

        $this->emitTo('show-trivia', 'render');
        $this->emit('alert', 'Se creo correctamente el contenido');

        return view('livewire.game.show-trivia');

    }

    public function updatingOpen()
    {
        if($this->open == false)
        {
            $this->reset(['content', 'title', 'image']);
            $this->identificador = rand();
            $this->emit('resetCKEditor');
        }
        
    }

    public function render()
    {
        return view('livewire.game.create-trivia');
    }

}
