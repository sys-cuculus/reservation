<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReservationController extends Controller
{
    /**
     * show reservation list (Dashboard)
     */
    public function index():View
    {
        $reservations = Reservation::whereBelongsTo(Auth::user())->get();
        return view('dashboard', compact('reservations'));
    }


    /**
     * show reservation detail
     */
    public function show(Reservation $reservation): View
    {
        return view('reservations.show', compact('reservation'));
    }


    /**
     * show reservation form
     */
    public function create(Restaurant $restaurant):View
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


    /**
     * manage reservation
     */
    public function edit(Reservation $reservation)
    {
        // create time select options
        $times = [];
        for ($hour = 8; $hour <= 23; $hour++) {
            foreach (['00', '30'] as $minute) {
                $times[] = sprintf('%02d:%s', $hour, $minute);
            }
        }

        return view('reservations.edit', compact('reservation', 'times'));
    }


    /**
     * update reservation
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $reservation->update([
            'number_of_people' => $request->number_of_people,
            'reservation_time' => $request->reservation_date_time,
        ]);

        return redirect()->route('dashboard')->with('success', 'Reservation modified successfully');
    }

}
