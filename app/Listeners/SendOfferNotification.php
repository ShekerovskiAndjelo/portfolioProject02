<?php

namespace App\Listeners;

use App\Events\OfferAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendEmailJob;
use App\Models\Subscription;
use App\Mail\OfferNotification;

class SendOfferNotification implements ShouldQueue
{
    public function handle(OfferAdded $event)
    {
        $subscribers = Subscription::all();

        foreach ($subscribers as $subscriber) {
            $email = $subscriber->email;
            $subject = 'New Offer Available';
            $message = (new OfferNotification($event->offer))->render();

            dispatch(new SendEmailJob($email, $subject, $message));
        }
    }
}
