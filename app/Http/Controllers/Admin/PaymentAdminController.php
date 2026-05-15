<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentAdminController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'desc')->get();
        return view('admin.payments.index', compact('payments'));
    }

    // UPDATE STATUS
    public function updateStatus(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = $request->status;
        $payment->save();

        return redirect()->back()->with('success', 'Status pembayaran diperbarui!');
    }

    // DELETE DATA
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        // hapus file bukti
        if ($payment->bukti_pembayaran && file_exists(public_path('uploads/bukti/'.$payment->bukti_pembayaran))) {
            unlink(public_path('uploads/bukti/'.$payment->bukti_pembayaran));
        }

        $payment->delete();

        return redirect()->back()->with('success', 'Data pembayaran berhasil dihapus!');
    }
}
