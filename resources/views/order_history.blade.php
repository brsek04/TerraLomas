@extends('layouts.app')

@section('title', 'Historial')

@section('content')
<section>
    <div class="container">
        <div class="content">
            <table id="orderTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sucursal</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Usuario</th>
                        <th>Fecha</th> <!-- Nueva columna para la fecha -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>Terra Lomas Concepción</td>
                            <td>
                                @foreach($order->description as $item)
                                    {{ $item->quantity }} {{ $item->name }},
                                @endforeach
                            </td>
                            <td>${{ number_format($order->total_price, 2) }}</td>
                            <td>{{ $order->user }}</td>
                            <td>{{ $order->created_at }}</td> <!-- Mostrar la fecha -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
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
