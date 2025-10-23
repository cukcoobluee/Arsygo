@extends('admin.layout.layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Manajemen Testimonial</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-left text-sm">
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Pesan</th>
                    <th class="px-4 py-2">Rating</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                    <tr class="border-t text-sm">
                        <td class="px-4 py-2">{{ $testimonial->user_name }}</td>
                        <td class="px-4 py-2">{{ $testimonial->email }}</td>
                        <td class="px-4 py-2">{{ $testimonial->message }}</td>
                        <td class="px-4 py-2">{{ str_repeat('★', $testimonial->rating) }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 text-xs rounded 
                                @if($testimonial->status == 'approved') bg-green-200 text-green-800
                                @elseif($testimonial->status == 'pending') bg-yellow-200 text-yellow-800
                                @else bg-red-200 text-red-800
                                @endif">
                                {{ ucfirst($testimonial->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 flex gap-2">
                            @if($testimonial->status == 'pending')
                                <form method="POST" action="{{ route('admin.testimonials.approve', $testimonial->id) }}">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded text-xs">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.testimonials.reject', $testimonial->id) }}">
                                    @csrf
                                    <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">Reject</button>
                                </form>
                            @endif
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" 
                                onsubmit="return confirm('Yakin mau hapus?')">
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
                          
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada testimonial.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $testimonials->links() }}
    </div>
</div>
@endsection
