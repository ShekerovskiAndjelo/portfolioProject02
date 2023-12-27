@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Airplane Ticket Details</h1>

        <div class="bg-white rounded-lg shadow-md p-4">
            <h2 class="text-lg font-semibold mb-2">Ticket Information</h2>
            <p><strong>Ticket Type:</strong> {{ $ticket->ticket_type }}</p>
            <p><strong>From Destination:</strong> {{ $ticket->from_destination }}</p>
            <p><strong>To Destination:</strong> {{ $ticket->to_destination }}</p>
            <p><strong>From Date:</strong> {{ $ticket->from_date }}</p>
            <p><strong>To Date:</strong> {{ $ticket->to_date }}</p>
            <p><strong>Adults:</strong> {{ $ticket->adults }}</p>
            <p><strong>Kids:</strong> {{ $ticket->kids }}</p>
            <p><strong>Babies:</strong> {{ $ticket->babies }}</p>
            <p><strong>Class:</strong> {{ $ticket->class }}</p>




            <!-- Other ticket information -->

            <hr class="my-4">

            <h2 class="text-lg font-semibold mb-2">Contact Information</h2>
            @if ($contact)
    <p> <strong> Contact Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
@else
    <p>No contact information available.</p>
@endif

        </div>
    </div>
@endsection
