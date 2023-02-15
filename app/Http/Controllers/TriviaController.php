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

  public function triviaShow()
  {
    $trivias = Trivia::orderBy('id', 'desc')->paginate(9);
    return view('livewire.game.show-trivia', compact('trivias'));
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
      'content'  => 'required|max:250',
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
      'title'   => $request->title,
      'slug'    => $slug_title_url,
      'image'   => '/storage/imagesTrivias/' . $nombre,
      'content' => $request->content,

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
    $title_url  = Str::random(1) . $title;

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
