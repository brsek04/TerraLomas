@extends('layouts.app-user')
@section('title')
    {{ $branch->name }}
@endsection

@section('content')

<div class="w-full min-h-screen flex flex-col bg-gray-900">
    <section id="menu" class="pt-28">
        <div class="relative bg-cover flex items-center h-[750px] md:h-[950px] lg:h-[700px] sm:h-[650px]" style="background-image: url('{{ asset('images/logos/appsbg.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-45"></div>
            <div class="relative container mx-auto px-4 text-white">
                <div class="w-full md:w-9/12">
                    <h2 class="slider_title text-white text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 wow fadeInUp">Nuestros Menús</h2>
                    <p class="text-white text-lg font-medium leading-7 mb-6 wow fadeInUp">Nos enorgullece presentarte nuestras sucursales, cada una diseñada para brindarte la mejor experiencia posible.
                        Descubre nuestras instalaciones y servicios únicos en cada ubicación, 
                        donde te garantizamos encontrarás la calidad y atención que nos caracteriza y mereces.</p>
                    <div class="flex flex-wrap sm:flex-row sm:space-x-6 sm:space-y-0 py-10">
                        @foreach ($menus as $menu)
                        <div class="overflow-hidden rounded-lg p-2">
                            <a href="{{ route('menus.shop', $menu->id) }}" rel="nofollow" class="main-btn inline-block bg-orange-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-orange-700 transition-all duration-300">{{ __('Menus para') }} {{ $branch->name }}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="recomendaciones" class="pt-28 bg-white">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="lg:w-1/2">
                    <div class="text-center pb-8">
                        <h4 class="text-4xl sm:text-3xl md:text-3xl lg:text-4xl font-bold text-black">Nuestras Recomendaciones</h4>
                        <div class="relative h-0.5 w-36 bg-[#E54E1B] rounded-full mx-auto mt-6">
                            <div class="absolute top-[-6px] left-1/2 w-4 h-4 bg-[#E54E1B] transform -translate-x-1/3 rotate-45">
                                <div class="absolute top-1.5 left-[-8px] w-full h-full bg-[#E54E1B]/30"></div>
                                <div class="absolute top-[-7px] right-[-7px] w-full h-full bg-[#E54E1B]/30"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap justify-center">
                <div class="lg:w-1/3 md:w-2/3 sm:w-11/12 p-4">
                    <div class="rounded-lg overflow-hidden transform transition-all">
                        <!-- Tabs -->
                        <div class="menu-items mb-4">
                            <ul class="flex flex-wrap -mb-px justify-center font-medium text-lg text-center">
                                <li class="nav-item m-2">
                                    <a href="#starters" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition" id="starters-tab">Starters</a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="#breakfast" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition" id="breakfast-tab">Breakfast</a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="#lunch" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition" id="lunch-tab">Lunch</a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="#dinner" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition" id="dinner-tab">Dinner</a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="#beverage" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition" id="beverage-tab">Beverage</a>
                                </li>
                            </ul>
                        </div>
    
                        <!-- Tab Content -->
                        <div id="tab-content">
                            <div id="starters" class="p-4">
                                <!-- Starters content here -->
                                Starters content
                            </div>
                            <div id="breakfast" class="p-4 hidden">
                                <!-- Breakfast content here -->
                                Breakfast content
                            </div>
                            <div id="lunch" class="p-4 hidden">
                                <!-- Lunch content here -->
                                Lunch content
                            </div>
                            <div id="dinner" class="p-4 hidden">
                                <!-- Dinner content here -->
                                Dinner content
                            </div>
                            <div id="beverage" class="p-4 hidden">
                                <!-- Beverage content here -->
                                Beverage content
                            </div>
                        </div>
                        
                        <div class="h-64 w-full flex flex-col items-center justify-center">
                            <div class="contenido p-6 text-center mt-4">
                                <h4 class="text-xl font-bold text-black">Plato 1</h4>
                                <p class="mt-4 text-gray-300">Una atmosfera acogedora ideal para toda la familia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

