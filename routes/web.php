<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\SocialController;
use App\Http\Livewire\Game\ShowAdivinar;
use App\Http\Livewire\Game\ShowTrivia;
use App\Models\User;
use Laravel\Fortify\Features;
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
    Route::get('/dashboard', 'index')->name('dashboard.index');

    Route::get('dashboard/create/contenido/', 'create')->name('dashboard.create');

    Route::post('dashboard/store/contenido', 'store')->name('contenido.store');

    Route::get('/dashboard/{contenido}/edit', 'edit')->name('contenido.edit');

    Route::put('/dashboard/{contenido}', 'update')->name('contenido.update');

    Route::delete('edit/{contenido}', 'destroy')->name('contenido.destroy');

    //Acceder a vista ajustes
    Route::get('dashboard/ajustes', 'ajustes')->name('dashboard.ajustes');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(ShowTrivia::class)->group(function () {

    //Vista juegos
    Route::get('/dashboard/games', 'game')->name('dashboard.game');

    Route::get('/dashboard/games/trivia', 'triviaShow')->name('triviaShow'); //Vista trivia

    Route::get('/dashboard/games/trivia/create', 'triviaCreate')->name('triviaCreate');
});

if (Features::enabled(Features::twoFactorAuthentication())) {
Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
    ->middleware(['guest:' . config('fortify.guard')])
    ->name('two-factor.login');
}
// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->controller(ShowAdivinar::class)->group(function(){

//     //Vista home de videos
//     //Route::get('/dashboard/games','game')->name('dashboard.game');

// });

//Crear usuarios con redes sociales

Route::get('/login-facebook', [SocialController::class, 'redirectFacebook'])->name('facebook');

Route::get('/facebook-callback', [SocialController::class, 'callbackFacebook']);

Route::get('/login-google', [SocialController::class, 'redirectGoogle'])->name('google');

Route::get('/google-callback', [SocialController::class, 'callbackGoogle']);
