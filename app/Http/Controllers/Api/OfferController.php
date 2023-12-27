<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::with(['accommodation', 'location', 'prices', 'images'])->get();

        return response()->json([
            'offers' => $offers,
        ]);
    }
    // Implement other API methods as needed

    public function show($id)
{
    $offer = Offer::with(['accommodation', 'location', 'prices', 'images'])
                    ->find($id);

    if (!$offer) {
        return response()->json(['message' => 'Offer not found'], 404);
    }

    return response()->json(['offer' => $offer]);
}


}
