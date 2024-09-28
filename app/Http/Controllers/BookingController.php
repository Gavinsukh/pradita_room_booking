<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function bookRoom($id)
{
    $room = Room::findOrFail($id);

    // Time slots (9 AM - 6 PM, 1-hour intervals)
    $timeSlots = [];
    for ($i = 9; $i < 18; $i++) {
        $timeSlots[] = sprintf('%02d:00 - %02d:00', $i, $i + 1);
    }

    return view('dashboard', compact('room', 'timeSlots'));
}
}
