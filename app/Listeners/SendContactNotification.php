<?php

namespace App\Listeners;

use App\Events\ContactAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendEmailJob;
use App\Mail\ContactNotification;

class SendContactNotification implements ShouldQueue
{
    public function handle(ContactAdded $event)
    {
        $email = $event->contact->email;
        $subject = 'Thank You for Contacting Us';
        $message = (new ContactNotification($subject))->render();

        dispatch(new SendEmailJob($email, $subject, $message));
    }
}
