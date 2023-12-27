<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type', // Assuming 'type' is either 'hotel' or 'apartment'
        'description',
        'transport',
        'distance_from_beach'
        // Add other fillable fields as needed
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
