<?php

namespace App\Http\Controllers;

use App\Models\OfferPrice;
use App\Models\Offer;

use Illuminate\Http\Request;

class OfferPricesController extends Controller
{
    public function index()
    {
        $offerPrices = OfferPrice::all();
        return view('offer_prices.index', compact('offerPrices'));
    }

    public function show(OfferPrice $offerPrice)
    {
        return view('offer_prices.show', compact('offerPrice'));
    }

    public function create()
{
    $offers = Offer::with('accommodation')->get();

    return view('offer_prices.create', compact('offers'));
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'offer_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'nights' => 'required|integer',
            'price_per_night' => 'required|numeric',
            // Add validation rules for other fields as needed
        ]);

        OfferPrice::create($validatedData);

        return redirect()->route('offer_prices.index');
    }

    public function edit(OfferPrice $offerPrice)
    {
        return view('offer_prices.edit', compact('offerPrice'));
    }

    public function update(Request $request, OfferPrice $offerPrice)
    {
        $validatedData = $request->validate([
            'offer_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'nights' => 'required|integer',
            'price_per_night' => 'required|numeric',
            // Add validation rules for other fields as needed
        ]);

        $offerPrice->update($validatedData);

        return redirect()->route('offer_prices.index');
    }

    public function destroy(OfferPrice $offerPrice)
    {
        $offerPrice->delete();

        return redirect()->route('offer_prices.index');
    }
}
