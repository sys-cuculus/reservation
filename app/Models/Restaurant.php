<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['restaurant_name', 'address', 'tel'])]
class Restaurant extends Model
{
    public $timestamps = false;
    
    /** @use HasFactory<RestaurantFactory> */
    use HasFactory;
}
