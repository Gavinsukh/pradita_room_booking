<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h3 class="text-lg font-bold mb-4">Book Room {{ $room->room_num }}</h3>
        <a href="{{ route('dashboard') }}" class="text-tango hover:underline">
            &larr; Back to Dashboard
        </a>
    </div>



    <form method="POST" action="">
        @csrf

        <!-- Date Input -->
        <div class="mb-4">
            <label for="date" class="block text-gray-700">Booking Date</label>
            <input type="date" name="date" id="date" class="w-full mt-2 p-2 border rounded" required>
        </div>

        <!-- Time Slot Selection -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($timeSlots as $slot)
                <label class="flex items-center">
                    <input type="radio" name="time_slot" value="{{ $slot }}" class="mr-2">
                    <span class="text-gray-800">{{ $slot }}</span>
                </label>
            @endforeach
        </div>

        @error('time_slot')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror

        <div class="mt-6">
            <button type="submit" class="bg-tango hover:bg-pradita-orange text-white px-4 py-2 rounded">
                Confirm Booking
            </button>
        </div>
    </form>
</div>
