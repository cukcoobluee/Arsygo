<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelBooking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class HotelBookingController extends Controller
{
    /**
     * USER — Form Booking
     */
    public function create($hotel_id)
    {
        return view('user.hotel_booking', compact('hotel_id'));
    }

    /**
     * ADMIN — List Booking
     */
    public function index()
    {
        $bookings = HotelBooking::latest()->paginate(10);
        return view('admin.hotel_bookings.index', compact('bookings'));
    }

    /**
     * USER — Store Booking dari Form
     * Return JSON → dipakai oleh fetch JS
     */
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

        $booking = HotelBooking::create([
            'hotel_id' => $hotel_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'tipe_kamar' => $request->tipe_kamar,
            'catatan' => $request->catatan,
            'status' => 'pending',

            // pembayaran default
            'payment_status' => 'unpaid',
            'payment_amount' => null,
            'payment_method' => null,
            'payment_proof' => null,
        ]);

        return response()->json([
            'success' => true,
            'booking_id' => $booking->id
        ]);
    }

    /**
     * USER — Halaman Payment Booking
     */
    public function paymentPage($id)
    {
        $booking = HotelBooking::findOrFail($id);

        // Bisa kamu ganti sesuai logika harga hotel kamu
        $amount = $booking->payment_amount ?? 200000;

        return view('user.hotel_payment', [
            'booking' => $booking,
            'paymentAmount' => $amount,
        ]);
    }

    /**
     * USER — Download Invoice PDF
     */
    public function invoice($id)
    {
        $booking = HotelBooking::findOrFail($id);
        $pdf = Pdf::loadView('user.invoice_hotel', compact('booking'));

        return $pdf->download('invoice-hotel-'.$booking->id.'.pdf');
    }

    /**
     * USER — Upload Bukti Transfer
     */
    public function uploadPaymentProof(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:3072',
            'payment_amount' => 'required|integer'
        ]);

        $booking = HotelBooking::findOrFail($id);

        // Simpan file
        $file = $request->file('payment_proof');
        $filename = 'hotel_booking_'.$id.'_'.time().'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('payment_proofs', $filename, 'public');

        // Update booking
        $booking->update([
            'payment_status' => 'unpaid', // masih menunggu verifikasi
            'payment_method' => 'qris',
            'payment_amount' => $request->payment_amount,
            'payment_proof' => $path,
        ]);

        // Redirect WA admin → set di .env
        $adminWa = env('ADMIN_WA', '628123456789');
        $message = urlencode("Halo admin, saya sudah upload bukti pembayaran.\nBooking ID: {$booking->id}\nNama: {$booking->nama}");

        return redirect()->away("https://wa.me/{$adminWa}?text={$message}");
    }

    /**
     * ADMIN — Verifikasi Pembayaran
     */
    public function adminVerifyPayment($id)
    {
        $booking = HotelBooking::findOrFail($id);

        $booking->update([
            'payment_status' => 'paid',
            'status' => 'approved',
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil diverifikasi!');
    }

    /**
     * ADMIN — Edit Booking (non-payment)
     */
    public function edit($id)
    {
        $booking = HotelBooking::findOrFail($id);
        return view('admin.hotel_bookings.edit', compact('booking'));
    }

    /**
     * ADMIN — Update Booking
     */
    public function update(Request $request, $id)
    {
        $booking = HotelBooking::findOrFail($id);

        $request->validate([
            'nama'       => 'required|string|max:255',
            'email'      => 'required|email',
            'telepon'    => 'required|string|max:20',
            'status'     => 'required|in:pending,approved,cancelled',
        ]);

        $booking->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.hotel-bookings.index')
                        ->with('success', 'Hotel booking berhasil diperbarui.');
    }

    /**
     * ADMIN — Delete Booking
     */
    public function destroy($id)
    {
        $booking = HotelBooking::findOrFail($id);

        // Hapus file bukti pembayaran jika ada
        if ($booking->payment_proof) {
            Storage::disk('public')->delete($booking->payment_proof);
        }

        $booking->delete();

        return redirect()->route('admin.hotel-bookings.index')
                        ->with('success', 'Booking deleted successfully.');
    }
}
