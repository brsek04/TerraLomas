<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Branch;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('mesa')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create($branch_id)
    {
        // Obtener las mesas de la sucursal específica
        $mesas = Mesa::where('branch_id', $branch_id)->get();

        // Pasar las mesas y cualquier otra información necesaria a la vista
        return view('reservas.create', compact('mesas', 'branch_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'cliente_nombre' => 'required|string|max:255',
            'cliente_email' => 'required|email|max:255',
            'cliente_telefono' => 'required|string|max:15',
            'fecha_hora' => 'required|date',
            'num_personas' => 'required|integer|min:1',
        ]);

        $reserva = Reserva::create($request->all());
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

}
