<?php

namespace App\Http\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivateTrip;

class PrivateTripAdminController extends Controller
{
    public function index()
    {
        $trips = PrivateTrip::latest()->get();
        return view('admin.private.index', compact('trips'));
    }
}
