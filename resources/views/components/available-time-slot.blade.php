<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h3 class="text-lg font-bold mb-4 text-green-pea">Book Room {{ $room->room_num }}</h3>
        <a href="{{ route('book-room', ['id' => $room->id]) }}" class="text-tango hover:underline">
            &larr; Back
        </a>
    </div>

    @if(isset($timeSlots) && count($timeSlots) > 0)
    <h4 class="mt-6 text-lg font-bold">Available Time Slots:</h4>
    <form method="POST" action="{{ route('confirm-booking', ['room' => $room->id]) }}">
        @csrf

        <!-- Time Slot Selection -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-2">
            @foreach($timeSlots as $slot)
                <label class="flex items-center">
                    <input type="radio" name="time_slot" value="{{ $slot }} - {{ date('H:i', strtotime($slot) + 3600) }}" class="mr-2" required>
                    <span class="text-gray-800">{{ $slot }} - {{ date('H:i', strtotime($slot) + 3600) }}</span>
                </label>
            @endforeach
        </div>

        @error('time_slot')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror

        <div class="mt-6">
            <input type="hidden" name="date" value={{$date}}>
            <button type="submit" class="bg-tango hover:bg-pradita-orange text-white px-4 py-2 rounded">
                Confirm Booking
            </button>
        </div>
    </form>
@endif
</div>
