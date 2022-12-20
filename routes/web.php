<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenidoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->controller(ContenidoController::class)->group(function(){

    //Vista home de videos
    Route::get('/dashboard','index')->name('dashboard.index');

    Route::get('dashboard/create/contenido','create')->name('dashboard.create');

    Route::post('dashboard/store/contenido', 'store')->name('contenido.store');

    Route::get('/dashboard/{contenido}/edit','edit')->name('contenido.edit');

    Route::put('/dashboard/{contenido}','update')->name('contenido.update');

    Route::delete('edit/{contenido}','destroy')->name('contenido.destroy');

    //Acceder a vista ajustes
    Route::get('dashboard/ajustes','ajustes')->name('dashboard.ajustes');
    

});
