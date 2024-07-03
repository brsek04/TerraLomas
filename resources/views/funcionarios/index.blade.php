<!-- resources/views/funcionarios/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <h3 class="text-gray-700 font-bold p-3 dark:text-white">Funcionarios</h3>

    <div class="overflow-x-auto">
        <table class="w-full p-6 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 w-full dark:bg-gray-900 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">ID</th>
                    <th scope="col" class="px-6 py-3 text-center">Nombre</th>
                    <th scope="col" class="px-6 py-3 text-center">Rol</th>
                    <th scope="col" class="px-6 py-3 text-center">Documentos</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($funcionarios as $funcionario)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $funcionario->id }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $funcionario->name }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                        {{ $funcionario->roles->pluck('name')->join(', ') }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
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
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="text-blue-700 hover:text-white border border-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                            Editar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
