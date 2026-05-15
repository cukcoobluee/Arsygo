@include('layout.header') <!-- navbar -->

@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css']) 
<body class="bg-[#e3d8c6] font-poppins">

    <!-- Hero Section -->
    <section class="relative w-full h-[75vh] flex items-center justify-center text-center bg-black">
        <img src="{{ asset('img/event.jpeg') }}" class="absolute inset-0 w-full h-full object-cover opacity-60" alt="About Banner">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/80"></div>
        <div class="relative z-10 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-extrabold text-[#d39932] drop-shadow-xl animate-fadeInDown">
                Event Organizer
            </h1>
            <p class="mt-6 text-lg md:text-xl text-gray-200 animate-fadeInUp">
                Lebih dari sekadar perjalanan, kami menghadirkan <span class="font-semibold text-[#d39932]">pengalaman</span> yang tak terlupakan.
            </p>
        </div>
    </section>
    
    <div class="container mx-auto px-6 py-10">

        <!-- Kenapa Memilih Kami -->
        <section class="py-20 px-6 md:px-12 bg-gray-50 rounded-2xl">
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">
                Kenapa Memilih <span class="text-yellow-600">Arsygo?</span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto">
                <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition transform hover:-translate-y-2">
                    <img src="{{ asset('img/price.png') }}" class="w-16 h-16 mb-4" alt="Keunggulan">
                    <h3 class="text-xl font-bold mb-2">Harga Kompetitif</h3>
                    <p class="text-gray-600">Paket wisata hemat dengan layanan premium yang tetap memanjakan Anda.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition transform hover:-translate-y-2">
                    <img src="{{ asset('img/service.png') }}" class="w-16 h-16 mb-4" alt="Keunggulan">
                    <h3 class="text-xl font-bold mb-2">Pelayanan Ramah</h3>
                    <p class="text-gray-600">Tim berpengalaman selalu siap membantu setiap langkah perjalanan Anda.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition transform hover:-translate-y-2">
                    <img src="{{ asset('img/experience.png') }}" class="w-16 h-16 mb-4" alt="Keunggulan">
                    <h3 class="text-xl font-bold mb-2">Pengalaman Berkesan</h3>
                    <p class="text-gray-600">Setiap perjalanan bersama Arsygo menjadi kenangan indah seumur hidup.</p>
                </div>
            </div>
        </section>

        <br>
        <br>
        <br>

        {{-- ============ LAYANAN EVENT ORGANIZER ============ --}}
        <section class="w-full py-12 pb-20 bg-[#d39932] rounded-2xl">
            <div class="container mx-auto text-center px-6 md:px-12 ">
                <h2 class="text-3xl md:text-4xl font-bold mb-12 text-white">Layanan Event Organizer</h2>
                <div class="relative max-w-full mx-auto ">
                    <div id="eoCarousel" class="flex overflow-x-auto space-x-6 scrollbar-hide py-4">
                        @foreach ([
                            ['highlight8.jpg','Corporate Event Organizer'],
                            ['highlight6.jpg','Entertainment Organizer'],
                            ['komsit3.png','Exhibition Organizer'],
                            ['highlight3.jpg','MICE Organizer'],
                            ['layanan5.jpg','Wedding Organizer']
                        ] as [$img, $title])
                            <div class="min-w-[220px] md:min-w-[250px] bg-white rounded-xl shadow-lg flex-shrink-0 hover:shadow-2xl transition transform hover:-translate-y-2">
                                <img src="{{ asset('img/'.$img) }}" 
                                    class="w-full h-40 object-cover rounded-t-xl" alt="{{ $title }}">
                                <p class="p-4 font-bold text-gray-900">{{ $title }}</p>
                            </div>
                        @endforeach
                    </div>
                    </div>
                    </div>

                    <!-- Tombol navigasi carousel -->
                    <button id="eoPrev" class="absolute top-1/2 left-0 -translate-y-1/2  text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-white/50 transition">❮</button>
                    <button id="eoNext" class="absolute top-1/2 right-0 -translate-y-1/2  text-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-white/50 transition">❯</button>
                {{-- ============ CTA WHATSAPP ============ --}}
                <div class="container mt-7 mx-auto text-center px-6 md:px-12">
                    <a href="https://wa.me/628122016796" target="_blank" 
                    class="inline-flex items-center gap-3 bg-green-500 hover:bg-green-600 
                            text-white font-semibold px-8 py-4 rounded-full shadow-lg transition">
                        <img src="{{ asset('img/whatsapp.png') }}" class="w-6 h-6"> 
                        <span class="text-lg">Hubungi Kami via WhatsApp</span>
                    </a>
                </div>
            </div>
            </div>
            
        </section>

        

        {{-- ============ EVENT HIGHLIGHTS ============ --}}
        <section class="py-16 bg-[d39932]">
            <div class="container mx-auto text-center px-6 md:px-12">
                <h2 class="text-3xl md:text-4xl text-[#225d65] font-bold mb-12">Event Highlights
                    <div class="w-50 mx-auto border-b-3 border-[#ae5238] mt-5"></div>
                </h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                    @foreach (range(1,8) as $i)
                        <div class="bg-gray-200 h-40 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                            <img src="{{ asset('img/highlight'.$i.'.jpg') }}" 
                                class="w-full h-full object-cover rounded-lg" alt="Highlight {{ $i }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>

</div>

@include('layout.footer') <!-- include footer -->
