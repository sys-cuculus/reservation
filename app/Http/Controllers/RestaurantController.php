<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * List page
     */
    public function index(): View
    {
        // TODO pagenation

        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    /** Detail page */
    public function show($restaurant_id): View
    {
        $restaurant = Restaurant::find($restaurant_id);
        return view('restaurants.show', compact('restaurant'));
    }
}
