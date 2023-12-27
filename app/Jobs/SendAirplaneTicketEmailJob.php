<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\AirplaneTicket;
use App\Models\AirplaneContact;
use App\Mail\AirplaneTicketNotification;

class SendAirplaneTicketEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;

    public function __construct(AirplaneTicket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function handle()
    {
        $contactId = $this->ticket->contact_id;
        $contact = AirplaneContact::findOrFail($contactId);
        $email = $contact->email;

        $subject = 'Airplane Ticket Confirmation';
        $message = (new AirplaneTicketNotification($this->ticket))->render();

        Mail::to($email)->send(new AirplaneTicketNotification($this->ticket));

        Log::info("Airplane ticket email sent to: $email");
    }
}
