<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Room Booking</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/js/app.js', 'resources/css/app.css'])

    </head>
    <body class="font-sans antialiased bg-white">
        <div class="header w-full h-24 flex items-center justify-between px-6 bg-concrete shadow-lg rounded-lg sticky top-0 z-20">
            <div class="logo">
                <x-authentication-card-logo class="h-12"/>
            </div>

            <div class="content-hyperlink px-11 flex w-96 justify-between">
                <a href="/">Home</a>
                <a href="#benefits">Benefits</a>
                <a href="#steps">Guide</a>
                <a href="#contact">Contact</a>
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
            <div class="top-content relative" data-aos="fade-in" data-aos-duration="700">
                <img src="{{ asset('images/mr-welcome-page.jpg') }}" alt="Meeting Room" class="w-full h-[40rem] object-cover">
                <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 text-center">
                    <h1 class="text-4xl font-bold text-white mb-4">
                        Book Your Next Meeting Space in Minutes
                    </h1>
                    <p class="text-lg text-white" id="benefits">
                        Find the perfect meeting room for your needs with ease. Flexible booking, instant confirmation.
                    </p>
                </div>
            </div>


            </div>
            <!-- Benefits Section -->
            <div class="mid-content w-full mt-20 mb-20 scroll-mt-24" data-aos="slide-right" data-aos-duration="700" data-aos-delay="100">
                <h2 class="text-3xl font-semibold text-center mb-8 text-green-pea">Why Choose Us?</h2>
                <div class="benefits-container flex justify-evenly font-semibold">
                    <div class="left-mid-content w-72 flex flex-col items-center text-center text-green-pea">
                        <img src="{{ asset('images/calendar.png') }}" alt="Calendar Icon" class="h-auto w-[10rem] mb-3">
                        <p>Instant bookings, choose your time and room with ease.</p>
                    </div>
                    <div class="mid-mid-content w-72 flex flex-col items-center text-center text-green-pea">
                        <img src="{{ asset('images/meeting.png') }}" alt="Meeting Icon" class="h-auto w-[10rem] mb-3">
                        <p>Choose from a range of room types that suit your needs.</p>
                    </div>
                    <div class="right-mid-content w-72 flex flex-col items-center text-center text-green-pea">
                        <img src="{{ asset('images/flexible.png') }}" alt="Clock Icon" class="h-auto w-[10rem] mb-3">
                        <p>Flexible options of reservations.</p>
                    </div>
                </div>
            </div>

            <!-- Steps Section -->
            <div class="bottom-content mb-20 mt-20 space-y-6 items-center" id="steps" data-aos="slide-right" data-aos-duration="700" data-aos-delay="300">
                <h2 class="text-3xl font-semibold text-center mb-5 text-tango">How It Works?</h2>
                <div class="step-container flex justify-evenly">
                    <div class="step w-72 flex flex-col items-center text-center text-tango">
                        <div class="icon bg-white p-3 rounded-full mr-4">
                            <img src="{{ asset('images/pick a meeting room.png') }}" alt="Pick Meeting Room" class="h-auto w-[10rem]">
                        </div>
                        <div class="text font-semibold text-lg">
                            1. Pick a Meeting Room
                        </div>
                    </div>

                    <div class="step w-72 flex flex-col items-center text-center text-tango">
                        <div class="icon bg-white p-3 rounded-full mr-4">
                            <img src="{{ asset('images/select date&time.png') }}" alt="Select Date & Time" class="h-auto w-[10rem]">
                        </div>
                        <div class="text font-semibold text-lg">
                            2. Select Date and Time
                        </div>
                    </div>

                    <div class="step w-72 flex flex-col items-center text-center text-tango">
                        <div class="icon bg-white p-3 rounded-full mr-4">
                            <img src="{{ asset('images/confirmation.png') }}" alt="Confirmation" class="h-auto w-[10rem]">
                        </div>
                        <div class="text font-semibold text-lg">
                            3. Confirm Your Booking
                        </div>
                    </div>
                </div>
            </div>



            <div class="footer w-full h-auto flex flex-col px-6 py-8 bg-gradient-to-r from-[#ea1f28] to-[#d32f2f] shadow-lg" data-aos="flip-up" data-aos-duration="700" data-aos-delay="500" id="contact">
                <p class="text-white font-bold text-lg mb-4 text-center">
                    Where Can You Find Us?
                </p>
                <div class="text-white text-base flex flex-col items-center">
                    <div class="flex items-center">
                        <img src="{{ asset('images/world-wide-web.png') }}" alt="Website" class="h-10 w-10 mr-2">
                        <a href="https://www.pradita.ac.id" class="hover:underline">Website: https://www.pradita.ac.id</a>
                    </div>
                    <div class="flex items-center">
                        <img src="{{ asset('images/phone.png') }}" alt="Phone" class="h-10 w-10 mr-2">
                        <span>Contact us: 021 5568 9999 / 0815 8510 9999 </span>
                    </div>
                    <div class="flex items-center">
                        <img src="{{ asset('images/location.png') }}" alt="Phone" class="h-10 w-10 mr-2">
                        <p class="text-white text-sm text-center">
                            PRADITA UNIVERSITY CAMPUS
                            Scientia Business Park Tower I
                            Jl. Boulevard Gading Serpong
                            Blok O/1, Summarecon Serpong
                        </p>
                    </div>
                </div>
            </div>



        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>
