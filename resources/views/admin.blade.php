@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">
    

    <!-- Cuadrícula de Bloques -->
    <div class="grid grid-cols-2 gap-6">

        <!-- Bloque 1: Datos del Último Mes -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <h3 class="text-lg font-semibold mb-2">Datos del Último Mes</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                <div>
                    <p class="text-gray-600">Total de órdenes:</p>
                    <p class="text-lg font-bold">{{ $totalOrdersLastMonth }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Ganancias totales:</p>
                    <p class="text-lg font-bold">${{ number_format($totalEarnings, 2) }}</p>
                </div>
            </div>
            <!-- Top Usuarios por Órdenes -->
            <div class="mt-4">
                <h4 class="text-lg font-semibold mb-2">Top 5 Usuarios por Órdenes</h4>
                <ul>
                    @foreach ($topUsersLastMonth as $user)
                        <li class="flex justify-between py-1">
                            <span>{{ $user->user->name }}</span>
                            <span class="text-gray-600">{{ $user->order_count }} órdenes</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Bloque 2: Estadísticas Detalladas -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <h3 class="text-lg font-semibold mb-2">Estadísticas Detalladas</h3>
            <!-- Top Platos Más Vendidos -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                <div>
                    <h4 class="text-lg font-semibold mb-2">Top 3 Platos Más Vendidos</h4>
                    <ul>
                        @foreach ($topDishesLastMonth as $dish)
                            <li class="flex justify-between py-1">
                                <span>{{ $dish->name }}</span>
                                <span class="text-gray-600">{{ $dish->total }} unidades</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Top Bebidas Más Vendidas -->
                <div>
                    <h4 class="text-lg font-semibold mb-2">Top 3 Bebidas Más Vendidas</h4>
                    <ul>
                        @foreach ($topBeveragesLastMonth as $beverage)
                            <li class="flex justify-between py-1">
                                <span>{{ $beverage->name }}</span>
                                <span class="text-gray-600">{{ $beverage->total }} unidades</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Ganancias Detalladas -->
            <div class="mt-4">
                <h4 class="text-lg font-semibold mb-2">Ganancias Detalladas</h4>
                <ul>
                    <li class="flex justify-between py-1">
                        <span>Platos:</span>
                        <span class="text-gray-600">${{ number_format($totalDishEarnings, 2) }}</span>
                    </li>
                    <li class="flex justify-between py-1">
                        <span>Bebidas:</span>
                        <span class="text-gray-600">${{ number_format($totalBeverageEarnings, 2) }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bloque 3: Estadísticas de Usuarios por Rol -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <h3 class="text-lg font-semibold mb-2">Estadísticas de Usuarios por Rol</h3>
            <div class="space-y-2">
                @foreach ($userCountsByRole as $role => $count)
                    <div class="bg-gray-100 rounded-lg shadow-md p-2">
                        <h4 class="text-lg font-semibold mb-1">{{ ucfirst($role) }}</h4>
                        <p class="text-lg font-bold">{{ $count }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Bloque 4: Gráficos de Estadísticas -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <h3 class="text-lg font-semibold mb-2">Gráficos de Estadísticas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-lg font-semibold mb-2">Todos los Platos Vendidos</h4>
                    <canvas id="allDishesChart"></canvas>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-2">Todas las Bebidas Vendidas</h4>
                    <canvas id="allBeveragesChart"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var allDishesData = {!! json_encode($allDishesData) !!};
        var allBeveragesData = {!! json_encode($allBeveragesData) !!};

        // Gráfico de Todos los Platos vendidos
        new Chart(document.getElementById('allDishesChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: Object.keys(allDishesData),
                datasets: [{
                    label: 'Todos los Platos Vendidos',
                    data: Object.values(allDishesData),
                    backgroundColor: '#4bc0c0',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = tooltipItem.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += tooltipItem.raw.toFixed(0);
                                return label;
                            }
                        }
                    },
                    datalabels: {
                        color: '#fff',
                        anchor: 'end',
                        align: 'start',
                        offset: 10,
                        formatter: function(value, context) {
                            return value.toFixed(0);
                        }
                    }
                }
            }
        });

        // Gráfico de Todas las Bebidas vendidas
        new Chart(document.getElementById('allBeveragesChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: Object.keys(allBeveragesData),
                datasets: [{
                    label: 'Todas las Bebidas Vendidas',
                    data: Object.values(allBeveragesData),
                    backgroundColor: '#ff6384',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = tooltipItem.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += tooltipItem.raw.toFixed(0);
                                return label;
                            }
                        }
                    },
                    datalabels: {
                        color: '#fff',
                        anchor: 'end',
                        align: 'start',
                        offset: 10,
                        formatter: function(value, context) {
                            return value.toFixed(0);
                        }
                    }
                }
            }
        });
    });
</script>

@endsection
