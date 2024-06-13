@extends('layouts.app')
@section('title')
    Sucursales
@endsection
@section('content')
<div class="w-full min-h-screen flex flex-col bg-gray-900">
    <div class="relative w-full min-h-[50vh] flex justify-center items-center bg-cover shadow-sm" style="background-image: url('images/logos/bannerbg.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-45"></div>
        <div class="relative mx-4 text-center text-white pt-20">
            <div class="pt-10">
                <h1 class="font-bold font-serif text-6xl mb-4 underline decoration-orange-400">Nuestras Sucursales</h1>
            </div>
            <div class="flex flex-col items-center justify-center space-y-6 px-4 sm:flex-row sm:space-x-6 sm:space-y-0 py-10">
                <!--sucursal-->
                @foreach ($branches as $branch)
                <div class="shadow-[5px_5px_rgba(255,_165,_0,_0.4),_10px_10px_rgba(255,_165,_0,_0.3),_15px_15px_rgba(0,_98,_90,_0.2),_20px_20px_rgba(0,_98,_90,_0.1)] w-full max-w-sm max-h-sm h-full bg-no-repeat bg-cover overflow-hidden rounded-lg p-2 bg-orange-400 duration-300 hover:scale-105 hover:shadow-xl">
                    <a href="{{ route('branch.menus', $branch->id) }}">{{ $branch->name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="relative flex-grow w-full  flex justify-center bg-gray-900 mt-4">
        <div class="absolute h-full  item  inset-0 bg-cover bg-no-repeat bg-end blur-[10px]" style="background-image: url('images/logos/appsbg.jpg'); transform: scaleX(-1); backdrop-filter: blur(10px);"></div>
        <div class="w-full"> 
            <div class="relative flex p-10 rounded-lg"  >
                <div class="bg-white flex flex-col p-4 sm:p-10 md:max-w-2xl mx-auto rounded-lg" style="background-color: rgba(255, 255, 255, 0.514);">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl text-orange-400  mb-4 font-serif font-extrabold">
                        Hola y bienvenidos <br> 
                    </h1>
                    <div class="flex">
                        <p class="text-gray-900 font-serif">Nos enorgullece presentarte nuestras sucursales, cada una diseñada para brindarte la mejor experiencia posible.
                            Descubre nuestras instalaciones y servicios únicos en cada ubicación, 
                            donde te garantizamos encontrarás la calidad y atención que nos caracteriza y mereces.</p>
                    </div>
                    <div class="mt-4">
                        <a href="#" class="bg-orange-400 border border-primary text-white px-8 py-3 font-medium 
                            rounded-md hover:bg-transparent hover:text-primary">Conócenos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
