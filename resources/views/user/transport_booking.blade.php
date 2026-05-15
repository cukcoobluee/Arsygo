
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css'])

<body class="bg-[#e3d8c6] font-poppins">

<div class="container mx-auto px-6 py-12">
    <div class="max-w-lg mx-auto bg-gradient-to-r from-[#d39932] to-[#225d65] text-white rounded-t-xl p-8 mb-0">
        <h2 class="text-3xl font-bold mb-4 text-center drop-shadow-lg">🚗 Booking Kendaraan 🚗</h2>
        <p class="text-center opacity-90 font-medium mb-0">Kendaraan: <span class="font-bold text-[#d39932]">{{ $vehicle->name }}</span></p>
    </div>
    <div class="max-w-lg mx-auto bg-white rounded-b-xl shadow-xl p-8 -mt-4">
        <form action="{{ route('transport.booking.store', $vehicle->id) }}" method="POST" id="bookingForm">
            @csrf

            <div class="mb-4">
                <label class="block text-[#225d65] font-semibold mb-1">Nama Pemesan</label>
                <input 
                    type="text" 
                    name="full_name" 
                    class="w-full border-2 border-gray-500 rounded-lg px-4 py-3 text-lg
                        focus:border-[#d39932] 
                        focus:ring-2 ring-[#d39932]/30 
                        focus:outline-none 
                        focus:shadow-md focus:shadow-[#d39932]/20
                        hover:border-[#d39932]/50 hover:shadow-sm
                        transition-all duration-300 ease-in-out
                        placeholder:text-gray-400" 
                    placeholder="Masukkan nama lengkap Anda"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block text-[#225d65] font-semibold mb-1">Email</label>
                <input type="email" name="email" class="w-full border-2 border-gray-500 rounded-lg px-4 py-3 text-lg
                    focus:border-[#d39932] 
                    focus:ring-2 ring-[#d39932]/30 
                    focus:outline-none 
                    focus:shadow-md focus:shadow-[#d39932]/20
                    hover:border-[#d39932]/50 hover:shadow-sm
                    transition-all duration-300 ease-in-out
                    placeholder:text-gray-400" 
                    placeholder="Masukkan email Anda"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-[#225d65] font-semibold mb-1">No. Telepon</label>
                <input type="text" name="phone" class="w-full border-2 border-gray-500 rounded-lg px-4 py-3 text-lg
                    focus:border-[#d39932] 
                    focus:ring-2 ring-[#d39932]/30 
                    focus:outline-none 
                    focus:shadow-md focus:shadow-[#d39932]/20
                    hover:border-[#d39932]/50 hover:shadow-sm
                    transition-all duration-300 ease-in-out
                    placeholder:text-gray-400" 
                    placeholder="Masukkan nomor telepon Anda"
                    required>
            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[#225d65] font-semibold mb-1">Tanggal Mulai</label>
                    <input 
                        type="date" 
                        name="rental_date" 
                        class="w-full border-2 border-gray-500 rounded-lg px-4 py-3 text-lg
                            focus:border-[#d39932] 
                            focus:ring-2 ring-[#d39932]/30 
                            focus:outline-none 
                            focus:shadow-md focus:shadow-[#d39932]/20
                            hover:border-[#d39932]/50 hover:shadow-sm
                            transition-all duration-300 ease-in-out" 
                        required
                    >
                </div>
                <div>
                    <label class="block text-[#225d65] font-semibold mb-1">Tanggal Selesai</label>
                    <input 
                        type="date" 
                        name="end_date" 
                        class="w-full border-2 border-gray-500 rounded-lg px-4 py-3 text-lg
                            focus:border-[#d39932] 
                            focus:ring-2 ring-[#d39932]/30 
                            focus:outline-none 
                            focus:shadow-md focus:shadow-[#d39932]/20
                            hover:border-[#d39932]/50 hover:shadow-sm
                            transition-all duration-300 ease-in-out" 
                        required
                    >
                </div>
            </div>

            <!-- Hidden field untuk duration_days -->
            <input type="hidden" name="duration_days" id="duration_days">

            <div class="mb-6">
                <label class="block text-[#225d65] font-semibold mb-1">Keterangan / Catatan</label>
                <textarea name="notes" class="w-full border-2 border-gray-500 rounded-lg px-4 py-3 text-lg
                    focus:border-[#d39932] 
                    focus:ring-2 ring-[#d39932]/30 
                    focus:outline-none 
                    focus:shadow-md focus:shadow-[#d39932]/20
                    hover:border-[#d39932]/50 hover:shadow-sm
                    transition-all duration-300 ease-in-out" rows="3"></textarea>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('user.transport.index') }}" 
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">Kembali</a>

                <button type="submit" class="px-6 py-2 bg-[#d39932] text-white rounded hover:bg-[#ae5238] transition">Booking Sekarang</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('bookingForm').addEventListener('submit', function(e){
    const start = new Date(this.rental_date.value);
    const end = new Date(this.end_date.value);
    const diffTime = end - start;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
    document.getElementById('duration_days').value = diffDays;
});
</script>

</body>



