<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return response()->json($testimonials);
    }

    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return response()->json($testimonial);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'location' => 'required',
            'hotel' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'image_url' => 'nullable|url',
            'name' => 'required',
        ]);

        $testimonial = Testimonial::create($validatedData);

        return response()->json([
            'message' => 'Testimonial stored successfully',
            'testimonial' => $testimonial,
        ], 201);
    }
}
