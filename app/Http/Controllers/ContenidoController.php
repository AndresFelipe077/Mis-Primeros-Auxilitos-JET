<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ContenidoController extends Controller
{

    //Vista home de videos
    public function index()
    {
        if(Auth::check())
        {
            $contenidos = Contenido::orderBy('id','desc')->paginate(8);
            return view('livewire.contenido.contenido-show', compact('contenidos'));
        }
        else
        { 
            return view('auth.login');
        }
        
    }

    // //Vista configuracion
    public function ajustes()
    {
        if(Auth::check())
        {
            return view('Profile.ajustes');
        }
        else
        {
            return route('login');
        } 
        
    }


    public function create()
    {   
        if(Auth::check())
        {   
            return view('livewire.contenido.contenido-create');
        }
  
    }

    public function store(Request $request)
    {

        $request->validate([
            'title'        => 'required|max:50',
            'file'         => 'required|image',
            'autor'        => 'required|max:25',
            'description'  => 'required'
        ]);

        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\images/' . $nombre;

        Image::make($request->file('file'))
            ->resize(900, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);

        $userId = Auth::user()->id;//Se obtiene id del Usuario Autenticado

        Contenido::create([
            'title'       => $request->title,
            'url'         => '/storage/images/' . $nombre,
            'autor'       => $request->autor,
            'description' => $request->description,
            'user_id'     => $userId,
                     
        ]);

        return redirect()->route('dashboard.index')->with('subir','ok');
    }


    public function edit(Contenido $contenido)
    {

        if(Auth::check())
        {
            
            return view('livewire.contenido.contenido-edit',compact('contenido'));
        }
    }

    public function update(Request $request, Contenido $contenido)
    {
        $request -> validate([
            'title'        => 'required|max:50',
            'file'         => 'required|image',
            'autor'        => 'required|max:25',
            'description'  => 'required'
        ]);
        
        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\images/' . $nombre;

        

        Image::make($request->file('file'))
            ->resize(900, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);

        $contenido->title       = $request->title;
        $contenido->url         = '/storage/images/' .$nombre;
        $contenido->autor       = $request->autor;
        $contenido->description = $request->description;
        
        $contenido->save();

        return redirect()->route('dashboard.index', compact('contenido'))->with('actualizar','ok');
    }


    public function destroy(Contenido $contenido)
    {
        $contenido->delete();
                                                    // eliminar => variable, ok => mensaje
        return redirect()->route('dashboard.index')->with('eliminar','ok');
    }




}
