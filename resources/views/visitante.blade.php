@extends('layouts.app')
@section('title')
    Sucursales
@endsection
@section('content')

<div class="w-full min-h-screen flex flex-col bg-gray-900">
    <div class="relative bg-cover flex items-center h-[750px] md:h-[950px] lg:h-[700px] sm:h-[650px]" style="background-image: url('images/logos/bannerbg.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-45"></div>
        <div class="relative container mx-auto px-4 text-white">
            <div class="w-full md:w-9/12">
                <h2 class="slider_title text-white text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 wow fadeInUp">Nuestras sucursales</h2>
                <p class="text-white text-lg font-medium leading-7 mb-6 wow fadeInUp">Nos enorgullece presentarte nuestras sucursales, cada una diseñada para brindarte la mejor experiencia posible.
                    Descubre nuestras instalaciones y servicios únicos en cada ubicación, 
                    donde te garantizamos encontrarás la calidad y atención que nos caracteriza y mereces.</p>
                    <div class="flex flex-wrap sm:flex-row sm:space-x-6 sm:space-y-0 py-10 ">
                        @foreach ($branches as $branch)
                        <div class=" overflow-hidden rounded-lg p-2">
                            <a href="{{ route('branch.menus', $branch->id) }}" rel="nofollow" class="main-btn inline-block bg-orange-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-orange-700 transition-all duration-300">{{ $branch->name }}</a>
                        </div>
                        @endforeach
                    </div>
                   
            </div>
        </div>
    </div>
    <section id="coffee" class="pt-28">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="lg:w-1/2">
                    <div class="text-center pb-8">
                        <h4 class="text-4xl sm:text-3xl md:text-3xl lg:text-4xl font-bold text-white">Nos caracterizamos por</h4>
                        <div class="relative h-0.5 w-36 bg-[#E54E1B] rounded-full mx-auto mt-6">
                            <div class="absolute top-[-6px] left-1/2 w-4 h-4 bg-[#E54E1B] transform -translate-x-1/3 rotate-45">
                                <div class="absolute top-1.5 left-[-8px] w-full h-full bg-[#E54E1B]/30"></div>
                                <div class="absolute top-[-7px] right-[-7px] w-full h-full bg-[#E54E1B]/30"></div>
                            </div>
                        </div>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="flex flex-wrap justify-center">
                <div class="lg:w-1/3 md:w-2/3 sm:w-11/12 p-4">
                    <div class=" rounded-lg overflow-hidden transform transition-all hover:scale-105 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="h-64 w-full flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="M720-720q-33 0-56.5-23.5T640-800q0-33 23.5-56.5T720-880q33 0 56.5 23.5T800-800q0 33-23.5 56.5T720-720ZM680-80v-320q0-40-20.5-72T607-522l35-103q8-25 29.5-40t48.5-15q27 0 48.5 15t29.5 40l102 305H800v240H680ZM500-500q-25 0-42.5-17.5T440-560q0-25 17.5-42.5T500-620q25 0 42.5 17.5T560-560q0 25-17.5 42.5T500-500ZM220-720q-33 0-56.5-23.5T140-800q0-33 23.5-56.5T220-880q33 0 56.5 23.5T300-800q0 33-23.5 56.5T220-720ZM140-80v-280H80v-240q0-33 23.5-56.5T160-680h120q33 0 56.5 23.5T360-600v240h-60v280H140Zm300 0v-160h-40v-160q0-25 17.5-42.5T460-460h80q25 0 42.5 17.5T600-400v160h-40v160H440Z"/>
                            </svg>
                            <div class="p-6 text-center mt-4">
                                <h4 class="text-xl font-bold text-white">Ambiente Familiar</h4>
                                <p class="mt-4 text-gray-300">Una atmosfera acogedora ideal para toda la familia</p>
                            </div>
                        </div>  
                    </div> <!-- ambiente familiar -->
                </div>
                <div class="lg:w-1/3 md:w-2/3 sm:w-11/12 p-4">
                    <div class="rounded-lg overflow-hidden transform transition-all hover:scale-105 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="h-64 w-full flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="m160-120-80-80h800l-80 80H160Zm-40-120q6-18 16-34t24-30v-296h-40v-60h40v-30h-40v-60h40v-30h-40v-60h280q33 0 56.5 23.5T480-760v10h360v60H480v10q0 33-23.5 56.5T400-600h-80v244q14 2 28 6t26 12q26-65 83-103.5T583-480q90 0 153.5 61.5T800-268v28H120Zm334-80h252q-17-36-50-58t-73-22q-42 0-77 21t-52 59ZM320-750h80v-30h-80v30Zm0 90h80v-30h-80v30Zm-100-90h40v-30h-40v30Zm0 90h40v-30h-40v30Zm0 314q10-5 19.5-7.5T260-358v-242h-40v254Zm360 26Z"/></svg>
                            <div class="p-2 text-center mt-4">
                                <h4 class="text-xl font-bold text-white">La mejor calidad en Comida</h4>
                                <p class="mt-4 text-gray-600">Lorem Ipsum is simply dummy of the printing industry.</p>
                            </div>
                        </div>
                        
                    </div> <!-- mejor calidad -->
                </div>
                <div class="lg:w-1/3 md:w-2/3 sm:w-11/12 p-4">
                    <div class="rounded-lg overflow-hidden transform transition-all hover:scale-105 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="h-64 w-full flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#e8eaed" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e8eaed" class="size-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                              </svg>                              
                            <div class="p-2 text-center mt-4">
                                <h4 class="text-xl font-bold text-white">Todo medio de pago</h4>
                                <p class="mt-4 text-gray-600">Lorem Ipsum is simply dummy of the printing industry.</p>
                            </div>
                        </div>
                        
                    </div> <!-- pagos-->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <section id="about" class="about_area pt-28 pb-32">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="lg:w-1/2">
                    <div class="text-center pb-10">
                        <h4 class="text-4xl sm:text-3xl md:text-3xl lg:text-4xl font-bold">Sobre Nosotros</h4>
                        <div class="relative h-0.5 w-36 bg-[#E54E1B] rounded-full mx-auto mt-6">
                            <div class="absolute top-[-6px] left-1/2 w-4 h-4 bg-[#E54E1B] transform -translate-x-1/3 rotate-45">
                                <div class="absolute top-1.5 left-[-8px] w-full h-full bg-[#E54E1B]/30"></div>
                                <div class="absolute top-[-7px] right-[-7px] w-full h-full bg-[#E54E1B]/30"></div>
                            </div>
                        </div>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="flex flex-wrap items-center">
                <div class="lg:w-1/2 w-full">
                    <div class="mt-12 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <img src="assets/images/about.jpg" alt="about" class="rounded-md max-w-xl">
                    </div> <!-- about image -->
                </div>
                <div class="lg:w-1/2 w-full">
                    <div class="mt-12 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <h4 class="text-4xl font-bold lg:text-4xl md:text-3xl sm:text-3xl text-white">Nuestra Historia</h4>
                        <p class="mt-6 text-gray-600">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr. <br> <br> Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                        <ul class="flex flex-wrap pt-8">
                            <li class="inline-block mt-2">
                                <a href="https://www.facebook.com/terralomas" >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-orange-400 transition-all ease-in-out duration-500 hover:text-white">
                                        <path d="M 8 3 C 5.243 3 3 5.243 3 8 L 3 16 C 3 18.757 5.243 21 8 21 L 16 21 C 18.757 21 21 18.757 21 16 L 21 8 C 21 5.243 18.757 3 16 3 L 8 3 z M 8 5 L 16 5 C 17.654 5 19 6.346 19 8 L 19 16 C 19 17.654 17.654 19 16 19 L 8 19 C 6.346 19 5 17.654 5 16 L 5 8 C 5 6.346 6.346 5 8 5 z M 17 6 A 1 1 0 0 0 16 7 A 1 1 0 0 0 17 8 A 1 1 0 0 0 18 7 A 1 1 0 0 0 17 6 z M 12 7 C 9.243 7 7 9.243 7 12 C 7 14.757 9.243 17 12 17 C 14.757 17 17 14.757 17 12 C 17 9.243 14.757 7 12 7 z M 12 9 C 13.654 9 15 10.346 15 12 C 15 13.654 13.654 15 12 15 C 10.346 15 9 13.654 9 12 C 9 10.346 10.346 9 12 9 z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="inline-block mt-2 ml-4"><a href="#" class="w-9 h-9 leading-9 text-center bg-orange-600 text-white rounded-md transition-all duration-300 ease-out hover:bg-[#E54E1B]">                      
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" fill="currentColor" class="w-7 h-7 text-orange-400 transition-all ease-in-out duration-500 hover:text-white">
                                        <path d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z"/>
                                    </svg>
                            </a></li>
                            <li class="inline-block mt-2 ml-4"><a href="#" class="w-9 h-9 leading-9 text-center bg-orange-600 text-white rounded-md transition-all duration-300 ease-out hover:bg-[#E54E1B]"><i class="lni lni-instagram-original"></i></a></li>
                            <li class="inline-block mt-2 ml-4"><a href="#" class="w-9 h-9 leading-9 text-center bg-orange-600 text-white rounded-md transition-all duration-300 ease-out hover:bg-[#E54E1B]"><i class="lni lni-linkedin-original"></i></a></li>
                        </ul>
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</div>
@endsection
