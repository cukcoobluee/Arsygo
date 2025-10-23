<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

        protected $fillable = [
        'nama',
        'telepon',
        'email',
        'jumlah_peserta',
        'tanggal',
        'catatan',
    ];

    protected $table = 'bookings'; // atau 'booking' sesuai nama tabel di database
    
}
