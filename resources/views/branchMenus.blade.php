@extends('layouts.app-user')
@section('title')
    Menu Principal
@endsection
@section('content')

<div class="w-full min-h-screen flex flex-col bg-gray-900">
    <section id="menu" class="pt-28">
       <div class="relative bg-cover bg-fixed flex items-center h-[750px] md:h-[950px] lg:h-[700px] sm:h-[650px]" style="background-image: url('{{ asset('images/logos/appsbg.jpg') }}');">
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

    <section id="recomendaciones" class="pt-28 bg-gray-50 pb-10">
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
                                <div class=" rounded-lg bg-white shadow-xl overflow-hidden transform transition-all hover:scale-105 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
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

<section id="Menu" class=" relative pt-28 pb-32 bg-gray-50" style="background-image: url('{{ asset('images/logos/menufoodbg.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-45"></div>
    <div class=" relative flex justify-center pb-10">
        <div class="lg:w-1/2">
            <div class="text-center">
                <h4 class="text-4xl sm:text-3xl md:text-3xl lg:text-4xl font-bold text-white">{{ $menu->name }}</h4>
                <div class="relative h-0.5 w-36 bg-[#E54E1B] rounded-full mx-auto mt-6">
                    <div class="absolute top-[-6px] left-1/2 w-4 h-4 bg-[#E54E1B] transform -translate-x-1/3 rotate-45">
                        <div class="absolute top-1.5 left-[-8px] w-full h-full bg-[#E54E1B]/30"></div>
                        <div class="absolute top-[-7px] right-[-7px] w-full h-full bg-[#E54E1B]/30"></div>
                    </div>
                </div>
            </div> <!-- section title -->
        </div>
    </div> <!-- row -->
    <div class=" relative container mx-auto bg-gray-100 pt-10">
        <div class="w-full flex justify-center">
            <div class="xl:w-10/12 lg:w-9/12 w-full px-[15px]">
                <div class="flex lg:mb-10 mb-[30px] sm:text-left text-center ">
                    <ul class="flex flex-wrap w-full justify-center style-1">
                        <li class="lg:py-2 rounded-sm lg:px-[15px] p-2 lg:mr-[10px] mr-[5px] duration-500 active:bg-orange-900 bg-orange-500 hover:bg-orange-700">
                            <a href="allMenu" class="nav-menu flex items-center lg:text-[15px] text-[13px] overflow-hidden">
                                <span class="mb-0 text-white">
                                    TODO
                                </span>    
                            </a>
                        </li>
                        <li class="lg:py-2 lg:px-[15px] rounded-sm p-2 lg:mr-[10px] mr-[5px] duration-500 active:bg-orange-900 bg-orange-500 hover:bg-orange-700">
                            <a href="platosMenu" class="nav-menu flex items-center lg:text-[15px] text-[13px] overflow-hidden">
                                <span class="flex mb-0 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24px" height="24px"  fill="#FFFFFF">
                                        <path d="M280-80v-366q-51-14-85.5-56T160-600v-280h80v280h40v-280h80v280h40v-280h80v280q0 56-34.5 98T360-446v366h-80Zm400 0v-320H560v-280q0-83 58.5-141.5T760-880v800h-80Z"/>
                                     </svg>
                                    PLATOS
                                </span>    
                            </a>
                        </li>
                        <li class="lg:py-2 lg:px-[15px] rounded-sm p-2 lg:mr-[10px] mr-[5px] duration-500 active:bg-orange-900 bg-orange-500 hover:bg-orange-700">
                            <a href="postresMenu" class="nav-menu flex items-center lg:text-[15px] text-[13px] overflow-hidden">
                                <span class="flex mb-0 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M482-40 294-400q-71 3-122.5-41T120-560q0-51 29.5-92t74.5-58q18-91 89.5-150.5T480-920q95 0 166.5 59.5T736-710q45 17 74.5 58t29.5 92q0 75-53 119t-119 41L482-40ZM280-480q15 0 29.5-5t26.5-17l22-22 26 16q21 14 45.5 21t50.5 7q26 0 50.5-7t45.5-21l26-16 22 22q12 12 26.5 17t29.5 5q33 0 56.5-23.5T760-560q0-30-19-52.5T692-640l-30-4-2-32q-5-69-57-116.5T480-840q-71 0-123 47.5T300-676l-2 32-30 6q-30 6-49 27t-19 51q0 33 23.5 56.5T280-480Zm202 266 108-210q-24 12-52 18t-58 6q-27 0-54.5-6T372-424l110 210Zm-2-446Z"/>
                                    </svg>
                                    POSTRES
                                </span>    
                            </a>
                        </li>
                        <li class="flex lg:py-2 lg:px-[15px] rounded-sm  p-2 lg:mr-[10px] mr-[5px] duration-500 active:bg-orange-900 bg-orange-500 hover:bg-orange-700">
                            <a href="#" class="flex items-center lg:text-[15px] text-[13px] overflow-hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-120v-80h200v-200L120-760v-80h720v80L520-400v200h200v80H240Zm58-560h364l72-80H226l72 80Zm182 204 111-124H369l111 124Zm0 0Z"/>
                                </svg>
                                <span class="mb-0 text-white">
                                    BEBIDAS FRÍAS
                                </span>    
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--menu empieza-->
        <div class="max-w mx-auto px-4 sm:px-6 lg:px-8 w-full pb-8 pt-4 rounded-md shadow-xl">
            @if(isset($items) && count($items))
            @if(request()->has('type') && request()->has('typeId'))
                @php
                    $type = request()->get('type');
                    $typeId = request()->get('typeId');
                @endphp
                <h5 class="text-xl font-semibold mb-4">Filtrados por {{ ucfirst($typeName) }}</h5>
            @endif
            <ul id="menuTodo" style="position: relative;" class="flex flex-wrap row dlab-gallery-listing gallery">
                @foreach($items as $item)
                    <li class="card-container lg:w-1/3 md:w-1/2 w-full px-[15px] mb-[30px] All drink sweet salad">
                        <div class=" rounded-lg bg-white shadow-xl overflow-hidden transform transition-all hover:scale-105 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                            <div class="max-w-md mx-auto">
                                <div id="imagen" class="h-[236px]" style="background-image:url('{{ asset($item->photo) }}'); background-size:cover; background-position:center"></div>
                                <div class="p-4 sm:p-6">
                                    <p id="titulo" class="font-bold text-gray-700 text-[22px] leading-7 mb-1">{{ $item->name }}</p>
                                    <div class="flex flex-row">
                                        <p id="presio" class="text-black text-[17px] mr-2 ">${{ $item->price }}</p>
                                      
                                    </div>
                                    <p id="descripcion" class="text-[#7C7C80] font-[15px] mt-6">{{ $item->description }}</p>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $item->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $item->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $item->photo }}" id="photo" name="photo">
                                        <input type="hidden" value="{{ $type }}" id="type" name="type">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <button type="submit" class="mt-4 flex items-center justify-center w-full bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                            </svg>  
                                            Agregar al carrito
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
            @if(!isset($items))
            @if($menu->dishes->count())
                <h5 class=" text-gray-900 font-semibold text-2xl mb-4 text-center">Platos</h5>
                <div class="flex-grow border-t border-orange-400 p-5"></div>
                <ul id="menuTodo" style="position: relative;" class="flex flex-wrap row dlab-gallery-listing gallery">
                    @foreach($menu->dishes as $dish)
                        <li class="card-container lg:w-1/3 md:w-1/2 w-full px-[15px] mb-[30px] All drink sweet salad">
                            <div class=" rounded-lg bg-white shadow-xl overflow-hidden transform transition-all hover:scale-105 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                <div class="max-w-md mx-auto">
                                    <div id="imagen" class="h-[236px]" style="background-image:url('{{ asset($dish->photo) }}'); background-size:cover; background-position:center"></div>
                                    <div class="p-4 sm:p-6">
                                        <p id="titulo" class="font-bold text-gray-700 text-[22px] leading-7 mb-1">{{ $dish->name }}</p>
                                        <div class="flex flex-row">
                                            <p id="presio" class="text-[#3C3C4399] text-[17px] mr-2 text-black">${{ $dish->price }}</p>
                                        </div>
                                        <p id="descripcion" class="text-[#7C7C80] font-[15px] mt-6">{{ $dish->description }}</p>
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $dish->id }}" id="id" name="id">
                                            <input type="hidden" value="{{ $dish->name }}" id="name" name="name">
                                            <input type="hidden" value="{{ $dish->price }}" id="price" name="price">
                                            <input type="hidden" value="{{ $dish->photo }}" id="photo" name="photo">
                                            <input type="hidden" value="dish" id="type" name="type">
                                            <input type="hidden" value="1" id="quantity" name="quantity">
                                            <button type="submit" class="mt-4 flex items-center justify-center w-full bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>  
                                                Agregar al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
            
            @if($menu->beverages->count())
                <h5 class="text-2xl flex items-center text-white font-semibold mb-4 mt-8">
                    Bebidas
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-120v-80h200v-200L120-760v-80h720v80L520-400v200h200v80H240Zm58-560h364l72-80H226l72 80Zm182 204 111-124H369l111 124Zm0 0Z"/>
                    </svg>
                  
                </h5>
                <div class="flex-grow border-t border-orange-400 p-5"></div>
                <ul id="menuTodo" style="position: relative;" class="flex flex-wrap row dlab-gallery-listing gallery">
                    @foreach($menu->beverages as $beverage)
                    <li class="card-container lg:w-1/3 md:w-1/2 w-full px-[15px] mb-[30px] All drink sweet salad" >
                        <div class="max-w-md mx-auto bg-white rounded-lg shadow-xl overflow-hidden transform transition-all hover:scale-105 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">
                            <div class="max-w-md mx-auto">
                                    <div id="imagen" class="h-[236px]" style="background-image:url('{{ asset($beverage->photo) }}'); background-size:cover; background-position:center"></div>
                                    <div class="p-4 sm:p-6">
                                        <p id="titulo" class="font-bold text-gray-700 text-[22px] leading-7 mb-1">{{ $beverage->name }}</p>
                                        <div class="flex flex-row">
                                            <p id="presio" class="text-[#3C3C4399] text-[17px] mr-2 text-black">${{ $beverage->price }}</p>
                                        </div>
                                        <p id="descripcion" class="text-[#7C7C80] font-[15px] mt-6">{{ $beverage->description }}</p>
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $beverage->id }}" id="id" name="id">
                                            <input type="hidden" value="{{ $beverage->name }}" id="name" name="name">
                                            <input type="hidden" value="{{ $beverage->price }}" id="price" name="price">
                                            <input type="hidden" value="{{ $beverage->photo }}" id="photo" name="photo">
                                            <input type="hidden" value="beverage" id="type" name="type">
                                            <input type="hidden" value="1" id="quantity" name="quantity">
                                            <button type="submit" class="mt-4 flex items-center justify-center w-full bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>  
                                                Agregar al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @endif
                @endif
        </div>
    </div>
</section>
    
</div>

@endsection
