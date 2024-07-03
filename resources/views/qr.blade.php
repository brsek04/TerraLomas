@extends('layouts.app')

@section('title', 'Código QR de la Orden')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col items-center py-10">
        <h1 class="text-2xl font-bold mb-4">Tu Código QR</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <!-- Mostrar el código QR -->
            <img src="{{ $qrCode }}" alt="QR Code">
        </div>
        <a href="{{ route('visitante.index') }}" class="mt-6 w-40 rounded-md bg-green-500 py-1.5 font-medium text-white hover:bg-green-600 text-center">Volver a la tienda</a>
    </div>
</div>
@endsection
