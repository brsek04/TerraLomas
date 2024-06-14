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
                            <button type="submit" class="btn btn-primary">Generar Informe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($totalEarnings))
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="dark:bg-gray-800 p-10 lg-rounded-sm">
                            <h3 class="dark:text-gray-50">Informe del {{ $startDate->format('d/m/Y') }} al {{ $endDate->format('d/m/Y') }}</h3>
                            <p class="dark:text-gray-50">Ganancias de platos: ${{ number_format($totalDishEarnings, 2) }}</p>
                            <p class="dark:text-gray-50">Ganancias de bebidas: ${{ number_format($totalBeverageEarnings, 2) }}</p>
                            <p class="dark:text-gray-50">Ganancias totales: ${{ number_format($totalEarnings, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@endsection
