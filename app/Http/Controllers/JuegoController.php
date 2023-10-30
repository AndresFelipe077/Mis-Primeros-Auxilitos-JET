<?php
namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Nivel;
use App\Models\ProgresoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuegoController extends Controller
{
    public function mostrarJuegosYNiveles()
    {
        $usuario = Auth::user();
        $juegos = Juego::all();
        $nivelesDisponibles = $this->determinarNivelesDisponibles($usuario);

        // Creamos un array para almacenar si el usuario puede jugar cada nivel
        $usuarioPuedeJugarNivel = [];

        foreach ($juegos as $juego) {
            if (isset($nivelesDisponibles[$juego->id])) {
                foreach ($nivelesDisponibles[$juego->id] as $nivel) {
                    $usuarioPuedeJugarNivel[$nivel] = $this->verificarSiUsuarioPuedeJugarNivel($usuario, $nivel);
                }
            }
        }

        return view('vista.juegos_y_niveles', [
            'juegos' => $juegos,
            'nivelesDisponibles' => $nivelesDisponibles ?? [],
            'usuarioPuedeJugarNivel' => $usuarioPuedeJugarNivel,
        ]);
    }

    public function jugarNivel($nivel)
    {
        $usuario = Auth::user();

        if ($this->puedeJugarNivel($usuario, $nivel)) {
            // El usuario cumple con los requisitos, permite el acceso al nivel

            // Obtén el juego asociado al nivel
            $nivel = Nivel::where('nivel', $nivel)->first(); // Asumiendo que nivel es el campo que almacena el número de nivel

            if ($nivel) {
                if ($nivel->juego->nombre === 'Trivias') {
                    return redirect()->route('jugar_trivia', ['nivel' => $nivel->id]);
                } elseif ($nivel->juego->nombre === 'Adivinanza') {
                    return redirect()->route('juego_adivinanza', ['nivel' => $nivel->id]);
                } else {
                    // Manejar otros juegos si es necesario
                }
            } else {
                // Manejar la situación en la que el nivel no se encuentra
            }
        }
    }

    private function puedeJugarNivel($usuario, $nivelId) {
        $nivel = Nivel::find($nivelId);
        if ($nivel) {
            // Implementa tu lógica de verificación. Por ejemplo, verifica si el usuario cumple con los requisitos para jugar el nivel.
            // Si cumple con los requisitos, devuelve true, de lo contrario, devuelve false.
            return true; // Cambia esto según tus requisitos
        }
        return false;
    }

    public function jugarSiguienteNivel($nivel)
{
    $usuario = Auth::user();

    if ($this->puedeJugarNivel($usuario, $nivel)) {
        // El usuario cumple con los requisitos, permite el acceso al siguiente nivel

        // Lógica para determinar el número del siguiente nivel
        $siguienteNivel = $nivel + 1;

        // Redirige al usuario al siguiente nivel
        return redirect()->route('jugar_nivel', ['nivel' => $siguienteNivel]);
    } else {
        // El usuario no cumple con los requisitos, redirige o muestra un mensaje de error
    }
}

    public function mostrarResultado($juego, $resultado)
    {
        // Lógica para mostrar el resultado del juego
        return view('vista.resultado', [
            'juego' => $juego,
            'resultado' => $resultado,
        ]);
    }

    public function completarNivel($nivelId)
    {
        $usuario = Auth::user();
        $nivel = Nivel::find($nivelId);

        if ($nivel) {


            $juegoId = $nivel->juego_id;
            // Verifica si el nivel ya ha sido completado por el usuario
            $nivelCompletado = ProgresoUsuario::where('user_id', $usuario->id)
                ->where('nivel_id', $nivel->id)
                ->exists();

            if (!$nivelCompletado) {
                // El nivel no ha sido completado previamente, registra el progreso
                $progreso = new ProgresoUsuario();
                $progreso->user_id = $usuario->id;
                $progreso->nivel_id = $nivel->id;
                $progreso->juego_id = $juegoId;
                $progreso->save();

                // Verifica si se han desbloqueado nuevos niveles o juegos
                $this->verificarDesbloqueoDeContenidos($usuario);
            }
        }
    }
    public function determinarNivelesDisponibles($usuario)
    {
        $nivelesDisponibles = [];

        $juegos = Juego::all();
        foreach ($juegos as $juego) {
            $nivelesDisponibles[$juego->id] = range(1, $juego->niveles->count());
        }

        return $nivelesDisponibles;
    }

    private function verificarDesbloqueoDeContenidos($usuario)
    {
        // Implementa la lógica para verificar si el usuario ha desbloqueado nuevos contenidos
        // Esto podría incluir verificar el progreso en la base de datos y actualizar el estado de desbloqueo.
    }

    private function verificarSiUsuarioPuedeJugarNivel($usuario, $nivelId) {
        $nivel = Nivel::find($nivelId);

        if ($nivel) {
            // Implementa tu lógica de verificación. Por ejemplo, verifica si el usuario cumple con los requisitos para jugar el nivel.
            // Si cumple con los requisitos, devuelve true, de lo contrario, devuelve false.
            return true; // Cambia esto según tus requisitos
        }

        return false;
    }



    public function registrarJuego()
{
    return view('juegos.registrar');
}

public function guardarJuego(Request $request)
{
    // Valida los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
    ]);

    // Crea un nuevo juego
    $juego = new Juego;
    $juego->nombre = $request->input('nombre');
    $juego->descripcion = $request->input('descripcion');
    $juego->save();

    return redirect()->route('juegos.index')->with('success', 'Juego registrado exitosamente.');
}
}
