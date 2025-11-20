<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sequence')->paginate(10);
        return view('backend.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('backend.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sequence' => 'required|integer',
        ]);

        Testimonial::create($request->only('name','description','sequence'));

        return redirect()->route('admin.testimonial.index')->with('success','Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sequence' => 'required|integer',
        ]);

        $testimonial->update($request->only('name','description','sequence'));

        return redirect()->route('admin.testimonial.index')->with('success','Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('success','Testimonial deleted successfully.');
    }
}


