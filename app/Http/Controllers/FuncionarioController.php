<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Documento;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    function __construct(){
        $this->middleware('permission:datos');
    }

    public function index()
    {
        // Obtener usuarios con roles de funcionario, cocina y garzon
        $funcionarios = User::with('documentos')
                            ->whereHas('roles', function($query) {
                                $query->whereIn('name', ['funcionario', 'cocina', 'garzon']);
                            })
                            ->get();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function edit($id)
    {
        $funcionario = User::with('documentos')->findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function storeDocument(Request $request, $id)
    {
        $request->validate([
            'tipo_documento' => 'required|string|max:255',
            'ruta_documento' => 'required|file|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('ruta_documento')->store('documentos', 'public');

        Documento::create([
            'user_id' => $id,
            'tipo_documento' => $request->tipo_documento,
            'ruta_documento' => $filePath,
        ]);

        return redirect()->route('funcionarios.edit', $id)->with('success', 'Documento agregado con éxito.');
    }
}
