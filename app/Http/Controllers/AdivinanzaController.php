<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adivinanza;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdivinanzaController extends Controller
{
    public function adivinanzaShow()
    {
        $adivinanzas = Adivinanza::orderBy('id', 'desc')->paginate(9);
        return view('livewire.game.show-adivinanza', compact('adivinanzas'));
    }

    public function adivinanzaCreate()
    {
        return view('livewire.game.create-adivinanza');
    }

    public function adivinanzaStore(Request $request)
    {
        $request->validate([
            'title'    => 'required|max:50',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'content'  => 'required|max:250',
        ]);

        $cadena = $request->file('image')->getClientOriginalName();

        $cadenaConvert = strtr($cadena, " ", "_");

        $nombre = Str::random(10) . $cadenaConvert;

        $ruta = storage_path() . 'app/public/contenidos/imagenes/' . $nombre;

        Image::make($request->file('image'))
            ->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta);

        $title  = $request->title;
        $title_url  = Str::slug($title, '-');
        $slug_title_url = Str::random(1) . $title_url;
        $userId = Auth::user()->id; //Se obtiene id del Usuario Autenticado
        $name = Auth::user()->name; //Se obtiene id del Usuario Autenticado


        Adivinanza::create([
            'title'   => $request->title,
            'slug'    => $slug_title_url,
            'image'   => '/storage/contenidos/imagenes/' . $nombre,
            'content' => $request->content,

        ]);

        return redirect()->route('adivinanzaShow')->with('subir', 'ok');
    }


    public function adivinanzaEdit(Adivinanza $adivinanza)
    {
        return view('livewire.game.edit-adivinanza', compact('adivinanza'));
    }

    public function adivinanzaUpdate(Request $request, Adivinanza $adivinanza)
    {
        $request->validate([
            'title'    => 'required|max:50',
            'image'    => 'image|mimes:jpeg,png,jpg,gif,svg',
            'content'  => 'required|max:250',
        ]);

        $title  = $request->title;
        $title_url  = Str::random(1) . Str::slug($title, '-');

        $adivinanza->title = $title;
        $adivinanza->slug  = $title_url;

        $name = Auth::user()->name;

        if ($request->has('image')) {
            $destination = public_path() . $adivinanza->image;

            if ($adivinanza->image != '') {
                unlink(public_path() . '/' . $adivinanza->image);
            }

            $file = $request->file('image');

            $cadena = $file->getClientOriginalName();

            $cadenaConvert = strtr($cadena, " ", "_");

            $nombre = Str::random(10) . $cadenaConvert;

            $file->move('storage/imagesAdivinanzas/', $nombre);

            $adivinanza->image = '/storage/imagesAdivinanzas/' . $nombre;
        }

        $adivinanza->content = $request->content;

        $adivinanza->update();

        return redirect()->route('adivinanzaShow', compact('adivinanza'))->with('actualizar', 'ok');
    }

    public function adivinanzaDelete(Adivinanza $adivinanza)
    {
        $url = str_replace('storage', 'public', $adivinanza->image);
        if ($adivinanza->image != '') {
            Storage::delete($url);
            $adivinanza->delete();
        }
        return redirect()->route('adivinanzaShow')->with('eliminar', 'ok');
    }
}
