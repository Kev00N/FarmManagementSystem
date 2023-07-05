<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CropBalance extends Model
{
    protected $table = 'crops'; 
    
    public function getBalances()
    {
        $query = "
            SELECT
                c.crop_id,
                c.crop_name,
                COALESCE(ci.total_input, 0) AS total_input,
                COALESCE(co.total_output, 0) AS total_output,
                COALESCE(ci.total_input, 0) - COALESCE(co.total_output, 0) AS balance
            FROM
                crops AS c
            LEFT JOIN
                (SELECT
                    crop_id,
                    SUM(amount_in_sacs) AS total_input
                FROM
                    crop_inputs
                GROUP BY
                    crop_id) AS ci ON c.crop_id = ci.crop_id
            LEFT JOIN
                (SELECT
                    crop_id,
                    SUM(amount_in_sacs) AS total_output
                FROM
                    crop_outputs
                GROUP BY
                    crop_id) AS co ON c.crop_id = co.crop_id
            ORDER BY
                c.crop_id;
        ";

        $results = DB::select($query);
        
        foreach ($results as $result) {
            $totalInput = $result->total_input;
            $totalOutput = $result->total_output;
            $balance = $result->balance;            
        }

        return $results;
    }
    
}
