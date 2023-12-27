<!-- resources/views/locations/edit.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Edit Location</h1>

        <form method="POST" action="{{ route('locations.update', $location) }}" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="country" class="block text-gray-700 font-semibold mb-2">Country:</label>
                <input type="text" id="country" name="country" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ $location->country }}" required>
            </div>
            <div class="mb-4">
                <label for="area" class="block text-gray-700 font-semibold mb-2">Area:</label>
                <input type="text" id="area" name="area" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ $location->area }}" required>
            </div>
            <!-- Add other fields for location editing -->

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Location</button>
        </form>
    </div>
@endsection
