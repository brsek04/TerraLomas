<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order; 
use Illuminate\Support\Facades\DB;
use App\Models\DishType;
use App\Models\BeverageType;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Response;


class CartController extends Controller
{
    public function shop($menuId)
    {
        $menu = Menu::with(['dishes', 'beverages'])->findOrFail($menuId);
        $dishTypes = DishType::all();
        $beverageTypes = BeverageType::all();

        return view('shop', compact('menu', 'dishTypes', 'beverageTypes'));
    }

    public function filter(Request $request, $menuId)
{
    $menu = Menu::with(['dishes', 'beverages'])->findOrFail($menuId);
    $dishTypes = DishType::all();
    $beverageTypes = BeverageType::all();

    $type = $request->query('type');
    $typeId = $request->query('typeId');

    // Obtener el nombre del tipo de plato correspondiente a la ID
    $typeName = '';
    if ($type == 'dish') {
        $typeName = DishType::findOrFail($typeId)->name;
        $items = $menu->dishes()->where('type_id', $typeId)->get();
    } elseif ($type == 'beverage') {
        $typeName = BeverageType::findOrFail($typeId)->name;
        $items = $menu->beverages()->where('type_id', $typeId)->get();
    } else {
        $items = [];
    }

    return view('shop', compact('menu', 'dishTypes', 'beverageTypes', 'items', 'type', 'typeName'));
}


    public function cart()
    {
        $cartCollection = \Cart::getContent();
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request)
    {
        $prefix = $request->type == 'dish' ? 'dish_' : 'beverage_';

        \Cart::add([
            'id' => $prefix . $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'photo' => $request->photo,
                'type' => $request->type
            ]
        ]);
        return redirect()->route('cart.index')->with('success_msg', 'Item added to your cart!');
    }

    public function update(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);
        return redirect()->route('cart.index')->with('success_msg', 'Cart is updated!');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Cart is cleared!');
    }

    public function checkout()
    {
        // Verificar si el usuario está autenticado
        $userId = auth()->check() ? auth()->id() : 2; // Si no está autenticado, usar el ID 2
    
        $order = Order::create([
            'user_id' => $userId,
            // Otros campos de la orden, si los hay
        ]);
    
        $cartCollection = \Cart::getContent();
    
        foreach ($cartCollection as $item) {
            if ($item->attributes->type == 'dish') {
                // Obtener el ID del plato eliminando el prefijo 'dish_'
                $dishId = (int)str_replace('dish_', '', $item->id);
                
                DB::table('dishes_in_order')->insert([
                    'order_id' => $order->id,
                    'dish_id' => $dishId,
                    'quantity' => $item->quantity,
                    // Otros campos, si los hay
                ]);
            } elseif ($item->attributes->type == 'beverage') {
                // Obtener el ID del bebida eliminando el prefijo 'beverage_'
                $beverageId = (int)str_replace('beverage_', '', $item->id);
                
                DB::table('beverages_in_order')->insert([
                    'order_id' => $order->id,
                    'beverage_id' => $beverageId,
                    'quantity' => $item->quantity,
                    // Otros campos, si los hay
                ]);
            }
        }
    
        \Cart::clear();
    
        // Generar el código QR con una URL que redirija a la vista de detalles de la orden
        $qrCode = new QrCode(route('order.show', ['order' => $order->id]));
        $qrCode->setSize(300);
    
        // Crear un objeto PngWriter
        $qrCodeWriter = new PngWriter();
    
        // Generar el contenido del código QR como una cadena en base64
        // Generar el contenido del código QR como una cadena en base64
        $qrCodeData = $qrCodeWriter->write($qrCode)->getDataUri();

        // Devolver una vista con el código QR
        return view('qr', ['qrCode' => $qrCodeData]);

    }
    

    
}
