<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Booking_Detail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function bookRoom($id)
{
    $room = Room::findOrFail($id);

    return view('dashboard', compact('room'));
}

public function checkAvailableSlots(Request $request, $id)
{
    $room = Room::findOrFail($id);
    $date = $request->date;

    $request->validate([
        'date' => 'required|date|after_or_equal:today',
    ]);

    // Fetch the booked slots for the selected date
    $bookedSlots = Booking_Detail::where('room_id', $id)
        ->where('date', $request->date)
        ->where('status', 'confirmed')
        ->pluck('start_time')
        ->map(function ($time) {
            return date('H:i', strtotime($time)); // Format 'HH:MM'
        })
        ->toArray();

    // Generate all possible time slots (9 AM - 6 PM, 1-hour intervals)
    $timeSlots = [];
    for ($i = 9; $i < 18; $i++) {
        $slot = sprintf('%02d:00', $i);
        // Check if the slot is booked
        if (!in_array($slot, $bookedSlots)) {
            $timeSlots[] = $slot;
        }
    }

    return view('dashboard', compact('room', 'timeSlots', 'date'));
}

public function confirmBooking(Request $request, $roomId)
{

    $request->validate([
        'date' => 'required|date',
        'time_slot' => 'required',
    ]);

    $room = Room::findOrFail($roomId);

    [$startTime, $endTime] = explode(' - ', $request->time_slot);

    Booking_Detail::create([
        'user_id' => Auth::id(),
        'room_id' => $roomId,
        'status' => 'confirmed',
        'date' => $request->date,
        'start_time' => $startTime,
        'end_time' => $endTime,
    ]);

    return redirect()->route('dashboard')->with('success', 'Room booked successfully!');
}

public function viewAllBookings(){
    $bookings = Booking_Detail::where('user_id', Auth::id())->get();

    return view('dashboard', compact('bookings'));
}

public function cancelBooking($id)
{
    $booking = Booking_Detail::findOrFail($id);

    $booking->update(['status' => 'cancelled']);

    return redirect('my-bookings');
}

public function removeBooking($id)
{
    $booking = Booking_Detail::findOrFail($id);

    $booking->delete();

    return redirect('my-bookings');
}
}
