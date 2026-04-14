<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PhpParser\Node\Scalar\String_;

#[Fillable(['user_id', 'restaurant_id', 'number_of_people', 'reservation_time'])]
class Reservation extends Model
{
    /** @use HasFactory<ReservationFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * convert datetime into date
     */
    public function getDateAttribute(): String
    {
        return Carbon::parse($this->reservation_time)->format('Y-m-d');
    }

    /**
     * convert datetime into time
     */
    public function getTimeAttribute(): String
    {
        return Carbon::parse($this->reservation_time)->format('H:i');
    }
}
