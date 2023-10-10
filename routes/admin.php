<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;

Route::controller(AdminController::class)->group(function(){

    Route::get('','admin')->name('admin');

    Route::get('/contenido','adminContent')->name('admin.contenido');

    Route::delete('edit/content/admin/{contenido}', 'destroy')->name('admin.contenido.destroy');
    
});

Route::controller(UserController::class)->group(function() {

    Route::get('/users','adminUser')->name('admin.user');

    Route::delete('/user/delete/{user}', 'destroy')->name('admin.user.delete');

});