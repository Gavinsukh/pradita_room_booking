<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Booking_Detail;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function viewAllRoom(){
        $rooms = Room::all();

        return view('dashboard', compact('rooms'));
    }

    public function adminViewAllRoom(){
        $rooms = Room::all();

        return view('dashboard', compact('rooms'));
    }

    public function deleteRoom($id){
        $room = Room::findOrFail($id);

        $bookingExists = Booking_Detail::where('room_id', $id)->exists();

        if ($bookingExists) {
            return redirect('manage-rooms')->with('error', 'Room is currently booked!');
        } else {
            $room->delete();
            return redirect('manage-rooms')->with('success', 'Room Deleted!');
        }

    }

    public function updateRoom(Request $request){

        $request->room_type = strtolower($request->room_type);

        // dd($request->room_type);
        $request->validate([
           'room_num' => 'required|string|max:255|unique:rooms,room_num,' . $request->id,
            'room_type' => 'required|string|max:255|in:large,medium,small,introvert',
            'capacity' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
        ]);

        $room = Room::findOrFail($request->id);

        $room->room_num = $request->room_num;
        $room->room_type = $request->room_type;
        $room->capacity = $request->capacity;
        $room->location = $request->location;

        $room->save();

        return redirect('manage-rooms')->with('success', 'Room updated successfully!');
    }
}
