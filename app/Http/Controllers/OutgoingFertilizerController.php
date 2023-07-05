<?php

namespace App\Http\Controllers;

use App\Models\OutgoingFertilizer;
use Illuminate\Http\Request;
use App\Models\Fertilizer;

class OutgoingFertilizerController extends Controller
{
    public function index()
    {
        $outgoingFertilizers = OutgoingFertilizer::all();
        return view('outgoing_fertilizers.index', compact('outgoingFertilizers'));
    }

    public function create()
    {
        $fertilizers = Fertilizer::all();
        return view('outgoing_fertilizers.create', ['fertilizers' => $fertilizers]);
    }

    public function store(Request $request)
    {
        // Handle storing the new outgoing fertilizer
    }

    public function show(OutgoingFertilizer $outgoing_fertilizer)
    {
        return view('outgoing_fertilizers.show', compact('outgoing_fertilizer'));
    }

    public function edit(OutgoingFertilizer $outgoing_fertilizer)
    {
        return view('outgoing_fertilizers.edit', compact('outgoing_fertilizer'));
    }

    public function update(Request $request, OutgoingFertilizer $outgoing_fertilizer)
    {
        // Handle updating the outgoing fertilizer
    }

    public function destroy(OutgoingFertilizer $outgoing_fertilizer)
    {
        // Handle deleting the outgoing fertilizer
    }
}
