<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preload" href="//fonts.googleapis.com/css?family=Lato&display=swap" as="style">

    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet">
    
    <!-- Otros CSS -->
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('css')

    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body class="font-sans antialiased bg-gray-50 w-full dark:bg-[#0F172A]">
    <div class="min-h-screen w-full bg-cover dark:bg-[#0F172A]">
        <nav class="bg-gray-900 dark:bg-gray-900 fixed w-full z-20 top-0 start-0 dark:border-gray-600 shadow-xl">
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
                        <div class="content ml-12 ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4">
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

    <!-- jQuery y otros JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
    
    <!-- Otros JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    
    @yield('scripts')
</body>
</html>
