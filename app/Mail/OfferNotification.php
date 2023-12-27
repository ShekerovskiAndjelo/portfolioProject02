<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Offer;

class OfferNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $offer;

    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
    }

    public function build()
    {
        return $this->subject('New Offer Notification')
                    ->view('emails.offer_notification')
                    ->with([
                        'offer' => $this->offer,
                    ]);
    }
}
