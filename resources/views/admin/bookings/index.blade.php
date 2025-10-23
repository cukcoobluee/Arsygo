@extends('admin.layout.layout')

@section('content')
<div class="container mx-auto px-6 py-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">📋 Daftar Booking</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-lg rounded-xl">
        <table class="min-w-max w-full text-sm text-gray-700">
            <thead class="bg-[#C38E3D] text-white uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Telepon</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="text-left">Jumlah Peserta</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left max-w-[200px]">Catatan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-4 py-4 whitespace-nowrap">{{ $booking->nama }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $booking->telepon }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ $booking->email }}</td>
                        <td class="px-2 py-2whitespace-nowrap text-center">{{ $booking->jumlah_peserta }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}</td>
                        <!-- Catatan dengan Read More -->
                        <td class="px-4 py-4 max-w-[150px]">
                            @if(strlen($booking->catatan ?? '') > 5)
                                <span id="note-{{ $booking->id }}" class="block overflow-hidden text-ellipsis" style="display:block; max-height:3em;">
                                    {{ Str::limit($booking->catatan, 100) }}
                                </span>
                                <button onclick="toggleReadMore({{ $booking->id }})" class="text-blue-600 text-sm underline ml-1">Read more</button>
                            @else
                                {{ $booking->catatan ?? '-' }}
                            @endif
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()"
                                    class="px-3 py-1 rounded-full text-xs font-semibold border
                                           focus:ring-[#C38E3D] focus:border-[#C38E3D]">
                                    <option value="pending" 
                                        {{ $booking->status == 'pending' ? 'selected' : '' }}
                                        style="background-color:#FEF3C7; color:#92400E;">
                                        Pending
                                    </option>
                                    <option value="approved" 
                                        {{ $booking->status == 'approved' ? 'selected' : '' }}
                                        style="background-color:#D1FAE5; color:#065F46;">
                                        Approved
                                    </option>
                                    <option value="rejected" 
                                        {{ $booking->status == 'rejected' ? 'selected' : '' }}
                                        style="background-color:#FECACA; color:#991B1B;">
                                        Rejected
                                    </option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin mau hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition"
                                    title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                         class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 
                                              01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 
                                              00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-4 text-center text-gray-500">
                            Belum ada data booking
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
