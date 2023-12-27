<?php

namespace App\Listeners;

use App\Events\AirplaneTicketAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendAirplaneTicketEmail;
use App\Mail\AirplaneTicketNotification;

class SendAirplaneTicketNotification implements ShouldQueue
{
    public function handle(AirplaneTicketAdded $event)
    {
        $email = $event->ticket->email;
        $subject = 'New Airplane Ticket Notification';
        $message = (new AirplaneTicketNotification($event->ticket))->render();

        dispatch(new SendAirplaneTicketEmail($email, $subject, $message));
    }
}
