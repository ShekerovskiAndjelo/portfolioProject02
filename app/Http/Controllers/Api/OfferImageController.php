<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OfferImage;
use Illuminate\Http\Request;

class OfferImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offerImages = OfferImage::all();

        return response()->json([
            'offerImages' => $offerImages,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offerImage = OfferImage::find($id);

        if (!$offerImage) {
            return response()->json(['message' => 'Offer image not found'], 404);
        }

        return response()->json([
            'offerImage' => $offerImage,
        ]);
    }

    // Implement other API methods for CRUD operations as needed
}
