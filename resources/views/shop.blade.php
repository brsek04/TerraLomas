@extends('layouts.app-user')
@section('title')
    Carrito
@endsection
@section('content')

<div class="w-full min-h-screen flex flex-col bg-gray-900">
    <section id="menu-cart" class="pt-28">
        <div class="relative bg-cover flex items-center h-[500px] md:h-[500px] lg:h-[500px] sm:h-[500px]" style="background-image: url('{{ asset('images/logos/appsbg.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-45"></div>
            <div class="relative container mx-auto px-4 text-white">
                <div class="w-full md:w-9/12">
                    <h2 class="slider_title text-white text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4  animate__animated animate__fadeInUp">Estás mirando en {{ $menu->name }}</h2>
                    <div class="flex flex-wrap sm:flex-row sm:space-x-6 sm:space-y-0 py-10">
                        <div class="flex flex-wrap sm:flex-row sm:space-x-6 sm:space-y-0 py-10 ">
                            <div class=" overflow-hidden rounded-lg p-2">
                                <a href="{{ route('branch.menus', $menu->id) }}" rel="nofollow" class="main-btn inline-block bg-orange-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-orange-700 transition-all duration-300">Volver a pagina principal</a>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="flex justify-center">
        <div class="lg:w-1/2">
            <div class="text-center pt-10">
                <h4 class="text-4xl sm:text-3xl md:text-3xl lg:text-4xl font-bold text-white">Menú</h4>
                <div class="relative h-0.5 w-36 bg-[#E54E1B] rounded-full mx-auto mt-6">
                    <div class="absolute top-[-6px] left-1/2 w-4 h-4 bg-[#E54E1B] transform -translate-x-1/3 rotate-45">
                        <div class="absolute top-1.5 left-[-8px] w-full h-full bg-[#E54E1B]/30"></div>
                        <div class="absolute top-[-7px] right-[-7px] w-full h-full bg-[#E54E1B]/30"></div>
                    </div>
                </div>
            </div> <!-- section title -->
        </div>
    </div> <!-- row -->

    <section id="contenidoMenu" class="content-inner-1 lg:pt-[100px] sm:pt-[70px] pt-[50px] pb-10 relative overflow-hidden">
        <div class="container mx-auto">
            <div class="w-full flex justify-center">
                <div class="xl:w-10/12 lg:w-9/12 w-full px-[15px]">
                    <div class="flex lg:mb-10 mb-[30px] sm:text-left text-center ">
                        <ul class="flex flex-wrap w-full justify-center style-1">
                            <li class="lg:py-2 rounded-sm lg:px-[15px] p-2 lg:mr-[10px] mr-[5px] duration-500 active:bg-orange-900 bg-orange-500 hover:bg-orange-700">
                                <a href="#" class="flex items-center lg:text-[15px] text-[13px] overflow-hidden">
                                    <span class="mb-0 text-white">
                                        TODO
                                    </span>    
                                </a>
                            </li>
                            <li class="lg:py-2 lg:px-[15px] rounded-sm p-2 lg:mr-[10px] mr-[5px] duration-500 active:bg-orange-900 bg-orange-500 hover:bg-orange-700">
                                <a href="#" class="flex items-center lg:text-[15px] text-[13px] overflow-hidden">
                                    <span class="mb-0 text-white">
                                        PLATOS
                                    </span>    
                                </a>
                            </li>
                            <li class="lg:py-2 lg:px-[15px] rounded-sm p-2 lg:mr-[10px] mr-[5px] duration-500 active:bg-orange-900 bg-orange-500 hover:bg-orange-700">
                                <a href="#" class="flex items-center lg:text-[15px] text-[13px] overflow-hidden">
                                    <span class="mb-0 text-white">
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
            <div class="max-w mx-auto px-4 sm:px-6 lg:px-8 w-full bg-gray-500 pb-8 pt-4 rounded-md shadow-xl">
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
                            <div class="max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all hover:scale-105">
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
                    <h5 class="text-xl text-white font-semibold mb-4">Platos</h5>
                    <div class="flex-grow border-t border-orange-400 p-5"></div>
                    <ul id="menuTodo" style="position: relative;" class="flex flex-wrap row dlab-gallery-listing gallery">
                        @foreach($menu->dishes as $dish)
                            <li class="card-container lg:w-1/3 md:w-1/2 w-full px-[15px] mb-[30px] All drink sweet salad">
                                <div class="max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all hover:scale-105">
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
                            <div class="max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden ">
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




