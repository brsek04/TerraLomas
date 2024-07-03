@extends('layouts.app')

@section('content')

<section class="bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
            <div class="px-6 py-4">
                <h3 class="text-gray-700 dark:text-gray-50 text-2xl font-bold">Informe de Ganancias</h3>
            </div>
            <div class="px-6 py-4">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <form action="{{ route('admin.report') }}" method="GET">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="start_date" class="dark:text-gray-50 block">Fecha de Inicio:</label>
                                <input type="date" id="start_date" name="start_date" class="form-input dark:bg-gray-700 dark:text-gray-100 mt-1 block w-full" required>
                            </div>
                            <div>
                                <label for="end_date" class="dark:text-gray-50 block">Fecha de Fin:</label>
                                <input type="date" id="end_date" name="end_date" class="form-input dark:bg-gray-700 dark:text-gray-100 mt-1 block w-full" required>
                            </div>
                            <div>
                                <label class="dark:text-gray-50 block">Opciones adicionales:</label>
                                <div class="mt-2 space-x-4">
                                    <label class="inline-flex items-center dark:text-gray-50">
                                        <input type="checkbox" class="form-checkbox dark:bg-gray-700 dark:text-gray-100" id="include_users" name="include_users" value="1">
                                        <span class="ml-2">Usuarios</span>
                                    </label>
                                    <label class="inline-flex items-center dark:text-gray-50">
                                        <input type="checkbox" class="form-checkbox dark:bg-gray-700 dark:text-gray-100" id="include_data" name="include_data" value="1">
                                        <span class="ml-2">Datos</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:from-cyan-500 dark:to-blue-500 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2 text-center shadow-md">
                                Generar Informe
                            </button>
                            <!-- Botón para generar PDF -->
                            <a href="{{ route('admin.generatePDF', ['start_date' => $startDate->format('Y-m-d'), 'end_date' => $endDate->format('Y-m-d')]) }}" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 text-center ml-4 shadow-md">
                                Descargar PDF
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="px-6 py-4">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h3 class="text-gray-700 dark:text-gray-50 text-xl font-bold">Informe del {{ $startDate->format('d/m/Y') }} al {{ $endDate->format('d/m/Y') }}</h3>
                    <div class="mt-4 space-y-2">
                        <p class="text-gray-700 dark:text-gray-50">Ganancias de platos: ${{ number_format($totalDishEarnings, 2) }}</p>
                        <p class="text-gray-700 dark:text-gray-50">Ganancias de bebidas: ${{ number_format($totalBeverageEarnings, 2) }}</p>
                        <p class="text-gray-700 dark:text-gray-50">Ganancias totales: ${{ number_format($totalEarnings, 2) }}</p>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-gray-700 dark:text-gray-50">Usuarios:</h4>
                        <div class="space-y-2">
                            <p class="text-gray-700 dark:text-gray-50">Usuarios nuevos: {{ $newUsersCount }}</p>
                            <p class="text-gray-700 dark:text-gray-50">Usuarios que compraron: {{ $usersThatPurchased }}</p>

                            @isset($userData)
                            <h4 class="text-gray-700 dark:text-gray-50">Usuarios que compraron:</h4>
                            <ul class="text-gray-700 dark:text-gray-50 list-disc pl-4">
                                @foreach($userData as $user)
                                <li>{{ $user->name }} ({{ $user->email }})</li>
                                @endforeach
                            </ul>
                            <p class="text-gray-700 dark:text-gray-50">Cantidad de usuarios distintos: {{ $distinctUserCount }}</p>
                            @endisset

                            @isset($dishData)
                            <h4 class="text-gray-700 dark:text-gray-50">Platos vendidos:</h4>
                            <ul class="text-gray-700 dark:text-gray-50 list-disc pl-4">
                                @foreach($dishData as $dish)
                                <li>{{ $dish->name }} - Vendidos: {{ $dish->total_sold }}</li>
                                @endforeach
                            </ul>
                            @endisset

                            @isset($beverageData)
                            <h4 class="text-gray-700 dark:text-gray-50">Bebidas vendidas:</h4>
                            <ul class="text-gray-700 dark:text-gray-50 list-disc pl-4">
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
    </div>
</section>

@endsection
