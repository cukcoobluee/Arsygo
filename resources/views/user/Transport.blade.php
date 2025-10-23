@include('layout.header') <!-- navbar-->

@section('content')
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css']) 
<body class="bg-gray-100 font-poppins">
    <div class="w-full">

        <!-- Carousel utama -->
        <div class="relative w-full overflow-hidden">
            <div class="carousel-inner flex transition-transform duration-700 ease-in-out" id="carouselInner">
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{ asset('img/caurasel3.png') }}" 
                        alt="Image 1" 
                        class="w-full h-[calc(100vh-64px)] object-cover brightness-90">
                </div>
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{ asset('img/caurasel3.png') }}" 
                        alt="Image 2" 
                        class="w-full h-[calc(100vh-64px)] object-cover brightness-90">
                </div>
                <div class="carousel-item w-full flex-shrink-0">
                    <img src="{{ asset('img/caurasel3.png') }}" 
                        alt="Image 3" 
                        class="w-full h-[calc(100vh-64px)] object-cover brightness-90">
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
              <p class="font-sans text-base sm:text-lg">Travel With</p>
              <h1 class="font-extrabold text-2xl sm:text-3xl md:text-4xl text-black drop-shadow-md mb-2">ArsyGo</h1>
              <div class="w-20 border-b-2 border-yellow-500 mx-auto md:mx-0"></div>
            </div>
      
            <div class="flex w-full sm:w-auto bg-gray-200 rounded-full shadow-md overflow-hidden">
                <div class="flex flex-col sm:flex-row w-full sm:w-auto bg-gray-200 rounded-full shadow-md overflow-hidden">
                   <!-- Akomodasi -->
                <a href="{{ route('HotelTransport') }}" 
                class="flex items-center justify-center flex-1 sm:w-50 md:w-60 px-4 sm:px-6 py-3 font-semibold text-center 
                {{ request()->routeIs('HotelTransport') 
                   ? 'bg-yellow-500 text-white rounded-full' 
                   : 'text-gray-600' }}">
               Akomodasi
             </a>
           
             <!-- Sewa Transportasi -->
             <a href="{{ route('Transport') }}" 
                class="flex items-center justify-center flex-1 sm:w-50 md:w-60 px-4 sm:px-6 py-3 font-semibold text-center 
                {{ request()->routeIs('Transport') 
                   ? 'bg-yellow-500 text-white rounded-full' 
                   : 'text-gray-600' }}">
               Sewa Transportasi
             </a>
           </div>
              </div>
            </div>
       
            
            
            <!-- Filter / Sort Centered -->
            <div class=" p-6 rounded-2xl overflow-x-auto">
                <form 
                method="GET" 
                action="{{ route('user.transport.index') }}" 
                class="flex flex-wrap items-center justify-center gap-4"
                >
                <!-- Dropdown Transmisi -->
                <div class="relative">
                    <select 
                    name="transmission"
                    class="appearance-none px-4 py-2 text-sm border border-gray-300 rounded-xl 
                            focus:outline-none focus:ring-2 focus:ring-amber-400 bg-white 
                            shadow-sm hover:shadow-md transition min-w-[160px]"
                    >
                    <option value="">Transmisi</option>
                    <option value="manual" {{ request('transmission')=='manual'?'selected':'' }}>Manual</option>
                    <option value="matic" {{ request('transmission')=='matic'?'selected':'' }}>Matic</option>
                    </select>
                    <div class="pointer-events-none absolute top-1/2 right-3 transform -translate-y-1/2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                    </div>
                </div>
            
                <!-- Dropdown Kapasitas -->
                <div class="relative">
                    <select 
                    name="capacity"
                    class="appearance-none px-4 py-2 text-sm border border-gray-300 rounded-xl 
                            focus:outline-none focus:ring-2 focus:ring-amber-400 bg-white 
                            shadow-sm hover:shadow-md transition min-w-[160px]"
                    >
                    <option value="">Kapasitas</option>
                    <option value="2-4" {{ request('capacity')=='2-4'?'selected':'' }}>2-4</option>
                    <option value="4-7" {{ request('capacity')=='4-7'?'selected':'' }}>4-7</option>
                    <option value="12-16" {{ request('capacity')=='12-16'?'selected':'' }}>12-16</option>
                    <option value="35-50" {{ request('capacity')=='35-50'?'selected':'' }}>35-50</option>
                    </select>
                    <div class="pointer-events-none absolute top-1/2 right-3 transform -translate-y-1/2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                    </div>
                </div>
            
                <!-- Dropdown Harga -->
                <div class="relative">
                    <select 
                    name="price_range"
                    class="appearance-none px-4 py-2 text-sm border border-gray-300 rounded-xl 
                            focus:outline-none focus:ring-2 focus:ring-amber-400 bg-white 
                            shadow-sm hover:shadow-md transition min-w-[180px]"
                    >
                    <option value="">Harga</option>
                    <option value="250-500" {{ request('price_range')=='250-500'?'selected':'' }}>250k - 500k</option>
                    <option value="500-1000000" {{ request('price_range')=='500-1000000'?'selected':'' }}>500k - 1jt</option>
                    <option value="1000000-4500000" {{ request('price_range')=='1000000-4500000'?'selected':'' }}>1jt - 4.5jt</option>
                    </select>
                    <div class="pointer-events-none absolute top-1/2 right-3 transform -translate-y-1/2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                    </div>
                </div>
            
                <!-- Dropdown Sopir -->
                <div class="relative">
                    <select 
                    name="has_driver"
                    class="appearance-none px-4 py-2 text-sm border border-gray-300 rounded-xl 
                            focus:outline-none focus:ring-2 focus:ring-amber-400 bg-white 
                            shadow-sm hover:shadow-md transition min-w-[160px]"
                    >
                    <option value="">Sopir</option>
                    <option value="driver" {{ request('has_driver')=='driver'?'selected':'' }}>Dengan Sopir</option>
                    <option value="no_driver" {{ request('has_driver')=='no_driver'?'selected':'' }}>Tanpa Sopir</option>
                    </select>
                    <div class="pointer-events-none absolute top-1/2 right-3 transform -translate-y-1/2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                    </div>
                </div>
            
                <!-- Search -->
                <div class="flex min-w-[200px]">
                    <input 
                    type="text" 
                    name="q" 
                    value="{{ request('q') }}" 
                    placeholder="Cari kendaraan..." 
                    class="px-4 py-2 text-sm border border-gray-300 rounded-l-xl 
                            focus:outline-none focus:ring-2 focus:ring-amber-400 bg-white 
                            shadow-sm hover:shadow-md transition w-full"
                    >
                    <button 
                    class="px-5 py-2 bg-amber-500 text-white font-semibold rounded-r-xl 
                            shadow hover:scale-105 transition text-sm"
                    >
                    Search
                    </button>
                </div>
                </form>
            </div>
        </form>
    </div>      

        <!-- List Kendaraan -->
        <div class="grid grid-cols-1 gap-6"> 
            @forelse($vehicles as $v)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1 p-6">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-5">
                    <!-- Gambar -->
                    <img src="{{ $v->image ? asset('storage/'.$v->image) : asset('img/default-car.png') }}" 
                        class="w-full md:w-48 h-32 object-cover rounded-xl shadow-sm" 
                        alt="{{ $v->name }}">

                    <!-- Detail -->
                    <div class="flex-1 w-full flex justify-between">
                        <!-- Nama & Info -->
                        <div>
                            <h3 class="font-bold text-2xl text-gray-800 mb-2">{{ $v->name }}</h3>
                            
                            <!-- Info Transmisi & Seat -->
                            <div class="flex items-start text-sm text-gray-600 gap-6">
                                <!-- Transmisi + Sopir -->
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-1">
                                        <img src="{{ asset('img/stir.png') }}" alt="Transmisi" class="w-5 h-5">
                                        <span>{{ ucfirst($v->transmission) }}</span>
                                    </div>
                                    <span class="mt-4 flex items-center text-gray-700 text-sm font-medium">
                                        {{ $v->has_driver == 'driver' ? 'Dengan Sopir' : 'Tanpa Sopir' }}
                                    </span>
                                </div>

                                <!-- Kapasitas + Available -->
                                <div class="flex flex-col items-start">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('img/kursi.png') }}" alt="Kapasitas" class="w-5 h-5">
                                        <span>{{ $v->capacity }} seats</span>
                                    </div>
                                    <!-- Available -->
                                    <span class="mt-5 text-blue-600 font-medium text-sm">
                                        Available
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Harga di atas Tombol -->
                        <div class="flex flex-col items-end justify-center gap-2">
                            <span class="font-bold text-lg text-yellow-500">
                                Rp {{ number_format($v->price,0,',','.') }}
                            </span>
                            <a href="{{ route('user.transport.booking.form', $v->id) }}" 
                            class="px-6 py-2 bg-yellow-500 text-white font-semibold rounded-full shadow hover:bg-yellow-600 hover:shadow-lg transition">
                                Lanjutkan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center col-span-1 text-gray-600">Belum ada kendaraan.</p>
            @endforelse
        </div>

 
</div>

@include('layout.footer')
