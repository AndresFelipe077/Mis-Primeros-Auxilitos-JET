<?php

namespace App\Http\Livewire\Contenido;

use App\Models\Contenido;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ContenidoCreate extends Component
{

    use WithFileUploads;

    // public $title, $url, $autor, $description;

    // protected $rules = [
    //     // 'title'   => 'required|max:10',
    //     // 'content' => 'required|min:100'
    //     'title'       => 'required',
    //     'url'         => 'required|image|max:2048',
    //     'autor'       => 'required',
    //     'description' => 'required',
        
    // ];

    // public function save(Request $request)
    // {

    //     $this->validate();

    //     // $url = $this->url->store('contenidos');

    //     // Contenido::create([
    //     //     'title'       => $this->title,
    //     //     'url'         => $url,
    //     //     'autor'       => $this->autor,
    //     //     'description' => $this->description,
    //     // ]);

    //     // $this->reset(['url']);

    //     // $request->validate([
    //     //     'title'        => 'required|max:50',
    //     //     'file'         => 'required|image',
    //     //     'autor'        => 'required|max:25',
    //     //     'description'  => 'required'
    //     // ]);

    //     $nombre = Str::random(10) . $request->file('url')->getClientOriginalName();

    //     $ruta = storage_path() . '\app\public\images/' . $nombre;

    //     Image::make($request->file('file'))
    //         ->resize(900, null, function($constraint){
    //             $constraint->aspectRatio();
    //         })
    //         ->save($ruta);

    //     Contenido::create([
    //         'title'       => $request->title,
    //         'url'         => '/storage/images/' . $nombre,
    //         'autor'       => $request->autor,
    //         'description' => $request->description,
    //     ]);



    //     return redirect()->route('dashboard.index');

    //     // $this->identificador = rand();

    //     // $this->emitTo('show-posts', 'render');
    //     // $this->emit('alert', 'Se creo correctamente el contenido');
    // }

    public function render()
    {
        return view('livewire.contenido.contenido-create');
    }
}
