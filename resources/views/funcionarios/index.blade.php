<!-- resources/views/funcionarios/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Funcionarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Documentos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->name }}</td>
                    <td>
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
                    </td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
