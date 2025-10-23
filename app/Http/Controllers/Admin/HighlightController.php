<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventHighlight;

class HighlightController extends Controller
{
    public function index()
    {
        $highlights = EventHighlight::all();
        return view('admin.highlight.index', compact('highlights'));
    }

    public function create()
    {
        return view('admin.highlight.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('highlights', 'public');
        }

        EventHighlight::create($data);
        return redirect()->route('admin.highlight.index')->with('success', 'Highlight berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $highlight = EventHighlight::findOrFail($id);
        return view('admin.highlight.edit', compact('highlight'));
    }

    public function update(Request $request, $id)
    {
        $highlight = EventHighlight::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('highlights', 'public');
        }

        $highlight->update($data);
        return redirect()->route('admin.highlight.index')->with('success', 'Highlight berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $highlight = EventHighlight::findOrFail($id);
        $highlight->delete();
        return redirect()->route('admin.highlight.index')->with('success', 'Highlight berhasil dihapus!');
    }
}
