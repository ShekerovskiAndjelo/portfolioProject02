<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'accommodation_id']; // Add other fillable fields as needed

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function accommodation() {
        return $this->belongsTo(Accommodation::class);
    }

    public function images() {
        return $this->hasMany(OfferImage::class);
    }

    public function prices() {
        return $this->hasMany(OfferPrice::class);
    }
}
