<?php

use App\Http\Controllers\Api\AuthControllerApi;
use App\Http\Controllers\Api\ContenidoControllerApi;
use App\Http\Controllers\Api\UserControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas de API USER
Route::controller(AuthControllerApi::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware(['auth:sanctum'])->controller(AuthControllerApi::class)->group(function () {
    Route::get('/logout', 'logout');
    Route::get('/delete', 'delete');
});


Route::middleware('guest')->group(
    function () {
        $limiter = config('fortify-limiters.login');

        /*Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware(
            array_filter([$limiter ? 'throttle:' . $limiter : null])
        );*/

        Route::post('/auth/token', [AuthControllerApi::class, 'store']);

        if (Features::enabled(Features::twoFactorAuthentication())) {
            Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store']);
        }
        if (Features::enabled(Features::registration())) {
            Route::post('/register', [AuthControllerApi::class, 'register']);
        }

        if (Features::enabled(Features::resetPasswords())) {
            Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);
            Route::post('/reset-password', [NewPasswordController::class, 'store']);
        }
    }
);


Route::middleware('auth:samctum')->group(
    function () {
        Route::delete('/auth/token', [AuthControllerApi::class, 'destroy']);
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

        // Route::get('/me', [UserController::class, 'me']);
        // Route::get('/tickets',[TicketController::class, 'index']);

        Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store']);
        Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show']);

        //Two Factor Authentication
        if (Features::enabled(Features::twoFactorAuthentication())) {
            $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
                ? ['password-confirm']
                : [];
        }
    }
);


// Apis about contenido

Route::resource('contenidos', ContenidoControllerApi::class);

Route::get('contenidos_by_user/{id}', [ContenidoControllerApi::class, 'contenidosByUser']);

Route::resource('users', UserControllerApi::class);
