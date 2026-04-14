<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


#[Fillable(['restaurant_name', 'address', 'tel'])]
class Restaurant extends Model
{
    public $timestamps = false;
    
    /** @use HasFactory<RestaurantFactory> */
    use HasFactory;

    protected function tel(): Attribute 
    {
        return Attribute::make(
            get: fn (string $tel) => implode(' ', str_split($tel, 2)),
        );
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
