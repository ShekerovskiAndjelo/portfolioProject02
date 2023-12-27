@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">{{ $offer->accommodation->name }} Details</h1>

        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Accommodation Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <p><strong>Type:</strong> {{ $offer->accommodation->type }}</p>
                </div>
                <div>
                    <p><strong>Description:</strong> {{ $offer->accommodation->description }}</p>
                </div>
                <div>
                    <p><strong>Distance from Beach:</strong> {{ $offer->accommodation->distance_from_beach }}</p>
                </div>
                <div>
                    <p><strong>Transport:</strong> {{ $offer->accommodation->transport }}</p>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Prices</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-md overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">Start Date</th>
                            <th class="px-4 py-2">End Date</th>
                            <th class="px-4 py-2">Nights</th>
                            <th class="px-4 py-2">Price per Night</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offer->prices as $price)
                            <tr>
                                <td class="border px-4 py-2">{{ $price->start_date }}</td>
                                <td class="border px-4 py-2">{{ $price->end_date }}</td>
                                <td class="border px-4 py-2">{{ $price->nights }}</td>
                                <td class="border px-4 py-2">{{ $price->price_per_night }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Images</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($offer->images as $image)
                    <img src="{{ $image->image_url }}" alt="Offer Image" class="w-full h-auto rounded-md shadow-md">
                @endforeach
            </div>
        </div>

        <!-- Add other offer details as needed -->
    </div>
@endsection
