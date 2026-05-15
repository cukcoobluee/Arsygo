@include('layout.header') <!-- navbar -->

@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css']) 
<body class="bg-black-100 font-poppins">
    <!-- Hero Section -->
    <section class="relative w-full h-[75vh] flex items-center justify-center text-center bg-black">
        <img src="{{ asset('img/caurasel2.png') }}" class="absolute inset-0 w-full h-full object-cover opacity-60" alt="About Banner">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/80"></div>
        <div class="relative z-10 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-extrabold text-[#d39932] drop-shadow-xl animate-fadeInDown">
                Tentang Kami
            </h1>
            <p class="mt-6 text-lg md:text-xl text-gray-200 animate-fadeInUp">
                Lebih dari sekadar perjalanan, kami menghadirkan <span class="font-semibold text-[#d39932]">pengalaman</span> yang tak terlupakan.
            </p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="max-w-6xl mx-auto py-20 px-6 md:px-12">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h2 class="text-4xl font-bold text-gray-900">
                    Siapa <span class="text-yellow-600">Arsygo?</span>
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Arsygo adalah perusahaan tour & travel yang berdedikasi menghadirkan perjalanan
                    <span class="text-yellow-600 font-semibold">nyaman</span>, <span class="text-yellow-600 font-semibold">aman</span>,
                    dan penuh <span class="text-yellow-600 font-semibold">kenangan indah</span>. 
                    Kami percaya bahwa setiap perjalanan adalah kisah yang harus diceritakan.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Dengan tim berpengalaman, jaringan luas, dan pelayanan premium, kami telah dipercaya oleh ratusan pelanggan untuk menjelajah destinasi wisata terbaik.
                </p>
                <a href="{{ route('PaketWisata') }}" 
                   class="inline-block mt-4 px-6 py-3 bg-yellow-500 text-white font-bold rounded-full shadow-lg hover:bg-yellow-600 transition transform hover:scale-105">
                    Jelajahi Paket Wisata
                </a>
            </div>
            <div class="relative">
                <img src="{{ asset('img/caurasel3.png') }}" alt="About Image" class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-6 -right-6 bg-yellow-500 text-white px-6 py-4 rounded-xl shadow-xl font-bold text-lg">
                    Arsygo Tour & Travel
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi Section -->
    <section class="bg-yellow-600 py-16">
        <div class="max-w-6xl mx-auto px-6 md:px-12">
          <!-- Header -->
          <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-white mb-3">Visi & Misi</h2>
            <p class="text-white/90 text-base md:text-lg max-w-2xl mx-auto">
              Fondasi utama kami dalam memberikan pengalaman wisata yang 
              <span class="font-semibold">nyaman</span>, 
              <span class="font-semibold">aman</span>, 
              dan <span class="font-semibold">berkesan</span>.
            </p>
          </div>
      
          <div class="space-y-8">
            <!-- Card Visi -->
            <div
              class="group bg-white rounded-xl shadow-lg p-8 transition-transform transform hover:-translate-y-2 hover:shadow-xl text-left"
            >
              <!-- Icon + Title -->
              <div class="flex items-center mb-5">
                <div
                  class="bg-yellow-600 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-md group-hover:scale-110 transition"
                >
                  <i class="fas fa-eye text-lg"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 ml-3">Visi</h3>
              </div>
              <!-- Isi -->
              <ul class="space-y-3 text-gray-700 text-base">
                <li class="flex items-start">
                  <span class="w-3 h-5 mt-2 bg-yellow-600 rounded-full mr-3"></span>
                  Menjadi biro perjalanan, pelatihan kerja, dan event organizer terkemuka, berbasis profesional, dengan mengedepankan jiwa humanis, berbasis teknologi digital.
                </li>
            </div>
      
            <!-- Card Misi -->
            <div
              class="group bg-white rounded-xl shadow-lg p-8 transition-transform transform hover:-translate-y-2 hover:shadow-xl text-left"
            >
              <!-- Icon + Title -->
              <div class="flex items-center mb-5">
                <div
                  class="bg-yellow-600 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-md group-hover:scale-110 transition"
                >
                  <i class="fas fa-bullseye text-lg"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 ml-3">Misi</h3>
              </div>
              <!-- Isi -->
              <ul class="space-y-3 text-gray-700 text-base">
                <li class="flex items-start">
                  <span class="w-5 h-5 mt-2 bg-yellow-600 rounded-full mr-3"></span>
                  Mengadakan program Perjalanan Wisata, Pelatihan Kerja, dan Kegiatan Event Organizer berbasis kebutuhan konsumen dan mitra usaha, dengan mengedepankan kepuasan dan menjunjung tinggi profesional serta berjiwa humanis, serta menggunakan Teknologi Digital.
                </li>
                <li class="flex items-start">
                  <span class="w-5 h-5 mt-2 bg-yellow-600 rounded-full mr-3"></span>
                  Membangun Kerjasama dan kolaborasi dengan semua pihak, serta memberikan kontribusi dan solusi terbaik secara profesional dan humanis bagi setiap stakeholder, dengan memanfaatkan quadruple helix network (Pemerintahan, Swasta, Industri, Akademisi, dan Publik atau Komunitas).
                </li>
                <li class="flex items-start">
                  <span class="w-2 h-5 mt-0.5 bg-yellow-600 rounded-full mr-3"></span>
                  Melakukan perubahan dan inovasi berbasis teknologi yang adaptif dan berkelanjutan.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      

    <!-- CTA -->
    <section class="bg-gray py-20 text-center text-black">
        <h2 class="text-4xl font-bold">Siap Liburan Bersama <span class="text-yellow-500">Arsygo?</span></h2>
        <p class="mt-4 text-lg text-black-300">Pesan paket wisata sekarang dan nikmati perjalanan tak terlupakan.</p>
        <a href="{{ route('PaketWisata') }}" class="mt-6 inline-block bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-8 py-4 rounded-full shadow-lg transition transform hover:scale-110">
            Pesan Sekarang
        </a>
    </section>

    @include('layout.footer')
</body>
