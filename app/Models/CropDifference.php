<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CropDifference extends Model
{
    use HasFactory;

    public static function getDifferenceByCrop()
    {
        return DB::table('crop_outputs')
            ->join('crop_inputs', 'crop_outputs.crop_id', '=', 'crop_inputs.crop_id')
            ->join('crops', 'crops.crop_id', '=', 'crop_outputs.crop_id')
            ->select('crops.crop_id', 'crops.crop_name', 'crop_outputs.amount_in_sacs as total_output', 'crop_inputs.amount_in_sacs as total_input', DB::raw('crop_inputs.amount_in_sacs - crop_outputs.amount_in_sacs as difference'))
            ->groupBy('crops.crop_id', 'crops.crop_name', 'crop_outputs.amount_in_sacs', 'crop_inputs.amount_in_sacs')
            ->get();
    }
}
