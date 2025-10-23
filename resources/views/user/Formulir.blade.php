{{-- resources/views/user/formulir.blade.php --}}


@section('content')
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css']) 

<div class="min-h-screen bg-gradient-to-b from-white to-yellow-100 flex items-center justify-center px-6 py-10">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-2xl p-8">
        
        <!-- Header -->
        <div class="flex items-center mb-6">
            <a href="{{ route('PaketWisata') }}" class="mr-3 text-gray-700 hover:text-black">
                ←
            </a>
            <h1 class="text-xl font-extrabold text-center w-full">Formulir Pemesanan Open Trip</h1>
        </div>

        <!-- Gambar Paket -->
        <div class="w-full mb-6">
            <img src="{{ asset('img/card-wisata.png') }}" 
                 alt="1 Day Trip Bandung" 
                 class="rounded-xl w-full h-40 object-cover shadow-md">
            <p class="text-center font-bold text-lg mt-2">1 Day Trip Bandung</p>
        </div>

        <!-- Form -->
        <form action="{{ route('formulir.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Lengkap -->
            <div>
                <label class="block font-semibold mb-1">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Contoh: Azka Hanifa" required
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
            </div>

            <!-- Nomor Telepon -->
            <div>
                <label class="block font-semibold mb-1">Nomor Telepon</label>
                <input type="text" name="telepon" placeholder="Contoh: 62812345678" required
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
            </div>

            <!-- Email -->
            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
            </div>

            <!-- Jumlah Peserta & Tanggal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Jumlah Peserta</label>
                    <input type="number" name="jumlah_peserta" placeholder="Contoh: 2" required
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Tanggal Keberangkatan</label>
                    <input type="date" name="tanggal" required
                           class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                </div>
            </div>

            <!-- Catatan Tambahan -->
            <div>
                <label class="block font-semibold mb-1">Catatan Tambahan</label>
                <textarea name="catatan" placeholder="Optional"
                          class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none"></textarea>
            </div>

            <!-- Tombol -->
            <div class="text-center">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-8 rounded-lg shadow-md transition">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

