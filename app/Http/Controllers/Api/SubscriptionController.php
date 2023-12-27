<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:subscriptions,email',
            // Other validation rules...
        ]);

        $subscription = Subscription::create($validatedData);

        return response()->json([
            'message' => 'Subscription stored successfully',
            'subscription' => $subscription,
        ], 201);
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error storing subscription: ' . $e->getMessage());

        return response()->json([
            'message' => 'Failed to store subscription',
            'error' => $e->getMessage(),
        ], 500); // 500 status code for internal server error
    }
}

}
