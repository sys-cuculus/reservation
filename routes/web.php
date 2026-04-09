<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');

Route::get('/restaurants/{restaurant}/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
// Route::get('/reservations', [ReservationController::class, 'store'])->name('reservations.store');


require __DIR__.'/auth.php';
