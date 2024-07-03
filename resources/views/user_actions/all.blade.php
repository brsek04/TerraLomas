@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <h3 class="text-gray-700 font-bold p-3 dark:text-white">Listado de Todas las Reservas</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full p-6 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 w-full dark:bg-gray-900 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">ID</th>
                    <th scope="col" class="px-6 py-3 text-center">Fecha y Hora</th>
                    <th scope="col" class="px-6 py-3 text-center">Nombre del Cliente</th>
                    <th scope="col" class="px-6 py-3 text-center">Email del Cliente</th>
                    <th scope="col" class="px-6 py-3 text-center">Teléfono del Cliente</th>
                    <th scope="col" class="px-6 py-3 text-center">Capacidad</th>
                    <th scope="col" class="px-6 py-3 text-center">Número de Mesa</th>
                    <th scope="col" class="px-6 py-3 text-center">Número de Personas</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $reserva->id }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $reserva->fecha_hora }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $reserva->cliente_nombre }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $reserva->cliente_email }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $reserva->cliente_telefono }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $reserva->mesa->capacidad }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $reserva->mesa->numero }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $reserva->num_personas }}</td>
                    <td class="px-6 py-4 text-center">
                        @if (strtotime($reserva->fecha_hora) >= strtotime(now()))
                        <form action="{{ route('reservas.rechazar', $reserva->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="text-red-700 hover:text-white border border-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">
                                Eliminar
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
