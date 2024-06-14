@extends('layouts.app')

@section('content')

<section class="section">
    <div class="section-header dark:bg-gray-800">
        <h3 class="font-bold dark:text-gray-50">Informe de Ganancias</h3>
    </div>
    <div class="section-body">
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="dark:bg-gray-800 p-10 lg-rounded-sm">
                        <form action="{{ route('admin.report') }}" method="GET">
                            <div class="form-group">
                                <label for="start_date" class="dark:text-gray-50">Fecha de Inicio:</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date" class="dark:text-gray-50">Fecha de Fin:</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="dark:text-gray-50">Opciones adicionales:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="include_users" name="include_users" value="1">
                                    <label class="form-check-label dark:text-gray-50" for="include_users">Usuarios</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="include_data" name="include_data" value="1">
                                    <label class="form-check-label dark:text-gray-50" for="include_data">Datos</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Generar Informe</button>
                            
                            <!-- Botón para generar PDF -->
                            <a href="{{ route('admin.generatePDF', ['start_date' => $startDate->format('Y-m-d'), 'end_date' => $endDate->format('Y-m-d')]) }}" class="btn btn-success">Descargar PDF</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="dark:bg-gray-800 p-10 lg-rounded-sm">
                        <h3 class="dark:text-gray-50">Informe del {{ $startDate->format('d/m/Y') }} al {{ $endDate->format('d/m/Y') }}</h3>
                        <p class="dark:text-gray-50">Ganancias de platos: ${{ number_format($totalDishEarnings, 2) }}</p>
                        <p class="dark:text-gray-50">Ganancias de bebidas: ${{ number_format($totalBeverageEarnings, 2) }}</p>
                        <p class="dark:text-gray-50">Ganancias totales: ${{ number_format($totalEarnings, 2) }}</p>
                        <h4 class="dark:text-gray-50 mt-4">Usuarios:</h4>
                        <p class="dark:text-gray-50">Usuarios nuevos: {{ $newUsersCount }}</p>
                        <p class="dark:text-gray-50">Usuarios que compraron: {{ $usersThatPurchased }}</p>

                        @isset($userData)
                            <h4 class="dark:text-gray-50 mt-4">Usuarios que compraron:</h4>
                            <ul class="dark:text-gray-50">
                                @foreach($userData as $user)
                                    <li>{{ $user->name }} ({{ $user->email }})</li>
                                @endforeach
                            </ul>
                            <p class="dark:text-gray-50">Cantidad de usuarios distintos: {{ $distinctUserCount }}</p>
                        @endisset

                        @isset($dishData)
                            <h4 class="dark:text-gray-50 mt-4">Platos vendidos:</h4>
                            <ul class="dark:text-gray-50">
                                @foreach($dishData as $dish)
                                    <li>{{ $dish->name }} - Vendidos: {{ $dish->total_sold }}</li>
                                @endforeach
                            </ul>
                        @endisset

                        @isset($beverageData)
                            <h4 class="dark:text-gray-50 mt-4">Bebidas vendidas:</h4>
                            <ul class="dark:text-gray-50">
                                @foreach($beverageData as $beverage)
                                    <li>{{ $beverage->name }} - Vendidas: {{ $beverage->total_sold }}</li>
                                @endforeach
                            </ul>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
