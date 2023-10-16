<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagosController extends Controller
{



    public function index(){
        return view('pagos.pagos');
    }

    public function suscripcion(){
        return view('pagos.suscripcon');
    }
}
