<?php

namespace App\Http\Controllers;

use App\Models\CropDifference;
use Illuminate\Http\Request;

class CropDifferenceController extends Controller
{
    public function index()
    {
        $differences = CropDifference::getDifferenceByCrop();

        return view('crop-differences.index', ['differences' => $differences]);
    }
}
