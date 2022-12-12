<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Nette\Utils\Image;

class ContenidoController extends Controller
{
    //Vista home de videos
    public function index()
    {
        $contenidos = Contenido::orderBy('id','desc')->paginate(8);
        return view('dashboard', compact('contenidos'));
    }

    // //Vista configuracion
    // public function ajustes()
    // {
    //     if(Auth::check())
    //     {
    //         return view('home.ajustes');
    //     }
    //     else
    //     {
    //         $contenidos = Contenido::orderBy('id','desc')->paginate(5);
    //         return view('home.index', compact('contenidos'));  
    //     } 
        
    // }

    public function create()
    {   
        if(Auth::check())
        {
            return view('contenido.contenido-create');
        }
        else
        {
            $contenidos = Contenido::orderBy('id','desc')->paginate(5);
            return view('dashboard', compact('contenidos'));  
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

        // $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        // $ruta = storage_path() . '\app\public\images/' . $nombre;

        // Image::make($request->file('file'))
        //     ->resize(900, null, function($constraint){
        //         $constraint->aspectRatio();
        //     })
        //     ->save($ruta);

        Contenido::create([
            'title'       => $request->title,
            'url'         => '/storage/images/',
            'autor'       => $request->autor,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.index')->with('subir','ok');
    }


    public function edit(Contenido $contenido)
    {

        if(Auth::check())
        {
            
            return view('contenido.contenido-edit',compact('contenido'));
        }
        else
        {
            $contenidos = Contenido::orderBy('id','desc')->paginate(5);
            return view('dashboard.index', compact('contenidos'));  
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
        
        // $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        // $ruta = storage_path() . '\app\public\images/' . $nombre;

        

        // Image::make($request->file('file'))
        //     ->resize(900, null, function($constraint){
        //         $constraint->aspectRatio();
        //     })
        //     ->save($ruta);

        $contenido->title       = $request->title;
        $contenido->url         = '/storage/images/';
        $contenido->autor       = $request->autor;
        $contenido->description = $request->description;
        
        $contenido->save();

        return redirect()->route('dashboard.index', compact('contenido'));
    }


    public function destroy(Contenido $contenido)
    {
        $contenido->delete();
                                                    // eliminar => variable, ok => mensaje
        return redirect()->route('dashboard.index')->with('eliminar','ok');
    }
}
