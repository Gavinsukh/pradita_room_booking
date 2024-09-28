<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_Detail extends Model
{
    use HasFactory;

    protected $table = 'booking_details';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'room_id',
        'status',
        'date',
        'start_time',
        'end_time',
    ];
    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
