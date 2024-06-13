@extends('layouts.app')

@section('content')

<section class="section">
    <div class="section-header dark:bg-gray-800">
        <h3 class="font-bold dark:text-gray-50">¡Bienvenido! {{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="dark:bg-gray-800 p-10 lg-rounded-sm">
                        <h3 class="dark:text-gray-50">Este es tu panel de administración</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-center ">
            <div class="d-flex justify-content-center flex-wrap flex">
                @foreach ($userCountsByRole as $role => $count)
                    <div class="card mx-2 my-2" style="width: 12rem;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ ucfirst($role) }}</h5>
                            <p class="card-text">{{ $count }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row mt-4 flex">
            <div class="col-md-6">
                <div style="max-width: 200px;">
                    <canvas id="branchesChart"></canvas>
                </div>
            </div>
           
           
            <div class="col-md-6">
                <div style="max-width: 400px;">
                    <canvas id="allDishesChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div style="max-width: 400px;">
                    <canvas id="allBeveragesChart"></canvas>
                </div>
            </div>

</div>

                <div class="flex">
            <div class="col-md-6">
                <div style="max-width: 200px;">
                    <canvas id="beveragesByTypeChart"></canvas>
                </div>
            </div>
            
            <div class="col-md-6">
                <div style="max-width: 200px;">
                    <canvas id="dishesByTypeChart"></canvas>
                </div>
            </div>
</div>
        </div>
    
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log('Datos cargados correctamente');

        var branchCount = {{ $branchCount }};
        var dishCount = {{ $dishCount }};
        var beverageCount = {{ $beverageCount }};
        var totalUsers = {{ $totalUsers }};
        var totalDishes = {{ $totalDishes }};

        var dishesByType = {!! json_encode($dishesByType->pluck('dishes_count', 'name')) !!};
        var beveragesByType = {!! json_encode($beveragesByType->pluck('beverages_count', 'name')) !!};
        var allDishesData = {!! json_encode($allDishesData) !!};
        var allBeveragesData = {!! json_encode($allBeveragesData) !!};

        console.log('Dishes By Type:', dishesByType);
        console.log('Beverages By Type:', beveragesByType);
        console.log('All Dishes:', allDishesData);
        console.log('All Beverages:', allBeveragesData);

        // Gráfico de Branches
        new Chart(document.getElementById('branchesChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Branches', 'Total Users'],
                datasets: [{
                    label: 'Branches vs Total Users',
                    data: [branchCount, totalUsers],
                    backgroundColor: ['#36a2eb', '#ff6384'],
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
                        offset: 10, // Distancia del texto desde el borde de la sección
                        formatter: function(value, context) {
                            return value.toFixed(0);
                        }
                    }
                }
            }
        });

        // Gráfico de Tipos de Platos
        new Chart(document.getElementById('dishesByTypeChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: Object.keys(dishesByType),
                datasets: [{
                    label: 'Tipos de Platos',
                    data: Object.values(dishesByType),
                    backgroundColor: ['#ff9f40', '#ffcd56', '#4bc0c0', '#36a2eb'],
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
                        offset: 10, // Distancia del texto desde el borde de la sección
                        formatter: function(value, context) {
                            return value.toFixed(0);
                        }
                    }
                }
            }
        });

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
                        offset: 10, // Distancia del texto desde el borde de la sección
                        formatter: function(value, context) {
                            return value.toFixed(0);
                        }
                    }
                }
            }
        });

        // Gráfico de Tipos de Bebidas
        new Chart(document.getElementById('beveragesByTypeChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: Object.keys(beveragesByType),
                datasets: [{
                    label: 'Tipos de Bebidas',
                    data: Object.values(beveragesByType),
                    backgroundColor: ['#ff9f40', '#ffcd56', '#4bc0c0', '#36a2eb'],
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
                        offset: 10, // Distancia del texto desde el borde de la sección
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
                indexAxis: 'y',
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
                        offset: 10, // Distancia del texto desde el borde de la sección
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
