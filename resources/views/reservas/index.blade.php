<!-- resources/views/reservas/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Reservas</h1>
    <a href="{{ route('reservas.create', ['branch_id' => $branch->id]) }}" class="btn btn-primary">Crear Nueva Reserva</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mesa</th>
                <th>Cliente</th>
                <th>Fecha y Hora</th>
                <th>Número de Personas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->mesa->numero }}</td>
                <td>{{ $reserva->cliente_nombre }}</td>
                <td>{{ $reserva->fecha_hora }}</td>
                <td>{{ $reserva->num_personas }}</td>
                <td>
                    <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
