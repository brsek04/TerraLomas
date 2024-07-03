@extends('layouts.app')

@section('template_title')
    Editar Funcionario: {{ $funcionario->name }}
@endsection

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4 text-center">Editar Funcionario: {{ $funcionario->name }}</h2>
    <form method="POST" action="{{ route('funcionarios.storeDocument', $funcionario->id) }}" role="form" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="tipo_documento" class="block text-sm font-medium text-gray-700 dark:text-white">Tipo de Documento</label>
                <input type="text" name="tipo_documento" id="tipo_documento" class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white" required>
            </div>
            <div class="mb-4">
                <label for="ruta_documento" class="block text-sm font-medium text-gray-700 dark:text-white">Documento (PDF)</label>
                <div class="flex items-center mt-1">
                    <label for="file-upload" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium py-2 px-4 border border-gray-300 dark:border-gray-600 leading-4 shadow-sm text-gray-700 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span>Seleccionar Archivo</span>
                        <input id="file-upload" name="ruta_documento" type="file" class="sr-only">
                    </label>
                    <p id="file-upload-filename" class="ml-2 truncate w-40 text-gray-700 dark:text-white">Seleccionar archivo...</p>
                </div>
            </div>
        </div>
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">
            Agregar Documento
        </button>
    </form>

    <h2 class="mt-8 text-gray-700 dark:text-white font-bold">Documentos Existentes</h2>
    <div class="mt-4">
        @if($funcionario->documentos && count($funcionario->documentos) > 0)
        <ul class="list-disc pl-4">
            @foreach($funcionario->documentos as $documento)
            <li class="text-gray-800 dark:text-gray-300">
                {{ $documento->tipo_documento }} -
                <a href="{{ Storage::url($documento->ruta_documento) }}" target="_blank" class="text-blue-500 hover:underline">Ver Documento</a>
            </li>
            @endforeach
        </ul>
        @else
        <p class="text-gray-700 dark:text-white">No hay documentos disponibles.</p>
        @endif
    </div>
</div>

<script>
    document.getElementById('file-upload').addEventListener('change', function () {
        var fullPath = this.value;
        var filename = fullPath.replace(/^.*[\\\/]/, '');
        document.getElementById('file-upload-filename').textContent = filename;
    });
</script>
@endsection
