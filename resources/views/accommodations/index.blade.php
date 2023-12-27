@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Accommodations</h1>

        <div class="mt-4 mb-8">
            <a href="{{ route('accommodations.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add New Accommodation</a>
        </div>

        <div class="flex flex-wrap -mx-4">
            @foreach($accommodations as $accommodation)
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold mb-2">{{ $accommodation->name }}</h2>
                            <p class="text-gray-600">{{ $accommodation->type }}</p>
                            <div class="flex justify-between mt-4">
                                <a href="{{ route('accommodations.edit', $accommodation) }}" class="text-blue-500 hover:underline">Edit</a>
                                <a href="{{ route('accommodations.show', $accommodation) }}" class="text-green-500 hover:underline">View Details</a>
                                <form method="POST" action="{{ route('accommodations.destroy', $accommodation) }}" onsubmit="return confirm('Are you sure you want to delete this accommodation?')">
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
