<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Events\ContactAdded;
use App\Jobs\SendContactEmailJob;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'text' => 'required',
            ]);

            $contact = Contact::create($validatedData);

            // Dispatch ContactAdded event after creating the contact
            event(new ContactAdded($contact));

            // Dispatch job to send contact email
            dispatch(new SendContactEmailJob($contact))->onQueue('emails');

            return response()->json([
                'message' => 'Contact stored successfully',
                'contact' => $contact,
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Error storing contact: ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to store contact',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
