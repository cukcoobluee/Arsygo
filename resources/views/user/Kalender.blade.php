@include('layout.header')
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css']) 

<body class="bg-[#e3d8c6] font-poppins">

    <!-- Header Kalender -->
    <div class="bg-yellow-700 shadow-md mb-10">
        <div class="max-w-screen-xl mx-auto h-52 flex items-center px-6">
            <img src="{{ asset('img/calendar.png') }}" class="w-10 h-10 mr-3 mt-15" alt="Calendar Icon">
            <h1 class="text-2xl mt-15 font-bold text-white">Kalender Kegiatan</h1>
        </div>
    </div>

    <div class="bg-gray-100 min-h-screen max-w-full py-10">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Subtitle -->
            <h2 class="text-center text-xl font-bold text-gray-700 leading-snug mb-10">
                Dari belajar hingga berpetualang, ArsyGo <br>
                selalu hadir menemani setiap langkahmu.
            </h2>

            <!-- Content Layout -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Daftar Event (kiri & tengah) -->
                <div class="md:col-span-2 space-y-6 ">
                    @foreach($events->groupBy('month') as $month => $monthEvents)
                        <p class="text-sm text-gray-600 font-semibold border-b pb-2">{{ $month }}</p>

                        @foreach($monthEvents as $event)
                        <div class="flex gap-2 pb-4 border-b">
                            <!-- Gambar Event -->
                            <div class="w-48 h-52 rounded-md overflow-hidden">
                                @if($event->image)
                                    <img src="{{ asset('storage/'.$event->image) }}" class="w-full h-full object-cover" alt="Event">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500">No Image</div>
                                @endif
                            </div>

                            <!-- Info Event -->
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $event->title }}</h3>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li class="flex items-center">
                                        <img src="{{ asset('img/cal.ico') }}" class="w-4 h-4 mr-2">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}
                                    </li>
                                    <li class="flex items-center">
                                        <img src="{{ asset('img/money.ico') }}" class="w-4 h-4 mr-2">
                                        Rp.{{ number_format($event->price, 0, ',', '.') }}
                                    </li>
                                    <li class="flex items-center">
                                        <img src="{{ asset('img/time.ico') }}" class="w-4 h-4 mr-2">{{ $event->time }}
                                    </li>
                                    <li class="flex items-center">
                                        <img src="{{ asset('img/loc.ico') }}" class="w-4 h-4 mr-2">{{ $event->location }}
                                    </li>
                                    <li class="flex items-center text-red-500 font-semibold">
                                        <img src="{{ asset('img/kursi.ico') }}" class="w-4 h-4 mr-2">Sisa {{ $event->slots }} slot
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>

                <!-- Event Highlights (kanan) -->
<div class="space-y-6">

    <!-- Judul di atas container -->
    <h2 class="text-3xl font-bold text-center text-yellow-600">Event Highlights</h2>

    <!-- Container Grid -->
    <div class="grid grid-cols-1 gap-6">
        @foreach($highlights as $highlight)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Foto Highlight -->
            <img src="{{ asset('storage/'.$highlight->image) }}" 
                 alt="{{ $highlight->title }}" 
                 class="w-full h-60 object-cover">

            <!-- Konten Text -->
            <div class="p-4">
                <h3 class="text-lg font-bold text-gray-800 mb-2 text-center">
                    {{ $highlight->title }}
                </h3>
                <p class="text-gray-600 text-sm text-center">
                    {{ $highlight->description }}
                </p>
            </div>
        </div>
        @endforeach
    </div>

</div>
                    
                    <!-- Modal Slider (satu aja untuk semua card) -->
                    <div id="sliderModal" class="hidden fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50">
                        <button class="absolute top-4 right-6 text-white text-3xl" onclick="closeSlider()">&times;</button>
                    
                        <div class="relative w-full max-w-4xl flex items-center justify-center">
                            <!-- Tombol Prev -->
                            <button onclick="prevSlide()" class="absolute left-4 text-white text-4xl">&#10094;</button>
                            
                            <!-- Gambar -->
                            <img id="sliderImage" src="" class="max-h-[80vh] rounded-xl">
                    
                            <!-- Tombol Next -->
                            <button onclick="nextSlide()" class="absolute right-4 text-white text-4xl">&#10095;</button>
                        </div>
                    </div>
                    
            </div>

        </div>
    </div> 

</body>
@include('layout.footer') <!-- include footer -->
