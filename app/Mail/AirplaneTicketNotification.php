<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\AirplaneTicket;

class AirplaneTicketNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $contact;

    public function __construct(AirplaneTicket $ticket)
    {
        $this->ticket = $ticket;
        $this->contact = $ticket->contact; // Retrieve the associated contact
    }

    public function build()
    {
        return $this->subject('New Airplane Ticket Notification')
                    ->view('emails.airplane_ticket_notification')
                    ->with([
                        'ticket' => $this->ticket,
                        'contact' => $this->contact, // Pass the contact to the view
                    ]);
    }
}
