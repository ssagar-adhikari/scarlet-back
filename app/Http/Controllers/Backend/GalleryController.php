<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('sequence')->paginate(10);
        return view('backend.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sequence' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = ['sequence' => $request->sequence];

        if ($request->hasFile('image')) {
            $filename = time().'-'.uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/gallery'), $filename);
            $data['image'] = 'images/gallery/'.$filename;
        }

        Gallery::create($data);

        return redirect()->route('admin.gallery.index')->with('success','Gallery image added successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('backend.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'sequence' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = ['sequence' => $request->sequence];

        if ($request->hasFile('image')) {
            if($gallery->image && file_exists(public_path($gallery->image))){
                unlink(public_path($gallery->image));
            }
            $filename = time().'-'.uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/gallery'), $filename);
            $data['image'] = 'images/gallery/'.$filename;
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('success','Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        if($gallery->image && file_exists(public_path($gallery->image))){
            unlink(public_path($gallery->image));
        }
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success','Gallery deleted successfully.');
    }
}

