<?php

namespace App\Http\Controllers;

use App\Models\CropInput;
use Illuminate\Http\Request;

class CropInputController extends Controller
{
    public function index()
    {
        $cropInputs = CropInput::all();
        return view('crop-inputs.index', compact('cropInputs'));
    }

    public function create()
    {
        $crops = \App\Models\Crop::all();
        return view('crop-inputs.create', compact('crops'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'crop_id' => 'required',
            'amount_in_sacs' => 'required',
            '_token' => 'required',
        ]);

        CropInput::create($validatedData);

        return redirect()->route('crop-inputs.index')->with('success', 'Crop input created successfully.');
    }

    public function show($id)
    {
        $cropInput = CropInput::findOrFail($id);
        return view('crop-inputs.show', compact('cropInput'));
    }

    public function edit($id)
    {
        $crops = \App\Models\Crop::all();
        return view('crop-inputs.create', compact('crops'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'crop_id' => 'required',
            'amount_in_sacs' => 'required',
            '_token' => 'required',
        ]);

        $cropInput = CropInput::findOrFail($id);
        $cropInput->update($validatedData);

        return redirect()->route('crop-inputs.index')->with('success', 'Crop input updated successfully.');
    }

    public function destroy($id)
    {
        $cropInput = CropInput::findOrFail($id);
        $cropInput->delete();

        return redirect()->route('crop-inputs.index')->with('success', 'Crop input deleted successfully.');
    }
}
