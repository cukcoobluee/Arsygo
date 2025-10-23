
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css'])

<body class="bg-gray-100 font-poppins">

<div class="container mx-auto px-6 py-12">
    <div class="max-w-lg mx-auto bg-white rounded-xl shadow-xl p-8">
        <h2 class="text-3xl font-bold text-amber-900 mb-6 text-center">Booking Kendaraan</h2>
        <p class="text-gray-600 mb-6 text-center">Kendaraan: <span class="font-semibold">{{ $vehicle->name }}</span></p>

        <form action="{{ route('transport.booking.store', $vehicle->id) }}" method="POST" id="bookingForm">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Nama Pemesan</label>
                <input type="text" name="full_name" class="w-full border rounded px-3 py-2 focus:ring-amber-400 focus:border-amber-400" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2 focus:ring-amber-400 focus:border-amber-400" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">No. Telepon</label>
                <input type="text" name="phone" class="w-full border rounded px-3 py-2 focus:ring-amber-400 focus:border-amber-400" required>
            </div>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Tanggal Mulai</label>
                    <input type="date" name="rental_date" class="w-full border rounded px-3 py-2 focus:ring-amber-400 focus:border-amber-400" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Tanggal Selesai</label>
                    <input type="date" name="end_date" class="w-full border rounded px-3 py-2 focus:ring-amber-400 focus:border-amber-400" required>
                </div>
            </div>

            <!-- Hidden field untuk duration_days -->
            <input type="hidden" name="duration_days" id="duration_days">

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-1">Keterangan / Catatan</label>
                <textarea name="notes" class="w-full border rounded px-3 py-2 focus:ring-amber-400 focus:border-amber-400" rows="3"></textarea>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('user.transport.index') }}" 
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">Kembali</a>

                <button type="submit" class="px-6 py-2 bg-amber-900 text-white rounded hover:bg-amber-800 transition">Booking Sekarang</button>
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



