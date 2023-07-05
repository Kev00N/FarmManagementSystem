<?php

namespace App\Http\Controllers;

use App\Models\IncomingFertilizer;
use Illuminate\Http\Request;

class IncomingFertilizerController extends Controller
{
    public function index()
    {
        $incomingFertilizers = IncomingFertilizer::all();

        return view('incoming_fertilizers.index', compact('incomingFertilizers'));
    }

    public function create()
    {
        $fertilizers = \App\Models\Fertilizer::all();

        return view('incoming_fertilizers.create', compact('fertilizers'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fertilizer_id' => 'required|exists:fertilizers,fertilizer_id',
            'quantity' => 'required|integer',
            'price_per_unit' => 'required|numeric',
        ]);

        IncomingFertilizer::create($validatedData);

        return redirect()->route('incoming_fertilizers.index')->with('success', 'Incoming fertilizer record created successfully.');
    }

    public function edit(IncomingFertilizer $incomingFertilizer)
    {
        $fertilizers = \App\Models\Fertilizer::all();

        return view('incoming_fertilizers.edit', compact('incomingFertilizer', 'fertilizers'));
    }


    public function update(Request $request, IncomingFertilizer $incomingFertilizer)
    {
        $validatedData = $request->validate([
            'fertilizer_id' => 'required|exists:fertilizers,fertilizer_id',
            'quantity' => 'required|integer',
            'price_per_unit' => 'required|numeric',
        ]);

        $incomingFertilizer->update($validatedData);

        return redirect()->route('incoming_fertilizers.index')->with('success', 'Incoming fertilizer record updated successfully.');
    }

    public function destroy(IncomingFertilizer $incomingFertilizer)
    {
        $incomingFertilizer->delete();

        return redirect()->route('incoming_fertilizers.index')->with('success', 'Incoming fertilizer record deleted successfully.');
    }
}
