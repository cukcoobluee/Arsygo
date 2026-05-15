@include('layout.header') <!-- navbar-->

@section('content')
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
                    <img src="{{ asset('img/caurasel2.png') }}" 
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

    <!-- Carousel card -->
    <div class="w-full py-12 pb-20 rounded-b-[50px]">
      <!-- Logo -->
      <img src="{{ asset('img/arsygo-logo.png') }}" alt="ArsygoLogo" 
          class="mx-auto mb-6 w-40 h-auto mt-6 logo-glow">
      <h2 class="text-center text-2xl md:text-3xl font-bold italic font-poppins mb-20 text-[#225d65]">
        Apapun kebutuhanmu, serahkan pada ArsyGo
      <div class="w-50 mx-auto border-b-3 border-[#ae5238] mt-5"></div>
      </h2>

      <!-- Services Cream & Terracotta -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mx-auto max-w-7xl px-4">
            <!-- Card 1 CREAM -->
            <div class="service-card bg-warm-cream p-10 rounded-3xl text-center text-[#225d65] transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:border-mustard border-4 border-transparent">
                <div class="service-icon text-6xl mb-8">
                    <i class="fas fa-hotel"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Akomodasi Hotel</h3>
                <p>Hotel premium hingga villa eksklusif dengan pelayanan terbaik</p>
            </div>
            
            <!-- Card 2 TERRACOTA -->
            <div class="service-card bg-terracota-rust p-10 rounded-3xl text-center text-warm-cream transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:border-mustard border-4 border-transparent">
                <div class="service-icon text-6xl mb-8">
                    <i class="fas fa-car-side"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Transportasi</h3>
                <p>Mobil mewah, private transfer, dan transportasi nyaman</p>
            </div>
            
            <!-- Card 3 CREAM -->
            <div class="service-card bg-warm-cream p-10 rounded-3xl text-[#225d65] text-center transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:border-mustard border-4 border-transparent">
                <div class="service-icon text-6xl mb-8">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Event Organizer</h3>
                <p>Event spesial, corporate outing, dan acara memorable</p>
            </div>
            
            <!-- Card 4 TERRACOTA -->
            <div class="service-card bg-terracota-rust p-10 rounded-3xl text-center text-warm-cream transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:border-mustard border-4 border-transparent">
                <div class="service-icon text-6xl mb-8">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Private Trip</h3>
                <p>Liburan eksklusif untuk keluarga atau teman terdekat</p>
            </div>
            
            <!-- Card 5 CREAM -->
            <div class="service-card bg-warm-cream p-10 rounded-3xl text-center text-[#225d65] transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:border-mustard border-4 border-transparent">
                <div class="service-icon text-6xl mb-8">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Open Trip</h3>
                <p>Petualangan seru bareng traveler lain dari seluruh Indonesia</p>
            </div>
            
            <!-- Card 6 TERRACOTA -->
            <div class="service-card bg-terracota-rust p-10 rounded-3xl text-center text-warm-cream transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:border-mustard border-4 border-transparent">
                <div class="service-icon text-6xl mb-8">
                    <i class="fas fa-palette"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Workshop</h3>
                <p>Belajar fotografi, kuliner, crafting sambil berwisata</p>
            </div>
        </div>
        </div>
      </div>
    </div>

    <div class="p-8 rounded-lg max-w-7xl w-full flex flex-col mt-16 mx-auto pb-16">
      <!-- Judul -->
      <div class="mb-6 text-left">
        <p class="font-popins text-xl">Travel With</p>
        <h1 class="font-extrabold text-5xl text-black drop-shadow-md mb-3">ArsyGo</h1>
        <div class="w-40 border-b-4 border-yellow-500"></div>
      </div>

      <!-- Paket Wisata -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6 mb-10">
        <!-- Card 1 -->
        <div class="relative rounded-2xl overflow-hidden">
          <a href="{{ route('BandungPrivate') }}">
            <img 
              src="{{ asset('img/bandung.png') }}" 
              alt="Paket Wisata Bandung"
              class="w-full h-full object-cover"
            >
          </a>
          <div class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black/60 to-transparent pointer-events-none">
            <p class="text-white font-bold text-m text-center pb-4">
              Paket Wisata Bandung
            </p>
          </div>
        </div>
          

        <!-- Card 2 -->
        <div class="relative rounded-2xl overflow-hidden">
          <a href="{{ route('LembangPrivate') }}">
            <img 
              src="{{ asset('img/lembang.jpg') }}" 
              alt="Paket Wisata Lembang"
              class="w-full h-full object-cover"
            >
          </a>

          <div class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black/60 to-transparent pointer-events-none">
            <p class="text-white font-bold text-m text-center pb-4">
              Paket Wisata Lembang
            </p>
          </div>
        </div>

        

        <!-- Card 3 -->
        <div class="relative rounded-2xl overflow-hidden">
          <a href="{{ route('CiwideyPrivate') }}">
            <img 
              src="{{ asset('img/ciwidey.jpg') }}" 
              alt="Paket Wisata Ciwidey"
              class="w-full h-full object-cover"
            >
          </a>
          <div class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black/60 to-transparent pointer-events-none">
            <p class="text-white font-bold text-m text-center pb-4">
              Paket Wisata Ciwidey
            </p>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="relative rounded-2xl overflow-hidden">
          <a href="{{ route('PangalenganPrivate') }}">
            <img 
              src="{{ asset('img/pangalengan.jpg') }}" 
              alt="Paket Wisata Pangalengan"
              class="w-full h-full object-cover"
            >
          </a>
          <div class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black/60 to-transparent pointer-events-none">
            <p class="text-white font-bold text-m text-center pb-4">
              Paket Wisata Pangalengan
            </p>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="relative rounded-2xl overflow-hidden">
          <a href="{{ route('OffroadPrivate') }}">
            <img src="{{ asset('img/photo.png') }}" alt="5" class="w-full object-cover">
          <div class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t">
            <p class="text-white font-bold text-m text-center pb-4">Paket Wisata Offroad Lembang</p>
          </div>
          </a>
        </div>
      </div>

      <!-- Deskripsi bawah -->
      <p class="text-center text-[#225d65] text-xl italic font-semibold max-w-3xl mx-auto mb-2">
        Jelajahi destinasi impian Anda dengan beragam paket wisata menarik yang telah kami siapkan khusus di ArsyGo!
      </p>
      <div class="w-50 mx-auto border-b-2 border-[#d39932]"></div>
    </div>

    <!-- Tombol navigasi paket wisata -->
    <section class="bg-[#ae5238] py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <!-- Judul -->
            <h2 class="text-2xl md:text-3xl font-bold text-[#e3d8c6]">Akomodasi</h2>
            <div class="w-16 h-1 bg-[#e3d8c6] mx-auto mt-2 mb-10"></div>

            <!-- Gambar navigasi -->
            <div class="flex justify-center gap-8 flex-wrap">
                <!-- Gambar 1 → Transport.blade.php -->
                <a href="{{ route('Transport') }}" 
                  class="group w-40 sm:w-52 md:w-64 lg:w-72 transform transition duration-300 ease-in-out hover:scale-105 hover:-translate-y-2">
                    <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl">
                        <img src="{{ asset('img/card.png') }}" 
                            alt="Transport" 
                            class="w-full h-auto rounded-xl">
                        <!-- Overlay teks -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        </div>
                    </div>
                </a>

                <!-- Gambar 2 → HotelTransport.blade.php -->
                <a href="{{ route('HotelTransport') }}" 
                  class="group w-40 sm:w-52 md:w-64 lg:w-72 transform transition duration-300 ease-in-out hover:scale-105 hover:-translate-y-2">
                    <div class="relative rounded-xl overflow-hidden shadow-md hover:shadow-xl">
                        <img src="{{ asset('img/card2.png') }}" 
                            alt="Hotel & Transport" 
                            class="w-full h-auto rounded-xl">
                        <!-- Overlay teks -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>

    <!-- Section Testimonial -->
    <section class="bg-[#e3d8c6] py-14">
      <div class="max-w-6xl mx-auto px-4 text-center">
        <!-- Judul -->
        <h2 class="text-2xl md:text-3xl text-[#225d65] font-bold">Testimonial</h2>
        <div class="w-20 h-1 bg-[#d39932] mx-auto mt-2 mb-8"></div>

        <!-- Grid Testimonial -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
          @forelse($testimonials as $testimonial)
            <div class="bg-[#eeeeee] rounded-xl shadow-md p-5 text-left">
              <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 flex items-center justify-center rounded-full bg-yellow-400 text-black font-bold">
                  {{ strtoupper(substr($testimonial->user_name, 0, 1)) }}
                </div>
                <h3 class="font-semibold text-sm md:text-base">{{ $testimonial->user_name }}</h3>
              </div>
              <p class="text-gray-700 text-xs md:text-sm mb-2 leading-relaxed">
                "{{ $testimonial->message }}"
              </p>
              <div class="text-yellow-400 text-sm">
                {{ str_repeat('★', $testimonial->rating) }}{{ str_repeat('☆', 5 - $testimonial->rating) }}
              </div>
            </div>
          @empty
            <p class="text-gray-600 col-span-4">Belum ada testimonial.</p>
          @endforelse
        </div>

        <!-- Tombol -->
        <div class="flex justify-center">
          <button onclick="document.getElementById('testimonialForm').classList.remove('hidden')"
            class="flex items-center gap-2 bg-[#d39932] hover:bg-[#a9742f] text-white font-semibold text-sm px-5 py-2.5 rounded-full shadow-md transition duration-200">
            <img src="{{ asset('img/send.ico') }}" alt="ico" class="w-4 h-4">
            <span>Kirim Pengalaman Anda</span>
          </button>
        </div>
      </div>
    </section>

    <!-- Modal Form Testimonial -->
    <div id="testimonialForm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 hidden z-50">
      <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-lg border-t-4 border-[#C38E3D] animate-fadeIn">
        
        <!-- Header -->
        <h3 class="text-2xl font-bold mb-6 text-center text-[#C38E3D] tracking-wide">
          ✨ Kirim Testimonial ✨
        </h3>

        <!-- Form -->
        <form method="POST" action="{{ route('testimonial.store') }}" class="space-y-4">
          @csrf

          <!-- Nama -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
            <input type="text" name="user_name" class="w-full border-2 border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#C38E3D]" required>
          </div>

          <!-- Email -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
            <input type="email" name="email" class="w-full border-2 border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#C38E3D]" required>
          </div>

          <!-- Pesan -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Pesan</label>
            <textarea name="message" rows="3" class="w-full border-2 border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#C38E3D]" required></textarea>
          </div>

          <!-- Rating -->
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Rating</label>
            <select name="rating" class="w-full border-2 border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#C38E3D]" required>
              <option value="5">★★★★★ Sangat Bagus</option>
              <option value="4">★★★★ Bagus</option>
              <option value="3">★★★ Cukup</option>
              <option value="2">★★ Kurang</option>
              <option value="1">★ Buruk</option>
            </select>
          </div>

          <!-- Actions -->
          <div class="flex justify-end gap-3 pt-4">
            <button type="button" onclick="document.getElementById('testimonialForm').classList.add('hidden')"
              class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
              Batal
            </button>
            <button type="submit" class="px-5 py-2 bg-[#C38E3D] text-white font-semibold rounded-lg shadow-md hover:bg-[#a7732e] transition">
              Kirim
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Animasi -->
    <style>
      @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
      }
      .animate-fadeIn {
        animation: fadeIn 0.3s ease-out;
      }
      :root {
            --mustard: #d39932;
            --olive-green: #5c633e;
            --warm-cream: #e3d8c6;
            --deep-teal: #225d65;
            --terracota-rust: #ae5238;
        }
      .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: var(--warm-cream);
            padding: 2.5rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.4s;
            border: 3px solid transparent;
            position: relative;
        }

        .service-card:nth-child(even) {
            background: var(--terracota-rust);
            color: var(--warm-cream);
        }

        .service-card:hover {
            transform: translateY(-10px);
            border-color: var(--mustard);
            box-shadow: 0 20px 40px rgba(211,153,50,0.3);
        }

        .service-icon {
            font-size: 3.5rem;
            color: var(--mustard);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            display: inline-block;
        }

        /* CREAM CARD ICON */
        .service-card:not(.terracota-card) .service-icon {
            color: var(--mustard);
        }

        .service-card:not(.terracota-card):hover .service-icon {
            color: var(--terracota-rust);
            transform: scale(1.1);
        }

        /* TERRACOTA CARD ICON - PERUBAHAN INI */
        .service-card:nth-child(even) .service-icon {
            color: var(--warm-cream);
        }

        .service-card:nth-child(even):hover .service-icon {
            color: var(--mustard) !important; /* MUSTARD saat hover */
            transform: scale(1.1);
        }

        /* Stats */
        .stats {
            background: var(--warm-cream);
            color: var(--deep-teal);
            padding: 80px 2rem;
        }

        .stats-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 4rem;
            background: linear-gradient(45deg, var(--mustard), var(--terracota-rust));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }
    </style>
  
    @include('layout.footer')
</body>

