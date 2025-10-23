@extends('admin.layout.layout')
@section('content')
<h2 class="text-2xl font-bold mb-6">Vehicle</h2>
<a href="{{ route('admin.vehicles.create') }}" 
   class="mb-4 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
   Tambah Vehicle
</a>

<div class="overflow-x-auto bg-white rounded-lg shadow-md">
    <table class="w-full border-collapse border border-gray-200">
        <thead class="bg-amber-900 text-white">
            <tr>
                <th class="border px-4 py-2">No.</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Transmission</th>
                <th class="border px-4 py-2">Capacity</th>
                <th class="border px-4 py-2">Price</th>
                <th class="border px-4 py-2">Has Driver</th>
                <th class="border px-4 py-2">Image</th>
                <th class="border px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($vehicles as $vehicle)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $vehicle->name }}</td>
                <td class="border px-4 py-2">{{ $vehicle->transmission }}</td>
                <td class="border px-4 py-2">{{ $vehicle->capacity }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($vehicle->price, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">{{ $vehicle->has_driver ? 'Yes' : 'No' }}</td>
                <td class="border px-4 py-2">
                    @if($vehicle->image)
                        <img src="{{ asset('storage/'.$vehicle->image) }}" 
                             class="w-20 h-20 object-cover rounded">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <div class="flex justify-center gap-2">
                        <!-- Edit -->
                        <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg transition"
                           title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15.232 5.232l3.536 3.536M9 13l6.293-6.293a1 1 0 011.414 0l.586.586a1 1 0 
                                      010 1.414L11 15H9v-2z" />
                            </svg>
                        </a>
                        <!-- Delete -->
                        <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus vehicle ini?')">
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
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
