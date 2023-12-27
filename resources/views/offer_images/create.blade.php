@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Create Offer Image</h1>

        <form method="POST" action="{{ route('offer_images.store') }}">
            @csrf
            <div>
                <label for="offer_id" class="block text-gray-700 font-semibold mb-2">Select Offer and Accommodation:</label>
                <select id="offer_id" name="offer_id" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Select an Offer and Accommodation</option>
                    @foreach($offers as $offer)
                        <option value="{{ $offer->id }}">{{ $offer->id }} - {{ $offer->accommodation->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="image_url" class="block text-gray-700 font-semibold mb-2">Image URL:</label>
                <input type="text" id="image_url" name="image_url" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Add other fields for offer image details if needed -->

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create</button>
        </form>
    </div>
@endsection
