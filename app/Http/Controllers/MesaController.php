<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Branch;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Horario;

class MesaController extends Controller
{
    public function index()
    {
        $mesas = Mesa::paginate(10);
        return view('mesas.index', compact('mesas'));
    }

    public function create()
    {
        $branches = Branch::all();
        return view('mesas.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|unique:mesas',
            'capacidad' => 'required|integer',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $mesa = Mesa::create($request->all());

        // Generar horarios para los próximos 7 días
        $horas = ['13:00:00', '15:00:00', '17:00:00', '19:00:00'];
        for ($i = 0; $i < 7; $i++) {
            $fecha = Carbon::now()->addDays($i)->toDateString();
            foreach ($horas as $hora) {
                Horario::create([
                    'mesa_id' => $mesa->id,
                    'fecha' => $fecha,
                    'hora' => $hora,
                ]);
            }
        }

        return redirect()->route('mesas.index')->with('success', 'Mesa creada correctamente.');
    }

    public function edit(Mesa $mesa)
    {
        $branches = Branch::all();
        return view('mesas.edit', compact('mesa', 'branches'));
    }

    public function update(Request $request, Mesa $mesa)
    {
        $request->validate([
            'numero' => 'required|string|unique:mesas,numero,'.$mesa->id,
            'capacidad' => 'required|integer',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $mesa->update($request->all());

        return redirect()->route('mesas.index')->with('success', 'Mesa actualizada correctamente.');
    }

    public function destroy(Mesa $mesa)
    {
        $mesa->delete();

        return redirect()->route('mesas.index')->with('success', 'Mesa eliminada correctamente.');
    }
}
