<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function admin()
    {
        return view('admin.home');
    }

    public function estadisticas()
    {
        return view('admin.statistics');
    }

    public function changePassword()
    {
        return view('admin.change_password');
    }

}