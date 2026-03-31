<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * show reservation form
     */
    public function create()
    {
        return view('reservation.create');
    }

    /**
     * create reservation
     */
    public function store(Request $request)
    {
        // TODO validation

        Reservation:: create($request->all());
        return redirect()->route('restaurant.index')
            ->with('success', 'Reservation created successfully');
    }

}
