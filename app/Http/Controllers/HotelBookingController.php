<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelBooking;

class HotelBookingController extends Controller
{
    public function create($hotel_id)
    {
        return view('user.hotel_booking', compact('hotel_id'));
    }

    public function index()
    {
    $bookings = HotelBooking::latest()->paginate(10); // 5 data per halaman
    return view('admin.hotel_bookings.index', compact('bookings'));
    }

    public function store(Request $request, $hotel_id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'tipe_kamar' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        HotelBooking::create([
            'hotel_id' => $hotel_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'tipe_kamar' => $request->tipe_kamar,
            'catatan' => $request->catatan,
            'status' => 'pending',
        ]);

        // Kembalikan JSON sukses untuk fetch JS
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $booking = \App\Models\HotelBooking::findOrFail($id); // sesuaikan model
        return view('admin.hotel_bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = \App\Models\HotelBooking::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'status' => 'required|in:pending,approved,cancelled', // case-sensitive
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.hotel-bookings.index')
                        ->with('success', 'Hotel booking berhasil diperbarui.');

    }

    public function destroy($id)
    {
        $booking = HotelBooking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.hotel-bookings.index')
                        ->with('success', 'Booking deleted successfully.');
    }

}

