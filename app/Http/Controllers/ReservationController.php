<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * show reservation list (Dashboard)
     */
    public function index()
    {
        $reservations = Reservation::whereBelongsTo(Auth::user())->get();
        return view('dashboard', compact('reservations'));
    }


    /**
     * show reservation form
     */
    public function create(Restaurant $restaurant)
    {
        // create time select options
        $times = [];
        for ($hour = 8; $hour <= 23; $hour++) {
            foreach (['00', '30'] as $minute) {
                $times[] = sprintf('%02d:%s', $hour, $minute);
            }
        }

        return view('reservations.create', compact('restaurant', 'times'));
    }


    /**
     * create reservation
     */
    public function store(Restaurant $restaurant, ReservationRequest $request)
    {
        Reservation:: create([
            'user_id' => Auth::user()->id,
            'restaurant_id' => $restaurant->id,
            'number_of_people' => $request->number_of_people,
            'reservation_time' => $request->reservation_date_time,
        ]);
        return redirect()->route('restaurants.index')
            ->with('success', 'Reserved successfully');
    }

}
