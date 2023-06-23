<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CropInput extends Model
{
    protected $primaryKey = 'crop_input_id';

    protected $fillable = ['crop_id', 'amount_in_sacs', '_token'];

    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crop_id');
    }

    public function getCropNameAttribute()
    {
        return $this->crop->crop_name;
    }

    public static function getTotalInputByCrop()
    {
        return static::query()
            ->select('crop_id', DB::raw('SUM(amount_in_sacs) as total_input'))
            ->groupBy('crop_id')
            ->get()
            ->pluck('total_input', 'crop_id');
    }
}
