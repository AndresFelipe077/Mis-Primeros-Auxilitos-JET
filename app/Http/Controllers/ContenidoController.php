<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ContenidoController extends Controller
{

  //Vista home de videos
  public function index()
  {
    if (Auth::check()) {
      $contenidos = Contenido::orderBy('id', 'desc')->paginate(9);
    return view('livewire.imagenes.imagen-show', compact('contenidos'));
    } else {
      return view('auth.login');
    }
  }

  // //Vista configuracion
  public function ajustes()
  {
    if (Auth::check()) {
      return view('Profile.ajustes');
    } else {
      return route('login');
    }
  }


  public function create()
  {
    if (Auth::check()) {
      return view('livewire.imagenes.imagen-create');
    }
  }

  public function store(Request $request)
  {

    $request->validate([
      'title'        => 'required|max:50',
      'file'         => 'required', //'required|image|mimes:jpeg,png,jpg,gif,svg|file|mimetypes:video/mp4|max:2048|',
      'autor'        => 'string',
      'description'  => 'required|max:250',
    ]);

    $extension = $request->file->getClientOriginalExtension();

    if ($extension == 'mp4') {
      $cadena = $request->file('file')->getClientOriginalName();

      $cadenaConvert = strtr($cadena, " ", "_");

      $nombre = Str::random(10) . $cadenaConvert;

      $fileName = $nombre;
      $filePath = 'videos/' . $fileName;

      $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->file));

      if ($isFileUploaded) {

        $title  = $request->title;
        $title_url  = Str::slug($title, '-');
        $userId = Auth::user()->id; //Se obtiene id del Usuario Autenticado
        $name   = Auth::user()->name;

        Contenido::create([
          'title'       => $title,
          'slug'        => $title_url,
          'url'         => '/storage/' . $filePath,
          'autor'       => $name,
          'description' => $request->description,
          'user_id'     => $userId,

        ]);
      }
    } else {
      $cadena = $request->file('file')->getClientOriginalName();

      $cadenaConvert = strtr($cadena, " ", "_");

      $nombre = Str::random(10) . $cadenaConvert;

      $ruta = storage_path() . '\app\public\images/' . $nombre;

      Image::make($request->file('file'))
        ->resize(900, null, function ($constraint) {
          $constraint->aspectRatio();
        })
        ->save($ruta);

      $title  = $request->title;
      $title_url  = Str::slug($title, '-');
      $userId = Auth::user()->id; //Se obtiene id del Usuario Autenticado
      $name   = Auth::user()->name;

      Contenido::create([
        'title'       => $title,
        'slug'        => $title_url,
        'url'         => '/storage/contenidos/' . $nombre,
        'autor'       => $name,
        'description' => $request->description,
        'user_id'     => $userId,

      ]);
    }


    return redirect()->route('dashboard.index')->with('subir', 'ok');
  }


  public function edit(Contenido $contenido)
  {

    if (Auth::check()) {
      return view('livewire.imagenes.imagen-edit', compact('contenido'));
    }
  }

  public function update(Request $request, Contenido $contenido)
  {
    $request->validate([
      'title'        => 'required|max:50',
      'file'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

      $file->move('storage/images/', $nombre);

      $contenido->url = '/storage/images/' . $nombre;
    }

    $contenido->autor       = $name;
    $contenido->description = $request->description;

    $contenido->update();

    return redirect()->route('dashboard.index', compact('contenido'))->with('actualizar', 'ok');
  }


  public function destroy(Contenido $contenido)
  {
    if ($contenido->url != '') {
      unlink(public_path() . '/' . $contenido->url);
      $contenido->delete();
    }
    return redirect()->route('dashboard.index')->with('eliminar', 'ok');
  }
}
