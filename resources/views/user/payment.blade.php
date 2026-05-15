@section('content')
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css'])

@php
    $data = session('payment_data'); 
@endphp

<div class="max-w-xl mx-auto bg-white p-6 shadow-xl mt-12 rounded-2xl">

    {{-- ALERT PEMBAYARAN --}}
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mb-6 rounded-lg flex items-center gap-3">
        <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <span class="font-semibold">Harap melakukan pembayaran terlebih dahulu sebelum mengunggah bukti!</span>
    </div>

    {{-- TITLE --}}
    <h2 class="text-3xl font-extrabold text-center bg-gradient-to-r from-orange-500 to-yellow-500 bg-clip-text text-transparent drop-shadow-sm mb-2">
        Pembayaran
    </h2>
    <p class="text-center text-gray-500 mb-6">
        Silakan lakukan pembayaran sesuai tagihan berikut.
    </p>

    {{-- INVOICE CARD --}}
    <div class="p-5 rounded-2xl mb-7 bg-white shadow-[0_8px_25px_rgba(0,0,0,0.07)] border border-gray-200">
        <h3 class="text-xl font-bold text-gray-800 mb-3 flex items-center gap-2">
            <span class="w-2 h-6 bg-orange-500 rounded-md"></span> Invoice Tagihan
        </h3>

        <div class="space-y-1 text-gray-700">
            <p><span class="font-semibold text-gray-900">Nama:</span> {{ $data['nama'] }}</p>
            <p><span class="font-semibold text-gray-900">Telepon:</span> {{ $data['telepon'] }}</p>
            <p><span class="font-semibold text-gray-900">Email:</span> {{ $data['email'] }}</p>
            <p><span class="font-semibold text-gray-900">Tanggal Trip:</span> {{ $data['tanggal'] }}</p>
            <p><span class="font-semibold text-gray-900">Jumlah Peserta:</span> {{ $data['jumlah_peserta'] }} orang</p>
            <p><span class="font-semibold text-gray-900">Harga per Orang:</span> Rp {{ number_format($data['harga_per_orang'],0,',','.') }}</p>
            <p><span class="font-semibold text-gray-900">Catatan:</span> {{ $data['catatan'] ?? '-' }}</p>
        </div>

        <div class="my-4 border-t border-dashed border-gray-300"></div>

        <p class="text-2xl text-orange-600 font-extrabold text-right">
            Rp {{ number_format($data['total_bayar'],0,',','.') }}
        </p>
    </div>
    
    {{-- DOWNLOAD INVOICE --}}
    <a href="{{ route('payment.invoice') }}"
       class="w-full block text-center bg-red-600 text-white py-3 rounded-xl font-semibold shadow-md hover:bg-red-700 transition mb-5">
       💳 Download & Bayar Invoice (PDF)
    </a>

    {{-- QRIS --}}
    <div class="text-center mb-6">
        <img src="/img/qris.jpg" 
             class="w-60 mx-auto mb-2 shadow-lg rounded-xl border border-gray-200">
        <p class="text-sm text-gray-500">Scan QRIS untuk melakukan pembayaran</p>
    </div>

    {{-- UPLOAD BUKTI PEMBAYARAN --}}
    <div class="p-5 bg-gray-50 border border-gray-200 rounded-2xl mb-6 shadow-sm">
        <form action="{{ route('payment.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <label class="block mb-2 font-semibold text-gray-800">Upload Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" required
                   class="w-full border border-gray-300 p-3 rounded-xl shadow-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition">

            <button class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl font-semibold shadow-md hover:opacity-90 transition-all">
                Upload & Konfirmasi via WhatsApp
            </button>
        </form>
    </div>

    {{-- BACK BUTTON --}}
    <a href="{{ route('home') }}"
        class="w-full block text-center bg-gray-200 text-gray-800 py-3 rounded-xl font-semibold shadow-sm hover:bg-gray-300 transition">
        Kembali ke Dashboard
    </a>

</div>


