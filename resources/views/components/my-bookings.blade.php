<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($bookings as $booking)
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col">
            <h3 class="font-bold text-lg">Room {{ $booking->rooms->room_num }}</h3>
            <p><strong>Date:</strong> {{ $booking->date }}</p>
            <p><strong>Time:</strong> {{ $booking->start_time }} - {{ $booking->end_time }}</p>
            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
            <a href="#" class="mt-4 text-blue-500 hover:underline">View Details</a>
        </div>
    @endforeach
</div>
