<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    protected $primaryKey = 'crop_id';
    
    protected $fillable = [
        'crop_name',
        'crop_type',
        
    ];
    
    public function irrigationSchedules()
    {
        return $this->hasMany(IrrigationSchedule::class, 'crop_id');
    }
    
    public function fertilizerRecommendations()
    {
        return $this->hasMany(FertilizerRecommendation::class, 'crop_id');
    }
}
