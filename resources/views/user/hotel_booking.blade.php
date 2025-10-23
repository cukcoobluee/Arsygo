@section('content')
@vite(['resources/css/user/home.css','resources/js/home.js','resources/css/header.css'])

<div class="container mx-auto px-6 py-10 max-w-xl">

    {{-- Tombol Kembali --}}
    <div class="mb-4">
        <a href="{{ route('HotelTransport') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg shadow hover:bg-gray-300 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
    </div>

    <h2 class="text-3xl font-bold mb-6 text-amber-900 text-center">Booking Hotel</h2>

    <form id="bookingForm" action="{{ route('hotel.booking.store', $hotel_id) }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Pemesan</label>
            <input type="text" name="nama" id="nama" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-amber-500 focus:border-amber-500" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-amber-500 focus:border-amber-500" required>
        </div>

        <div class="mb-4">
            <label for="telepon" class="block text-gray-700 font-medium mb-2">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-amber-500 focus:border-amber-500" required>
        </div>

        <div class="mb-4">
            <label for="check_in" class="block text-gray-700 font-medium mb-2">Check-in</label>
            <input type="date" name="check_in" id="check_in" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-amber-500 focus:border-amber-500" required>
        </div>

        <div class="mb-4">
            <label for="check_out" class="block text-gray-700 font-medium mb-2">Check-out</label>
            <input type="date" name="check_out" id="check_out" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-amber-500 focus:border-amber-500" required>
        </div>

        <div class="mb-4">
            <label for="tipe_kamar" class="block text-gray-700 font-medium mb-2">Tipe Kamar</label>
            <select name="tipe_kamar" id="tipe_kamar" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-amber-500 focus:border-amber-500" required>
                <option value="">-- Pilih Tipe Kamar --</option>
                <option value="Twin Bed">Twin Bed</option>
                <option value="Queen Bed">Queen Bed</option>
            </select>
        </div>

        <div class="mb-6">
            <label for="catatan" class="block text-gray-700 font-medium mb-2">Catatan</label>
            <textarea name="catatan" id="catatan" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-amber-500 focus:border-amber-500" rows="3"></textarea>
        </div>

        <button type="submit" class="w-full bg-amber-900 hover:bg-amber-800 text-white font-semibold py-3 rounded-lg transition">
            Daftar Sekarang
        </button>
    </form>
</div>

<script>
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault(); // cegah submit default

    const form = e.target;
    const formData = new FormData(form);

    // ambil data untuk WhatsApp
    const nama = formData.get('nama');
    const telepon = formData.get('telepon');
    const tipe = formData.get('tipe_kamar');
    const check_in = formData.get('check_in');
    const check_out = formData.get('check_out');

    const waNumber = '6281285448464'; // ganti nomor admin
    const message = `Halo, saya ${nama} ingin melakukan booking hotel.\nTipe Kamar: ${tipe}\nCheck-in: ${check_in}\nCheck-out: ${check_out}\nTelepon: ${telepon}`;
    const waURL = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;

    // kirim data ke backend via fetch
    fetch(form.action, {
        method: form.method,
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            // buka WhatsApp setelah backend sukses
            window.open(waURL, '_blank');
            form.reset(); // opsional reset form
        } else {
            alert('Gagal melakukan booking, silakan coba lagi.');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Terjadi kesalahan, silakan coba lagi.');
    });
});
</script>



