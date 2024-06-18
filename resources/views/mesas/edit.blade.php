@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Mesa</h2>
        <form action="{{ route('mesas.update', $mesa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="numero">Número de Mesa</label>
                <input type="text" class="form-control" id="numero" name="numero" value="{{ $mesa->numero }}" required>
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad</label>
                <input type="number" class="form-control" id="capacidad" name="capacidad" value="{{ $mesa->capacidad }}" required>
            </div>
            <div class="form-group">
                <label for="branch_id">Sucursal</label>
                <select class="form-control" id="branch_id" name="branch_id" required>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}" @if ($branch->id == $mesa->branch_id) selected @endif>{{ $branch->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Mesa</button>
        </form>
    </div>
@endsection
