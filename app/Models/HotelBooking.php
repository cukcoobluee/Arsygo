<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    protected $table = 'hotel_bookings';

    protected $fillable = [
        'hotel_id',
        'nama',
        'email',
        'telepon',
        'check_in',
        'check_out',
        'tipe_kamar',
        'catatan',
        'status',
        'payment_status',
        'payment_method',
        'payment_amount',
        'payment_proof',
    ];
}

