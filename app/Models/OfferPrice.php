<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'start_date',
        'end_date',
        'nights',
        'price_per_night',
        // Add other fillable fields as needed
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
