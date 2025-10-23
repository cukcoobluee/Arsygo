<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller {
    public function index() {
        $hotels = Hotel::latest()->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create() {
        return view('admin.hotels.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nama'=>'required|string',
            'lokasi'=>'nullable|string',
            'harga'=>'required|numeric',
            'gambar'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('hotels','public');
            $data['gambar'] = $path;
        }

        Hotel::create($data);
        return redirect()->route('admin.hotels.index')->with('success','Hotel berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    // Update data hotel
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $hotel->nama = $request->nama;
        $hotel->lokasi = $request->lokasi;
        $hotel->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            if ($hotel->gambar && file_exists(storage_path('app/public/'.$hotel->gambar))) {
                unlink(storage_path('app/public/'.$hotel->gambar));
            }
            $path = $request->file('gambar')->store('hotels', 'public');
            $hotel->gambar = $path;
        }

        $hotel->save();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel berhasil diperbarui!');
    }

    public function destroy(Hotel $hotel) {
        // opsional: hapus file gambar di storage
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success','Hotel dihapus.');
    }
}
