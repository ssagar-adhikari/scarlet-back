<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Choose;

class ChooseController extends Controller
{
    public function index()
    {
        $chooses = Choose::latest()->get();
        return view('backend.choose.index', compact('chooses'));
    }

    public function create()
    {
        return view('backend.choose.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
        ]);

        Choose::create($validated);

        return redirect()->route('admin.choose.index')->with('success', 'Choose item created successfully!');
    }

    public function edit(Choose $choose)
    {
        return view('backend.choose.edit', compact('choose'));
    }

    public function update(Request $request, Choose $choose)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
        ]);

        $choose->update($validated);

        return redirect()->route('admin.choose.index')->with('success', 'Choose item updated successfully!');
    }

    public function destroy(Choose $choose)
    {
        $choose->delete();
        return redirect()->route('admin.choose.index')->with('success', 'Choose item deleted successfully!');
    }
}
