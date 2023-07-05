<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    public function index()
    {
        $livestock = Livestock::all();
        return view('livestock.index', compact('livestock'));
    }

    public function create()
    {
        return view('livestock.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required',
            'tag' => 'required',
        ]);

        Livestock::create($data);

        return redirect()->route('livestock.index')->with('success', 'Livestock created successfully.');
    }

    public function edit(Livestock $livestock)
    {
        return view('livestock.edit', compact('livestock'));
    }

    public function update(Request $request, Livestock $livestock)
    {
        $data = $request->validate([
            'type' => 'required',
            'tag' => 'required',
        ]);

        $livestock->update($data);

        return redirect()->route('livestock.index')->with('success', 'Livestock updated successfully.');
    }

    public function destroy(Livestock $livestock)
    {
        $livestock->delete();

        return redirect()->route('livestock.index')->with('success', 'Livestock deleted successfully.');
    }
}
