@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Create Offer Price</h1>

        <form method="POST" action="{{ route('offer_prices.store') }}">
            @csrf
            <div class="mb-4">
                <label for="offer_id" class="block text-gray-700 font-semibold mb-2">Select Offer:</label>
                <select id="offer_id" name="offer_id" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    @foreach($offers as $offer)
                        <option value="{{ $offer->id }}">{{ $offer->id }} - {{ $offer->accommodation->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 font-semibold mb-2">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 font-semibold mb-2">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="nights" class="block text-gray-700 font-semibold mb-2">Nights:</label>
                <input type="number" id="nights" name="nights" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="price_per_night" class="block text-gray-700 font-semibold mb-2">Price per Night:</label>
                <input type="text" id="price_per_night" name="price_per_night" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Add other fields for creating offer price if needed -->

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create</button>
        </form>
    </div>
@endsection
