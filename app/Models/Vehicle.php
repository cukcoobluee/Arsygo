<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'name','transmission','capacity','price','has_driver','image'
    ];

    public function reservations()
    {
        return $this->hasMany(TransportReservation::class);
    }
}
