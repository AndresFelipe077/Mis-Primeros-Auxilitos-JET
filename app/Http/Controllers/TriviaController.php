<?php

namespace App\Http\Controllers;

use App\Models\Trivia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class TriviaController extends Controller
{

  public function game()
  {
    return view('games.games');
  }

  public function triviaShow5_7()
  {
    $trivias = Trivia::orderBy('id', 'desc')->paginate(9);
    return view('livewire.game.preguntas.show-trivia5_7', compact('trivias'));
  }

  public function create_preguntas5_7()
  {
    return view('livewire.game.preguntas.preguntas5_7');
  }

  public function storePreguntas5_7(Request $request)
  {
    $request->validate([
      'title'    => 'required|max:50',
      'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'content'  => 'max:250',
      'respuesta1' => 'required|max:50',
      'respuesta2' => 'required|max:50',
    ]);

    $cadena = $request->file('image')->getClientOriginalName();

    $cadenaConvert = strtr($cadena, " ", "_");

    $nombre = Str::random(10) . $cadenaConvert;

    $ruta = storage_path() . '\app\public\imagesTrivias/' . $nombre;

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


    Trivia::create([
      'title'      => $request->title,
      'slug'       => $slug_title_url,
      'image'      => '/storage/imagesTrivias/' . $nombre,
      'content'    => $request->content,
      'respuesta1' => $request->respuesta1,
      'respuesta2' => $request->respuesta2,

    ]);

    return redirect()->route('triviaShow5_7')->with('subir', 'ok');
  }


  public function triviaShow8_10()
  {
    $trivias = Trivia::orderBy('id', 'desc')->paginate(9);
    return view('livewire.game.preguntas.show-trivia8_10', compact('trivias'));
  }

  public function create_preguntas8_10()
  {
    return view("livewire.game.preguntas.preguntas8_10");
  }

  public function storePreguntas8_10(Request $request)
  {
    $request->validate([
      'title'    => 'required|max:50',
      'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'content'  => 'max:250',
      'respuesta1' => 'required|max:50',
      'respuesta2' => 'required|max:50',
      'respuesta3' => 'required|max:50',
    ]);

    $cadena = $request->file('image')->getClientOriginalName();

    $cadenaConvert = strtr($cadena, " ", "_");

    $nombre = Str::random(10) . $cadenaConvert;

    $ruta = storage_path() . '\app\public\imagesTrivias/' . $nombre;

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


    Trivia::create([
      'title'      => $request->title,
      'slug'       => $slug_title_url,
      'image'      => '/storage/imagesTrivias/' . $nombre,
      'content'    => $request->content,
      'respuesta1' => $request->respuesta1,
      'respuesta2' => $request->respuesta2,
      'respuesta3' => $request->respuesta3,

    ]);

    return redirect()->route('triviaShow8_10')->with('subir', 'ok');
  }





  public function triviaShow11_12()
  {
    $trivias = Trivia::orderBy('id', 'desc')->paginate(9);
    return view('livewire.game.preguntas.show-trivia11_12', compact('trivias'));
  }

  public function create_preguntas11_12()
  {
    return view("livewire.game.preguntas.preguntas11_12");
  }

  public function storePreguntas11_12(Request $request)
  {
    $request->validate([
      'title'    => 'required|max:50',
      'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'content'  => 'max:250',
      'respuesta1' => 'required|max:50',
      'respuesta2' => 'required|max:50',
      'respuesta3' => 'required|max:50',
      'respuesta4' => 'required|max:50',
    ]);

    $cadena = $request->file('image')->getClientOriginalName();

    $cadenaConvert = strtr($cadena, " ", "_");

    $nombre = Str::random(10) . $cadenaConvert;

    $ruta = storage_path() . '\app\public\imagesTrivias/' . $nombre;

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


    Trivia::create([
      'title'      => $request->title,
      'slug'       => $slug_title_url,
      'image'      => '/storage/imagesTrivias/' . $nombre,
      'content'    => $request->content,
      'respuesta1' => $request->respuesta1,
      'respuesta2' => $request->respuesta2,
      'respuesta3' => $request->respuesta3,
      'respuesta4' => $request->respuesta3,
    ]);

    return redirect()->route('triviaShow11_12')->with('subir', 'ok');
  }



































  public function triviaCreate()
  {
    return view('livewire.game.create-trivia');
  }

  public function triviaStore(Request $request)
  {
    $request->validate([
      'title'    => 'required|max:50',
      'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'content'  => 'max:250',
      'respuesta1' => 'required|max:50',
      'respuesta2' => 'required|max:50',
    ]);

    $cadena = $request->file('image')->getClientOriginalName();

    $cadenaConvert = strtr($cadena, " ", "_");

    $nombre = Str::random(10) . $cadenaConvert;

    $ruta = storage_path() . '\app\public\imagesTrivias/' . $nombre;

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


    Trivia::create([
      'title'      => $request->title,
      'slug'       => $slug_title_url,
      'image'      => '/storage/imagesTrivias/' . $nombre,
      'content'    => $request->content,
      'respuesta1' => $request->respuesta1,
      'respuesta2' => $request->respuesta2,

    ]);

    return redirect()->route('triviaShow')->with('subir', 'ok');
  }

  public function triviaEdit(Trivia $trivia)
  {
    return view('livewire.game.edit-trivia', compact('trivia'));
  }

  public function triviaUpdate(Request $request, Trivia $trivia)
  {
    $request->validate([
      'title'    => 'required|max:50',
      'image'    => 'file', //'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'content'  => 'required|max:250',
    ]);

    $title  = $request->title;
    $title_url  = Str::random(1) . Str::slug($title, '-');

    $trivia->title = $title;
    $trivia->slug  = $title_url;

    if ($request->has('image')) {
      $destination = public_path() . $trivia->image;

      if ($trivia->image != '') {
        unlink(public_path() . '/' . $trivia->image);
      }

      $file = $request->file('image');

      $cadena = $file->getClientOriginalName();

      $cadenaConvert = strtr($cadena, " ", "_");

      $nombre = Str::random(10) . $cadenaConvert;

      $file->move('storage/imagesTrivias/', $nombre);

      $trivia->image = '/storage/imagesTrivias/' . $nombre;
    }

    $trivia->content = $request->content;

    $trivia->update();

    return redirect()->route('triviaShow', compact('trivia'))->with('actualizar', 'ok');
  }

  public function triviaDelete(Trivia $trivia)
  {

    $url = str_replace('storage', 'public', $trivia->image);
    if ($trivia->image != '') {
      Storage::delete($url);
      $trivia->delete();
    }

    return redirect()->route('triviaShow')->with('eliminar', 'ok');
  }
  }
<<<<<<< HEAD

  

=======
}
>>>>>>> 3f8690285843aec4c6b25b98e6f0a17b7fad5074
