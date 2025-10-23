<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventHighlight;

class KalenderController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'asc')->get();
        $highlights = EventHighlight::all();
        return view('user.kalender', compact('events', 'highlights'));
    }
}
