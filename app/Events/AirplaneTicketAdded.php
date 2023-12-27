<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\AirplaneTicket;

class AirplaneTicketAdded
{
    use Dispatchable, SerializesModels;

    public $airplaneTicket;

    public function __construct(AirplaneTicket $airplaneTicket)
    {
        $this->airplaneTicket = $airplaneTicket;
    }
}
