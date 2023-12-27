<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Contact;
use App\Models\UserImage;
use App\Models\Testimonial;


class DashboardController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::paginate(5); // Change the number per page as needed
        $contacts = Contact::paginate(5);
        $userImages = UserImage::paginate(5);
        $testimonials = Testimonial::paginate(5);

        return view('dashboard', compact('subscriptions', 'contacts', 'userImages', 'testimonials'));
    }


    public function markContacted($id)
{
    try {
        $contact = Contact::findOrFail($id);
        $contact->status = 'contacted';
        $contact->save();

        return redirect()->back()->with('success', 'Contact marked as contacted successfully');
    } catch (\Exception $e) {
        \Log::error('Error marking contact as contacted: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to mark contact as contacted');
    }
}




public function approveImage(Request $request, $id)
    {
        $image = UserImage::findOrFail($id);

        // Toggle the status
        $image->status = ($image->status === 'approved') ? 'not approved' : 'approved';

        $image->save();

        return redirect()->back()->with('success', 'Image status updated successfully.');
    }


    public function toggleApproval($id)
{
    $testimonial = Testimonial::findOrFail($id);
    $testimonial->status = ($testimonial->status === 'approved') ? 'not approved' : 'approved';
    $testimonial->save();

    return redirect()->back();
}

}
