<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    use HasFactory;

    protected $primaryKey = 'fertilizer_id';

    protected $fillable = [
        'name',
        'description',
        'manufacturer',
    ];
}
