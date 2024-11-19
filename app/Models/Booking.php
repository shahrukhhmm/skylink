<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function airport()
    {
        return $this->belongsTo(AirportParking::class, 'airport_id', 'id');
    }

    public function booking_detail()
    {
        return $this->belongsTo(BookingDetail::class, 'id', 'booking_id');
    }
}
