<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * List page
     */
    public function index(): View
    {
        $restaurants = Restaurant::query()->paginate(config('constants.restaurants.par_page'));
        return view('restaurants.index', compact('restaurants'));
    }

    /** Detail page */
    public function show($restaurant_id): View
    {
        $restaurant = Restaurant::find($restaurant_id);
        return view('restaurants.show', compact('restaurant'));
    }
}
