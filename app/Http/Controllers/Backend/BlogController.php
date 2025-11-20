<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('backend.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['title','description','author_name','meta_title','meta_keywords','meta_description']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $filename = time().'-'.uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/blogs'), $filename);
            $data['image'] = 'images/blogs/'.$filename;
        }

        Blog::create($data);

        return redirect()->route('admin.blog.index')->with('success','Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author_name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['title','description','author_name','meta_title','meta_keywords','meta_description']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            if($blog->image && file_exists(public_path($blog->image))){
                unlink(public_path($blog->image));
            }
            $filename = time().'-'.uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/blogs'), $filename);
            $data['image'] = 'images/blogs/'.$filename;
        }

        $blog->update($data);

        return redirect()->route('admin.blog.index')->with('success','Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if($blog->image && file_exists(public_path($blog->image))){
            unlink(public_path($blog->image));
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success','Blog deleted successfully.');
    }
}

