<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('admin.properties.index', compact('properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'price' => 'required|numeric',
            'area' => 'required|integer',
            'beds' => 'required|integer',
            'baths' => 'required|integer',
            'garage' => 'sometimes|nullable|integer',
            'image' => 'required|image|max:2048',
        ]);

        $property = new Property();
        $property->location = $request->location;
        $property->price = $request->price;
        $property->area = $request->area;
        $property->beds = $request->beds;
        $property->baths = $request->baths;
        $property->garage = $request->garage ?? 0; // default to 0 if garage is null
        if ($request->hasFile('image')) {
            $property->image = $request->file('image')->store('properties', 'public');
        }
        $property->save();

        return redirect()->route('admin.properties.index')->with('success', 'Property added successfully.');
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'location' => 'required|string',
            'price' => 'required|numeric',
            'area' => 'required|integer',
            'beds' => 'required|integer',
            'baths' => 'required|integer',
            'garage' => 'sometimes|nullable|integer',
            'image' => 'sometimes|nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($property->image);
            $property->image = $request->file('image')->store('properties', 'public');
        }

        $property->location = $request->location;
        $property->price = $request->price;
        $property->area = $request->area;
        $property->beds = $request->beds;
        $property->baths = $request->baths;
        $property->garage = $request->garage ?? 0; // default to 0 if garage is null
        $property->save();

        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        Storage::delete($property->image);
        $property->delete();

        return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully.');
    }
}