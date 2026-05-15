<footer class="bg-[#225d65] text-[#e3d8c6] py-12">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">

    <!-- Kolom 1: Tentang Arsygo -->
    <div>
      <div class="flex items-center gap-3 mb-4">
        <img src="{{ asset('img/PTarsygo.png') }}" alt="Logo Arsygo" class="h-14">
      </div>
      <p class="text-sm leading-relaxed mb-5 text-[gray-400]">
        PT Arsygo Jelajah Bestari merupakan perusahaan perjalanan wisata yang berfokus pada pengalaman perjalanan cerdas dan berkelanjutan.
      </p>
      <p class="text-xs text-[#e3d8c6]">© 2025 Arsygo. All rights reserved.</p>
    </div>

    <!-- Kolom 2: Kontak -->
    <div>
      <h3 class="text-lg font-semibold mb-5 text-[#d39932]">Kontak Kami</h3>
      <ul class="space-y-5 text-sm">
        <li class="flex items-start gap-3">
          <i class="fas fa-map-marker-alt mr-5"></i> 
          <span>Gedung Lingian Lt. 2, Jl. Telekomunikasi No.1, Sukapura, Dayeuhkolot, Bandung Regency, West Java 40257</span>
        </li>
        <li class="flex items-center gap-3">
          <p><i class="fas fa-phone mr-5"></i> +62 812-3456-7890</p>
        </li>
        <li class="flex items-center gap-3">
          <i class="fas fa-envelope mr-5"></i> 
          <span>info@arsygo.com</span>
        </li>
      </ul>
    </div>

    <!-- Kolom 3: Ikuti Kami -->
    <div class="flex flex-col items-start md:items-end">
      <h3 class="text-lg font-semibold mb-5 text-[#d39932]">Ikuti Kami</h3>
      <div class="flex gap-6 text-2xl text-[#e3d8c6] mb-6">
        <a href="#" class="hover:text-[#d39932] transition"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-[#d39932] transition"><i class="fab fa-tiktok"></i></a>
        <a href="#" class="hover:text-[#d39932] transition"><i class="fab fa-facebook"></i></a>
        <a href="#" class="hover:text-[#d39932] transition"><i class="fab fa-linkedin"></i></a>
      </div>

      <p class="text-sm font-semibold mb-3 text-[#e3d8c6]">Supported by:</p>
      <div class="flex gap-5 items-center justify-center md:justify-end">
        <img src="{{ asset('img/telkom.png') }}" alt="Telkom University" class="h-30 opacity-90">
        <img src="{{ asset('img/sthh.png') }}" alt="STH Logo" class="h-30 opacity-90">
      </div>
      
    </div>

  </div>
</footer>
