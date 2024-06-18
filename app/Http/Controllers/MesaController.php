<?php


namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use App\Models\Branch; 

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
        // Valida y guarda la nueva mesa
        $request->validate([
            'numero' => 'required|string|unique:mesas',
            'capacidad' => 'required|integer',
            'branch_id' => 'required|exists:branches,id',
        ]);
    
        // Crear una nueva instancia de Mesa con los datos validados y branch_id
        $mesa = new Mesa();
        $mesa->numero = $request->input('numero');
        $mesa->capacidad = $request->input('capacidad');
        $mesa->branch_id = $request->input('branch_id');
        $mesa->save();
    
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


