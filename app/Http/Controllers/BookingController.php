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

    // Validate the request inputs
    $request->validate([
        'date' => 'required|date',
        'time_slot' => 'required',
    ]);

    // Find the room by ID
    $room = Room::findOrFail($roomId);

    // Extract start and end time from the selected time slot
    [$startTime, $endTime] = explode(' - ', $request->time_slot);

    // Check if the room is already booked during this time slot on the selected date
    $existingBooking = Booking_Detail::where('room_id', $roomId)
        ->where('date', $request->date)
        ->where('start_time', $startTime)
        ->exists();

    if ($existingBooking) {
        return redirect()->back()->withErrors(['time_slot' => 'The selected time slot is already booked.']);
    }

    // Create the booking
    Booking_Detail::create([
        'user_id' => Auth::id(),
        'room_id' => $roomId,
        'status' => 'confirmed',
        'date' => $request->date,
        'start_time' => $startTime,
        'end_time' => $endTime,
    ]);

    // Redirect to a confirmation page or back to the dashboard
    return redirect()->route('dashboard')->with('success', 'Room booked successfully!');
}
}
