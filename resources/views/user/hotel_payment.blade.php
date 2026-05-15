@section('content')
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css'])

@php
    $b = $booking;
    $amount = $paymentAmount;
@endphp

<div class="max-w-xl mx-auto bg-white p-6 shadow-xl mt-12 rounded-2xl">
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mb-6 rounded-lg flex items-center gap-3">
        <svg class="w-6 h-6" ...></svg>
        <span class="font-semibold">Harap melakukan pembayaran terlebih dahulu sebelum mengunggah bukti!</span>
    </div>

    <h2 class="text-3xl font-extrabold text-center ...">Pembayaran Hotel</h2>
    <p class="text-center text-gray-500 mb-6">Silakan lakukan pembayaran sesuai tagihan berikut.</p>

    <div class="p-5 rounded-2xl mb-7 ...">
        <h3 class="text-xl font-bold">Invoice Tagihan</h3>
        <div class="space-y-1 text-gray-700">
            <p><span class="font-semibold">Nama:</span> {{ $b->nama }}</p>
            <p><span class="font-semibold">Hotel:</span> {{ $b->hotel->nama ?? '-' }}</p>
            <p><span class="font-semibold">Check-in:</span> {{ $b->check_in }}</p>
            <p><span class="font-semibold">Check-out:</span> {{ $b->check_out }}</p>
            <p><span class="font-semibold">Tipe Kamar:</span> {{ $b->tipe_kamar }}</p>
        </div>

        <div class="my-4 border-t border-dashed"></div>

        <p class="text-2xl text-orange-600 font-extrabold text-right">
            Rp {{ number_format($amount,0,',','.') }}
        </p>
    </div>

    <a href="{{ route('hotel.payment.invoice', $b->id) }}" class="w-full block text-center bg-red-600 text-white py-3 rounded-xl mb-5">💳 Download & Bayar Invoice (PDF)</a>

    <div class="text-center mb-6">
        <img src="/img/qris.jpg" class="w-60 mx-auto mb-2 shadow-lg rounded-xl border">
        <p class="text-sm text-gray-500">Scan QRIS untuk melakukan pembayaran</p>
    </div>

    <div class="p-5 bg-gray-50 border rounded-2xl mb-6">
        <form action="{{ route('hotel.payment.upload', $b->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <label class="block mb-2 font-semibold">Upload Bukti Pembayaran</label>
            <input type="file" name="payment_proof" required class="w-full p-3 border rounded-xl">
            {{-- optional hidden if you want method/amount --}}
            <input type="hidden" name="payment_method" value="qris">
            <input type="hidden" name="payment_amount" value="{{ $amount }}">
            <button class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl">Upload & Konfirmasi via WhatsApp</button>
        </form>
    </div>

    <a href="{{ route('home') }}" class="w-full block text-center bg-gray-200 py-3 rounded-xl">Kembali</a>
</div>

