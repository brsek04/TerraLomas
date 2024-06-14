<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Informe de Ganancias</title>
    <style>
        /* Estilos CSS para el PDF, puedes personalizar según necesites */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 30px;
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Informe de Ganancias</h1>
        </div>
        <div class="content">
            <p>Informe del {{ $startDate->format('d/m/Y') }} al {{ $endDate->format('d/m/Y') }}</p>
            <p>Ganancias de platos: ${{ number_format($totalDishEarnings, 2) }}</p>
            <p>Ganancias de bebidas: ${{ number_format($totalBeverageEarnings, 2) }}</p>
            <p>Ganancias totales: ${{ number_format($totalEarnings, 2) }}</p>

            <h4>Platos vendidos:</h4>
            <ul>
                @foreach($dishData as $dish)
                    <li>{{ $dish->name }} - Vendidos: {{ $dish->total_sold }}</li>
                @endforeach
            </ul>

            <h4>Bebidas vendidas:</h4>
            <ul>
                @foreach($beverageData as $beverage)
                    <li>{{ $beverage->name }} - Vendidas: {{ $beverage->total_sold }}</li>
                @endforeach
            </ul>

            <p>Usuarios nuevos: {{ $newUsers }}</p>
            <p>Usuarios que compraron: {{ $usersThatPurchased }}</p>
            <p>Total de órdenes: {{ $totalOrders }}</p>
        </div>
        <div class="footer">
            <p>Generado el {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
