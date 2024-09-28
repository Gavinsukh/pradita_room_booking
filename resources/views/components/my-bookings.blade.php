<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($bookings as $booking)
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col">
            <h3 class="font-bold text-lg">Room {{ $booking->rooms->room_num }}</h3>
            <p><strong>Date:</strong> {{ $booking->date }}</p>
            <p><strong>Time:</strong> {{ $booking->start_time }} - {{ $booking->end_time }}</p>
            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>

            @if ($booking->status == 'confirmed')
            <form method="POST" action="{{ route('booking-cancel', $booking->id) }}" class="mt-4">
                @csrf
                <button type="submit" class="bg-tango text-white px-4 py-2 rounded hover:bg-pradita-orange">
                    Cancel Booking
                </button>
            </form>
            @else
            <form method="POST" action="{{ route('booking-remove', $booking->id) }}" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Remove
                </button>
            </form>
            @endif
        </div>
    @endforeach
</div>
