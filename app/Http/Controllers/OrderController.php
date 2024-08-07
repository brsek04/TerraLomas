<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos del formulario, si es necesario
        $request->validate([
            // Validación de campos, si es necesario
        ]);

        // Crear una nueva instancia del pedido
        $order = new Order();

        // Asignar los valores recibidos del formulario
        $order->user_id = $request->user_id;
        $order->status = 'pending'; // Asignar el estado inicial del pedido

        // Guardar el pedido en la base de datos
        $order->save();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('checkout.success')->with('success_msg', 'Pedido realizado con éxito.');
    }

    public function show($orderId)
    {
        $order = Order::with(['dishes', 'beverages'])->findOrFail($orderId);

        return view('order.show', compact('order'));
    }

    public function index(Request $request)
    {
        $status = $request->input('status', 'all'); 
        if ($status == 'all') {
            $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        } else {
            $orders = Order::with('user')
                ->where('status', $status)
                ->orderBy('created_at', 'desc')
                ->get();
        }
    
        return view('order.index', compact('orders', 'status'));
    }

    public function update(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();

        return redirect()->route('order.show', $order->id)->with('success_msg', 'Estado de la orden actualizado correctamente.');
    }

    // OrderController.php

    public function waiterView(Request $request)
    {
        $status = $request->input('status', 'pending'); 
        $orders = Order::with('user')
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('order.waiter', compact('orders', 'status'));
    }

    public function kitchenView(Request $request)
    {
        $status = $request->input('status', 'confirmed'); 
        $orders = Order::with('user')
            ->whereIn('status', ['confirmed', 'preparing'])
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('order.kitchen', compact('orders', 'status'));
    }


}
