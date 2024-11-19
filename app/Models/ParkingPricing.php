<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingPricing extends Model
{
    use HasFactory;

    public function airport()
    {
        return $this->belongsTo(AirportParking::class, 'airport_parking_id', 'id');
    }

}
