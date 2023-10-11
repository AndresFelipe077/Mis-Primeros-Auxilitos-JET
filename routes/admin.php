<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContentController;

Route::controller(AdminController::class)->group(function(){

    Route::get('','admin')->name('admin');

});

Route::controller(UserController::class)->group(function() {

    Route::get('/users','users')->name('admin.users'); // Return only users

    Route::get('users_admin', 'usersAdmins')->name('admin.admin.users'); // Return only users admin

    Route::delete('/user/delete/{user}', 'destroy')->name('admin.user.delete');

});

Route::controller(ContentController::class)->group(function() {

    Route::get('/contenido','adminContent')->name('admin.contenido');

    Route::put('/content_image','updateImage')->name('admin.update.image');

    Route::put('content_video', 'updateVideo')->name('admin.update.video');

    Route::delete('edit/content/admin/{contenido}', 'destroy')->name('admin.contenido.destroy');

});