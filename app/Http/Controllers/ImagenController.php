<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{

    //Vista home de videos
    public function index()
    {
        if(Auth::check())
        {
            $imagenes = Imagen::orderBy('id','desc')->paginate(8);
            return view('livewire.imagenes.imagen-show', compact('imagenes'));
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
            return view('livewire.imagenes.imagen-create');
        }
  
    }

    public function store(Request $request)
    {

        $request->validate([
            'title'        => 'required|max:50',
            'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'autor'        => 'string',
            'description'  => 'required|max:250',
        ]);

        $cadena = $request->file('file')->getClientOriginalName();

        $cadenaConvert = strtr($cadena, " ", "_");

        $nombre = Str::random(10) . $cadenaConvert;

        $ruta = storage_path() . '\app\public\images/' . $nombre;

        Image::make($request->file('file'))
            ->resize(900, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);

        $userId = Auth::user()->id;//Se obtiene id del Usuario Autenticado
        $name = Auth::user()->name;//Se obtiene id del Usuario Autenticado


        Imagen::create([
            'title'       => $request->title,
            'url'         => '/storage/images/' . $nombre,
            'autor'       => $name,
            'description' => $request->description,
            'user_id'     => $userId,
                     
        ]);

        return redirect()->route('dashboard.index')->with('subir','ok');
    }


    public function edit(Imagen $imagen)
    {

        if(Auth::check())
        {
            return view('livewire.imagenes.imagen-edit',compact('imagen'));
        }
    }

    public function update(Request $request, Imagen $imagen)
    {
        $request -> validate([
            'title'        => 'required|max:50',
            'file'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'autor'        => 'string',
            'description'  => 'required|max:250',
        ]);
        
        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\images/' . $nombre;

        Image::make($request->file('file'))
            ->resize(900, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);
        
        $name = Auth::user()->name;

        $imagen->title       = $request->title;
        $imagen->url         = '/storage/images/' .$nombre;
        $imagen->autor       = $name;
        $imagen->description = $request->description;
        
        $imagen->save();

        return redirect()->route('dashboard.index', compact('imagen'))->with('actualizar','ok');
    }


    public function destroy(Imagen $imagen)
    {
        $imagen->delete();
                                                    // eliminar => variable, ok => mensaje
        return redirect()->route('dashboard.index')->with('eliminar','ok');
    }




}
