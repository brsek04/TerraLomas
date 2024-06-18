@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Mesas</h2>
        <a href="{{ route('mesas.create') }}" class="btn btn-primary mb-2">Crear Mesa</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sucursal</th>
                    <th>Número</th>
                    <th>Capacidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mesas as $mesa)
                    <tr>
                        <td>{{ $mesa->id }}</td>
                        <td>{{ $mesa->branch_id }}</td>
                        <td>{{ $mesa->numero }}</td>
                        <td>{{ $mesa->capacidad }}</td>
                        <td>
                            <a href="{{ route('mesas.show', $mesa->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('mesas.edit', $mesa->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('mesas.destroy', $mesa->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta mesa?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
