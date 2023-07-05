<?php

namespace App\Http\Controllers;

use App\Models\Fertilizer;
use Illuminate\Http\Request;

class FertilizerController extends Controller
{
    public function index()
    {
        $fertilizers = Fertilizer::all();
        return view('fertilizers.index', compact('fertilizers'));
    }

    public function create()
    {
        return view('fertilizers.create');
    }

    public function store(Request $request)
    {
        $fertilizer = Fertilizer::create($request->all());
        return redirect()->route('fertilizers.index');
    }

    public function show(Fertilizer $fertilizer)
    {
        return view('fertilizers.show', compact('fertilizer'));
    }

    public function edit(Fertilizer $fertilizer)
    {
        return view('fertilizers.edit', compact('fertilizer'));
    }

    public function update(Request $request, Fertilizer $fertilizer)
    {
        $fertilizer->update($request->all());
        return redirect()->route('fertilizers.index');
    }

    public function destroy(Fertilizer $fertilizer)
    {
        $fertilizer->delete();
        return redirect()->route('fertilizers.index');
    }
}
