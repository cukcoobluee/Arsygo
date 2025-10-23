<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class UserTransportController extends Controller
{
    public function index(Request $request)
    {
        $q = Vehicle::query();

        if ($request->filled('transmission')) {
            $q->where('transmission', $request->transmission);
        }
        if ($request->filled('capacity')) {
            $q->where('capacity', $request->capacity);
        }
        if ($request->filled('has_driver')) {
            $q->where('has_driver', $request->has_driver === 'driver' ? 1 : 0);
        }
        if ($request->filled('q')) {
            $q->where('name','like','%'.$request->q.'%');
        }
        if ($request->filled('price_range')) {
            $range = $request->price_range;
            if ($range === '250-500') $q->whereBetween('price',[250000,500000]);
            if ($range === '500-1000000') $q->whereBetween('price',[500000,1000000]);
            if ($range === '1000000-4500000') $q->whereBetween('price',[1000000,4500000]);
        }

        $vehicles = $q->paginate(9);

        // 👉 ini view untuk user
        return view('user.Transport', compact('vehicles'));
    }

    public function bookingForm($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);
        return view('user.transport_booking', compact('vehicle'));
    }
}
