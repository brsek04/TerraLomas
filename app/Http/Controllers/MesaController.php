<?php


namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Horario;
use Illuminate\Http\Request;
use App\Models\Branch; 
use Carbon\Carbon; 

class MesaController extends Controller
{
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesas.index', compact('mesas'));
    }

    public function create()
    {
        $branches = Branch::all(); // Obtener todas las sucursales desde la base de datos
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
        return view('mesas.edit', compact('mesa'));
    }

    public function update(Request $request, Mesa $mesa)
    {
        // Valida y actualiza la mesa existente
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


