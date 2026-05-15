{{-- resources/views/user/HotelTransport.blade.php --}}
@include('layout.header') <!-- navbar -->

@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css']) 

<body class="bg-[#e3d8c6] font-poppins">
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

    <div class="max-w-screen-lg mx-auto px-4 sm:px-6 py-10">
        <div class="text-center mb-10">
          <!-- Header -->
          <div class="flex flex-col md:flex-row justify-between items-center gap-6 md:gap-10 mb-8 w-full md:w-3/4 mx-auto p-6 rounded-2xl">
      
            <!-- Judul -->
            <div class="text-center md:text-left">
              <p class="font-poppins text-base sm:text-lg">Travel With</p>
              <h1 class="font-extrabold text-2xl sm:text-3xl md:text-4xl text-black drop-shadow-md mb-2">ArsyGo</h1>
              <div class="w-20 border-b-2 border-[#d39932] mx-auto md:mx-0"></div>
            </div>
            <div class="flex w-full sm:w-auto bg-gray-200 rounded-full shadow-md overflow-hidden">
                <!-- Akomodasi -->
                <a href="{{ route('HotelTransport') }}" 
                   class="flex items-center justify-center flex-1 sm:w-50 md:w-60 px-4 sm:px-6 py-3 font-semibold text-center 
                   {{ request()->routeIs('HotelTransport') 
                      ? 'bg-[#d39932] text-white rounded-full' 
                      : 'text-gray-600' }}">
                  Penginapan
                </a>
              
                <!-- Sewa Transportasi -->
                <a href="{{ route('Transport') }}" 
                   class="flex items-center justify-center flex-1 sm:w-50 md:w-60 px-4 sm:px-6 py-3 font-semibold text-center 
                   {{ request()->routeIs('Transport') 
                      ? 'bg-[#d39932] text-white rounded-full' 
                      : 'text-gray-600' }}">
                  Sewa Transportasi
                </a>
              </div>
              </div>
              </div>
              
          
        {{-- Judul --}}
        <h2 class="text-center text-xl md:text-2xl font-semibold mb-10">
            Dapatkan Spesial Voucher Diskon Hotel dari ArsyGo
        </h2>

        {{-- Grid Hotel --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($hotels as $hotel)
                <div class="p-6 bg-[#ae5238] rounded-2xl shadow flex items-center w-full max-w-xl mx-auto">
                    {{-- Logo Hotel --}}
                    <img src="{{ $hotel->gambar ? asset('storage/'.$hotel->gambar) : asset('img/ibis.png') }}" 
                         alt="{{ $hotel->nama }}" 
                         class="w-20 h-20 object-contain mr-5">

                    {{-- Info Hotel --}}
                    <div class="flex flex-col justify-between">
                        <h3 class="text-lg font-bold text-gray-800">{{ $hotel->nama }}</h3>
                        <p class="text-[#e3d8c6] text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke-width="1.5" 
                                 stroke="#e3d8c6" 
                                 class="w-4 h-4 mr-2 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                      d="M19.5 10.5c0 7.5-7.5 11.25-7.5 11.25S4.5 18 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            {{ $hotel->lokasi }}
                        </p>
                        <p class="text-[#e3d8c6] text-sm flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke-width="1.5" 
                                 stroke="#e3d8c6" 
                                 class="w-4 h-4 mr-2 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                      d="M3 7.5l9 4.5 9-4.5M3 12l9 4.5 9-4.5M3 16.5l9 4.5 9-4.5" />
                            </svg>
                            Rp {{ number_format($hotel->harga,0,',','.') }}/room
                        </p>
                        <a href="{{ route('hotel.booking.create', $hotel->id) }}" 
                           class="mt-3 px-4 py-2 bg-[#d39932] text-white text-sm font-semibold rounded-full hover:bg-yellow-600 transition">
                            Dapatkan sekarang
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600 col-span-2">Belum ada data hotel tersedia.</p>
            @endforelse
        </div> 
    </div>
    </div>

    <br><br><br><br><br><br><br><br>

    @include('layout.footer')
</body>

