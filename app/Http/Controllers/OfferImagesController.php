<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfferImage;
use App\Models\Offer;
use App\Models\Accommodation;
use App\Models\Location;

class OfferImagesController extends Controller
{
    public function index()
    {
        $offerImages = OfferImage::all();
        return view('offer_images.index', compact('offerImages'));
    }

    public function show(OfferImage $offerImage)
    {
        return view('offer_images.show', compact('offerImage'));
    }

    public function create()
{
    $offers = Offer::with('accommodation')->get();
    $accommodations = Accommodation::all(); // Fetch accommodations
    $locations = Location::all(); // Fetch locations

    return view('offer_images.create', compact('offers', 'accommodations', 'locations'));
}



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'offer_id' => 'required',
            'image_url' => 'required|url',
            // Add validation rules for other fields as needed
        ]);

        OfferImage::create($validatedData);

        return redirect()->route('offer_images.index');
    }

    public function edit(OfferImage $offerImage)
    {
        return view('offer_images.edit', compact('offerImage'));
    }

    public function update(Request $request, OfferImage $offerImage)
    {
        $validatedData = $request->validate([
            'offer_id' => 'required',
            'image_url' => 'required|url',
            // Add validation rules for other fields as needed
        ]);

        $offerImage->update($validatedData);

        return redirect()->route('offer_images.index');
    }

    public function destroy(OfferImage $offerImage)
    {
        $offerImage->delete();

        return redirect()->route('offer_images.index');
    }
}
