@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Offer Price Details</h1>

        <div class="bg-white rounded-md shadow-md p-4">
            @if($offerPrice->offer)
                <p><strong>Accommodation:</strong> {{ $offerPrice->offer->accommodation->name }}</p>
            @endif
            <p><strong>Offer ID:</strong> {{ $offerPrice->offer_id }}</p>
            <p><strong>Start Date:</strong> {{ $offerPrice->start_date }}</p>
            <p><strong>End Date:</strong> {{ $offerPrice->end_date }}</p>
            <p><strong>Nights:</strong> {{ $offerPrice->nights }}</p>
            <p><strong>Price per Night:</strong> {{ $offerPrice->price_per_night }}</p>



        </div>
    </div>
@endsection
