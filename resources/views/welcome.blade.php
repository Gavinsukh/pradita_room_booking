<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Room Booking</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="header w-full h-24 flex items-center justify-between px-6 bg-concrete shadow-lg rounded-lg sticky top-0 z-20">
            <div class="logo">
                <x-authentication-card-logo class="h-12"/>
            </div>

            <div class="actions space-x-4">
                <a href="{{ route('login') }}" class="text-sm bg-pradita-orange border border-pradita-orange text-concrete font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-pradita-orange focus:outline-none focus:ring-2 focus:ring-pradita-orange focus:ring-opacity-50">
                    Login
                </a>

                <a href="{{ route('register') }}" class="text-sm bg-pradita-orange border border-pradita-orange text-concrete font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-pradita-orange focus:outline-none focus:ring-2 focus:ring-pradita-orange focus:ring-opacity-50">
                    Register
                </a>
            </div>
        </div>


        <div class="content">
            <div class="top-content relative">

                <img src="{{ asset('images/mr-welcome-page.jpg') }}" alt="Meeting Room" class="w-full h-[32rem] object-cover">

                <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-center">
                    <h1 class="text-4xl font-bold text-white mb-4">
                        Book Your Next Meeting Space in Minutes
                    </h1>
                    <p class="text-lg text-white">
                        Find the perfect meeting room for your needs with ease. Flexible booking, instant confirmation.
                    </p>
                </div>
            </div>
        </div>



        <div class="footer w-full h-24 flex items-center justify-center px-6 bg-pradita-orange shadow-lg">
            <p class="text-concrete text-sm font-bold">
                Created by Gavin Sukhwir
            </p>
        </div>


    </body>
</html>
