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

  public function menuShow()
  {
    return view('auth.Menu');
  }

  //Vista home de videos
  public function index()
  {
    $contenidos = Contenido::orderBy('id', 'desc')->paginate(9);
    return view('contenido.contenido-show', compact('contenidos'));
  }

  public function createImage()
  {
    return view('contenido.create.contenido-create-image');
  }

  public function createVideo()
  {
    return view('contenido.create.contenido-create-video');
  }

  public function storeImage(Request $request)
  {
      $request->validate([
          'title' => 'required|max:50',
          'file' => 'required|image',
          'autor' => 'string',
          'description' => 'required|max:250',
      ]);
  
      $cadena = $request->file('file')->getClientOriginalName();
  
      $cadenaConvert = strtr($cadena, " ", "_");
  
      $nombre = Str::random(10) . $cadenaConvert;
  
      $ruta = storage_path('app/public/contenidos/imagenes/') . $nombre; // Corrección en la construcción de la ruta
  
      Image::make($request->file('file'))
          ->resize(900, null, function ($constraint) {
              $constraint->aspectRatio();
          })
          ->save($ruta);
  
      $title = $request->title;
      $title_url = Str::slug($title, '-');
      $slug_title_url = Str::random(1) . $title_url;
      $userId = Auth::user()->id;
      $name = Auth::user()->name;
  
      Contenido::create([
          'title' => $title,
          'slug' => $slug_title_url,
          'url' => '/storage/contenidos/imagenes/' . $nombre, // Corrección en la ruta de almacenamiento
          'autor' => $name,
          'description' => $request->description,
          'user_id' => $userId,
      ]);
  
      return redirect()->route('dashboard.index')->with('subir', 'ok');
  }
  public function storeVideo(Request $request)
  {

    $request->validate([
      'title'        => 'required|max:50',
      'file'         => 'mimetypes:video/mp4', //'mimes:mp4,ogx,oga,ogv,ogg,webm',
      'autor'        => 'string',
      'description'  => 'required|max:250',
    ]);

    $cadena = $request->file('file')->getClientOriginalName();

    $cadenaConvert = strtr($cadena, " ", "_");

    $nombre = Str::random(10) . $cadenaConvert;

    $fileName = $nombre;
    $filePath = 'contenidos/videos/' . $fileName;

    $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->file));

    if ($isFileUploaded) {

      $title  = $request->title;
      $title_url  = Str::slug($title, '-');
      $slug_title_url = Str::random(1) . $title_url;
      $userId = Auth::user()->id; //Se obtiene id del Usuario Autenticado
      $name   = Auth::user()->name;

      Contenido::create([
        'title'       => $title,
        'slug'        => $slug_title_url,
        'url'         => '/storage/' . $filePath,
        'autor'       => $name,
        'description' => $request->description,
        'user_id'     => $userId,

      ]);
    }

    return redirect()->route('dashboard.index')->with('subir', 'ok');
  }

  public function editImage(Contenido $contenido)
  {
    return view('contenido.edit.contenido-edit-image', compact('contenido'));
  }

  public function editVideo(Contenido $contenido)
  {
    return view('contenido.edit.contenido-edit-video', compact('contenido'));
  }

  public function updateImage(Request $request, Contenido $contenido)
  {
      $request->validate([
          'title' => 'required|max:50',
          'file' => 'image', // Validación de imagen
          'autor' => 'string',
          'description' => 'required|max:250',
      ]);
      
      $title = $request->title;
      $title_url = Str::random(1) . Str::slug($title, '-');
  
      $name = Auth::user()->name;
      $contenido->title = $title;
      $contenido->slug = $title_url;
  
      if ($request->has('file')) {
          $destination = public_path() . $contenido->url;
  
          if ($contenido->url != '') {
              unlink(public_path() . '/' . $contenido->url);
          }
  
          $file = $request->file('file');
  
          $cadena = $file->getClientOriginalName();
  
          $cadenaConvert = strtr($cadena, " ", "_");
  
          $nombre = Str::random(10) . $cadenaConvert;
  
          $file->move('storage/contenidos/imagenes/', $nombre);
  
          $contenido->url = '/storage/contenidos/imagenes/' . $nombre;
      }
  
      $contenido->autor = $name;
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
    return redirect()->route('dashboard.index')->with('eliminar', 'ok');
  }

}
