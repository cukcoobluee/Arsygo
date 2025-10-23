<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivateTripController extends Controller
{
    public function view()
    {
        return view('user.PrivateTrip');
    }
}
