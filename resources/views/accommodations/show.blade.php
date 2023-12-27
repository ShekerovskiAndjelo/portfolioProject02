@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">{{ $accommodation->name }}</h1>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2">Accommodation Type:</h2>
                <p>{{ $accommodation->type }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2">Description:</h2>
                <p>{{ $accommodation->description }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2">Transport:</h2>
                <p>{{ $accommodation->transport }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2">Distance From Beach:</h2>
                <p>{{ $accommodation->distance_from_beach }}</p>
            </div>
        </div>
    </div>
@endsection
