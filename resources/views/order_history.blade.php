@extends('layouts.app')

@section('title', 'Historial')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <h3 class="text-gray-700 font-bold p-3 dark:text-white">Historial de Órdenes</h3>

    <div class="overflow-x-auto">
        <table id="orderTable" class="w-full p-6 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 w-full dark:bg-gray-900 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">ID</th>
                    <th scope="col" class="px-6 py-3 text-center">Sucursal</th>
                    <th scope="col" class="px-6 py-3 text-center">Descripción</th>
                    <th scope="col" class="px-6 py-3 text-center">Precio</th>
                    <th scope="col" class="px-6 py-3 text-center">Usuario</th>
                    <th scope="col" class="px-6 py-3 text-center">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $order->id }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">Terra Lomas Concepción</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                        @foreach($order->description as $item)
                        {{ $item->quantity }} {{ $item->name }},
                        @endforeach
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">${{ number_format($order->total_price, 2) }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $order->user }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">{{ $order->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#orderTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
@endsection
