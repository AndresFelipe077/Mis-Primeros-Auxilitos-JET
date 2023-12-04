<?php

use App\Http\Controllers\AdivinaController;
use App\Http\Controllers\AdivinanzaController;
use App\Http\Controllers\AhorcadoController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\JuegoAdivinanzaController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\Trivias2Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\DownloadApp;
use App\Http\Controllers\JuegoAdivinanzasController;
use App\Http\Controllers\JuegosAdivina;
use App\Http\Controllers\JuegosController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\PlaysController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizResultController;
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


// Games of nico
// Rutas de los Juegos
Route::get('juegos', [JuegosController::class, 'index']);

Route::get('juegos2', [JuegosAdivina::class, 'index2']);

Route::get('ahorcado', [AhorcadoController::class, 'index3']);

Route::get('/adivina', [AdivinaController::class, 'index4']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(TriviaController::class)->group(function () {

    Route::get('dashboard/games', 'game')->name('dashboard.game');


    // Muestra la vista de preguntas 5 a 7 años
    Route::get('dashboard/games/preguntas_5_7', 'triviaShow5_7')->name('triviaShow5_7'); //Vista trivia

    // Muestra la vista de crear preguntas de 5 a 7 años
    Route::get('dashboard/games/create/preguntas_5_7', 'create_preguntas5_7')->name('game.preguntas5_7');

    // Almacena los datos de vista 5 a 7 años
    Route::post('dashboard/games/store/preguntas_5_7', 'storePreguntas5_7')->name('storePreguntas5_7');




    Route::get('dashboard/games/preguntas-8-10', 'triviaShow8_10')->name('triviaShow8_10');

    Route::get('dashboard/games/create/preguntas-8-10-array', 'create_preguntas_array8_10')->name('game.preguntas_array8_10');

    Route::get('dashboard/games/create/preguntas-8-10', 'create_preguntas8_10')->name('game.preguntas8_10');

    Route::post('dashboard/games/preguntas-8-10', 'storePreguntas8_10')->name('storePreguntas8_10');


    Route::get('dashboard/games/preguntas_11_12', 'triviaShow11_12')->name('triviaShow11_12');

    Route::get('dashboard/games/create/preguntas_11_12', 'create_preguntas11_12')->name('game.preguntas11_12');

    Route::post('dashboard/games/preguntas_11_12', 'storePreguntas11_12')->name('storePreguntas11_12');
















    Route::get('dashboard/games/trivia/create', 'triviaCreate')->name('triviaCreate');

    Route::post('dashboard/games/trivia/create', 'triviaStore')->name('triviaStore');

    Route::get('dashboard/games/trivia/edit/{trivia}', 'triviaEdit')->name('triviaEdit');

    Route::put('dashboard/games/trivia/edit/{trivia}', 'triviaUpdate')->name('triviaUpdate');

    Route::delete('dashboard/games/trivia/delete/{trivia}', 'triviaDelete')->name('triviaDelete');
});

//Vistas
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(VistasController::class)->group(function () {

    //Acceder a vista ajustes
    Route::get('dashboard/ajustes', 'ajustes')->name('dashboard.ajustes');

    //Acceder a vista mision y vision
    Route::get('dashboard/mision_y_vision', 'misionvision')->name('dashboard.mision.vision');

    Route::get('dashboard/creditos', 'showCreditos')->name('dashboard.creditos');

    Route::get('ayuda', 'showAyuda')->name('ayuda');

    Route::get('/pago-mercado-pago', 'check')->name('checkout.check');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(AdivinanzaController::class)->group(function () {

    Route::get('dashboard/games/adivinanza', 'adivinanzaShow')->name('adivinanzaShow'); //Vista trivia

    Route::get('dashboard/games/adivinanza/create', 'adivinanzaCreate')->name('adivinanzaCreate');

    Route::post('dashboard/games/adivinanza/create', 'adivinanzaStore')->name('adivinanzaStore');

    Route::get('dashboard/games/adivinanza/edit/{adivinanza}', 'adivinanzaEdit')->name('adivinanzaEdit');

    Route::put('dashboard/games/adivinanza/edit/{adivinanza}', 'adivinanzaUpdate')->name('adivinanzaUpdate');

    Route::delete('dashboard/games/adivinanza/delete/{adivinanza}', 'adivinanzaDelete')->name('adivinanzaDelete');
});



// Rutas para Quizzes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(QuizController::class)->group(function () {
    Route::get('/quizzes', 'index')->name('quiz.index');
    Route::get('/quizzes/create', 'create')->name('quiz.create');
    Route::post('/quizzes', 'store')->name('quiz.store');
    Route::get('/quiz/{quiz}', 'show')->name('quiz.show');
    Route::get('/quiz/{quiz}/edit', 'edit')->name('quiz.edit');
    Route::put('/quiz/{quiz}', 'update')->name('quiz.update');
    Route::delete('/quiz/{quiz}', 'destroy')->name('quiz.destroy');

    Route::get('/quiz/{quiz}/response', 'showQuiz')->name('quiz_responder.show');

    // Route::post('/quiz/submit', 'submit')->name('quiz.submit');

    Route::post('/quiz/{quiz}/submit', 'submit')->name('quiz.submit');
});

// Rutas para preguntas
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(QuestionController::class)->group(function () {

    Route::get('/quizzes/questions', 'index')->name('questions.index');
    Route::get('/quizzes/{quiz}/questions/create', 'create')->name('questions.create');
    Route::post('/quizzes/{quiz}/questions', 'store')->name('questions.store');
    Route::get('/question/{question}', 'show')->name('questions.show');
    Route::get('/question/{question}/edit', 'edit')->name('questions.edit');
    Route::put('/question/{question}', 'update')->name('questions.update');
    Route::delete('/question/{question}', 'destroy')->name('questions.destroy');
});

// Rutas para respuestas
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(AnswerController::class)->group(function () {

    Route::get('/questions/{question}/answers/create', 'create')->name('answers.create');
    Route::post('/questions/{question}/answers', 'store')->name('answers.store');
    Route::get('/questions/{answer}/answer/edit', 'edit')->name('answers.edit');
    Route::put('/questions/{answer}/answer/update', 'update')->name('answers.update');
    Route::delete('/answers/{question}', 'destroy')->name('answers.destroy');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(QuizResultController::class)->group(function () {

    Route::get('/resultado', 'mostrarResultado')->name('resultado');
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




////////pagos

Route::get('/pagos',[PagosController::class,'index']);
Route::get('/suscripcion', [PagosController::class, 'suscripcion'])->name('suscripcion');
Route::get('/menuSuscripcion', [PagosController::class, 'menuSuscripcion'])->name('menuSuscripcion');

Route::post('/crear-suscripcion', [PagosController::class, 'crearSuscripcion'])->name('crearSuscripcion');

Route::get('/premium', [PagosController::class, 'premium']);

Route::get('/generar-recibo-pdf/{userId}', [PagosController::class,'recibo']);




// // routes/web.php

Route::get('/juegos/registrar', [JuegoController::class, 'registrarJuego'])->name('juegos.registrar');
Route::post('/juegos/guardar', [JuegoController::class,'guardarJuego'])->name('juegos.guardar');


// Route::middleware(['auth'])->group(function () {
//     // Rutas protegidas por autenticación
//     Route::get('/juegos-y-niveles', [JuegoController::class, 'mostrarJuegosYNiveles'])->name('juegos_niveles');

//     // ... Otras rutas protegidas ...
// });
Route::post('/cancelar-suscripcion', [PagosController::class, 'cancelarSuscripcion'])->name('cancelar-suscripcion');




/*
========================
RUTAS JUEGOS
========================
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(ContenidoController::class)->group(function () {

Route::get('/juegos', [PlaysController::class, 'mostrarJuegos'])->name('juegos.lista');
Route::get('/juegos/{juego}/niveles', [PlaysController::class, 'mostrarNiveles'])->name('juegos.niveles');
Route::get('/juegos/nivel/{nivel}', [PlaysController::class, 'jugarNivel'])->name('juegos.nivel');
Route::post('/juegos/nivel/{nivel}/procesar', [PlaysController::class, 'procesarRespuesta'])->name('juegos.procesar');
Route::get('/juegos/resultado/{nombreDelJuego}/{resultado}', [PlaysController::class, 'mostrarResultado'])->name('juegos.resultado');
});


Route::get('/download_apk', [DownloadApp::class, 'downloadApk'])->name('download.apk');
