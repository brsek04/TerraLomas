@extends('layouts.app-user')
@section('title')
    Menu Principal
@endsection
@section('content')

<div class="w-full min-h-screen flex flex-col bg-gray-900">
    <section id="menu" class="pt-28">
        <div class="relative bg-cover flex items-center h-[750px] md:h-[950px] lg:h-[700px] sm:h-[650px]" style="background-image: url('{{ asset('images/logos/appsbg.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-45"></div>
            <div class="relative container mx-auto px-4 text-white">
                <div class="w-full md:w-9/12">
                    <h2 class="slider_title text-white text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 wow fadeInUp">Nuestros Menús</h2>
                    <div class="flex flex-wrap sm:flex-row sm:space-x-6 sm:space-y-0 py-10">
                        @foreach ($menus as $menu)
                        <div class="overflow-hidden rounded-lg p-2">
                            <a href="{{ route('menus.shop', $menu->id) }}" rel="nofollow" class="main-btn inline-block bg-orange-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-orange-700 transition-all duration-300">{{ __('Ver menú completo para') }} {{ $branch->name }}</a>
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
            <div class="flex justify-center">
                <div class="lg:w-2/3 md:w-3/4 sm:w-11/12 p-4">
                    <div class="rounded-lg overflow-hidden transform transition-all">
                        <!-- Tabs -->
                        <div class="menu-items mb-4">
                            <ul class="flex flex-wrap -mb-px justify-center font-medium text-lg text-center">
                                <li class="nav-item m-2">
                                    <a href="#starters" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition active" id="starters-tab">Para empezar</a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="#breakfast" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition" id="breakfast-tab">Desayuno</a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="#lunch" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition" id="lunch-tab">Almuerzo</a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="#dinner" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition" id="dinner-tab">Once</a>
                                </li>
                                <li class="nav-item m-2">
                                    <a href="#beverage" class="nav-link inline-block p-2 text-white bg-orange-500 rounded-sm font-semibold capitalize hover:bg-gray-700 hover:text-gray-800 transition" id="beverage-tab">Bebestibles</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab Content -->
                    <div id="tab-content" class="w-full flex justify-center">
                        <!-- cards-->
                        <div class="flex flex-wrap tab-content active gap-4" id="starters">
                            <!--inicio starters card-->
                            <div class=" w-full sm:w-2/4 md:w-1/2 lg:w-2/4 max-w-md mx-auto">
                                <div class="max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all hover:scale-105">
                                    <div class="max-w-md mx-auto">
                                        <div class="h-[236px]" style="background-image:url('https://img.freepik.com/free-photo/pasta-spaghetti-with-shrimps-sauce_1220-5072.jpg?w=2000&t=st=1678041911~exp=1678042511~hmac=e4aa55e70f8c231d4d23832a611004f86eeb3b6ca067b3fa0c374ac78fe7aba6'); background-size:cover; background-position:center"></div>
                                        <div class="p-4 sm:p-6">
                                            <p class="font-bold text-gray-700 text-[22px] leading-7 mb-1">Spagetti with shrimp sauce</p>
                                            <div class="flex flex-row">
                                                <p class="text-[#3C3C4399] text-[17px] mr-2 line-through">CLP 700</p>
                                                <p class="text-[17px] font-bold text-[#0FB478]">MVR 700</p>
                                            </div>
                                            <p class="text-[#7C7C80] font-[15px] mt-6">Our shrimp sauce is made with mozarella, a creamy taste of shrimp with extra kick of spices.</p>
                                            <button type="submit" class="mt-4 flex items-center justify-center w-full bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>  
                                                Agregar al carrito
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--fin starters card-->
                            <div class=" w-full sm:w-2/4 md:w-1/2 lg:w-2/4 max-w-md mx-auto">
                                <div class="max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all hover:scale-105">
                                    <div class="max-w-md mx-auto">
                                        <div class="h-[236px]" style="background-image:url('https://img.freepik.com/free-photo/pasta-spaghetti-with-shrimps-sauce_1220-5072.jpg?w=2000&t=st=1678041911~exp=1678042511~hmac=e4aa55e70f8c231d4d23832a611004f86eeb3b6ca067b3fa0c374ac78fe7aba6'); background-size:cover; background-position:center"></div>
                                        <div class="p-4 sm:p-6">
                                            <p class="font-bold text-gray-700 text-[22px] leading-7 mb-1">Spagetti with shrimp sauce</p>
                                            <div class="flex flex-row">
                                                <p class="text-[#3C3C4399] text-[17px] mr-2 line-through">CLP 700</p>
                                                <p class="text-[17px] font-bold text-[#0FB478]">MVR 700</p>
                                            </div>
                                            <p class="text-[#7C7C80] font-[15px] mt-6">Our shrimp sauce is made with mozarella, a creamy taste of shrimp with extra kick of spices.</p>
                                            <button type="submit" class="mt-4 flex items-center justify-center w-full bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>  
                                                Agregar al carrito
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->
                        <!--breakfast-->
                        <div class="flex flex-wrap tab-content gap-4 hidden " id="breakfast">
                            <!--inicio starters card-->
                            <div class=" w-full sm:w-2/4 md:w-1/2 lg:w-full max-w-md mx-auto">
                                <div class="max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all hover:scale-105">
                                    <div class="max-w-md mx-auto">
                                        <div class="h-[236px]" style="background-image:url('https://img.freepik.com/free-photo/pasta-spaghetti-with-shrimps-sauce_1220-5072.jpg?w=2000&t=st=1678041911~exp=1678042511~hmac=e4aa55e70f8c231d4d23832a611004f86eeb3b6ca067b3fa0c374ac78fe7aba6'); background-size:cover; background-position:center"></div>
                                        <div class="p-4 sm:p-6">
                                            <p class="font-bold text-gray-700 text-[22px] leading-7 mb-1">Spagetti with shrimp sauce</p>
                                            <div class="flex flex-row">
                                                <p class="text-[#3C3C4399] text-[17px] mr-2 line-through">CLP 700</p>
                                                <p class="text-[17px] font-bold text-[#0FB478]">MVR 700</p>
                                            </div>
                                            <p class="text-[#7C7C80] font-[15px] mt-6">Our shrimp sauce is made with mozarella, a creamy taste of shrimp with extra kick of spices.</p>
                                            <button type="submit" class="mt-4 flex items-center justify-center w-full bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>  
                                                Agregar al carrito
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--fin starters card-->
                            <div class=" w-full sm:w-2/4 md:w-1/2 lg:w-full max-w-md mx-auto">
                                <div class="max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all hover:scale-105">
                                    <div class="max-w-md mx-auto">
                                        <div class="h-[236px]" style="background-image:url('https://img.freepik.com/free-photo/pasta-spaghetti-with-shrimps-sauce_1220-5072.jpg?w=2000&t=st=1678041911~exp=1678042511~hmac=e4aa55e70f8c231d4d23832a611004f86eeb3b6ca067b3fa0c374ac78fe7aba6'); background-size:cover; background-position:center"></div>
                                        <div class="p-4 sm:p-6">
                                            <p class="font-bold text-gray-700 text-[22px] leading-7 mb-1">Some dish description</p>
                                            <div class="flex flex-row">
                                                <p class="text-[#3C3C4399] text-[17px] mr-2 line-through">CLP 700</p>
                                                <p class="text-[17px] font-bold text-[#0FB478]">clp 700</p>
                                            </div>
                                            <p class="text-[#7C7C80] font-[15px] mt-6">Our shrimp sauce is made with mozarella, a creamy taste of shrimp with extra kick of spices.</p>
                                            <button type="submit" class="mt-4 flex items-center justify-center w-full bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>  
                                                Agregar al carrito
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end breakfast-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    


    
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
    console.log('tabs.js loaded');
    const tabs = document.querySelectorAll('.nav-link');

    tabs.forEach(tab => {
        tab.addEventListener('click', function (event) {
            event.preventDefault();

            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            const target = document.querySelector(this.getAttribute('href'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            target.classList.remove('hidden');
        });
    });
});
</script>
@endsection
