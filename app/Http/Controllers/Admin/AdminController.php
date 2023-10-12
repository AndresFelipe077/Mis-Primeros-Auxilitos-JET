<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\User;

class AdminController extends Controller
{

    public function admin()
    {  
        return view('admin.home');
    }


    public function adminContent()
    {
        $contenidos = Contenido::orderBy('id','asc')->paginate(8);
        return view('admin.contenidos', compact('contenidos'));
    }

    public function adminUser()
    {
        $users = User::orderBy('id','asc')->paginate(10);
        return view('admin.users',compact('users'));
    }

}
