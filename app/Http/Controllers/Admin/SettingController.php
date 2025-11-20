<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = PortfolioSetting::getSettings();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = PortfolioSetting::getSettings();

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'intro' => 'required|string|max:500',
            'about_me' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'social_links' => 'nullable|array',
            'social_links.*.name' => 'required|string',
            'social_links.*.url' => 'required|url',
            'social_links.*.icon' => 'required|string',
        ]);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image
            if ($settings->profile_image) {
                Storage::disk('public')->delete($settings->profile_image);
            }
            $validated['profile_image'] = $request->file('profile_image')->store('settings', 'public');
        }

        // Handle remove profile image
        if ($request->has('remove_profile_image') && $settings->profile_image) {
            Storage::disk('public')->delete($settings->profile_image);
            $validated['profile_image'] = null;
        }

        // Process social links
        if ($request->has('social_links')) {
            $socialLinks = [];
            foreach ($request->social_links as $link) {
                if (!empty($link['name']) && !empty($link['url']) && !empty($link['icon'])) {
                    $socialLinks[] = [
                        'name' => $link['name'],
                        'url' => $link['url'],
                        'icon' => $link['icon']
                    ];
                }
            }
            $validated['social_links'] = $socialLinks;
        }

        $settings->update($validated);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully!');
    }
}
