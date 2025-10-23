@extends('admin.layout.layout')

@section('content')
<div class="container mx-auto max-w-6xl py-8 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Kelola Kalender Kegiatan</h2>

    <!-- Notifikasi sukses -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Event -->
    <div class="mb-4">
        <a href="{{ route('admin.kalender.create') }}" 
           class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
           Tambah Event
        </a>
    </div>

    <!-- Tabel Event -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="table-auto w-full min-w-max">
            <thead class="bg-amber-900 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Image</th>
                    <th class="px-3 py-2 text-left">Month</th>
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-3 py-2 text-left">Date</th>
                    <th class="px-3 py-2 text-left">Price</th>
                    <th class="px-3 py-2 text-left">Time</th>
                    <th class="px-4 py-2 text-left">Location</th>
                    <th class="px-0 py-2 text-center">Slots</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 ">
                @forelse($events as $event)
                <tr>
                    <td class="px-4 py-2">
                        @if($event->image)
                            <img src="{{ asset('storage/'.$event->image) }}" class="w-16 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </td>
                    <td class="px-3 py-2">{{ $event->month }}</td>
                    <td class="px-4 py-2">{{ $event->title }}</td>
                    <td class="px-3 py-2">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</td>
                    <td class="px-3 py-2">Rp {{ number_format($event->price, 0, ',', '.') }}</td>
                    <td class="px-3 py-2">{{ $event->time }}</td>
                    <td class="px-4 py-2">{{ $event->location }}</td>
                    <td class="px-0 py-2 text-center">{{ $event->slots }}</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center justify-center space-x-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.kalender.edit', $event->id) }}" 
                                class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg transition"
                                title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15.232 5.232l3.536 3.536M9 13l6.293-6.293a1 1 0 011.414 0l.586.586a1 1 0 010 1.414L11 15H9v-2z" />
                                </svg>
                            </a>
                            <!-- Tombol Delete -->
                            <form action="{{ route('admin.kalender.delete', $event->id) }}" method="POST" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')" 
                                  class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition"
                                        title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                         class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-2 text-center text-gray-500">Tidak ada event.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
