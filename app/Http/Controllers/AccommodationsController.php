<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationsController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all();
        return view('accommodations.index', compact('accommodations'));
    }

    public function show(Accommodation $accommodation)
    {
        return view('accommodations.show', compact('accommodation'));
    }

    public function create()
    {
        return view('accommodations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required', // Assuming 'type' is required
            'description' => 'required',
            'transport' => 'required',
            'distance_from_beach' => 'required',
            // Add validation rules for other fields as needed
        ]);

        Accommodation::create($validatedData);

        return redirect()->route('accommodations.index');
    }

    public function edit($id)
    {
        $accommodation = Accommodation::findOrFail($id); // Fetch the accommodation by its ID

        return view('accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request, Accommodation $accommodation)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required', // Assuming 'type' is required
            'description' => 'required',
            'transport' => 'required',
            'distance_from_beach' => 'required',
            // Add validation rules for other fields as needed
        ]);

        $accommodation->update($validatedData);

        return redirect()->route('accommodations.index');
    }

    public function destroy(Accommodation $accommodation)
    {
        $accommodation->delete();

        return redirect()->route('accommodations.index');
    }
}
