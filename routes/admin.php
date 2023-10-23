<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContentController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])->controller(AdminController::class)->group(function(){

    Route::get('','admin')->name('admin');

    Route::get('generate_pdf_contents','generatePdfContents')->name('admin.pdf.content');

    Route::get('generate_excel_contents', 'exportExcelContents')->name('admin.excel.contents');

    Route::get('generate_pdf_users','generatePdfUsers')->name('admin.pdf.users');

    Route::get('generate_excel_users', 'exportExcelUsers')->name('admin.excel.users');

    Route::get('estadisticas', 'estadisticas')->name('admin.estadisticas');

    Route::get('change_password','changePassword')->name('admin.change_password');

});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])->controller(UserController::class)->group(function() {

    Route::get('/users','users')->name('admin.users'); // Return only users

    Route::get('/roles','roles')->name('admin.roles');

    Route::post('/rol/create','createRole')->name('create.role');

    Route::put('/user/create_observacion/{user}', 'createObservation')->name('admin.users.observacion');

    Route::get('users_admin', 'usersAdmins')->name('admin.admin.users'); // Return only users admin

    Route::put('/user/update/admin/{user}', 'update')->name('admin.user.update');

    Route::delete('/user/delete/{user}', 'destroy')->name('admin.user.delete');

}); // new routes

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])->controller(ContentController::class)->group(function() {

    Route::get('/contenido','adminContent')->name('admin.contenido');

    Route::put('/content_image/{contenido}','updateImage')->name('admin.update.image');

    Route::put('content_video/{contenido}', 'updateVideo')->name('admin.update.video');

    Route::delete('edit/content/admin/{contenido}', 'destroy')->name('admin.contenido.destroy');

});