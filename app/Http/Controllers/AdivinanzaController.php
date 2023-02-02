<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adivinanza;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdivinanzaController extends Controller
{
    public function adivinanzaShow()
    {
        $adivinanzas = Adivinanza::orderBy('id', 'desc')->paginate(9);
        return view('livewire.game.show-adivinanza', compact('adivinanzas'));
    }

    public function adivinanzaStore(Request $adivinanza)
    {
        $adivinanza->validate([
            'title'    => 'required|max:50',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'  => 'required|max:250',
        ]);

        $nombre = Str::random(10) . $adivinanza->file('image')->getClientOriginalName();
        // $nombre = Image::make($request->file('photo')->getRealPath());

        $ruta = storage_path() . '\app\public\imagesAdivinanzas/' . $nombre;

        Image::make($adivinanza->file('image'))
            ->resize(900, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);

        $userId = Auth::user()->id;//Se obtiene id del Usuario Autenticado
        $name = Auth::user()->name;//Se obtiene id del Usuario Autenticado


        Adivinanza::create([
            'title'   => $adivinanza->title,
            'image'   => '/storage/imagesAdivinanzas/' . $nombre,
            'content' => $adivinanza->content,
                     
        ]);

        return redirect()->route('adivinanzaShow')->with('subir','ok');
    }

    public function adivinanzaCreate()
    {
        return view('livewire.game.create-adivinanza');
    }

    public function adivinanzaEdit(Adivinanza $adivinanza)
    {
        return view('livewire.game.edit-adivinanza', compact('adivinanza'));
    }

    public function adivinanzaUpdate(Request $request, Adivinanza $adivinanza)
    {
        $request -> validate([
            'title'    => 'required|max:50',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'  => 'required|max:250',
        ]);
        
        $nombre = Str::random(10) . $request->file('image')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\imagesAdivinanzas/' . $nombre;

        

        Image::make($request->file('image'))
            ->resize(900, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);
        
        $name = Auth::user()->name;

        $adivinanza->title   = $request->title;
        $adivinanza->image   = '/storage/imagesAdivinanzas/' .$nombre;
        $adivinanza->content = $request->content;
        
        $adivinanza->save();

        return redirect()->route('adivinanzaShow', compact('adivinanza'))->with('actualizar','ok');
    }

    public function adivinanzaDelete(Adivinanza $trivia)
    {
        $trivia->delete();
        return redirect()->route('adivinanzaShow')->with('eliminar','ok');
    }
}