<div class="w-full max-h-max">
    <div class="w-full px-2">
        <div class="py-2">
                    <div class="grid grid-cols-1 md:grid-cols-3 px-4 items-start gap-4">
                        <div class="flex flex-col mb-4">
                            <h5 class="text-l font-semibold mb-2 dark:text-white">Filtrar por tipo de plato</h5>
                            <div class="dropdown">
                                <button id="dropdownDishButton" data-dropdown-toggle="dropdownDish" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Seleccionar tipo de plato
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <div id="dropdownDish" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDishButton">
                                        @foreach($dishTypes as $type)
                                            <li>
                                                <a href="{{ route('shop.filter', ['menuId' => $menu->id, 'type' => 'dish', 'typeId' => $type->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $type->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
            
                        <div class="flex flex-col mb-4">
                            <h5 class="text-l font-semibold mb-2">Filtrar por tipo de bebida</h5>
                            <div class="dropdown">
                                <button id="dropdownBeverageButton" data-dropdown-toggle="dropdownBeverage" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Seleccionar tipo de bebida
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <div id="dropdownBeverage" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBeverageButton">
                                        @foreach($beverageTypes as $type)
                                            <li>
                                                <a href="{{ route('shop.filter', ['menuId' => $menu->id, 'type' => 'beverage', 'typeId' => $type->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $type->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="items-start">
                            <h5 class="text-l font-semibold mb-2">Limpiar filtros</h5>
                            <button onclick="limpiarFiltros()" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-orange-500 dark:text-orange-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-900">
                                Limpiar filtros
                            </button>
                        </div>
                    </div>
        </div>
    </div>
    
    <div class="max-w mx-auto px-4 sm:px-6 lg:px-8 w-full  bg-gray-700 pb-8 pt-4">
        @if(isset($items) && count($items))
            @if(request()->has('type') && request()->has('typeId'))
                @php
                    $type = request()->get('type');
                    $typeId = request()->get('typeId');
                @endphp
                <h5 class="text-xl font-semibold mb-4">Filtrados por {{ ucfirst($typeName) }}</h5>
            @endif
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                @foreach($items as $item)
                    <div class="flex bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <img src="{{ asset($item->photo) }}" class="w-2/5 rounded-t-lg" alt="{{ $item->name }}">
                        <div class="flex-1 px-5 py-4">
                            <a href="#" class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item->name }}</a>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $item->description }}</p>
                            <p class="mt-2 text-xl font-semibold text-gray-900 dark:text-white">${{ $item->price }}</p>
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
                @endforeach
            </div>
        @endif

        @if(!isset($items))
            @if($menu->dishes->count())
                <h5 class="text-xl text-white font-semibold mb-4">Platos</h5>
                <div class="flex-grow border-t border-gray-400 pb-2"></div>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                    @foreach($menu->dishes as $dish)
                        <div class="flex bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <img src="{{ asset($dish->photo) }}" class="w-2/5 rounded-t-lg" alt="{{ $dish->name }}">
                            <div class="flex-1 px-5 py-4">
                                <a href="#" class="text-lg font-semibold text-gray-900 dark:text-white">{{ $dish->name }}</a>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $dish->description }}</p>
                                <p class="mt-2 text-xl font-semibold text-gray-900 dark:text-white">${{ $dish->price }}</p>
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
                    @endforeach
                </div>
            @endif
            
            @if($menu->beverages->count())
                <h5 class="text-xl text-white font-semibold mb-4 mt-8">Bebidas</h5>
                <div class="flex-grow border-t border-gray-400 pb-2"></div>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                    @foreach($menu->beverages as $beverage)
                        <div class="flex bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <img src="{{ asset($beverage->photo) }}" class="w-2/5 rounded-t-lg" alt="{{ $beverage->name }}">
                            <div class="flex-1 px-5 py-4">
                                <a href="#" class="text-lg font-semibold text-gray-900 dark:text-white">{{ $beverage->name }}</a>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $beverage->description }}</p>
                                <p class="mt-2 text-xl font-semibold text-gray-900 dark:text-white">${{ $beverage->price }}</p>
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
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
<script>
    function limpiarFiltros() {
        window.location.href = "{{ route('shop.index', ['menuId' => $menu->id]) }}";
    }
</script>
