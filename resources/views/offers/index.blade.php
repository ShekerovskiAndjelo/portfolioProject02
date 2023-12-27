@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">All Offers</h1>

        <div class="mb-6">
            <a href="{{ route('offers.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add New Offer</a>
        </div>

        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($offers as $offer)
                <li class="bg-white shadow-md rounded-md p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $offer->accommodation->name }}</h3>
                    <p class="text-gray-600 mb-2">Type: {{ $offer->accommodation->type }}</p>
                    <!-- Add other offer details as needed -->
                    <div class="flex justify-between">
                        <a href="{{ route('offers.show', $offer) }}" class="text-blue-500 hover:underline">View Details</a>
                        <form method="POST" action="{{ route('offers.destroy', $offer) }}" onsubmit="return confirm('Are you sure you want to delete this offer?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
