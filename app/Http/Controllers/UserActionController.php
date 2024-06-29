<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Reserva;

class UserActionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Obtener órdenes del usuario con sus platos y bebidas asociados
        $orders = Order::where('user_id', $user->id)
                       ->with('dishes', 'beverages')
                       ->get();
        
        // Obtener reservas del usuario con las mesas asociadas
        $reservas = Reserva::where('cliente_email', $user->email)
                           ->with('mesa.branch')
                           ->get();

        return view('user_actions.index', compact('user', 'orders', 'reservas'));
    }
}
