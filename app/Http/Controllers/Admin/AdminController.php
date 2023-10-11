<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function admin()
    {
        return view('admin.home');
    }

}