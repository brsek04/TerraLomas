<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

/**
 * Class SupplierController
 * @package App\Http\Controllers
 */
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::paginate();

        return view('supplier.index', compact('suppliers'))
            ->with('i', (request()->input('page', 1) - 1) * $suppliers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = new Supplier();
        return view('supplier.create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    request()->validate(Supplier::$rules);

    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        $photoPath = 'images/' . $imageName;
    } else {
        $photoPath = null;
    }

    // Crear el nuevo supplier
    $supplier = Supplier::create(array_merge($request->all(), ['photo' => $photoPath]));

    return redirect()->route('suppliers.index')
        ->with('success', 'Supplier created successfully.');
}

    /**
     * Display the specified resource.
     *QA
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);

        return view('supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
{
    request()->validate(Supplier::$rules);

    if ($request->hasFile('photo')) {
        // Eliminar la foto antigua si existe
        if ($supplier->photo && file_exists(public_path($supplier->photo))) {
            unlink(public_path($supplier->photo));
        }

        // Guardar la nueva foto
        $image = $request->file('photo');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        $supplier->photo = 'images/' . $imageName;
    }

    // Actualizar el resto de los detalles del supplier
    $supplier->update($request->except('photo'));

    return redirect()->route('suppliers.index')
        ->with('success_edit', 'Supplier updated successfully.');
}

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        // Verificar si el plato existe
        if ($supplier) {
            // Eliminar la imagen si existe
            if ($supplier->photo && file_exists(public_path($supplier->photo))) {
                unlink(public_path($supplier->photo));
            }

            // Eliminar el plato de la base de datos
            $supplier->delete();

            return redirect()->route('suppliers.index')
                ->with('success_del', 'supplier deleted successfully');
        } else {
            return redirect()->route('suppliers.index')
                ->with('error', 'supplier not found');
        }
    }
}
