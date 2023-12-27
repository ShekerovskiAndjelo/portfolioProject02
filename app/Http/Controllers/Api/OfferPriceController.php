<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OfferPrice;
use Illuminate\Http\Request;

class OfferPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offerPrices = OfferPrice::all();

        return response()->json([
            'offerPrices' => $offerPrices,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offerPrice = OfferPrice::find($id);

        if (!$offerPrice) {
            return response()->json(['message' => 'Offer price not found'], 404);
        }

        return response()->json([
            'offerPrice' => $offerPrice,
        ]);
    }

    // Implement other API methods for CRUD operations as needed
}
