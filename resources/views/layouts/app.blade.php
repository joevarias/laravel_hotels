<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- boostrap css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

        {{-- lightbox css --}}
        <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">

        {{-- hotel-date picker css --}}
        <link rel="stylesheet" href="{{ asset('css/hotel-datepicker.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- jquery first then popper then bootstrap js-->
        <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

        {{-- lightbox js --}}
        <script src="{{ asset('js/lightbox.js') }}"></script>

        {{-- fecha + hotel-date picker js --}}
        <script src="{{ asset('js/fecha.min.js') }}"></script>
        <script src="{{ asset('js/hotel-datepicker.min.js') }}"></script>

    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>

                {{ $slot }}
            </main>
        </div>
    </body>
</html>
