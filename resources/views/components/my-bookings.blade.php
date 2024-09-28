
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($bookings as $booking)
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col">
            <h3 class="font-bold text-lg mb-3 text-pradita-orange">Room {{ $booking['room_num'] }}</h3>
            <p><strong>Date:</strong> {{ $booking['date'] }}</p>
            <p><strong>Time:</strong> {{ $booking['start_time'] }} - {{ $booking['end_time'] }}</p>

            <p class="text-green-pea font-semibold"><strong class="text-black font-normal">Status:</strong> {{ $booking['status'] }}</p>
            <form method="POST" action="{{ route('booking-cancel', $booking['id']) }}" class="mt-4">
                @method('DELETE')
                @csrf
                <button type="submit" class="bg-tango text-white px-4 py-2 rounded hover:bg-pradita-orange ml-48">
                    Cancel Booking
                </button>
            </form>
        </div>
    @endforeach
</div>
