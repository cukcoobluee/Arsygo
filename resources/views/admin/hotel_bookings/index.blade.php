@extends('admin.layout.layout')
@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Hotel Bookings</h2>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table id="bookingTable" class="w-full text-sm text-gray-700 border border-gray-200 table-auto">
            <thead class="bg-amber-900 text-white text-center text-xs md:text-sm">
                <tr>
                    <th class="px-4 py-3 border text-left">Hotel</th>
                    <th class="px-4 py-3 border text-left">Nama Pemesan</th>
                    <th class="px-4 py-3 border text-left">Email</th>
                    <th class="px-4 py-3 border text-left">Telepon</th>
                    <th class="px-4 py-3 border">Check In</th>
                    <th class="px-4 py-3 border">Check Out</th>
                    <th class="px-4 py-3 border text-left">Tipe Kamar</th>
                    <th class="px-4 py-3 border text-left max-w-[150px]">Catatan</th>

                    {{-- Tambahan Baru --}}
                    <th class="px-4 py-3 border">Payment Status</th>
                    <th class="px-4 py-3 border">Metode</th>
                    <th class="px-4 py-3 border">Jumlah</th>
                    <th class="px-4 py-3 border">Bukti</th>

                    <th class="px-4 py-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr class="text-center border-b even:bg-gray-50 hover:bg-gray-100 transition">

                        <td class="px-4 py-2 text-left">{{ $booking->hotel->nama ?? '-' }}</td>
                        <td class="px-4 py-2 text-left">{{ $booking->nama }}</td>
                        <td class="px-4 py-2 text-left">{{ $booking->email }}</td>
                        <td class="px-4 py-2 text-left">{{ $booking->telepon }}</td>
                        <td class="px-4 py-2">{{ $booking->check_in }}</td>
                        <td class="px-4 py-2">{{ $booking->check_out }}</td>
                        <td class="px-4 py-2">{{ $booking->tipe_kamar }}</td>

                        {{-- Catatan --}}
                        <td class="px-4 py-2 text-left max-w-[150px] break-words">
                            @if(strlen($booking->catatan ?? '') > 5)
                                <span id="note-{{ $booking->id }}" class="block overflow-hidden" style="max-height:3em;">
                                    {{ Str::limit($booking->catatan, 100) }}
                                </span>
                                <button onclick="toggleReadMore({{ $booking->id }})" class="text-blue-600 text-xs underline ml-1">Read more</button>
                            @else
                                {{ $booking->catatan ?? '-' }}
                            @endif
                        </td>

                        {{-- Payment Status --}}
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded-lg text-xs font-semibold
                                @if($booking->payment_status == 'paid') bg-green-200 text-green-800
                                @elseif($booking->payment_status == 'unpaid') bg-yellow-200 text-yellow-800
                                @else bg-red-200 text-red-800 @endif">
                                {{ ucfirst($booking->payment_status) }}
                            </span>
                        </td>

                        {{-- Payment Method --}}
                        <td class="px-4 py-2">
                            {{ $booking->payment_method ?? '-' }}
                        </td>

                        {{-- Total Pembayaran --}}
                        <td class="px-4 py-2">
                            {{ $booking->payment_amount ? 'Rp ' . number_format($booking->payment_amount, 0, ',', '.') : '-' }}
                        </td>

                        {{-- Bukti Pembayaran --}}
                        <td class="px-4 py-2">
                            @if($booking->payment_proof)
                                <a href="{{ asset('storage/payment_proof/' . $booking->payment_proof) }}" 
                                   target="_blank" class="text-blue-600 underline text-sm">
                                    Lihat Bukti
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        {{-- Aksi --}}
                        <td class="px-4 py-2">
                            <div class="flex items-center justify-center gap-2">

                                {{-- Edit Booking --}}
                                <a href="{{ route('admin.hotel-bookings.edit', $booking->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg transition">
                                    ✏️
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.hotel-bookings.destroy', $booking->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg">
                                        🗑️
                                    </button>
                                </form>

                                {{-- Update Pembayaran --}}
                                <a href="{{ route('admin.hotel-bookings.payment', $booking->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition">
                                   💳
                                </a>

                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4 flex justify-center border-t">
            {{ $bookings->onEachSide(1)->links('pagination.custom-amber') }}
        </div>
    </div>
</div>

<script>
function toggleReadMore(id) {
    const note = document.getElementById('note-' + id);
    note.style.maxHeight = (note.style.maxHeight === "none") ? "3em" : "none";
}
</script>
@endsection
