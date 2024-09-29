@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3" role="alert">
        <strong class="font-bold">Failed!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

<button type="button" class="bg-bay-leaf text-white mb-3 px-5 py-3 rounded-lg hover:bg-green-pea focus:ring-4 focus:ring-tango-light transition-all duration-300"
onclick="showCreateModal()">
    Create Room
</button>

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3" role="alert">
    <strong class="font-bold">Errors!</strong>
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($rooms as $room)
        <div class="bg-white shadow-lg rounded-2xl p-8 flex flex-col">
            <div class="text-gray-600 text-center mb-4">
                <h3 class="font-extrabold text-2xl text-pradita-orange mb-3">
                    Room {{$room->room_num}}
                </h3>
                <p>
                    <strong class="text-gray-800">Type:</strong> {{ strtoupper($room->room_type) }}
                </p>
                <p>
                    <strong class="text-gray-800">Capacity:</strong> {{$room->capacity}}
                </p>
                <p>
                    <strong class="text-gray-800">Location:</strong> {{$room->location}}
                </p>
            </div>

            <!-- Button Container for Update and Delete -->
            <div class="flex justify-center space-x-4 mt-4">
                <!-- Update Button -->
                <button type="button" class="bg-tango text-white px-5 py-3 rounded-lg hover:bg-pradita-orange focus:ring-4 focus:ring-tango-light transition-all duration-300"
                    onclick="showUpdateModal('{{ route('update-room', $room->id) }}', '{{$room->room_num}}', '{{$room->room_type}}', '{{$room->capacity}}', '{{$room->location}}')">
                    Update Room
                </button>

                <!-- Delete Form -->
                <form id="" method="POST" action="{{ route('delete-room', $room->id) }}" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white font-semibold px-6 py-2.5 rounded-lg shadow-md hover:shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition-all duration-300">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    @empty
    <div class="">
        <h1 class=" text-gray-500">No Rooms Exist in Database</h1>
    </div>
    @endforelse
</div>

<!-- Update Modal Structure -->
<div id="UpdateModal" class="fixed inset-0 bg-black bg-opacity-30 backdrop-blur-sm flex items-center justify-center hidden transition-opacity duration-300 ease-in-out">
    <div class="bg-white rounded-xl shadow-2xl p-8 max-w-lg w-full transform transition-transform duration-500 ease-in-out scale-95">
        <div class="text-center mb-6">
            <h3 class="font-bold text-2xl text-gray-800">Update Room</h3>
            <p class="text-gray-600 mb-4">Make changes to the room details below:</p>
        </div>

        <!-- Update Form -->
        <form id="updateForm" method="POST" action="">
            @csrf
            @method('PUT')

            <!-- Room Number -->
            <div class="mb-4">
                <label for="room_num" class="block text-gray-700 text-sm font-bold mb-2">Room Number</label>
                <input type="text" id="room_num" name="room_num" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="">
            </div>

            <!-- Room Type -->
            <div class="mb-4">
                <label for="room_type" class="block text-gray-700 text-sm font-bold mb-2">Room Type (small / medium / large / introvert)</label>
                <input type="text" id="room_type" name="room_type" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="">
            </div>

            <!-- Capacity -->
            <div class="mb-4">
                <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacity</label>
                <input type="text" id="capacity" name="capacity" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="">
            </div>

            <!-- Location -->
            <div class="mb-6">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                <input type="text" id="location" name="location" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="">
            </div>

            <!-- Modal Buttons -->
            <div class="flex justify-between items-center mt-6">
                <button type="button" id="cancelButton" class="bg-gray-300 text-gray-700 hover:bg-gray-400 px-5 py-2 rounded-md transition-colors duration-300">
                    Cancel
                </button>
                <button type="submit" class="bg-tango text-white px-5 py-2 rounded-md hover:bg-pradita-orange transition-colors duration-300">
                    Update Room
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function showUpdateModal(actionUrl, roomNum, roomType, capacity, location) {
        // Set the form action to the room's update URL
        document.getElementById('updateForm').action = actionUrl;

        // Pre-fill the form with existing room data
        document.getElementById('room_num').value = roomNum;
        document.getElementById('room_type').value = roomType;
        document.getElementById('capacity').value = capacity;
        document.getElementById('location').value = location;

        // Show the modal
        document.getElementById('UpdateModal').classList.remove('hidden');
    }

    // Hide modal when the user clicks "Cancel"
    document.getElementById('cancelButton').addEventListener('click', function() {
        document.getElementById('UpdateModal').classList.add('hidden');
    });
</script>
