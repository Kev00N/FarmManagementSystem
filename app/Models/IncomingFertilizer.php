<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingFertilizer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'fertilizer_id',
        'quantity',
        'price_per_unit',
    ];
   

    public function fertilizer()
    {
        return $this->belongsTo(Fertilizer::class, 'fertilizer_id');
    }

    public function getNameAttribute()
    {
        
        return $this->fertilizer->name;
    }
}
