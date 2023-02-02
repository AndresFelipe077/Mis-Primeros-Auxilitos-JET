<?php

namespace App\Http\Controllers;
use App\Models\Trivia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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

    public function triviaStore(Request $request)
    {
        $request->validate([
            'title'    => 'required|max:50',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'  => 'required|max:250',
        ]);

        $nombre = Str::random(10) . $request->file('image')->getClientOriginalName();
        // $nombre = Image::make($request->file('photo')->getRealPath());

        $ruta = storage_path() . '\app\public\imagesTrivias/' . $nombre;

        Image::make($request->file('image'))
            ->resize(900, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);

        $userId = Auth::user()->id;//Se obtiene id del Usuario Autenticado
        $name = Auth::user()->name;//Se obtiene id del Usuario Autenticado


        Trivia::create([
            'title'   => $request->title,
            'image'   => '/storage/imagesTrivias/' . $nombre,
            'content' => $request->content,
                     
        ]);

        return redirect()->route('triviaShow')->with('subir','ok');
    }

    public function triviaCreate()
    {
        return view('livewire.game.create-trivia');
    }

    public function triviaEdit(Trivia $trivia)
    {
        return view('livewire.game.edit-trivia', compact('trivia'));
    }

    public function triviaUpdate(Request $request, Trivia $trivia)
    {
        $request -> validate([
            'title'    => 'required|max:50',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'  => 'required|max:250',
        ]);
        
        $nombre = Str::random(10) . $request->file('image')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\imagesTrivias/' . $nombre;

        

        Image::make($request->file('image'))
            ->resize(900, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);
        
        $name = Auth::user()->name;

        $trivia->title   = $request->title;
        $trivia->image   = '/storage/imagesTrivias/' .$nombre;
        $trivia->content = $request->content;
        
        $trivia->save();

        return redirect()->route('triviaShow', compact('trivia'))->with('actualizar','ok');
    }

    public function triviaDelete(Trivia $trivia)
    {
        $trivia->delete();
        return redirect()->route('triviaShow')->with('eliminar','ok');
    }


}
