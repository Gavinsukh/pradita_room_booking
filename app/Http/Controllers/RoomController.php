<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function viewAllRoom(){
        $rooms = Room::all();

        return view('dashboard', compact('rooms'));
    }
}
