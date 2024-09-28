<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h2 class="text-2xl font-semibold text-green-pea mb-8">Available Rooms</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        @forelse($rooms as $room)
            <!-- Room Card -->
            <div class="bg-white shadow-md">
                <div class="p-6">

                    <h3 class="text-xl font-bold text-tango mb-2">Room {{ $room->room_num }}</h3>
                    <p class="text-gray-600 text-sm">{{ ucfirst($room->room_type) }} Room</p>
                    <p class="mt-2 text-gray-800"><strong>Capacity:</strong> {{ $room->capacity }} people</p>
                    <p class="text-gray-800"><strong>Location:</strong> {{ $room->location }}</p>
                </div>

                <div class="p-4 bg-concrete flex justify-center">
                    <a href="{{ route('book-room', ['id' => $room->id]) }}" class="text-white bg-tango hover:bg-pradita-orange px-6 py-2 rounded-full text-sm font-semibold transition-colors duration-300">Book Room</a>
                </div>
            </div>
        @empty

            <p class="text-center col-span-5 text-gray-600">No rooms available at the moment.</p>
        @endforelse
    </div>
</div>
