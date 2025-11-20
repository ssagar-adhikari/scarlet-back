<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function edit()
    {
        $about = AboutUs::first();

        // If no record exists, create one empty record
        if (!$about) {
            $about = AboutUs::create([
                'title' => 'About Our Company',
                'description' => 'This is a placeholder about us description.',
                'image' => 'images/about_us/placeholder.png',
            ]);
        }

        return view('backend.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutUs::first();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/about_us'), $imageName);
            $data['image'] = 'images/about_us/' . $imageName;
        }

        $about->update($data);

        return redirect()->back()->with('success', 'About Us updated successfully.');
    }
}
