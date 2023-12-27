@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Locations</h1>

        <div class="mt-4 mb-8">
            <a href="{{ route('locations.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add New Location</a>
        </div>

        <div class="flex flex-wrap -mx-4">
            @foreach($locations as $location)
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold mb-2 text-center">{{ $location->country }}</h2>
                            <p class="text-gray-600">{{ $location->area }}</p>
                            <div class="flex justify-between mt-4">
                                <a href="{{ route('locations.edit', $location) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form method="POST" action="{{ route('locations.destroy', $location) }}" onsubmit="return confirm('Are you sure you want to delete this location?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
