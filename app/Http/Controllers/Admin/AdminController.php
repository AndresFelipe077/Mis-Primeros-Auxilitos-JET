<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contenido;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function admin()
    {
        return view('admin.home');
    }


    public function adminContent()
    {
        $contenidos = Contenido::orderBy('id', 'asc')->paginate(8);
        return view('admin.contenidos', compact('contenidos'));
    }


    public function destroy(Contenido $contenido)
    {
        $url = str_replace('storage', 'public', $contenido->url);
        if ($contenido->url != '') {
            Storage::delete($url);
            $contenido->delete();
        }

        return redirect()->route('admin.contenido');

    }

}