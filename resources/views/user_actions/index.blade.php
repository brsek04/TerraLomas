@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Reservas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha y Hora</th>
                <th>Nombre del Cliente</th>
                <th>Email del Cliente</th>
                <th>Teléfono del Cliente</th>
                <th>Capacidad</th>
                <th>Número de Mesa</th>
                <th>Número de Personas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->id }}</td>
                <td>{{ $reserva->fecha_hora }}</td>
                <td>{{ $reserva->cliente_nombre }}</td>
                <td>{{ $reserva->cliente_email }}</td>
                <td>{{ $reserva->cliente_telefono }}</td>
                <td>{{ $reserva->mesa->capacidad }}</td>
                <td>{{ $reserva->mesa->numero }}</td> <!-- Asegúrate de tener el campo 'numero' en tu modelo 'Mesa' -->
                <td>{{ $reserva->num_personas }}</td>
                <td>
                <form action="{{ route('reservas.rechazar', $reserva->id) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-danger">Rechazar</button>
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
