<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventHighlight;

class EventController extends Controller
{
    public function kalender()
    {
        $events = Event::all();
        $highlights = EventHighlight::all(); // Ambil highlight

        return view('user.kalender', compact('events', 'highlights'));
    }
}

