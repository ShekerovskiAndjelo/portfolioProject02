@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Create New Accommodation</h1>

        <form method="POST" action="{{ route('accommodations.store') }}" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Accommodation Name:</label>
                <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-gray-700 font-semibold mb-2">Accommodation Type:</label>
                <select id="type" name="type" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="Hotel">Hotel</option>
                    <option value="Apartment">Apartment</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description:</label>
                <textarea id="description" name="description" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="transport" class="block text-gray-700 font-semibold mb-2">Transport:</label>
                <input type="text" id="transport" name="transport" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="distance_from_beach" class="block text-gray-700 font-semibold mb-2">Distance From Beach:</label>
                <input type="text" id="distance_from_beach" name="distance_from_beach" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>
            <!-- Add other fields for accommodation creation -->

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create Accommodation</button>
        </form>
    </div>
@endsection
