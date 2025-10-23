<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportReservation;
use App\Models\Vehicle;

class TransportReservationController extends Controller
{
    // store reservation and redirect to whatsapp
    public function store(Request $request, $vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);

        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'required|string|max:20',
            'rental_date'=> 'required|date',
            'duration_days' => 'required|integer|min:1',
            'notes'     => 'nullable|string',
        ]);

        $data['vehicle_id'] = $vehicleId;

        $reservation = TransportReservation::create($data);

        // WA pesan - ubah nomor admin di bawah sesuai kebutuhan (tanpa +)
        $adminPhone = '6281285448464';
        $text = "Halo ArsyGo,%0A%0A".
                "Saya ingin sewa kendaraan:%0A".
                "Nama: ".rawurlencode($reservation->full_name)."%0A".
                "Telepon: ".rawurlencode($reservation->phone)."%0A".
                "Email: ".rawurlencode($reservation->email)."%0A".
                "Kendaraan: ".rawurlencode($vehicle->name)."%0A".
                "Tanggal: ".rawurlencode($reservation->rental_date)."%0A".
                "Durasi (hari): ".rawurlencode($reservation->duration_days)."%0A".
                "Catatan: ".rawurlencode($reservation->notes ?? '-')."%0A%0A".
                "Mohon konfirmasi. Terima kasih!";

        // redirect ke wa.me (user akan diarahkan ke WA)
        return redirect()->away("https://wa.me/{$adminPhone}?text={$text}");
    }

    // Admin: list reservations (paginated)
    public function index()
    {
        $reservations = TransportReservation::with('vehicle')->latest()->paginate(15);
        return view('admin.transport_reservations.index', compact('reservations'));
    }

    // Admin: delete reservation
    public function destroy($id)
    {
        $r = TransportReservation::findOrFail($id);
        $r->delete();
        return redirect()->route('admin.transport-reservations.index')->with('success','Reservation deleted.');
    }
}
