<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestaurantController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
