<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::orderBy('sequence')->paginate(10);
        return view('backend.story.index', compact('stories'));
    }

    public function create()
    {
        return view('backend.story.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:stories,title',
            'description' => 'required|string',
            'sequence' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['title','description','sequence']);

        if ($request->hasFile('image')) {
            $path = 'images/stories/';
            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), 0777, true);
            }
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $data['image'] = $path.$filename;
        }

        Story::create($data);

        return redirect()->route('admin.story.index')->with('success','Story created successfully.');
    }

    public function edit(Story $story)
    {
        return view('backend.story.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:stories,title,'.$story->id,
            'description' => 'required|string',
            'sequence' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['title','description','sequence']);

        if ($request->hasFile('image')) {
            $path = 'images/stories/';
            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), 0777, true);
            }

            if ($story->image && File::exists(public_path($story->image))) {
                File::delete(public_path($story->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path($path), $filename);
            $data['image'] = $path.$filename;
        }

        $story->update($data);

        return redirect()->route('admin.story.index')->with('success','Story updated successfully.');
    }

    public function destroy(Story $story)
    {
        if ($story->image && File::exists(public_path($story->image))) {
            File::delete(public_path($story->image));
        }

        $story->delete();
        return redirect()->route('admin.story.index')->with('success','Story deleted successfully.');
    }
}

