<!-- resources/views/funcionarios/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Funcionario: {{ $funcionario->name }}</h1>

    <form action="{{ route('funcionarios.storeDocument', $funcionario->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="tipo_documento">Tipo de Documento</label>
            <input type="text" name="tipo_documento" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ruta_documento">Documento (PDF)</label>
            <input type="file" name="ruta_documento" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Documento</button>
    </form>

    <h2>Documentos Existentes</h2>
    @if($funcionario->documentos && count($funcionario->documentos) > 0)
        <ul>
            @foreach($funcionario->documentos as $documento)
                <li>
                    {{ $documento->tipo_documento }} - 
                    <a href="{{ Storage::url($documento->ruta_documento) }}" target="_blank">Ver Documento</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay documentos disponibles.</p>
    @endif
</div>
@endsection
