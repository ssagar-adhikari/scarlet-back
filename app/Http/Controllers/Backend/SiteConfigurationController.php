<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteConfiguration;
use Illuminate\Http\Request;

class SiteConfigurationController extends Controller
{
    public function edit()
    {
        $config = SiteConfiguration::first();
        if (!$config) {
            $config = SiteConfiguration::create([
                'title' => 'Scarlet Homes',
                'email' => 'info@scarlethomes.com.au',
                'phone' => '0434 073 827',
                'address' => '133 Lethbridge Rd, Austral NSW 2179',
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'pinterest' => 'https://www.pinterest.com/',
                'map' => 'https://maps.app.goo.gl/uN7EJFLqaynqzC5D7',
                'logo' => 'images/config/logo.png',
                'meta_title' => 'Scarlet Homes',
                'meta_keywords' => 'Scarlet Homes',
                'meta_description' => 'Scarlet Homes',
            ]);
        }
        return view('backend.site-configuration.edit', compact('config'));
    }

    public function update(Request $request)
    {
        $config = SiteConfiguration::first();

        $request->validate([
            'title' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'pinterest' => 'required|string|max:255',
            'map' => 'required|string',
            // 'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('logo');

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = 'logo_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/config'), $imageName);
            $data['logo'] = 'images/config/' . $imageName;
        }

        $config->update($data);

        return redirect()->back()->with('success', 'Site Configuration updated successfully.');
    }
}
