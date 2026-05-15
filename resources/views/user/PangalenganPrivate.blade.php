@include('layout.header') <!-- navbar-->

@section('content')
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css']) 
<body class="bg-[#e3d8c6] font-poppins">
    <div class="w-full">


<!-- Breadcrumb -->
<nav class="flex px-5 py-3 mt-16 text-gray-700 border border-gray-200 " aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    <li class="inline-flex items-center">
      <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-yellow-600 dark:text-gray-400">
        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
        </svg>
        Home
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{ route('PaketWisata') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-yellow-800 dark:text-gray-400">Paket Wisata</a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="{{ route('PrivateTrip') }}" class="ms-1 text-sm font-medium text-yellow-700 hover:text-yellow-700 md:ms-2 dark:text-gray-400">Private Trip</a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Pangalengan</span>
      </div>
    </li>
  </ol>
</nav>
<!-- hero section gambar dan tulisan -->
<section class="relative h-[500px] flex items-center justify-center text-center overflow-hidden">
  <!-- Gambar -->
  <img src="{{ asset('img/caurasel3.png') }}" 
       alt="Private Trip Pangalengan"
       class="absolute inset-0 w-full h-full object-cover" />

  <!-- Overlay hitam -->
  <div class="absolute inset-0 bg-black/50"></div>

  <!-- Teks -->
  <div class="relative z-10 text-white px-6">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-3 drop-shadow-lg">
      Private Trip Pangalengan
    </h1>
    <p class="text-lg md:text-xl font-medium text-gray-200 max-w-2xl mx-auto">
      Nikmati perjalanan sehari penuh dengan destinasi pilihan dan pengalaman tak terlupakan.
    </p>
  </div>
</section>

<!-- Section: Itinerary -->
<section class="px-6 sm:px-10 md:px-20 py-10">
  <h2 class="text-[clamp(1.2rem,2vw,1.5rem)] font-bold mb-6 mt-8 text-center md:text-left ml-20">
    Rencana Perjalanan
  </h2>

  <div class="max-w-7xl mx-auto space-y-4">
    @php
      $itinerary = [
        'Dijemput di Hotel/Stasiun KA Bandung/Stasiun KCIC/ Bus Terminal',
        'Transfer menuju ke Pangalengan',
        'Mengunjungi: Nimo Highland Resort',
        'Makan siang di local resto.',
        'Setelah selesai, kembali menuju Kota Bandung',
        'Kemudian mengunjungi:  Sunrise Point Cukul / Taman Langit / Kebun Teh Nuansa Riung Gunung & Situ Cileunca/ Rumah Pengabdi Setan (Pilihsatu) ·(Optional:  Rafting, flying fox, paintball, Offroad)',
        'Sore hari kembali ke Bandung, mampir ketempat oleh-oleh pangalengan ataumengunjungi Masjid AL-JABAR (tidak wajib)',
        'Tiba di Bandung, transfer kembali menuju hotel/Stasiun KCIC/Stasiun Bandung/Pool Shutle-Bus, end of service. (Durasi Tour Max. 12 Jam)',
        ];
    @endphp

    @foreach($itinerary as $index => $step)
    <div class="flex items-start bg-white shadow-sm rounded-2xl p-[clamp(0.8rem,1.5vw,1.2rem)] hover:shadow-md transition duration-300">
      <!-- Nomor Lingkaran -->
      <div class="flex-shrink-0 w-[clamp(1.8rem,2.5vw,2.2rem)] h-[clamp(1.8rem,2.5vw,2.2rem)] rounded-full bg-[#FBB040] text-white font-bold flex items-center justify-center mr-[clamp(0.7rem,1.5vw,1rem)]">
        {{ $index + 1 }}
      </div>

      <!-- Deskripsi -->
      <p class="text-gray-700 font-medium text-[clamp(0.9rem,1.2vw,1rem)] leading-relaxed mt-1">
        {{ $step }}
      </p>
    </div>
    @endforeach
  </div>
</section>




<!-- Section: Destinasi Wisata -->
 <section class="px-6 sm:px-10 md:px-20 py-10">
  <h2 class="text-[clamp(1.2rem,2vw,1.5rem)] font-bold mb-6 mt-8 text-center md:text-left ml-20">
    Destinasi Wisata 
  </h2>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ml-10  gap-6 px-20">
  @php
    $destinations = [
      [
        'name' => 'Nimo Highland Resort',
        'image' => 'img/caurasel3.png'
      ],
      [
        'name' => 'Sunrise Point Cukul',
        'image' => 'img/caurasel3.png'
      ],
      [
        'name' => 'Taman Langit',
        'image' => 'img/caurasel3.png'
      ],
      [
        'name' => 'Kebun Teh Nuansa Riung Gunung',
        'image' => 'img/caurasel3.png'
      ],
      [
        'name' => 'Situ Cileunca',
        'image' => 'img/caurasel3.png'
      ],
      [
        'name' => 'Rumah Pengabdi Setan',
        'image' => 'img/caurasel3.png'
      ],
    ];
  @endphp

  @foreach($destinations as $dest)
  <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:scale-[1.02] transition-all duration-300 cursor-pointer border border-transparent hover:border-blue-400">
    <img src="{{ asset($dest['image']) }}" alt="{{ $dest['name'] }}" class="w-full h-40 object-cover">
    <div class="p-3 text-center">
      <p class="text-sm font-semibold text-gray-800">{{ $dest['name'] }}</p>
    </div>
  </div>
  @endforeach
</div>
<!-- Section: Hitung Harga Per Orang -->
<section class="px-6 sm:px-10 md:px-20 py-10">
  <h2 class="text-[clamp(1.2rem,2vw,1.5rem)] font-bold mb-6 mt-10 text-center md:text-left">
    Hitung Harga Per Orang
  </h2>

  <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-md p-[clamp(1rem,2vw,1.5rem)] mt-8 ">
    <div class="space-y-[clamp(0.4rem,1vw,0.8rem)]">
      
      <!-- Label + Slider -->
      <div>
        <label class="block text-gray-700 mb-[clamp(0.3rem,0.8vw,0.5rem)] text-[clamp(0.9rem,1.2vw,1rem)]">
          Jumlah Peserta: 
          <span id="jumlahPeserta" class="font-semibold text-black text-[clamp(0.95rem,1.2vw,1.05rem)]">
            2 Orang
          </span>
        </label>

        <!-- Slider -->
        <input 
          type="range" 
          id="sliderPeserta"
          min="2"
          max="50"
          value="2"
          class="w-full accent-fuchsia-700 cursor-pointer h-[clamp(0.5rem,0.8vw,0.6rem)]"
        >
      </div>

      <!-- Harga -->
      <div class="text-[clamp(0.9rem,1.1vw,1rem)]">
        <span class="font-semibold text-gray-700">Harga Per Orang:</span>
        <span id="hargaPerOrang" class="text-orange-500 font-semibold">Rp. 560.000</span>
      </div>

      <p class="text-[clamp(0.7rem,0.9vw,0.8rem)] text-gray-500 mt-[clamp(0.4rem,0.8vw,0.6rem)]">
        *Harga otomatis disesuaikan dengan jumlah peserta.
      </p>

    </div>
  </div>
</section>

<script>
  const slider = document.getElementById('sliderPeserta');
  const jumlahPeserta = document.getElementById('jumlahPeserta');
  const hargaPerOrang = document.getElementById('hargaPerOrang');
  const inputPeserta = document.getElementById('inputPeserta');

  function formatRupiah(angka) {
    return 'Rp. ' + angka.toLocaleString('id-ID');
  }

  function getHarga(peserta) {
    if (peserta >= 45 && peserta <= 50) return 330000;
    if (peserta >= 26 && peserta <= 30) return 375000;
    if (peserta >= 20 && peserta <= 25) return 400000;
    if (peserta >= 15 && peserta <= 18) return 340000;
    if (peserta >= 13 && peserta <= 14) return 330000;
    if (peserta >= 11 && peserta <= 12) return 3000;
    if (peserta >= 7 && peserta <= 10) return 395000;
    if (peserta >= 5 && peserta <= 6) return 360000;
    if (peserta >= 3 && peserta <= 4) return 460000;
    return 560000; // default 2 orang
  }

  slider.addEventListener('input', function() {
    const peserta = parseInt(slider.value);
    jumlahPeserta.textContent = peserta + ' Orang';
    hargaPerOrang.textContent = formatRupiah(getHarga(peserta));
    inputPeserta.value = peserta;
  });
</script>

<!-- Section: Harga Termasuk & Tidak Termasuk -->
<section class="max-w-7xl mx-auto px-6 md:px-10  mb-10">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    
    <!-- Card: Harga Termasuk -->
    <div class="bg-green-50 border border-green-200 shadow-sm rounded-xl p-6">
      <h3 class="text-green-700 font-bold text-lg flex items-center mb-4">
        Harga Termasuk
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
      </h3>

      <ul class="space-y-2 text-gray-700 text-sm md:text-base">
        <li class="flex items-start">
          <span class="text-green-500 mr-2">•</span>
          <span>Transportasi Standar Pariwisata sesuai jumlah peserta based on PRIVATE TOUR.</span>
        </li>
        <li class="flex items-start">
          <span class="text-green-500 mr-2">•</span>
          <span>Tiket masuk 3 objek wisata Sesuai program</span>
        </li>
        <li class="flex items-start">
          <span class="text-green-500 mr-2">•</span>
          <span>Refreshment: Mineral Water 1 Botol / Orang</span>
        </li>
        <li class="flex items-start">
          <span class="text-green-500 mr-2">•</span>
          <span>Meals: 1x Makan Siang di Local</span>
        </li>
        <li class="flex items-start">
          <span class="text-green-500 mr-2">•</span>
          <span>Tol & parkir objek wisata</span>
        </li>
        <li class="flex items-start">
          <span class="text-green-500 mr-2">•</span>
          <span>Driver sebagai Guide Bahasa Indonesia, &gt;20 pax termasuk Guide local</span>
        </li>
      </ul>
    </div>

    <!-- Card: Harga Tidak Termasuk -->
    <div class="bg-gray-50 border border-gray-200 shadow-sm rounded-xl p-6">
      <h3 class="text-red-600 font-bold text-lg flex items-center mb-4">
        Harga Tidak Termasuk
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </h3>

      <ul class="space-y-2 text-gray-700 text-sm md:text-base">
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>Ticket Pesawat/Ticket KAI/Ticket Shuttle dan Akomodasi Hotel</span>
        </li>
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>Tips Driver &amp; Guide (sukarela)</span>
        </li>
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>Makan dan minum di luar program paket</span>
        </li>
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>High season surcharge periode: Peak Season, Liburan Sekolah, Lebaran, Natal dan Tahun Baru (+25%)</span>
        </li>
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>Additional Lunch/Diner 60.000/orang</span>
        </li>
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>Rafting Pangalengan Rp. 145.000/orang</span>
        </li>
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>Paintball War Games Rp. 85.000/orang</span>
        </li>
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>Flying fox Rp. 35.000/orang</span>
        </li>
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>Offroad Rp. 250.000/orang</span>
        </li>
        <li class="flex items-start">
          <span class="text-red-500 mr-2">•</span>
          <span>ATV Ride Rp. 250.000 (tendem) Rp. 225.000 (single)</span>
        </li>
      </ul>
    </div>

  </div>
</section>

<!-- Tombol di bawah card harga -->
<div class="flex flex-col items-center justify-center gap-4 mt-8 mb-12">

  <!-- Tombol Pesan Sekarang -->
  <a href="{{ route('privateTrip.form', ['paket' => 'Offroad Lembang Private']) }}"
    class="bg-red-400 shadow-lg shadow-red-400/50 shadow-xl/50 bg-gradient-to-r from-[#FBB040] to-[#F9A825] text-white text-2xl font-semibold px-10 py-3 rounded-xl shadow-md hover:shadow-lg transition duration-300">
      Pesan Sekarang
  </a>

  <!-- Tombol WhatsApp -->
  <a href="https://wa.me/6282214250203" target="_blank"
    class="flex items-center mt-2 gap-1 bg-[#25D366] text-white font-semibold px-4 py-3 text-md text-center rounded-2xl shadow-md hover:shadow-lg transition duration-300">
    <!-- Icon WhatsApp -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-12 h-12 fill-white">
      <path
        d="M16.003 3.2c-7.09 0-12.8 5.71-12.8 12.8 0 2.257.59 4.45 1.712 6.387L3.2 28.8l6.662-1.733a12.742 12.742 0 0 0 6.14 1.563c7.09 0 12.8-5.71 12.8-12.8S23.093 3.2 16.003 3.2zm0 22.933a10.1 10.1 0 0 1-5.13-1.404l-.368-.218-3.946 1.028 1.056-3.847-.239-.392a10.09 10.09 0 0 1-1.552-5.4c0-5.566 4.527-10.093 10.093-10.093 5.566 0 10.093 4.527 10.093 10.093 0 5.566-4.527 10.093-10.093 10.093zm5.644-7.566c-.308-.154-1.827-.9-2.111-1.004-.283-.104-.49-.155-.697.155-.208.308-.8.997-.982 1.205-.181.208-.362.234-.67.08-.308-.155-1.3-.479-2.478-1.526-.916-.817-1.534-1.826-1.716-2.134-.181-.308-.019-.475.136-.63.14-.139.308-.362.462-.543.155-.181.206-.308.309-.514.104-.206.052-.386-.026-.543-.078-.155-.697-1.684-.956-2.308-.252-.605-.507-.523-.697-.533-.181-.008-.388-.01-.596-.01-.206 0-.543.078-.827.387-.283.308-1.087 1.062-1.087 2.588s1.112 3.002 1.268 3.21c.155.206 2.19 3.348 5.302 4.692 3.113 1.344 3.113.896 3.677.84.565-.052 1.827-.745 2.085-1.462.26-.717.26-1.333.181-1.462-.078-.129-.283-.206-.59-.36z" />
    </svg>
    Mau custom private trip? <br> Langsung Hubungi Kami
  </a>

</div>




</div>

@include('layout.footer')
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".fade-item");

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("opacity-100", "translate-y-0");
        }
      });
    }, { threshold: 0.2 });

    items.forEach(item => {
      observer.observe(item);
    });
  });
</script>

</body>