<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirportParking extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id', 'name', 'code', 'location', 'logo', 'price', 'days',
        'points', 'extra_json', 'summary_overview', 'on_arrival',
        'on_return', 'important', 'reviews',
    ];


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

}
