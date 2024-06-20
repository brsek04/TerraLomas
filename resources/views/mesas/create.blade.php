@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nueva Mesa</h2>
        <form action="{{ route('mesas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="numero">Número de Mesa</label>
                <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad</label>
                <input type="number" class="form-control" id="capacidad" name="capacidad" required>
            </div>
            <div class="form-group">
                <label for="branch_id">Sucursal</label>
                <select class="form-control" id="branch_id" name="branch_id" required>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Mesa</button>
        </form>
    </div>
@endsection
