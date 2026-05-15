<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event; // pastikan ada model Event

class KalenderController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.kalender.index', compact('events'));
    }

    public function create()
    {
        return view('admin.kalender.create');
    }

    public function storeEvent(Request $request)
    {
        $data = $request->validate([
            'month' => 'required|string',
            'title' => 'required|string',
            'date' => 'required|date',
            'price' => 'nullable|string',
            'time' => 'nullable|string',
            'location' => 'nullable|string',
            'slots' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);
        return redirect()->route('admin.kalender.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.kalender.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $data = $request->validate([
            'month' => 'required|string',
            'title' => 'required|string',
            'date' => 'required|date',
            'price' => 'nullable|string',
            'time' => 'nullable|string',
            'location' => 'nullable|string',
            'slots' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);
        return redirect()->route('admin.kalender.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.kalender.index')->with('success', 'Event berhasil dihapus!');
    }
}


