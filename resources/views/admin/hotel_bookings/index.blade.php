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
                    <th class="px-4 py-3 border">Status</th>
                    <th class="px-4 py-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr class="text-center border-b even:bg-gray-50 hover:bg-gray-100 transition">
                        <td class="px-4 py-2 text-left break-words">{{ $booking->hotel->nama ?? '-' }}</td>
                        <td class="px-4 py-2 text-left break-words">{{ $booking->nama }}</td>
                        <td class="px-4 py-2 text-left break-words">{{ $booking->email }}</td>
                        <td class="px-4 py-2 text-left break-words">{{ $booking->telepon }}</td>
                        <td class="px-4 py-2 text-center">{{ $booking->check_in }}</td>
                        <td class="px-4 py-2 text-center">{{ $booking->check_out }}</td>
                        <td class="px-4 py-2 text-center break-words ">{{ $booking->tipe_kamar }}</td>

                        <!-- Catatan dengan Read More -->
                        <td class="px-4 py-2 text-left max-w-[150px] break-words">
                            @if(strlen($booking->catatan ?? '') > 5)
                                <span id="note-{{ $booking->id }}" class="block overflow-hidden text-ellipsis" style="max-height:3em;">
                                    {{ Str::limit($booking->catatan, 100) }}
                                </span>
                                <button onclick="toggleReadMore({{ $booking->id }})" class="text-blue-600 text-sm underline ml-1">Read more</button>
                            @else
                                {{ $booking->catatan ?? '-' }}
                            @endif
                        </td>

                        <!-- Status -->
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded-lg text-xs font-semibold
                                @if($booking->status == 'approved') bg-green-200 text-green-800
                                @elseif($booking->status == 'pending') bg-yellow-200 text-yellow-800
                                @else bg-red-200 text-red-800 @endif">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>

                        <!-- Aksi -->
                        <td class="px-4 py-2">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.hotel-bookings.edit', $booking->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg transition" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                         class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15.232 5.232l3.536 3.536M9 13l6.293-6.293a1 1 0 011.414 0l.586.586a1 1 0 010 1.414L11 15H9v-2z" />
                                    </svg>
                                </a>

                                <form action="{{ route('admin.hotel-bookings.destroy', $booking->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="p-4 flex justify-center border-t">
            {{ $bookings->onEachSide(1)->links('pagination.custom-amber') }}
        </div>
    </div>
</div>

<!-- Script Read More -->
<script>
function toggleReadMore(id) {
    const note = document.getElementById('note-' + id);
    if(note.style.maxHeight === "none") {
        note.style.maxHeight = "3em";
    } else {
        note.style.maxHeight = "none";
    }
}
</script>
@endsection
