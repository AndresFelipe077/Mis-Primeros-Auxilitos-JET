<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PagosController extends Controller
{



    public function index(){
        return view('pagos.pagos');
    }

    public function suscripcion(){
        return view('pagos.suscripcon');
    }

    public function menuSuscripcion(){
        return view('pagos.menususcripcion');
    }

    public function crearSuscripcion(Request $request)
    {
        try {
            // Tu código de creación de suscripción aquí
            Log::info('Llegó una solicitud a crearSuscripcion');
            
            // Obtén el ID del usuario actualmente autenticado
            $userId = $request->input('userId');
    
            // Verifica si el usuario ya tiene una suscripción activa
            $suscripcionExistente = Subscription::where('user_id', $userId)->where('subscription_status', 'activo')->first();
    
            if ($suscripcionExistente) {
                // Si el usuario ya tiene una suscripción activa, no permitas crear una nueva
                return response()->json(['error' => 'El usuario ya tiene una suscripción activa'], 422);
            }
    
            // Si el usuario no tiene una suscripción activa, crea un nuevo registro de suscripción
            Subscription::create([
                'user_id' => $userId,
                'subscription_status' => $request->input('status'),
            ]);
    
            // Realiza cualquier otra lógica necesaria
    
            return response()->json(['message' => 'Suscripción creada']);
        } catch (\Exception $e) {
            // Registra información sobre la excepción
            Log::error('Error al crear la suscripción: ' . $e->getMessage());
    
            // Devuelve una respuesta de error apropiada en formato JSON
            return response()->json(['error' => 'Error al crear la suscripción'], 500);
        }
    }
    


    public function cancelarSuscripcion(Request $request)
    {
        try {
            // Obtén el usuario autenticado
            $user = auth()->user();
    
            // Verifica si el usuario existe
            if ($user) {
                // Elimina la suscripción del usuario actual
                $user->subscription->delete();
    
                // Puedes realizar cualquier otra lógica necesaria aquí
    
                // Devuelve una respuesta JSON
                return response()->json(['success' => true, 'message' => 'Suscripción cancelada con éxito']);
            } else {
                return response()->json(['success' => false, 'error' => 'No se encontró el usuario'], 404);
            }
        } catch (\Exception $e) {
            // Si hay un error al cancelar la suscripción, devolver una respuesta de error
            return response()->json(['success' => false, 'error' => 'Error al cancelar la suscripción'], 500);
        }
    }
    
    public function premium(){
        return view('contenido.premium.contenidoPremium');
    }
    
    public function recibo(Request $request, $userId) {
        // Lógica para crear el usuario (si es necesario)
    
        $user = User::find($userId);
    
        // Verifica si el usuario existe
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    
        // Forzar la persistencia del modelo (opcional, dependiendo de tu lógica)
        // $user->save();
    
        // Recargar la instancia del usuario desde la base de datos
        $user = $user->refresh();
    
        $userName = $user->name;
        $monto = 8.00;
    
        // Genera el contenido del recibo PDF
        $pdf = FacadePdf::loadView('pagos.recibo.pdf', compact('userName', 'monto'));
    
        // Retorna el PDF como una respuesta descargable
        return $pdf->download('recibo.pdf');
    }
    
    
    



}
