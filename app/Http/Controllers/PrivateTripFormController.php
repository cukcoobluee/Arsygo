<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivateTrip;

class PrivateTripFormController extends Controller
{
    public function showForm()
    {
        return view('user.PrivateTripForm'); // pastikan nama blade benar: resources/views/PrivateTripForm.blade.php
    }
    public function store(Request $request)
    {
        $harga = $this->hitungHarga($request->jumlah_peserta);
        $total = $harga * $request->jumlah_peserta;

        $data = [
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'kategori_trip' => $request->kategori_trip,
            'jumlah_peserta' => $request->jumlah_peserta,
            'harga_per_orang' => $harga,
            'total_bayar' => $total,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan,
        ];

        session(['payment_data' => $data]); // 🔥 simpan ke sesi

        return redirect()->route('payment.show'); // 🔥 lanjut ke halaman payment
    }

    // function harga
    private function hitungHarga($peserta)
    {
        if ($peserta >= 50) return 185000;
        if ($peserta >= 45) return 200000;
        if ($peserta >= 30) return 200000;
        if ($peserta >= 20 && $peserta <= 25) return 225000;
        if ($peserta >= 15 && $peserta <= 18) return 210000;
        if ($peserta >= 13 && $peserta <= 14) return 225000;
        if ($peserta >= 11 && $peserta <= 12) return 245000;
        if ($peserta >= 9 && $peserta <= 10) return 250000;
        if ($peserta >= 8) return 265000;
        if ($peserta >= 6 && $peserta <= 7) return 245000;
        if ($peserta >= 5) return 250000;
        if ($peserta >= 4) return 270000;
        if ($peserta >= 3) return 320000;
        return 425000;
    }

}

