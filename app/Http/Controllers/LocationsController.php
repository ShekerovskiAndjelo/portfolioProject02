<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'country' => 'required',
            'area' => 'required',
            // Add validation rules for other fields as needed
        ]);

        Location::create($validatedData);

        return redirect()->route('locations.index');
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $validatedData = $request->validate([
            'country' => 'required',
            'area' => 'required',
            // Add validation rules for other fields as needed
        ]);

        $location->update($validatedData);

        return redirect()->route('locations.index');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index');
    }
}
