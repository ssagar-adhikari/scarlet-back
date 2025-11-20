<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Story;
use App\Models\Choose;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function home()
    {
        $data['testimonials'] = Testimonial::orderBy('sequence', 'asc')->get();
        $data['portfolios'] = Portfolio::where('show_in_homepage', 1)->get();
        $data['services'] = Service::get();
        $data['choose'] = Choose::get();
        $data['about'] = AboutUs::first();
        $data['sliders'] = Slider::get();
        return view('frontend.home', compact('data'));
    }

    public function portfolio()
    {
        $portfolios = Portfolio::all();

        return view('frontend.portfolio', compact('portfolios'));
    }

    public function portfolioDetails($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        $portfolios = Portfolio::where('slug', '!=', $slug)->get();
        return view('frontend.portfolio_details', compact('portfolio', 'portfolios'));
    }

    public function about()
    {
        $aboutUs = Story::all();
        return view('frontend.about', compact('aboutUs'));
    }

    public function services()
    {
        $services = Service::all();
        return view('frontend.service', compact('services'));
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $services = Service::where('slug', '!=', $slug)->get();
        return view('frontend.service_details', compact('service', 'services'));
    }

    public function blogs()
    {
        $blogs = Blog::all();
        return view('frontend.blog', compact('blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blogs = Blog::where('slug', '!=', $slug)->get();
        return view('frontend.blog_details', compact('blog', 'blogs'));
    }

    public function contactUs()
    {
        return view('frontend.contact');
    }
    public function gallery()
    {
        $gallery = Gallery::all();
        return view('frontend.gallery', compact('gallery'));
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'topic' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
