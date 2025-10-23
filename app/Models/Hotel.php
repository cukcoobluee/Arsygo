<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['nama','lokasi','harga','gambar'];

    public function bookings()
    {
        return $this->hasMany(HotelBooking::class);
    }
}
