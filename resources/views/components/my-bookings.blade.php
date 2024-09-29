<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($bookings as $booking)
        <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col">

            <div class="flex justify-between mb-5">
                <div>
                    <h3 class="font-extrabold text-xl text-pradita-orange">
                        Room {{ $booking['room_num'] }}
                    </h3>
                    <p class="text-gray-500 text-sm">{{ $booking['location'] }}</p>
                    <p class="text-gray-500 text-sm">{{ Str::ucfirst($booking['room_type']) }}</p>
                </div>

                <span class="text-green-pea font-semibold text-sm">
                    {{ $booking['status'] === 'confirmed' ? 'Confirmed' : ucfirst($booking['status']) }}
                </span>
            </div>

            <div class="text-gray-600 text-center mb-4">
                <p class="mb-2">
                    <strong class="text-gray-800">Date:</strong> {{ $booking['date'] }}
                </p>
                <p>
                    <strong class="text-gray-800">Time:</strong> {{ $booking['start_time'] }} - {{ $booking['end_time'] }}
                </p>
            </div>

            <button type="button" class="bg-tango text-white px-5 py-3 rounded-full hover:bg-pradita-orange focus:ring-4 focus:ring-tango-light transition-all duration-300"
                onclick="showConfirmationModal('{{ route('booking-cancel', $booking['id']) }}')">
                Cancel Booking
            </button>
        </div>
    @empty
    <div class="">
        <h1 class=" text-gray-500">You Have No Booking Schedule</h1>
    </div>

    @endforelse


</div>



<!-- Modal Structure -->
<div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-30 backdrop-blur-sm flex items-center justify-center hidden transition-opacity duration-300 ease-in-out">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-sm w-full transform transition-transform duration-500 ease-in-out scale-95">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <h3 class="font-bold text-2xl text-gray-800 mb-2">Cancel Booking?</h3>
            <p class="text-gray-600 mb-6">Are you sure you want to cancel this booking? This action cannot be undone.</p>
        </div>
        <div class="flex justify-between items-center mt-6">
            <button id="cancelButton" class="bg-gray-300 text-gray-700 hover:bg-gray-400 px-5 py-2 rounded-md transition-colors duration-300">
                No, Keep It
            </button>
            <form id="confirmForm" method="POST" action="" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-5 py-2 rounded-md hover:bg-red-700 transition-colors duration-300">
                    Yes, Cancel
                </button>
            </form>
        </div>
    </div>
</div>


<script>
    function showConfirmationModal(actionUrl) {
        // Set the form action to the specific booking's cancellation URL
        document.getElementById('confirmForm').action = actionUrl;
        // Show the modal
        document.getElementById('confirmationModal').classList.remove('hidden');
    }

    // Hide modal when the user clicks "No, keep it"
    document.getElementById('cancelButton').addEventListener('click', function() {
        document.getElementById('confirmationModal').classList.add('hidden');
    });
</script>
