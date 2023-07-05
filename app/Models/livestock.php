<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livestock extends Model
{
    use HasFactory;
    
    protected $primaryKey='livestock_id';

    protected $table = 'livestock';


    protected $fillable=[
        'type',
        'tag'
        
    ];
}
