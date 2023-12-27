@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Offer Images</h1>


        <div class="mb-6">
            <a href="{{ route('offer_images.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add New Image</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($offerImages as $image)
                <div class="relative">
                    <div class="mb-2">
                        <img src="{{ $image->image_url }}" alt="Offer Image" class="w-full h-auto rounded-md shadow-md">
                    </div>
                    <p class="text-sm text-white bold">
                        Offer ID: {{ $image->offer_id }}
                    </p>
                    <p class="text-sm text-white bold">
                        Accommodation: {{ $image->offer->accommodation->name }}
                    </p>
                    <!-- Display other image details if needed -->

                    <div class="flex items-center justify-center space-x-4 mt-2">

                        <form action="{{ route('offer_images.destroy', $image) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-300">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
