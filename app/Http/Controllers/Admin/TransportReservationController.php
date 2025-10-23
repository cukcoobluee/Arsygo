<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransportReservation;
use App\Models\Vehicle;

class TransportReservationController extends Controller
{
    /**
     * Tampilkan daftar reservasi transportasi.
     */
    public function index()
    {
        $reservations = TransportReservation::with('vehicle')->paginate(10);
        return view('admin.transport_reservations.index', compact('reservations'));
    }

    /**
     * Form tambah reservasi (opsional untuk admin).
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        return view('admin.transport_reservations.create', compact('vehicles'));
    }

    /**
     * Simpan reservasi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id'    => 'required|exists:vehicles,id',
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:20',
            'rental_date'   => 'required|date',
            'duration_days' => 'required|integer|min:1',
            'notes'         => 'nullable|string',
        ]);

        TransportReservation::create($request->all());

        return redirect()->route('admin.transport_reservations.index')
                         ->with('success', 'Reservasi transportasi berhasil ditambahkan');
    }

    /**
     * Form edit reservasi.
     */
    public function edit(TransportReservation $transport_reservation)
    {
        $vehicles = Vehicle::all();
        return view('admin.transport_reservations.edit', compact('transport_reservation', 'vehicles'));
    }

    /**
     * Update reservasi.
     */
    public function update(Request $request, TransportReservation $transport_reservation)
    {
        $request->validate([
            'vehicle_id'    => 'required|exists:vehicles,id',
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:20',
            'rental_date'   => 'required|date',
            'duration_days' => 'required|integer|min:1',
            'notes'         => 'nullable|string',
        ]);

        $transport_reservation->update($request->all());

        return redirect()->route('admin.transport_reservations.index')
                         ->with('success', 'Reservasi transportasi berhasil diperbarui');
    }

    /**
     * Hapus reservasi.
     */
    public function destroy(TransportReservation $transport_reservation)
    {
        $transport_reservation->delete();

        return redirect()->route('admin.transport_reservations.index')
                         ->with('success', 'Reservasi transportasi berhasil dihapus');
    }
}
