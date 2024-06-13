@extends('layouts.app')
@section('title')
    {{ $branch->name }}
@endsection

@section('content')

<div class="w-full min-h-screen flex flex-col bg-gray-700">
    <div class="relative w-full min-h-[50vh] flex justify-center items-center bg-cover shadow-sm">
        <div class=" inset-0 bg-black bg-opacity-45"></div>
        <div class="relative mx-4 text-center text-white pt-20">
            <div class="pt-10">
                <h1 class="font-bold font-serif text-6xl mb-4 underline decoration-orange-400">Nuestros Menús</h1>
            </div>
            <div class="flex flex-col items-center justify-center space-y-6 px-4 sm:flex-row sm:space-x-6 sm:space-y-0 py-10">
                <!--menú-->
                @foreach ($menus as $menu)
                <div class="shadow-[5px_5px_rgba(255,_165,_0,_0.4),_10px_10px_rgba(255,_165,_0,_0.3),_15px_15px_rgba(0,_98,_90,_0.2),_20px_20px_rgba(0,_98,_90,_0.1)] w-full max-w-sm max-h-sm h-full bg-no-repeat bg-cover overflow-hidden rounded-lg p-2 bg-orange-400 duration-300 hover:scale-105 hover:shadow-xl">
                    <a href="{{ route('menus.shop', $menu->id) }}">{{ $menu->name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <hr class=" text-gray-300">
</div>  

<!--
    <div class="flex justify-center container mx-auto px-4 w-full min-h-screen">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                    <div class="bg-gray-100 dark:bg-gray-900 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ __('Menus for') }} {{ $branch->name }}</h2>
                    </div>

                    <div class="p-6">
                        @foreach ($menus as $menu)
                            <div class="py-2">
                                <a href="{{ route('menus.shop', ['menu' => $menu->id]) }}" class="text-blue-500 hover:underline">{{ $menu->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
               
                <a href="{{ route('visitante.index') }}" class="inline-block bg-gray-500 text-white py-2 px-4 rounded mt-4 hover:bg-gray-600">{{ __('Volver a sucursales') }}</a>
            </div>
        </div>
    </div>
-->
@endsection

