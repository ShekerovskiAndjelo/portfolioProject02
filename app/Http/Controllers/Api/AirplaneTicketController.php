<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AirplaneTicket;
use App\Jobs\SendAirplaneTicketEmailJob;

class AirplaneTicketController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'ticket_type' => 'required|in:one way,return',
                'from_destination' => 'required',
                'to_destination' => 'required',
                'from_date' => 'required|date',
                'to_date' => 'required|date',
                'adults' => 'required|integer',
                'kids' => 'integer',
                'babies' => 'integer',
                'class' => 'required|in:economic,business',
                'contact_id' => 'required|exists:airplane_contacts,id',
            ]);

            $ticket = AirplaneTicket::create($validatedData);

            // Dispatch job to send airplane ticket email
            dispatch(new SendAirplaneTicketEmailJob($ticket))->onQueue('airplane');

            return response()->json([
                'message' => 'Airplane ticket stored successfully',
                'ticket' => $ticket,
            ], 201);
        } catch (\Exception $e) {
            // Log the error
            // Log::error('Error storing airplane ticket: ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to store airplane ticket',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
