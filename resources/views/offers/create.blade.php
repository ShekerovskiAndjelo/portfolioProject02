@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-10 px-6 py-7 bg-white shadow-md rounded-md">
        <h1 class="text-2xl font-semibold mb-6">Create New Offer</h1>

        <form method="POST" action="{{ route('offers.store') }}" class="space-y-4">
            @csrf
            <!-- Location ID Dropdown -->
            <div>
                <label for="location_id" class="block text-sm font-medium text-gray-700 mb-1">Location:</label>
                <select id="location_id" name="location_id" required
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select Location</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->country }} - {{ $location->area }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Accommodation ID Dropdown -->
            <div>
                <label for="accommodation_id" class="block text-sm font-medium text-gray-700 mb-1">Accommodation:</label>
                <select id="accommodation_id" name="accommodation_id" required
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select Accommodation</option>
                    @foreach($accommodations as $accommodation)
                        <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create Offer
            </button>
        </form>
    </div>
@endsection
