<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CropOutput extends Model
{
    protected $primaryKey = 'crop_output_id';
    protected $fillable = ['crop_id', 'amount_in_sacs'];

    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crop_id');
    }

    public function getCropNameAttribute()
    {
        return $this->crop->crop_name;
    }

    
}
