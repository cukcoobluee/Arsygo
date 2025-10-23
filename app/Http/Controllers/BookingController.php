<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Tampilkan daftar booking di admin
    public function index()
    {
        $bookings = Booking::latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    // Simpan data dari form user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email',
            'jumlah_peserta' => 'required|integer',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        // simpan ke database
        $validated['status'] = 'pending';
        $booking = \App\Models\Booking::create($validated);

        // nomor WhatsApp admin (ganti sesuai nomor kamu, tanpa +)
        $adminWA = "6281285448464";

        // isi pesan auto chat
        $pesan = "Hallo Arsygo Tour and Travel 👋%0A"
            ."Saya baru saja melakukan pemesanan Open Trip:%0A"
            ."-----------------------------%0A"
            ."👤 Nama: {$booking->nama}%0A"
            ."📱 Telepon: {$booking->telepon}%0A"
            ."📧 Email: {$booking->email}%0A"
            ."👥 Jumlah Peserta: {$booking->jumlah_peserta}%0A"
            ."📅 Tanggal: ".\Carbon\Carbon::parse($booking->tanggal)->format('d M Y')."%0A"
            ."📝 Catatan: ".($booking->catatan ?? "-")."%0A"
            ."-----------------------------%0A"
            ."Mohon dibantu untuk konfirmasi pesanan saya 🙏 Terima kasih.";

        $waUrl = "https://wa.me/{$adminWA}?text={$pesan}";

        // redirect langsung ke WhatsApp
        return redirect()->away($waUrl);
    }

    // Update status booking (misalnya di admin approve/reject)
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Status booking berhasil diubah.');
    }

    // Hapus booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dihapus.');
    }
}

