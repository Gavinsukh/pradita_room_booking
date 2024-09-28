<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Meeting Room') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-pea bg-conch rounded-lg" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if (request()->routeIs('my-bookings'))
            <x-my-bookings :bookings="$bookings"/>
        @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            @if(request()->routeIs('book-room'))
                <!-- Booking Page Component -->
                <x-booking-page :room="$room" />
                {{-- <x-booking-page :room="$room" :timeSlots="$timeSlots" /> --}}
            @elseif (request()->routeIs('dashboard'))
                <!-- Room Listing Component -->
                <x-room :rooms="$rooms" />
            @elseif (request()->routeIs('check-available-slots'))
                <x-available-time-slot :room="$room" :timeSlots="$timeSlots" :date="$date" />
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
