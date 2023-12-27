@extends('layouts.app')
@section('content')
<div class="py-4">
    <h1 class="text-2xl font-semibold mb-4">Subscriptions</h1>

    <div class="overflow-x-auto">
        <table class="w-full bg-white border border-gray-200">
            <!-- Table header -->
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Name</th>
                    <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Email</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table body with subscription data -->
                @forelse($subscriptions as $subscription)
                    <tr class="border-b border-gray-200">
                        <td class="px-4 py-2">{{ $subscription->name }}</td>
                        <td class="px-4 py-2">{{ $subscription->email }}</td>
                    </tr>
                @empty
                    <!-- Display a message if no subscriptions are found -->
                    <tr>
                        <td colspan="2" class="px-4 py-2 text-center text-gray-500">No subscriptions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $subscriptions->links() }}
    </div>
</div>




    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Contacts</h1>

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200">
                <!-- Table header -->
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Name</th>
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Text</th>

                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table body with contact data -->
                    @forelse($contacts as $contact)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2">{{ $contact->name }}</td>
                            <td class="px-4 py-2">{{ $contact->email }}</td>
                            <td class="px-4 py-2">{{ $contact->text }}</td>
                            <td class="px-4 py-2">
                                @if($contact->status === 'not contacted')
                                <!-- Form for updating the contact status -->
                                <form method="POST" action="{{ route('dashboard.contacts.mark-contacted', $contact->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Mark as Contacted
                                    </button>
                                </form>
                                @else
                                    Contacted
                                @endif
                            </td>
                        </tr>
                    @empty
                        <!-- Display a message if no contacts are found -->
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-center text-gray-500">No contacts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $contacts->links() }}
        </div>
    </div>


    <div>
        <h1 class="text-2xl font-semibold mb-4">User images</h1>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Location</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userImages as $image)
                    <tr class="border-b border-gray-200">
                        <td class="px-4 py-2">
                            <div class="flex items-center justify-center">
                                <img src="{{ $image->image_url }}" alt="{{ $image->location }}" class="w-20 h-auto">
                            </div>
                        </td>
                        <td class="px-4 py-2 flex items-center justify-center">{{ $image->location }}</td>
                        <td class="px-4 py-2">
                            <div class="text-center">{{ $image->status }}</div>
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex justify-center">
                                @if($image->status === 'approved')
                                <form method="POST" action="{{ route('dashboard.user-images.toggle-approval', $image->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                        Mark as Not Approved
                                    </button>
                                </form>
                                @else
                                <form method="POST" action="{{ route('dashboard.user-images.toggle-approval', $image->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                                        Approve
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $userImages->links() }}
        </div>
    </div>


    <div>
        <h1 class="text-2xl font-semibold mb-4">Testimonials</h1>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Location</th>
                        <th class="px-4 py-2">Hotel</th>
                        <th class="px-4 py-2">Rating</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2 text-center">{{ $testimonial->location }}</td>
                            <td class="px-4 py-2 text-center">{{ $testimonial->hotel }}</td>
                            <td class="px-4 py-2 text-center">{{ $testimonial->rating }}</td>
                            <td class="px-4 py-2 text-center">{{ $testimonial->status }}</td>
                            <td class="px-4 py-2 text-center">{{ $testimonial->name }}</td>
                            <td class="px-4 py-2">
                                <div class="flex justify-center">
                                    @if($testimonial->status === 'approved')
                                        <form method="POST" action="{{ route('dashboard.testimonials.toggle-approval', $testimonial->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                                Mark as Not Approved
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('dashboard.testimonials.toggle-approval', $testimonial->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                                                Approve
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $testimonials->links() }}
        </div>
    </div>




@endsection
