@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Detalles de la Orden #{{ $order->id }}</h1>
    <p class="text-lg">Usuario: {{ $order->user->name }}</p>
    <p class="text-lg">Fecha: {{ $order->created_at }}</p>
    <p class="text-lg">Estado: {{ $order->status }}</p> <!-- Mostrar el estado de la orden -->

    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Platos</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($order->dishes as $dish)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $dish->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $dish->pivot->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Bebidas</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($order->beverages as $beverage)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $beverage->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $beverage->pivot->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        @php
        // Determinar el texto y la acción del botón según el estado actual de la orden
        switch ($order->status) {
            case 'pending':
                $btnText = 'Confirmar';
                $nextStatus = 'confirmed';
                break;
            case 'confirmed':
                $btnText = 'En Preparación';
                $nextStatus = 'preparing';
                break;
            case 'preparing':
                $btnText = 'Listo';
                $nextStatus = 'ready';
                break;
            case 'ready':
                $btnText = 'Entregado';
                $nextStatus = 'delivered';
                break;
            case 'delivered':
                $btnText = 'Finalizar Pedido';
                $nextStatus = 'closed';
                break;
            default:
                $btnText = 'Desconocido';
                $nextStatus = '';
                break;
        }
        @endphp

        @if ($order->status != 'closed')
        <form action="{{ route('order.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="{{ $nextStatus }}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ $btnText }}
            </button>
        </form>
        @endif
    </div>
</div>
@endsection
