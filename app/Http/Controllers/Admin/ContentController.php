<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{

    public function adminContent()
    {
        $contenidos = Contenido::orderBy('id', 'asc')->simplePaginate(8);
        return view('admin.contenidos', compact('contenidos'))->with('eliminar', 'ok');
    }

    public function updateImage(Request $request, Contenido $contenido)
    {
        $request->validate([
            'title'        => 'required|max:50',
            'file'         => 'mimetypes:jpeg,png,jpg,gif,svg',
            'autor'        => 'string',
            'description'  => 'required|max:250',
        ]);
        $title  = $request->title;
        $title_url  = Str::random(1) . Str::slug($title, '-');

        $name = Auth::user()->name;
        $contenido->title = $title;
        $contenido->slug  = $title_url;


        if ($request->has('file')) {
            $destination = public_path() . $contenido->url;

            if ($contenido->url != '') {
                unlink(public_path() . '/' . $contenido->url);
            }

            $file = $request->file('file');

            $cadena = $file->getClientOriginalName();

            $cadenaConvert = strtr($cadena, " ", "_");

            $nombre = Str::random(10) . $cadenaConvert;

            $file->move('storage/contenidos/images/', $nombre);

            $contenido->url = '/storage/contenidos/images/' . $nombre;
        }

        $contenido->autor       = $name;
        $contenido->description = $request->description;

        $contenido->update();

        return redirect()->route('dashboard.index', compact('contenido'))->with('actualizar', 'ok');
    }

    public function updateVideo(Request $request, Contenido $contenido)
    {

        $request->validate([
            'title'        => 'required|max:50',
            'file'         => 'mimetypes:video/mp4', //'mimes:mp4,ogx,oga,ogv,ogg,webm',
            'autor'        => 'string',
            'description'  => 'required|max:250',
        ]);
        $title  = $request->title;
        $title_url  = Str::slug($title, '-');

        $name = Auth::user()->name;
        $contenido->title = $title;
        $contenido->slug  = $title_url;

        if ($request->has('file')) {
            $destination = public_path() . $contenido->url;

            if ($contenido->url != '') {
                unlink(public_path() . '/' . $contenido->url);
            }

            $file = $request->file('file');

            $cadena = $file->getClientOriginalName();

            $cadenaConvert = strtr($cadena, " ", "_");

            $nombre = Str::random(10) . $cadenaConvert;

            $file->move('storage/contenidos/videos/', $nombre);

            $contenido->url = '/storage/contenidos/videos/' . $nombre;
        }

        $contenido->autor       = $name;
        $contenido->description = $request->description;

        $contenido->update();

        return redirect()->route('dashboard.index', compact('contenido'))->with('actualizar', 'ok');
    }

    public function destroy(Contenido $contenido)
    {
        $url = str_replace('storage', 'public', $contenido->url);
        if ($contenido->url != '') {
            Storage::delete($url);
            $contenido->delete();
        }

        return redirect()->route('admin.contenido')->with('eliminar', 'ok');

    }

}
