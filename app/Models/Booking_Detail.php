<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_Detail extends Model
{
    use HasFactory;
    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
