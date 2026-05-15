@section('content')
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css'])

<div class="max-w-xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-2xl">

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Form Private Trip</h2>

    <form action="{{ route('privateTripForm.store') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Nama</label>
            <input type="text" name="nama" placeholder="Masukkan nama Anda"
                class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" required>
        </div>

        <!-- Telepon -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Telepon</label>
            <input type="text" name="telepon" placeholder="Masukkan nomor telepon"
                class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" required>
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Email (Opsional)</label>
            <input type="email" name="email" placeholder="Masukkan email"
                class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 transition">
        </div>

        <!-- Pilihan Private Trip -->

        <div class="mb-6">
        <label for="kategori_trip" class="block text-gray-700 font-semibold mb-2 text-lg">
            Pilih Private Trip
        </label>
        <div class="relative">
            <select id="kategori_trip" name="kategori_trip"
            class="w-full bg-white border border-gray-300 rounded-xl shadow-sm appearance-none px-4 py-3 pr-10 text-gray-700 font-medium focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition duration-300 cursor-pointer">
            <option value="">-- Pilih Trip --</option>
            <option value="bandung">Bandung</option>
            <option value="ciwidey">Ciwidey</option>
            <option value="pangalengan">Pangalengan</option>
            <option value="offroad">Offroad Lembang</option>
            </select>
            <!-- Icon dropdown -->
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 12a1 1 0 01-.707-.293l-3-3a1 1 0 011.414-1.414L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3A1 1 0 0110 12z" clip-rule="evenodd" />
            </svg>
            </div>
        </div>
        </div>

        <!-- Slider Peserta -->
        <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-2">
                Jumlah Peserta: 
                <span id="jumlahPesertaForm" class="font-semibold text-black">2 Orang</span>
            </label>
            <input type="range" id="sliderPesertaForm" name="jumlah_peserta" min="2" max="50" value="2"
                class="w-full accent-fuchsia-700 cursor-pointer h-2">
            <div class="mt-2 text-gray-700 text-sm">
                Harga Per Orang:
                <span id="hargaPerOrangForm" class="text-orange-500 font-semibold">Rp. 560.000</span>
            </div>
        </div>

        <!-- Tanggal -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Tanggal Keberangkatan</label>
            <input type="date" name="tanggal"
                class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" required>
        </div>

        <!-- Catatan -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Catatan (Opsional)</label>
            <textarea name="catatan" placeholder="Tuliskan catatan jika ada"
                class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"></textarea>
        </div>

        <!-- Button -->
        <div class="flex flex-col space-y-3">
            <button type="submit"
                class="w-full bg-gradient-to-r from-[#FBB040] to-[#F9A825] text-white text-xl font-semibold px-8 py-3 rounded-2xl shadow-md hover:shadow-lg transition duration-300">
                Kirim Form
            </button>

            <button type="button" onclick="history.back()"
                class="w-full border border-gray-300 text-gray-700 text-lg font-medium px-8 py-3 rounded-2xl hover:bg-gray-100 transition duration-300">
                Kembali
            </button>
        </div>

    </form>

</div>

<!-- Script untuk Slider & WhatsApp -->
<script>
  const slider = document.getElementById('sliderPesertaForm'); // pastikan sama dengan ID slider di HTML
  const jumlahPeserta = document.getElementById('jumlahPesertaForm'); 
  const hargaPerOrang = document.getElementById('hargaPerOrangForm');
  const kategoriTrip = document.getElementById('kategori_trip');
  const inputPeserta = document.getElementById('sliderPesertaForm'); // atau buat hidden input jika perlu

  function formatRupiah(angka) {
    return 'Rp. ' + angka.toLocaleString('id-ID');
  }

  // ===================
  // DATABASE HARGA TRIP
  // ===================
  const hargaTrip = {
    bandung: function(p) {
      if (p >= 50) return 185000;
      if (p >= 45) return 200000;
      if (p >= 30) return 200000;
      if (p >= 20 && p <= 25) return 225000;
      if (p >= 15 && p <= 18) return 210000;
      if (p >= 13 && p <= 14) return 225000;
      if (p >= 11 && p <= 12) return 245000;
      if (p >= 9 && p <= 10) return 250000;
      if (p >= 8) return 265000;
      if (p >= 6 && p <= 7) return 245000;
      if (p >= 5) return 250000;
      if (p >= 4) return 270000;
      if (p >= 3) return 320000;
      return 425000;
    },

    ciwidey: function(p) {
      if (p >= 45 && p <= 50) return 335000;
      if (p >= 26 && p <= 30) return 380000;
      if (p >= 20 && p <= 25) return 405000;
      if (p >= 15 && p <= 18) return 345000;
      if (p >= 13 && p <= 14) return 335000;
      if (p >= 11 && p <= 12) return 360000;
      if (p >= 7 && p <= 10) return 400000;
      if (p >= 5 && p <= 6) return 365000;
      if (p >= 3 && p <= 4) return 465000;
      return 565000;
    },

    pangalengan: function(p) {
      if (p >= 45 && p <= 50) return 330000;
      if (p >= 26 && p <= 30) return 375000;
      if (p >= 20 && p <= 25) return 400000;
      if (p >= 15 && p <= 18) return 340000;
      if (p >= 13 && p <= 14) return 330000;
      if (p >= 11 && p <= 12) return 300000;
      if (p >= 7 && p <= 10) return 395000;
      if (p >= 5 && p <= 6) return 360000;
      if (p >= 3 && p <= 4) return 460000;
      return 560000;
    },

    offroad: function(p) {
      if (p >= 20) return 325000;
      if (p >= 7) return 249000;
      return 500000;
    }
  };

  function updateHarga() {
    const peserta = parseInt(slider.value);
    const trip = kategoriTrip.value;

    jumlahPeserta.textContent = peserta + " Orang";

    if (!trip) {
      hargaPerOrang.textContent = "Pilih trip dahulu";
      return;
    }

    hargaPerOrang.textContent = formatRupiah(hargaTrip[trip](peserta));
    inputPeserta.value = peserta;
  }

  slider.addEventListener('input', updateHarga);
  kategoriTrip.addEventListener('change', updateHarga);
</script>


