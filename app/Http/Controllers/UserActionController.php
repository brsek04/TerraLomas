<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserva;

class UserActionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Obtener reservas del usuario con las mesas asociadas
        $reservas = Reserva::where('cliente_email', $user->email)
                           ->with('mesa.branch')
                           ->get();

        return view('user_actions.index', compact('user', 'reservas'));
    }
}
