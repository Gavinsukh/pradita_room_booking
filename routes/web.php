<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Middleware\AdminMiddleware;
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
    Route::delete('/bookings/{id}/cancel', [BookingController::class, 'cancelBooking'])->name('booking-cancel');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AdminMiddleware::Class,
])->group(function () {;

    Route::get('/manage-rooms', [RoomController::class, 'adminViewAllRoom'])->name('manage-rooms');
    Route::delete('/delete-room/{id}', [RoomController::class, 'deleteRoom'])->name('delete-room');
    Route::put('/update-room/{id}', [RoomController::class, 'updateRoom'])->name('update-room');
    Route::post('/create-room', [RoomController::class, 'createRoom'])->name('create-room');

    Route::get('/create-room', [RoomController::class, 'redirectAccess'])->name('redirect-create-room');
    Route::get('/delete-room/{id}', [RoomController::class, 'redirectAccess'])->name('redirect-delete-room');
    Route::get('/update-room/{id}', [RoomController::class, 'redirectAccess'])->name('redirect-update-room');
});
