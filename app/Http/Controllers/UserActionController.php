<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Reserva;
use App\Models\Horario;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserActionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Obtener reservas del usuario con las mesas asociadas
        $reservas = Reserva::where('cliente_email', $user->email)
                           ->with('mesa.branch')
                           ->orderBy('fecha_hora')
                           ->get();

        return view('user_actions.index', compact('user', 'reservas'));
    }

    public function allReservations()
    {
        // Obtener todas las reservas con las mesas y sucursales asociadas, ordenadas por fecha
        $reservas = Reserva::with('mesa.branch')
                           ->orderBy('fecha_hora')
                           ->get();

        return view('user_actions.all', compact('reservas'));
    }

    public function rechazar($id)
    {
        $reserva = Reserva::findOrFail($id);

        // Obtener el horario asociado a la reserva
        $horario = Horario::where('mesa_id', $reserva->mesa_id)
                          ->where('fecha', Carbon::parse($reserva->fecha_hora)->format('Y-m-d'))
                          ->firstOrFail();

        // Cambiar el estado de reservado a 0 en Horario
        $horario->reservado = false;
        $horario->save();

        // Eliminar la reserva
        $reserva->delete();

        // Redirigir de vuelta a la URL anterior
        return redirect()->back()->with('success', 'Reserva eliminada con éxito');
    }
}

