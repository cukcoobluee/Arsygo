<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelTransportController extends Controller
{
    // tampilkan daftar hotel
    public function view()
    {
        $hotels = Hotel::orderBy('created_at','desc')->get();
        return view('user.HotelTransport', compact('hotels'));
    }
}
