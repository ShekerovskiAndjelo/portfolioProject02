@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">User List</h1>

        <div class="mb-4">
            @auth
                @if(auth()->user()->role === 'superadmin')
                    <a href="{{ route('users.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Add New User</a>
                @endif
            @endauth
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Name</th>
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
