@extends('layouts.app-user')
@section('title')
    Carrito
@endsection
@section('content')




<div class="w-full min-h-screen flex flex-col bg-gray-900">
    <section id="menu-cart" class="pt-20">
        <div class="relative bg-cover flex items-center h-[500px] md:h-[500px] lg:h-[500px] sm:h-[500px]" style="background-image: url('{{ asset('images/logos/bannerbg.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-45"></div>
            <div class="relative container mx-auto px-4 text-white">
                <div class="w-full md:w-9/12">
                    <h2 class="slider_title text-white text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4  animate__animated animate__fadeInUp">Continua tu compra</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-gray-50">
        @if(session()->has('success_msg'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 alert" role="alert">
            <span class="font-medium">Success alert!</span> {{ session()->get('success_msg') }}
            <button type="button" class="close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if(session()->has('alert_msg'))
        <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800 alert" role="alert">
            <span class="font-medium">Info alert!</span> {{ session()->get('alert_msg') }}
            <button type="button" class="close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 alert" role="alert">
                <span class="font-medium">Danger alert!</span> {{ $error }}
                <button type="button" class="close" onclick="this.parentElement.style.display='none';" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
    @endif
    </div>
  
<section class="lg:pt-[50px] sm:pt-[70px] pt-[50px] lg:pb-[100px] sm:pb-10 pb-5 relative bg-gray-50">     
    <div class="h-screen pt-20">
        @if(\Cart::getTotalQuantity() > 0)
        <h1 class="mb-10 text-center text-2xl font-bold">{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h1>
        @else
        <div class="flex flex-col items-center justify-center">
            <h1 class="mb-10 text-center text-2xl font-bold">No hay productos en tu carrito</h1>
            <button class="mt-6 w-40 rounded-md bg-green-500 py-1.5 font-medium text-blue-50 hover:bg-green-600">
                <a href="/">Continuar en la tienda</a>
            </button>
        </div>
        @endif

        <div class="mx-auto max-w-5xl flex flex-col md:flex-row justify-center px-6 md:space-x-6 xl:px-0">
            @if(\Cart::getTotalQuantity() > 0)
            <div class="rounded-lg md:w-3/4 overflow-y-auto max-h-[calc(100vh-400px)]">
                <h2 class="mb-6 text-lg font-bold text-gray-900 sticky-title-container">Productos en el carro</h2>
                @foreach($cartCollection as $item)
                <div class="dz-shop-card style-1 flex border border-[#0000001a] rounded-[10px] mb-5 overflow-hidden duration-500 hover:border-transparent hover:shadow-[0px_15px_55px_rgba(34,34,34,0.15)] relative">
                    <div class="dz-media w-[200px] min-w-[100px]">
                        <img src="{{ asset($item->attributes->photo) }}" alt="/" class="h-full">
                    </div>
                    <div class="dz-content sm:p-5 p-2 flex flex-col w-full">
                        <div class="dz-head mb-4 flex items-center justify-between">
                            <h6 class="dz-name mb-0 flex items-center text-base">
                                <svg class="mr-[10px]" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="16" height="16" stroke="#0F8A65"></rect>
                                    <circle cx="8.5" cy="8.5" r="5.5" fill="#0F8A65"></circle>
                                </svg>
                                <a href="product-detail.html">{{ $item->name }}</a>
                            </h6>
                        </div>
                        <div class="dz-body sm:flex block justify-between gap-2">
                             <ul class="dz-meta flex flex-col space-y-2 ml-4"> <!-- Ajusta el margen izquierdo según sea necesario -->
                                <li class="mt-1 text-xs text-gray-700"><b>Precio:</b> ${{ $item->price }}</li>
                                <li class="mt-1 text-xs text-gray-700"><b>Subtotal:</b> ${{ \Cart::get($item->id)->getPriceSum() }}</li>
                            </ul>
                            <div class="flex items-center space-x-4">
                                <form action="{{ route('cart.update') }}" method="POST" class="flex items-center space-x-2">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <input type="number" class="form-control form-control-sm border border-gray-300 rounded-sm px-2 py-1 w-16 text-center focus:outline-none" value="{{ $item->quantity }}" name="quantity">
                                    <button type="submit" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg px-3 py-1.5 transition duration-300 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                          </svg>
                                          
                                    </button>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST" class="flex items-center">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button type="submit" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg px-3 py-1.5 transition duration-300 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                          </svg>                                          
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @if(\Cart::getTotalQuantity() > 0)
            <div class="md:w-1/4">
                <h2 class="mb-6 text-lg font-bold text-gray-900">Detalles de compra</h2>
                <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">Subtotal</p>
                        <p class="text-gray-700">${{ \Cart::getSubTotal() }}</p>
                    </div>
                    <hr class="my-4" />
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Total</p>
                        <div>
                            <p class="mb-1 text-lg font-bold">${{ \Cart::getTotal() }} CLP</p>
                            <p class="text-sm text-gray-700">incluyendo IVA</p>
                        </div>
                    </div>
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="mt-6 w-full rounded-md bg-orange-500 py-1.5 font-medium text-blue-50 hover:bg-orange-600">Confirmar orden</button>
                    </form>
                    <button class="mt-6 w-full rounded-md bg-green-500 py-1.5 font-medium text-blue-50 hover:bg-green-600" onclick="goBack()">Volver a la tienda</button>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!--fin carrito-->
</div>

@endsection

<script>
    function goBack() {
        window.history.back();
    }
</script>