<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirplaneTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_type',
        'from_destination',
        'to_destination',
        'from_date',
        'to_date',
        'adults',
        'kids',
        'babies',
        'class',
        'contact_id',
    ];

    public function contact()
{
    return $this->belongsTo(AirplaneContact::class);
}
}
