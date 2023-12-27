<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Jobs\SendEmailJob;
use App\Events\OfferAdded;
use App\Models\Location;
use App\Models\Accommodation;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Mail\OfferNotification;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offer::with(['location', 'accommodation'])->get();
        return view('offers.index', compact('offers'));
    }

    public function show(Offer $offer)
    {
        $offer->load('prices', 'images'); // Assuming prices and images are relationships in the Offer model
        return view('offers.show', compact('offer'));
    }

    public function create()
{
    $locations = Location::all(); // Fetch all locations
    $accommodations = Accommodation::all(); // Fetch all accommodations

    return view('offers.create', compact('locations', 'accommodations'));
}

public function store(Request $request)
{
    // Validate and store the offer
    $validatedData = $request->validate([
        'location_id' => 'required',
        'accommodation_id' => 'required',
        // Other validation rules
    ]);

    $offer = new Offer();
    $offer->location_id = $validatedData['location_id'];
    $offer->accommodation_id = $validatedData['accommodation_id'];
    // Assign other fields of the offer from $validatedData

    $offer->save();

    // Dispatch OfferAdded event
    event(new OfferAdded($offer));

    // Prepare details for SendEmailJob
    $subscribers = Subscription::all();
    $subject = 'New Offer Available';
    $message = (new OfferNotification($offer))->render();

    // Dispatch SendEmailJob for each subscriber
    foreach ($subscribers as $subscriber) {
        $email = $subscriber->email;
        SendEmailJob::dispatch($email, $subject, $message)->onQueue('emails');
    }

    // Redirect or respond with success message
    return redirect()->route('offers.index')->with('success', 'Offer added successfully!');
}



    public function edit(Offer $offer)
    {
        // Fetch offer data to edit
        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        // Validate and update the offer data
        $validatedData = $request->validate([
            // Define validation rules for the submitted form fields
        ]);

        $offer->update($validatedData);

        return redirect()->route('offers.index');
    }

    public function destroy(Offer $offer)
    {
        // Delete the offer
        $offer->delete();

        return redirect()->route('offers.index');
    }
}

