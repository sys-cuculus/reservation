<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Restaurant;

class ReservationController extends Controller
{
    /**
     * show reservation form
     */
    public function create(Restaurant $restaurant)
    {
        $times = [];

    for ($hour = 9; $hour <= 18; $hour++) {
        foreach (['00', '30'] as $minute) {
            $times[] = sprintf('%02d:%s', $hour, $minute);
        }
    }

        return view('reservations.create', compact('restaurant', 'times'));
    }

    /**
     * create reservation
     */
    public function store(Request $request)
    {
        // TODO validation

        Reservation:: create($request->all());
        return redirect()->route('restaurants.index')
            ->with('success', 'Reservation created successfully');
    }

}
