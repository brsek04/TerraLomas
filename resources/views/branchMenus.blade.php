<!-- resources/views/menus.blade.php -->
@extends('layouts.app')

@section('title')
    {{ $branch->name }}
@endsection

@section('content')

<div class="w-full min-h-screen flex flex-col bg-gray-700">
    <div class="relative w-full min-h-[50vh] flex justify-center items-center bg-cover shadow-sm">
        <div class="inset-0 bg-black bg-opacity-45"></div>
        <div class="relative mx-4 text-center text-white pt-20">
            <div class="pt-10">
                <h1 class="font-bold font-serif text-6xl mb-4 underline decoration-orange-400">Nuestros Menús</h1>
            </div>
            <div class="flex flex-col items-center justify-center space-y-6 px-4 sm:flex-row sm:space-x-6 sm:space-y-0 py-10">
                <!-- Menús -->
                @foreach ($menus as $menu)
                <div class="shadow-[5px_5px_rgba(255,_165,_0,_0.4),_10px_10px_rgba(255,_165,_0,_0.3),_15px_15px_rgba(0,_98,_90,_0.2),_20px_20px_rgba(0,_98,_90,_0.1)] w-full max-w-sm max-h-sm h-full bg-no-repeat bg-cover overflow-hidden rounded-lg p-2 bg-orange-400 duration-300 hover:scale-105 hover:shadow-xl">
                    <a href="{{ route('menus.shop', $menu->id) }}">{{ $menu->name }}</a>
                </div>
                @endforeach

                <!-- Botón de Reservas -->
                <div class="shadow-[5px_5px_rgba(255,_165,_0,_0.4),_10px_10px_rgba(255,_165,_0,_0.3),_15px_15px_rgba(0,_98,_90,_0.2),_20px_20px_rgba(0,_98,_90,_0.1)] w-full max-w-sm max-h-sm h-full bg-no-repeat bg-cover overflow-hidden rounded-lg p-2 bg-blue-500 duration-300 hover:scale-105 hover:shadow-xl">
                    <a href="{{ route('branch.reservas', $branch->id) }}" class="text-white">Reservas de {{ $branch->name }}</a>
                </div>
            </div>
        </div>
    </div>
    <hr class=" text-gray-300">
</div>

@endsection
