<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;


Route::controller(AdminController::class)->group(function(){

    Route::get('','admin')->name('admin');

    Route::get('/users','adminUser')->name('admin.user');

    Route::get('/contenido','adminContent')->name('admin.contenido');
    
    

});