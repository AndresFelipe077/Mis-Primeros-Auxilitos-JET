<?php

use App\Http\Controllers\AdivinanzaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\VideoController;
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


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(ImagenController::class)->group(function () {

    //Vista home de videos
    Route::get('/dashboard', 'index')->name('dashboard.index');

    Route::get('dashboard/create/contenido/', 'create')->name('dashboard.create');

    Route::post('dashboard/store/contenido', 'store')->name('contenido.store');

    Route::get('/dashboard/{imagen}/edit', 'edit')->name('contenido.edit');

    Route::put('/dashboard/{imagen}', 'update')->name('contenido.update');

    Route::delete('edit/{imagen}', 'destroy')->name('contenido.destroy');

    //Acceder a vista ajustes
    Route::get('dashboard/ajustes', 'ajustes')->name('dashboard.ajustes');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(VideoController::class)->group(function () {
    Route::get('dashboard/videos', 'index')->name('video.index');
    Route::any('dashboard/videos/create', 'create')->name('video.create');
    Route::any('dashboard/videos/store', 'store')->name('video.store');
    Route::any('dashboard/videos/show/{id}', 'show')->name('video.show');
    Route::any('dashboard/videos/edit/{id}', 'edit')->name('video.edit');
    Route::any('dashboard/videos/destroy/{id}', 'destroy')->name('video.destroy');
    Route::any('dashboard/videos/update/{id}', 'update')->name('video.update');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(TriviaController::class)->group(function () {

    Route::get('/dashboard/games', 'game')->name('dashboard.game');

    Route::get('/dashboard/games/trivia', 'triviaShow')->name('triviaShow'); //Vista trivia

    Route::get('/dashboard/games/trivia/create', 'triviaCreate')->name('triviaCreate');

    Route::post('dashboard/games/trivia/create', 'triviaStore')->name('triviaStore');

    Route::get('dashboard/games/trivia/{trivia}/edit', 'triviaEdit')->name('triviaEdit');

    Route::put('dashboard/games/trivia/{trivia}/edit', 'triviaUpdate')->name('triviaUpdate');

    Route::delete('dashboard/games/trivia/{trivia}/delete', 'triviaDelete')->name('triviaDelete');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(AdivinanzaController::class)->group(function () {

    Route::get('/dashboard/games/adivinanza', 'adivinanzaShow')->name('adivinanzaShow'); //Vista trivia

    Route::get('/dashboard/games/adivinanza/create', 'adivinanzaCreate')->name('adivinanzaCreate');

    Route::post('dashboard/games/adivinanza/create', 'adivinanzaStore')->name('adivinanzaStore');

    Route::get('dashboard/games/adivinanza/{adivinanza}/edit', 'adivinanzaEdit')->name('adivinanzaEdit');

    Route::put('dashboard/games/adivinanza/{adivinanza}/edit', 'adivinanzaUpdate')->name('adivinanzaUpdate');

    Route::delete('dashboard/games/adivinanza/{adivinanza}/delete', 'adivinanzaDelete')->name('adivinanzaDelete');
});




// if (Features::enabled(Features::twoFactorAuthentication())) {
// Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
//     ->middleware(['guest:' . config('fortify.guard')])
//     ->name('two-factor.login');
// }
// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->controller(ShowAdivinar::class)->group(function(){

//     //Vista home de videos
//     //Route::get('/dashboard/games','game')->name('dashboard.game');

// });

//Crear usuarios con redes sociales

Route::get('/login-facebook', [SocialController::class, 'redirectFacebook'])->name('facebook');

Route::get('/facebook-callback', [SocialController::class, 'callbackFacebook']);

Route::get('/login-google', [SocialController::class, 'redirectGoogle'])->name('google');

Route::get('/google-callback', [SocialController::class, 'callbackGoogle']);
