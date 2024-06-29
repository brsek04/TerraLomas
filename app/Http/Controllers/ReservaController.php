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

class ReservaController extends Controller
{
    public function index($branchId)
    {
        $branch = Branch::findOrFail($branchId);
        $reservas = Reserva::whereHas('mesa', function ($query) use ($branchId) {
            $query->where('branch_id', $branchId);
        })->get();

        return view('reservas.index', compact('reservas', 'branch'));
    }

    public function create($branch_id)
{
    $mesas = Mesa::where('branch_id', $branch_id)->get();
    $horarios = Horario::whereIn('mesa_id', $mesas->pluck('id'))->where('reservado', false)->get();
    $fechas = $horarios->pluck('fecha')->unique();
    $capacidades = [];

    foreach ($fechas as $fecha) {
        $capacidades[$fecha] = Mesa::where('branch_id', $branch_id)
                                   ->whereHas('horarios', function ($query) use ($fecha) {
                                       $query->where('fecha', $fecha)->where('reservado', false);
                                   })
                                   ->pluck('capacidad', 'id')
                                   ->toArray();
    }

    $user = Auth::user();

    return view('reservas.create', compact('mesas', 'branch_id', 'horarios', 'fechas', 'capacidades', 'user'));
}



    public function store(Request $request)
    {
        $request->validate([
            'horario_id' => 'required|exists:horarios,id',
            'cliente_nombre' => 'required|string|max:255',
            'cliente_email' => 'required|email|max:255',
            'cliente_telefono' => 'required|string|max:15',
            'num_personas' => 'required|integer|min:1',
        ]);

        $horario = Horario::findOrFail($request->horario_id);
        $horario->reservado = true;
        $horario->save();

        Reserva::create([
            'mesa_id' => $horario->mesa_id,
            'cliente_nombre' => $request->cliente_nombre,
            'cliente_email' => $request->cliente_email,
            'cliente_telefono' => $request->cliente_telefono,
            'fecha_hora' => "{$horario->fecha} {$horario->hora}",
            'num_personas' => $request->num_personas,
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva creada con éxito');
    }

    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $mesas = Mesa::all();
        return view('reservas.edit', compact('reserva', 'mesas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'cliente_nombre' => 'required|string|max:255',
            'cliente_email' => 'required|email|max:255',
            'cliente_telefono' => 'required|string|max:15',
            'fecha_hora' => 'required|date',
            'num_personas' => 'required|integer|min:1',
        ]);

        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada con éxito');
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada con éxito');
    }

    public function reservasPorBranch($branchId)
    {
        $branch = Branch::findOrFail($branchId);
        $reservas = Reserva::whereHas('mesa', function ($query) use ($branchId) {
            $query->where('branch_id', $branchId);
        })->get();

        return view('reservas.index', compact('reservas', 'branch'));
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

    // Redirigir a la página de user-actions
    return redirect()->route('user-actions')->with('success', 'Reserva rechazada con éxito');
}



}
