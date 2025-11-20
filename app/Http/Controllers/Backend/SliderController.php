<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sequence')->get();
        return view('backend.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.slider.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sequence' => 'required|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'youtube_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/sliders'), $filename);
            $validated['image'] = 'images/sliders/' . $filename;
        }

        Slider::create($validated);
        return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'sequence' => 'required|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'youtube_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/sliders'), $filename);
            $validated['image'] = 'images/sliders/' . $filename;
        }
        $slider->update($validated);
        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully!');
    }
}
