@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Detalles de la Orden #{{ $order->id }}</h1>
    <p class="text-lg">Usuario: {{ $order->user->name }}</p>
    <p class="text-lg">Fecha: {{ $order->created_at }}</p>

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
</div>
@endsection
