@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nueva Reserva para Sucursal {{ $branch_id }}</h2>
        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf
            <input type="hidden" name="branch_id" value="{{ $branch_id }}">
            <div class="form-group">
                <label for="mesa_id">Seleccionar Mesa</label>
                <select class="form-control" id="mesa_id" name="mesa_id" required>
                    @foreach ($mesas as $mesa)
                        <option value="{{ $mesa->id }}">
                            Mesa: {{ $mesa->numero }} - Capacidad: {{ $mesa->capacidad }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cliente_nombre">Nombre del Cliente</label>
                <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" required>
            </div>
            <div class="form-group">
                <label for="cliente_email">Email del Cliente</label>
                <input type="email" class="form-control" id="cliente_email" name="cliente_email" required>
            </div>
            <div class="form-group">
                <label for="cliente_telefono">Teléfono del Cliente</label>
                <input type="text" class="form-control" id="cliente_telefono" name="cliente_telefono" required>
            </div>
            <div class="form-group">
                <label for="fecha_hora">Fecha y Hora de la Reserva</label>
                <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
            </div>
            <div class="form-group">
                <label for="num_personas">Número de Personas</label>
                <input type="number" class="form-control" id="num_personas" name="num_personas" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Reserva</button>
        </form>
    </div>
@endsection
