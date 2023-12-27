<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AirplaneContact;

class AirplaneContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            // Add other validation rules as needed
        ]);

        $contact = AirplaneContact::create($validatedData);

        return response()->json([
            'message' => 'Airplane contact stored successfully',
            'contact' => $contact,
        ], 201);
    }
    // Add other API methods as needed
}
