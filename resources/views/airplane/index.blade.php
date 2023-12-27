@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-2xl font-semibold mb-4">Airplane Tickets</h1>

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Ticket Type</th>
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">From Destination</th>
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">To Destination</th>
                        <th class="px-4 py-2 text-left font-semibold text-sm text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2">{{ $ticket->ticket_type }}</td>
                            <td class="px-4 py-2">{{ $ticket->from_destination }}</td>
                            <td class="px-4 py-2">{{ $ticket->to_destination }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('airplane-tickets.show', $ticket->id) }}">View Ticket Details</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
