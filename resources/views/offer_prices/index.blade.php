@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Offer Prices</h1>


        <div class="mb-6">
            <a href="{{ route('offer_prices.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add Price for accommodation</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($offerPrices as $price)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-semibold mb-2">{{ $price->start_date }} - {{ $price->end_date }}</h2>
                    <p>Nights: {{ $price->nights }}</p>
                    <p>Price per Night: {{ $price->price_per_night }}</p>

                    @if($price->offer)
                        <p>Accommodation Name: {{ $price->offer->accommodation->name }}</p>
                    @endif

                    <!-- Display other price details if needed -->
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('offer_prices.show', $price) }}" class="text-blue-500 hover:underline">View Details</a>
                        <form method="POST" action="{{ route('offer_prices.destroy', $price) }}" onsubmit="return confirm('Are you sure you want to delete this offer price?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No offer prices available.</p>
            @endforelse
        </div>
    </div>
@endsection
