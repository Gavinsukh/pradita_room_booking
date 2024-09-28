<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [RoomController::class, 'viewAllRoom'])->name('dashboard');
    Route::get('/my-bookings', [BookingController::class, 'viewAllBookings'])->name('my-bookings');
    Route::get('/book-room/{id}', [BookingController::class, 'bookRoom'])->name('book-room');
    Route::post('/room/{id}/check-available-slots', [BookingController::class, 'checkAvailableSlots'])->name('check-available-slots');
    Route::post('/book-room/{room}/confirm', [BookingController::class, 'confirmBooking'])->name('confirm-booking');
});
