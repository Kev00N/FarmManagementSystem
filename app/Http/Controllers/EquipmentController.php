<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        // Retrieve all equipment
        $equipment = Equipment::all();

        // Return the index view with the equipment data
        return view('equipment.index', compact('equipment'));
    }

    public function create()
    {
        // Return the create view for creating a new equipment
        return view('equipment.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'equipment_name' => 'required',
            'type' => 'required',
            'serial' => 'required',
        ]);

        // Create a new equipment instance with the validated data
        Equipment::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('equipment.index')->with('success', 'Equipment created successfully');
    }

    public function edit(Equipment $equipment)
    {
        // Return the edit view for editing the specified equipment
        return view('equipment.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'equipment_name' => 'required',
            'type' => 'required',
            'serial' => 'required',
        ]);

        // Update the equipment with the validated data
        $equipment->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('equipment.index')->with('success', 'Equipment updated successfully');
    }

    public function destroy(Equipment $equipment)
    {
        // Delete the specified equipment
        $equipment->delete();

        // Redirect to the index page with a success message
        return redirect()->route('equipment.index')->with('success', 'Equipment deleted successfully');
    }

   
}
