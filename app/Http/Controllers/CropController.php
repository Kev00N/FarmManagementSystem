<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function index()
    {
        $crops = Crop::all();
        return view('crops.index', compact('crops'));
    }

    public function create()
    {
        $crop = new Crop(); // Create a new instance of Crop model
        return view('crops.create', compact('crop'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'crop_name' => 'required|string',
            'crop_type' => 'required|string',
        ]);

        Crop::create($validatedData);

        return redirect()->route('crops.index')
            ->with('success', 'Crop created successfully.');
    }

    public function edit(Crop $crop)
    {
        return view('crops.edit', compact('crop'));
    }

    public function update(Request $request, Crop $crop)
    {
        $validatedData = $request->validate([
            'crop_name' => 'required|string',
            'crop_type' => 'required|string',
        ]);

        $crop->update($validatedData);

        return redirect()->route('crops.index')
            ->with('success', 'Crop updated successfully.');
    }

    public function destroy(Crop $crop)
    {
        $crop->delete();

        return redirect()->route('crops.index')
            ->with('success', 'Crop deleted successfully.');
    }
}
