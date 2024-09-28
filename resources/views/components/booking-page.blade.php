<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h3 class="text-lg font-bold mb-4 text-green-pea">Book Room {{ $room->room_num }}</h3>
        <a href="{{ route('dashboard') }}" class="text-tango hover:underline">
            &larr; Back to Dashboard
        </a>
    </div>

    @error('date')
    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
@enderror

    <form method="POST" action="{{ route('check-available-slots', $room->id) }}">
        @csrf

        <!-- Date Input -->
        <div class="mb-4">
            <label for="date" class="block text-gray-700">Booking Date</label>
            <input type="date" name="date" id="date" class="w-full mt-2 p-2 border rounded" required>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-tango hover:bg-pradita-orange text-white px-4 py-2 rounded">
                Check Available Slots
            </button>
        </div>
    </form>

</div>
