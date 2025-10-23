@include('layout.header') <!-- navbar-->

@section('content')
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css']) 
<body class="bg-gray-100 font-poppins">
    <div class="w-full">


        <!-- Carousel utama -->
        <div class="relative w-full overflow-hidden">
            <div class="carousel-inner flex transition-transform duration-500" id="carouselInner">
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{ asset('img/caurasel3.png') }}" 
                        alt="Image 1" 
                        class="w-full h-[calc(100vh-64px)] object-cover">
                </div>
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{ asset('img/caurasel3.png') }}" 
                        alt="Image 2" 
                        class="w-full h-[calc(100vh-64px)] object-cover">
                </div>
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{ asset('img/caurasel3.png') }}" 
                        alt="Image 3" 
                        class="w-full h-[calc(100vh-64px)] object-cover">
                </div>
            </div>

       <!-- tombol navigasi -->
        <!-- Tombol Prev -->
        <button id="prevBtn" 
        class="absolute top-1/2 left-14 -translate-y-1/2 bg-transparent border-2 border-yellow-500 w-8 h-8 flex items-center justify-center rounded-full shadow-lg transition hover:bg-yellow-500/10">
        <svg xmlns="http://www.w3.org/2000/svg" 
            class="w-6 h-6 text-yellow-500" fill="none" 
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        </button>

        <!-- Tombol Next -->
        <button id="nextBtn" 
        class="absolute top-1/2 right-14 -translate-y-1/2 bg-transparent border-2 border-yellow-500 w-8 h-8 flex items-center justify-center rounded-full shadow-lg transition hover:bg-yellow-500/10">
        <svg xmlns="http://www.w3.org/2000/svg" 
            class="w-6 h-6 text-yellow-500" fill="none" 
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
        </button>
        </div>
    </div>

<!-- Header + Tab Menu -->
 
  {{-- konten asli responsif --}}
<div class="max-w-screen-lg mx-auto px-4 sm:px-6 py-10">
    <div class="text-center mb-10">
      <!-- Header -->
      <div class="flex flex-col md:flex-row justify-between items-center gap-6 md:gap-10 mb-8 w-full md:w-3/4 mx-auto p-6 rounded-2xl">
  
        <!-- Judul -->
        <div class="text-center md:text-left">
          <p class="font-sans text-base sm:text-lg">Travel With</p>
          <h1 class="font-extrabold text-2xl sm:text-3xl md:text-4xl text-black drop-shadow-md mb-2">ArsyGo</h1>
          <div class="w-20 border-b-2 border-yellow-500 mx-auto md:mx-0"></div>
        </div>
  
        <!-- Toggle Button -->
        <div class="flex w-full sm:w-auto bg-gray-200 rounded-full shadow-md overflow-hidden">
          <a href="{{ route('PaketWisata') }}" 
            class="px-4 sm:px-6 py-2 bg-yellow-500 text-white font-semibold w-1/2 sm:w-40 md:w-52 text-center rounded-l-full">
            Open Trip
          </a>
          <a href="{{ route('PrivateTrip') }}" 
            class="px-4 sm:px-6 py-2 text-gray-500 font-semibold w-1/2 sm:w-40 md:w-52 text-center rounded-r-full">
            Private Trip
          </a>
        </div>
  
      </div>
    </div>
  </div>
  
  <!-- Destinations -->
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6">
  <!-- Card 1 -->
  <div class="relative rounded-2xl overflow-hidden">
    <img src="{{ asset('img/photo.png') }}" alt="1" class="w-full object-cover">
    <div class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t">
      <p class="text-white font-bold text-m text-center pb-4">Paket Wisata Bandung</p>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="relative rounded-2xl overflow-hidden">
    <img src="{{ asset('img/photo.png') }}" alt="2" class="w-full object-cover">
    <div class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t">
      <p class="text-white font-bold text-m text-center pb-4">Paket Wisata Lembang</p>
    </div>
  </div>

  <!-- Card 3 -->
  <div class="relative rounded-2xl overflow-hidden">
    <img src="{{ asset('img/photo.png') }}" alt="3" class="w-full object-cover">
    <div class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t">
      <p class="text-white font-bold text-m text-center pb-4">Paket Wisata Ciwidey</p>
    </div>
  </div>

  <!-- Card 4 -->
  <div class="relative rounded-2xl overflow-hidden">
    <img src="{{ asset('img/photo.png') }}" alt="4" class="w-full object-cover">
    <div class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t">
      <p class="text-white font-bold text-m text-center pb-4">Paket Wisata Pangalengan</p>
    </div>
  </div>
</div>

  </div>

    <!-- Private Trip Info -->
    <section class="bg-yellow-500 text-center py-12 md:py-16">
        <h2 class="text-4xl md:text-5xl font-bold text-white">Private Trip</h2>
        <div class="w-32 md:w-48 h-1 bg-white mx-auto mt-3 rounded-full"></div>
        <p class="mt-3 text-white text-lg md:text-xl">Liburan lebih fleksibel & personal</p>
    </section>

    <!-- Deskripsi Private Trip -->
    <section class="bg-gray-100 py-8">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-4 md:gap-8 text-gray-700 font-semibold text-center">
                <button class="px-4 py-2 rounded-full border border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white transition duration-300">EduTrip</button>
                <button class="px-4 py-2 rounded-full border border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white transition duration-300">Corporate</button>
                <button class="px-4 py-2 rounded-full border border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white transition duration-300">Family</button>
                <button class="px-4 py-2 rounded-full border border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white transition duration-300">Religius</button>
                <button class="px-4 py-2 rounded-full border border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white transition duration-300">Cultural & Historical</button>
            </div>
        </div>
    </section>

    <!-- Aturan Private Trip -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-screen-xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <!-- Gambar / Ilustrasi -->
            <div class="rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset('img/card-wisata.png') }}" alt="Private Trip" class="w-full h-full object-cover">
            </div>

            <!-- Fitur & Aturan -->
            <ul class="space-y-3 text-gray-700 text-lg md:text-xl list-disc pl-6">
                <li><span class="font-semibold">Bebas pilih destinasi</span> (Bandung, Lembang, Ciwidey, Pangalengan).</li>
                <li><span class="font-semibold">Durasi fleksibel</span> (nggak cuma OneDayTrip, bisa 2 hari atau lebih).</li>
                <li><span class="font-semibold">Itinerary sesuai minat</span> (alam, kuliner, adventure, dll).</li>
                <li><span class="font-semibold">Transportasi & fasilitas</span> <i>by request</i> (mobil, penginapan, guide, dokumentasi, dll).</li>
                <li><span class="font-semibold">Waktu keberangkatan bebas</span>, sesuai jadwal kamu.</li>
                <li><span class="font-semibold">Lebih privat & eksklusif</span>, tanpa digabung dengan peserta lain.</li>
            </ul>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </section>

</div>
    
    @include('layout.footer')
</body>
