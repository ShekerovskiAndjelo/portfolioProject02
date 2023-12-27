@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-6 bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Create User</h1>
        <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-semibold">Name</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-400">
            </div>

            <div>
                <label for="email" class="block font-semibold">Email</label>
                <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-400">
            </div>

            <div>
                <label for="password" class="block font-semibold">Password</label>
                <input type="password" name="password" id="password" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-400">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create User</button>
        </form>
    </div>
@endsection
