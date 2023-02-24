<?php

use App\Http\Controllers\AdivinanzaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VistasController;
use App\Http\Livewire\Game\ShowAdivinar;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::group(['middleware' => ['guest', 'throttle:' . config('fortify.limiters.login')]], function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(ContenidoController::class)->group(function () {

    //Vista home de videos
    Route::get('dashboard', 'index')->name('dashboard.index');

    Route::get('dashboard/create/contenido/image', 'createImage')->name('dashboard.create.image');

    Route::get('dashboard/create/contenido/video', 'createVideo')->name('dashboard.create.video');

    Route::post('dashboard/store/contenido/image', 'storeImage')->name('contenido.store.image');

    Route::post('dashboard/store/contenido/video', 'storeVideo')->name('contenido.store.video');

    Route::get('dashboard/edit/image/{contenido}', 'editImage')->name('contenido.edit.image');

    Route::get('dashboard/edit/video/{contenido}', 'editVideo')->name('contenido.edit.video');

    Route::put('dashboard/image/{contenido}', 'updateImage')->name('contenido.update.image');

    Route::put('dashboard/video/{contenido}', 'updateVideo')->name('contenido.update.video');

    Route::delete('edit/{contenido}', 'destroy')->name('contenido.destroy');


});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(TriviaController::class)->group(function () {

    Route::get('dashboard/games', 'game')->name('dashboard.game');

    Route::get('dashboard/games/trivia', 'triviaShow')->name('triviaShow'); //Vista trivia

    Route::get('dashboard/games/trivia/create', 'triviaCreate')->name('triviaCreate');

    Route::post('dashboard/games/trivia/create', 'triviaStore')->name('triviaStore');

    Route::get('dashboard/games/trivia/edit/{trivia}', 'triviaEdit')->name('triviaEdit');

    Route::put('dashboard/games/trivia/edit/{trivia}', 'triviaUpdate')->name('triviaUpdate');

    Route::delete('dashboard/games/trivia/delete/{trivia}', 'triviaDelete')->name('triviaDelete');
});

//Vistas
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(VistasController::class)->group(function () {
    
    Route::get('preguntas','preguntas5_7Show')->name('preguntas');

    //Acceder a vista ajustes
    Route::get('dashboard/ajustes', 'ajustes')->name('dashboard.ajustes');

    //Acceder a vista mision y vision
    Route::get('dashboard/mision_y_vision', 'misionvision')->name('dashboard.mision.vision');

    Route::get('dashboard/creditos', 'showCreditos')->name('dashboard.creditos');

    Route::get('ayuda','showAyuda')->name('ayuda');

});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(AdivinanzaController::class)->group(function () {

    Route::get('dashboard/games/adivinanza', 'adivinanzaShow')->name('adivinanzaShow'); //Vista trivia

    Route::get('dashboard/games/adivinanza/create', 'adivinanzaCreate')->name('adivinanzaCreate');

    Route::post('dashboard/games/adivinanza/create', 'adivinanzaStore')->name('adivinanzaStore');

    Route::get('dashboard/games/adivinanza/edit/{adivinanza}', 'adivinanzaEdit')->name('adivinanzaEdit');

    Route::put('dashboard/games/adivinanza/edit/{adivinanza}', 'adivinanzaUpdate')->name('adivinanzaUpdate');

    Route::delete('dashboard/games/adivinanza/delete/{adivinanza}', 'adivinanzaDelete')->name('adivinanzaDelete');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(VideoController::class)->group(function () {
    
    Route::get('dashboard/videos', 'index')->name('video.index');

    Route::get('dashboard/videos/create', 'create')->name('video.create');

    Route::post('dashboard/videos/store', 'store')->name('video.store');

    Route::get('dashboard/videos/edit/{video}', 'edit')->name('video.edit');

    Route::put('dashboard/videos/update/{video}', 'update')->name('video.update');

    Route::delete('dashboard/videos/destroy/{video}', 'destroy')->name('video.destroy');

});

//Crear usuarios con redes sociales
Route::get('/login-facebook', [SocialController::class, 'redirectFacebook'])->name('facebook');

Route::get('/facebook-callback', [SocialController::class, 'callbackFacebook']);

Route::get('/login-google', [SocialController::class, 'redirectGoogle'])->name('google');

Route::get('/google-callback', [SocialController::class, 'callbackGoogle']);