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
  
    
        <!-- Grid Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 w-1/2 mx-auto mb-6">
           <!-- Card -->
        <div class="bg-yellow-500 rounded-xl shadow-md text-center p-4 relative cursor-pointer" onclick="openPopup()">
            <p class="text-white font-bold text-lg">1 DAY TRIP</p>
            <img src="{{ asset('img/card-wisata.png') }}" alt="Paket Wisata" class="w-full h-40 object-cover rounded-lg my-3">
            <p class="font-semibold text-white">Paket Wisata Bandung</p>
            <p class="text-white text-sm flex items-center justify-center mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                20 September 2025
            </p>
            <p class="text-emerald-600 font-bold mt-2">AVAILABLE 2 SLOT!!</p>
        </div>

            <!-- Popup -->
            <div id="popup" class="fixed inset-0 hidden items-center justify-center shadow-md z-50">
                <div class="bg-white rounded-2xl shadow-lg p-6 w-[600px] relative max-h-[95vh] overflow-y-auto border-10 border-yellow-500">
                    
                    <!-- Tombol close -->
                    <button onclick="closePopup()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-xl font-bold">✕</button>

                    <!-- Header -->
                    <h2 class="text-center text-2xl font-extrabold text-yellow-600 mb-2">1 DAY TRIP</h2>
                    <p class="text-center font-semibold text-lg mb-4">Paket Wisata Bandung</p>

                    <!-- Gambar -->
                    <div class="rounded-lg overflow-hidden mb-3">
                        <img src="{{ asset('img/card-wisata.png') }}" alt="Bandung" class="w-full h-60 object-cover">
                    </div>

                    <!-- Tanggal -->
                    <div class="flex items-center justify-center text-gray-600 text-sm mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        20 September 2025
                    </div>

                    <!-- Jadwal -->
                    <h3 class="text-lg font-bold mb-2 text-left">Jadwal Open Trip</h3>
                    <ul class="space-y-3 text-sm text-gray-700 leading-relaxed text-left">
                        <ul class="space-y-3 text-sm text-gray-700 leading-relaxed">
                            <li>
                                <span class="font-bold text-yellow-600">⏰ Pagi – Eksplor Ikonik Bandung</span><br>
                                08.00 – 09.00 → Meeting point / Penjemputan peserta<br>
                                09.00 – 10.30 → Gedung Sate Explore museum & foto di ikon kota Bandung.<br>
                                10.30 – 11.30 → Jalan santai ke area sekitar (bisa sekalian lewat Taman Lansia / Gasibu).
                            </li>
                            <li>
                                <span class="font-bold text-yellow-600">⏰ Siang – Wisata Religi & Kuliner</span><br>
                                11.30 – 12.30 → Masjid Raya Jawa Barat (Alun-Alun Bandung) Shalat Dzuhur & menikmati area Alun-Alun.<br>
                                12.30 – 13.30 → Makan siang di Pandan Wangi (makanan Sunda autentik) atau Bu Imas (cocok untuk pecinta pedas).
                            </li>
                            <li>
                                <span class="font-bold text-yellow-600">⏰ Sore – Heritage Walk</span><br>
                                13.30 – 15.30 → Jalan Braga, Menikmati suasana heritage, foto-foto, ngopi cantik di Braga Permai / café sekitar.<br>
                                15.30 – 16.30 → Menuju Paris Van Java Mall (PVJ), Shopping ringan, kuliner, atau sekadar window shopping di mall hits Bandung.
                            </li>
                            <li>
                                <span class="font-bold text-yellow-600">⏰ Malam – Kuliner Penutup</span><br>
                                18.30 – 19.30 → Makan malam di Bakso Solo Samrat (bakso jumbo & mie).<br>
                                19.30 – 20.00 → Penutupan trip & kembali ke meeting point.
                            </li>
                        </ul>
                        
                    <!-- Status -->
                    <p class="text-center text-emerald-600 font-bold mt-4">AVAILABLE 2 SLOT!!</p>

                    <!-- Tombol -->
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('formulir.create') }}" class="bg-yellow-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-yellow-600 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <script>
                function openPopup() {
                    const popup = document.getElementById('popup');
                    popup.classList.remove('hidden');
                    popup.classList.add('flex');
                }
                    const popup = document.getElementById('popup');
                    popup.classList.add('hidden');
                    popup.classList.remove('flex');
                function closePopup() {
                    document.getElementById('popup').classList.add('hidden');
                }
            </script>

    
            <!-- Card Not Available -->
            <div class="bg-yellow-500 rounded-xl shadow-md text-center p-4">
                <p class="text-white font-bold text-lg">1 DAY TRIP</p>
                <img src="{{ asset('img/card-wisata.png') }}" alt="Paket Wisata" class="w-full h-40 object-cover rounded-lg my-3">
                <p class="font-semibold text-white">Paket Wisata Lembang</p>
                <p class="text-white text-sm flex items-center justify-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    20 September 2025
                </p>
                <p class="text-red-700 font-bold mt-2">NOT AVAILABLE</p>
            </div>
    
            <!-- Card not available 2 -->
            <div class="bg-yellow-500 rounded-xl shadow-md text-center p-4">
                <p class="text-white font-bold text-lg">1 DAY TRIP</p>
                <img src="{{ asset('img/card-wisata.png') }}" alt="Paket Wisata" class="w-full h-40 object-cover rounded-lg my-3">
                <p class="font-semibold text-white">Paket Wisata Lembang</p>
                <p class="text-white text-sm flex items-center justify-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    20 September 2025
                </p>
                <p class="text-red-700 font-bold mt-2">NOT AVAILABLE</p>
            </div>
    
            <!--Card not available 2 -->
            <div class="bg-yellow-500 rounded-xl shadow-md text-center p-4">
                <p class="text-white font-bold text-lg">1 DAY TRIP</p>
                <img src="{{ asset('img/card-wisata.png') }}" alt="Paket Wisata" class="w-full h-40 object-cover rounded-lg my-3">
                <p class="font-semibold text-white">Paket Wisata Lembang</p>
                <p class="text-white text-sm flex items-center justify-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    20 September 2025
                </p>
                <p class="text-red-700 font-bold mt-2">NOT AVAILABLE</p>
            </div>
        </div>
    </div>
    
</div>


@include('layout.footer')
