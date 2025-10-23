<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportReservation extends Model
{
    protected $table = 'transport_reservations';

    protected $fillable = [
        'vehicle_id','full_name','email','phone','rental_date','duration_days','notes'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
