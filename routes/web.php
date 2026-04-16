<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('restaurants');
});

Route::get('/dashboard', [ReservationController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // reservations
    Route::get('/restaurants/{restaurant}/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/restaurants/{restaurant}/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->can('view', 'reservation')->name('reservations.show');
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->can('view', 'reservation')->name('reservations.edit');
    Route::put('/reservations/{reservation}/update', [ReservationController::class, 'update'])->can('update', 'reservation')->name('reservations.update');
    Route::delete('/reservations/{reservation}/delete', [ReservationController::class, 'destroy'])->can('delete', 'reservation')->name('reservations.delete');
});

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');



require __DIR__.'/auth.php';
