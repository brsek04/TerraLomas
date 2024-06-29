@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Acciones del Usuario: {{ $user->name }}</h1>

    <h2>Órdenes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID de Orden</th>
                <th>Platos</th>
                <th>Bebidas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <ul>
                            @foreach ($order->dishes as $dishInOrder)
                                <li>{{ $dishInOrder->dish->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($order->beverages as $beverageInOrder)
                                <li>{{ $beverageInOrder->beverage->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Reservas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID de Reserva</th>
                <th>Mesa</th>
                <th>Sucursal</th>
                <th>Fecha y Hora</th>
                <th>Cliente</th>
                <th>Número de Personas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->mesa->numero }}</td>
                    <td>
                        @if ($reserva->mesa->branch)
                            {{ $reserva->mesa->branch->name }}
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>{{ $reserva->fecha_hora }}</td>
                    <td>{{ $reserva->cliente_nombre }}</td>
                    <td>{{ $reserva->num_personas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
