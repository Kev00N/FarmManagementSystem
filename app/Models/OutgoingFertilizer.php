<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutgoingFertilizer extends Model 
{
    protected $fillable = [
        'fertilizer_id',
        'quantity',
    ];

    // Define the relationship with the Fertilizer model
    public function fertilizer()
    {
        return $this->belongsTo(Fertilizer::class);
    }
    public function getNameAttribute()
    {
        return $this->fertilizer->name;
    }
}
