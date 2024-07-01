@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Lista de Órdenes</h1>

    @if ($orders->isEmpty())
        <p>No hay órdenes disponibles.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($orders as $order)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Orden #{{ $order->id }}</h2>
                    <p class="text-sm text-gray-600 mb-2">Estado: {{ $order->status }}</p>
                    <p class="text-sm text-gray-600 mb-2">Usuario: {{ $order->user->name }}</p>
                    <p class="text-sm text-gray-600 mb-2">Fecha: {{ $order->created_at }}</p>
                    <a href="{{ route('order.show', $order->id) }}" class="text-blue-500 hover:text-blue-700">Ver detalles</a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
