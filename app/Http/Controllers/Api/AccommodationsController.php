<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationsController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all();
        return response()->json(['accommodations' => $accommodations], 200);
    }

    public function show($id)
    {
        $accommodation = Accommodation::find($id);
        if (!$accommodation) {
            return response()->json(['message' => 'Accommodation not found'], 404);
        }
        return response()->json(['accommodation' => $accommodation], 200);
    }

    // Additional methods for creating, updating, deleting accommodations as needed
}
