<?php
namespace App\Http\Controllers;

use App\Models\CropOutput;
use Illuminate\Http\Request;

class CropOutputController extends Controller
{
    public function index()
    {
        $cropOutputs = CropOutput::all();

        return view('crop-outputs.index', compact('cropOutputs'));
    }

    public function create()
    {
        $crops = \App\Models\Crop::all();
        return view('crop-outputs.create', compact('crops'));
    }

    public function store(Request $request)
    {
        // Validate the input fields
        $validatedData = $request->validate([
            'crop_id' => 'required',
            'amount_in_sacs' => 'required|numeric',
        ]);

        // Create a new crop output
        CropOutput::create($validatedData);

        // Redirect to the crop outputs index page
        return redirect()->route('crop-outputs.index');
    }

    public function edit(CropOutput $cropOutput)
    {
        $crops = \App\Models\Crop::all();
        return view('crop-outputs.edit', compact('cropOutput', 'crops'));
    }

    public function update(Request $request, CropOutput $cropOutput)
    {
        // Validate the input fields
        $validatedData = $request->validate([
            'crop_id' => 'required',
            'amount_in_sacs' => 'required|numeric',
        ]);

        // Update the crop output
        $cropOutput->update($validatedData);

        // Redirect to the crop outputs index page
        return redirect()->route('crop-outputs.index');
    }

    public function destroy(CropOutput $cropOutput)
    {
        // Delete the crop output
        $cropOutput->delete();

        // Redirect to the crop outputs index page
        return redirect()->route('crop-outputs.index');
    }
}
