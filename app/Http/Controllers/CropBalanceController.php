<?php

namespace App\Http\Controllers;

use App\Models\CropBalance;
use Illuminate\Http\Request;

class CropBalanceController extends Controller
{
    public function index(Request $request)
    {
        $cropBalance = new CropBalance();
        $balances = $cropBalance->getBalances();

        return view('crop-balance.index', compact('balances'));
    }
}
