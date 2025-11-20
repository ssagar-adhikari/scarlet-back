<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('images')->latest()->paginate(10);

        return view('backend.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('backend.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'build_size' => 'nullable|string|max:255',
            'land_size' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'status' => 'required|in:running,completed',
            'show_in_homepage' => 'sometimes|boolean',
        ]);

        $portfolio = Portfolio::create($validated);

        // Handle images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/portfolio/'), $imageName);

                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image_path' => 'images/portfolio/' . $imageName,
                ]);
            }
        }

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio created successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        $portfolio->load('images');

        return view('backend.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255' . $portfolio->id,
            'description' => 'nullable|string',
            'build_size' => 'nullable|string|max:255',
            'land_size' => 'nullable|string|max:255',
            'budget' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'status' => 'required|in:running,completed',
            'show_in_homepage' => 'sometimes|boolean',
        ]);

        $portfolio->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/portfolio/'), $imageName);

                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image_path' => 'images/portfolio/' . $imageName,
                ]);
            }
        }

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Deleting portfolio automatically deletes its images via onDelete('cascade')
        foreach ($portfolio->images as $image) {
            if (File::exists(public_path($image->image_path))) {
                File::delete(public_path($image->image_path));
            }
        }
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio deleted successfully.');
    }

    public function destroyImage($id)
    {
        $image = PortfolioImage::findOrFail($id);
        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }
        $image->delete();

        return response()->json(['success' => true]);
    }
}
