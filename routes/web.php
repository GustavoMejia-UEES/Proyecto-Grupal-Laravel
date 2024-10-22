<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                               |
|--------------------------------------------------------------------------|
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home page route - Displays hotel information and has client/admin options
Route::get('/', function () {
    return view('welcome'); // Create a 'welcome.blade.php' view file for this
})->name('home');

// Route for admin dashboard
Route::get('/dashboard', function () {
    return view('dashboard'); // Create 'dashboard.blade.php' for admin view
})->name('dashboard');

// Admin routes
Route::group([], function () {
    // CRUD routes for rooms
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms/store', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');

    // Route for admin index (list of rooms)
    Route::get('/admin/rooms', [RoomController::class, 'adminIndex'])->name('rooms.admin.index');

    // Manage reservations (view and update)
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});

// Client routes
Route::group([], function () {
    // Route for reserving rooms
    Route::get('/rooms/reserve', [ReservationController::class, 'create'])->name('rooms.reserve');
    Route::post('/rooms/reserve', [ReservationController::class, 'store'])->name('reservations.store');

    // View client's own reservations
    Route::get('/my-reservations', [ReservationController::class, 'userReservations'])->name('reservations.user');
});

// Shared routes (accessible by both admin and client)
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
// Remove or comment out the show route if it's not being used
// Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show'); 
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/rooms/admin', [RoomController::class, 'adminIndex'])->name('rooms.admin.index');
