<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    public function show()
    {
        if (!session()->has('payment_data')) {
            return redirect()->route('home');
        }

        $data = session('payment_data'); 

        return view('user.payment', compact('data')); 
    }

    public function upload(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = session('payment_data');

        // simpan file bukti pembayaran
        $filename = time().'_'.$request->bukti_pembayaran->getClientOriginalName();
        $request->bukti_pembayaran->move(public_path('uploads/bukti'), $filename);

        // simpan ke database
        Payment::create([
            ...$data,
            'bukti_pembayaran' => $filename
        ]);

        // redirect WA
        $nomorAdmin = '628122016796';
        $pesan = urlencode("
Halo admin, saya telah melakukan pembayaran.

Nama: {$data['nama']}
Telepon: {$data['telepon']}
Jumlah Peserta: {$data['jumlah_peserta']}
Total Bayar: Rp {$data['total_bayar']}
Tanggal: {$data['tanggal']}

Mohon dicek bukti pembayaran saya ya.
        ");

        return redirect("https://wa.me/{$nomorAdmin}?text={$pesan}");
    }

    public function invoice()
    {
        if (!session()->has('payment_data')) {
            return redirect()->route('home');
        }

        $data = session('payment_data');

        // Load view ke PDF
        $pdf = Pdf::loadView('user.invoice', compact('data'));

        return $pdf->download('invoice-'.$data['nama'].'.pdf');
    }
}

