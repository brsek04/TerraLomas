<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- External CSS Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="preload" as="style">
    <link href="{{ asset('resources/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/iziToast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css') }}">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Custom CSS - Agrega tus estilos personalizados aquí -->

    @yield('page_css')
    @yield('css')
</head>
<body class="font-sans antialiased bg-gray-50 w-full dark:bg-[#0F172A]">

<div class="min-h-screen  w-full bg-cover dark:bg-[#0F172A]">
    <nav class="bg-gray-900 dark:bg-gray-900 fixed w-full z-20 top-0 start-0  dark:border-gray-600 shadow-xl">
        @include('elements.header')
    </nav>
    <div>
        @auth
            @if(Auth::user()->hasRole('admin'))
                @include('elements.sidebar-admin')
            @endif
        @endauth
    <main>
        @auth
            @if(Auth::user()->hasRole('admin'))
            <div class="content ml-12 ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
                @yield('content')
            </div>
            @else
            <div>
                @yield('content')
            </div>
            @endif
        @else
        <div>
            @yield('content')
        </div>
        @endauth
    </main>
    @auth
        @if(Auth::user()->hasRole('admin'))
        <footer></footer>
        @else
        <footer>
            @include('elements.footer')
        </footer>
        @endif
    @else
    <footer>
        @include('elements.footer')
    </footer>
    @endauth
       

</div>
</div>
   <!-- Internal and Deferred Scripts -->
   <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.4.2/dist/cdn.min.js" defer></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="{{ mix('js/app.js') }}"></script>
   <script src="{{ asset('resources/js/vendor/jquery-3.5.1.min.js') }}"></script>
   <script src="{{ asset('resources/js/vendor/modernizr-3.7.1.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
   <script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
   <script src="{{ asset('assets/js/popper.min.js') }}"></script>
   <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('assets/js/slick.min.js') }}"></script>
   <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
   <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>
   <script src="{{ asset('assets/js/wow.min.js') }}"></script>
   <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
