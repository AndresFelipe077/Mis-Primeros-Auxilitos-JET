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
    
            // Obtén el estado de la suscripción desde la solicitud
            $status = $request->input('status');
    
            // Crea un registro de suscripción en la tabla de suscripciones
            Subscription::create([
                'user_id' => $userId,
                'subscription_status' => $status,
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
    
    public function premium(){
        return view('contenido.premium.contenidoPremium');
    }
    
   public function recibo(Request $request, $userId){
    $user = User::find($userId);
    $userName = $user->name;
    $monto = 8.00;

    // Genera el contenido del recibo PDF
    $pdf = FacadePdf::loadView('pagos.recibo.pdf', compact('userName', 'monto'));


    // Retorna el PDF como una respuesta descargable
    return $pdf->download('recibo.pdf');
}
    



}
