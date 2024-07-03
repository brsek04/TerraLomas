<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\BeverageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BeverageController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-plato');
    }

    public function index()
    {
        $beverages = Beverage::with('beverageType')->oldest()->paginate(5);
        $types = BeverageType::pluck('name', 'id');

        return view('beverage.index', compact('beverages', 'types'))
            ->with('i', (request()->input('page', 1) - 1) * $beverages->perPage());
    }

    public function create()
    {
        $beverage = new Beverage();
        $types = BeverageType::pluck('name', 'id');
        return view('beverage.create', compact('beverage', 'types'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud para asegurarse de que se envió una imagen
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:0',
            'alcohol' => 'nullable|numeric|min:0|max:100',
            'rating' => 'required|integer|min:0|max:5',
            'type_id' => 'required|exists:beverage_types,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $beverage = new Beverage();
        $beverage->name = $request->name;
        $beverage->description = $request->description;
        $beverage->price = $request->price;
        $beverage->alcohol = $request->alcohol;
        $beverage->rating = $request->rating;
        $beverage->type_id = $request->type_id;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            
            // Procesar la imagen con Intervention Image
            $img = Image::make($image->getRealPath());
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images').'/'.$fileName, 75); // Aquí 75 es el nivel de calidad, ajusta según sea necesario
            
            $beverage->photo = 'images/'.$fileName;
        }

        // Guardar el objeto Beverage en la base de datos
        $beverage->save();

        return redirect()->route('beverages.index')
            ->with('success_add', 'Bebida creada exitosamente.');
    }

    public function edit($id)
    {
        $beverage = Beverage::findOrFail($id);
        $types = BeverageType::pluck('name', 'id');
        return view('beverage.edit', compact('beverage', 'types'));
    }

    public function update(Request $request, Beverage $beverage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'alcohol' => 'nullable|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
            'type_id' => 'required|exists:beverage_types,id',
        ]);

        // Check if a new photo has been uploaded
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($beverage->photo && Storage::disk('public')->exists($beverage->photo)) {
                Storage::disk('public')->delete($beverage->photo);
            }

            // Store the new photo
            $image = $request->file('photo');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            
            // Procesar la imagen con Intervention Image
            $img = Image::make($image->getRealPath());
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images').'/'.$fileName, 75); // Aquí 75 es el nivel de calidad, ajusta según sea necesario
            
            $beverage->photo = 'images/'.$fileName;
        }

        // Update the rest of the beverage details
        $beverage->update($request->except('photo'));

        return redirect()->route('beverages.index')
            ->with('success_edit', 'Bebida actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $beverage = Beverage::find($id);

        // Verify if the beverage exists
        if ($beverage) {
            // Delete the image if it exists
            if ($beverage->photo && file_exists(public_path($beverage->photo))) {
                unlink(public_path($beverage->photo));
            }

            // Delete the beverage from the database
            $beverage->delete();

            return redirect()->route('beverages.index')
                ->with('success_del', 'Bebida eliminada exitosamente.');
        } else {
            return redirect()->route('beverages.index')
                ->with('error', 'Bebida no encontrada.');
        }
    }
}
