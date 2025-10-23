<footer class="relative bg-gradient-to-t from-yellow-400 to-white text-white">
    <!-- Background image -->
    <div class="absolute inset-0">
        <img src="{{ asset('img/footer.png') }}" alt="Footer Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/30"></div> <!-- overlay semi-transparent -->
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-16 min-h-[50vh] flex flex-col justify-between">
        <div class="md:flex md:justify-between md:items-start mb-8">
            <!-- Logo -->
            <div class="mb-6 md:mb-0">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('img/arsygo-logo.png') }}" class="h-10 w-auto" alt="Arsygo Logo">
                    <span class="text-2xl font-semibold font-poppins text-white">Arsygo</span>
                </a>
            </div>

            <!-- Kontak di kanan footer -->
            <div class="flex items-start gap-6 text-white">
                <!-- Kolom icon -->
                <div class="flex flex-col gap-6 mt-1">
                    <img src="{{ asset('img/location.png') }}" alt="Location Icon" class="h-6 w-6">
                    <img src="{{ asset('img/phone.png') }}" alt="Phone Icon" class="h-6 w-6 mt-11">
                    <img src="{{ asset('img/email.png') }}" alt="Email Icon" class="h-6 w-6 ">
                </div>

                <!-- Kolom teks -->
                <div class="flex flex-col gap-5 max-w-xs">
                    <p class="text-sm md:text-base leading-snug">
                        Gedung Lingian Lantai 2, Jl. Telekomunikasi No.1, Sukapura, Dayeuhkolot, Bandung Regency, West Java 40257
                    </p>
                    <p class="text-sm md:text-base leading-snug">
                        +62-822 1425 0203
                    </p>
                    <p class="text-sm md:text-base leading-snug">
                        travelwitharsygo@gmail.com
                    </p>
                </div>
            </div>
        </div>

        <hr class="my-6 border-white/50">

        <!-- Footer Bottom -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <!-- Supported by + Logos (Left) -->
            <div class="flex flex-col items-start gap-2">
                <span class="text-sm text-white font-semibold">Supported by :</span>
                <div class="flex gap-6">
                    <img src="{{ asset('img/telkom.png') }}" alt="Telkom Logo" class="h-18 md:h-25 w-auto">
                    <img src="{{ asset('img/sthh.png') }}" alt="STH Logo" class="h-18 md:h-25 w-auto">
                </div>
            </div>

            <!-- Copyright (Right) -->
            <span class="text-sm text-white sm:text-right">
                © 2025 <a href="{{ route('home') }}" class="hover:underline font-poppins text-white">Arsygo</a>. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>
