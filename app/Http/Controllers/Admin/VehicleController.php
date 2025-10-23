<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->paginate(15);
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('admin.vehicles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'transmission'=>'required|in:manual,matic',
            'capacity'=>'required|string',
            'price'=>'required|numeric',
            'has_driver'=>'nullable|boolean',
            'image'=>'nullable|image|max:2048'
        ]);

        $data['has_driver'] = $request->has('has_driver') ? true : false;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('vehicles','public');
        }

        Vehicle::create($data);

        return redirect()->route('admin.vehicles.index')->with('success','Vehicle added.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'transmission'=>'required|in:manual,matic',
            'capacity'=>'required|string',
            'price'=>'required|numeric',
            'has_driver'=>'nullable|boolean',
            'image'=>'nullable|image|max:2048'
        ]);

        $data['has_driver'] = $request->has('has_driver') ? true : false;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('vehicles','public');
        }

        $vehicle->update($data);

        return redirect()->route('admin.vehicles.index')->with('success','Vehicle updated.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('admin.vehicles.index')->with('success','Vehicle deleted.');
    }
}
