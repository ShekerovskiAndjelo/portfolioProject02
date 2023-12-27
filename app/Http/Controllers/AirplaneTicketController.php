<?php

namespace App\Http\Controllers;

use App\Models\AirplaneTicket;
use Illuminate\Http\Request;

class AirplaneTicketController extends Controller
{

    public function index()
{
    $tickets = AirplaneTicket::with('contact')->get();

    return view('airplane.index', compact('tickets'));
}


public function show($id)
{
    $ticket = AirplaneTicket::findOrFail($id);
    $contact = $ticket->contact;

    return view('airplane.show', compact('ticket', 'contact'));
}
}
