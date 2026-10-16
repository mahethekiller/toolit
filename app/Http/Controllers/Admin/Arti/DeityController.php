<?php

namespace App\Http\Controllers\Admin\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Deity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Str;

class DeityController extends Controller
{
    public function index(): View
    {
        $deities = Deity::paginate(10);
        return view('admin.arti.deities.index', compact('deities'));
    }

    public function create(): View
    {
        return view('admin.arti.deities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:arti_deities',
            'slug' => 'nullable|string|max:255|unique:arti_deities,slug',
            'name_devanagari' => 'nullable|string|max:255',
            'title_sub' => 'nullable|string|max:255',
            'day_of_week' => 'nullable|string|max:50',
            'day_hindi' => 'nullable|string|max:50',
            'theme_color' => 'nullable|string|max:50',
            'accent_color' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:50',
            'description' => 'required|string|max:1000',
            'image_url' => 'required_without:image_file|nullable|string|max:255',
            'image_file' => 'required_without:image_url|nullable|image|max:2048',
        ]);

        $data = $request->except(['image_file']);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/deities', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        Deity::create($data);

        return redirect()->route('admin.arti.deities.index')->with('success', 'Deity created successfully.');
    }

    public function edit(int $id): View
    {
        $deity = Deity::findOrFail($id);
        return view('admin.arti.deities.edit', compact('deity'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $deity = Deity::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:arti_deities,name,' . $id,
            'slug' => 'nullable|string|max:255|unique:arti_deities,slug,' . $id,
            'name_devanagari' => 'nullable|string|max:255',
            'title_sub' => 'nullable|string|max:255',
            'day_of_week' => 'nullable|string|max:50',
            'day_hindi' => 'nullable|string|max:50',
            'theme_color' => 'nullable|string|max:50',
            'accent_color' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:50',
            'description' => 'required|string|max:1000',
            'image_url' => 'required_without:image_file|nullable|string|max:255',
            'image_file' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['image_file']);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/deities', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $deity->update($data);

        return redirect()->route('admin.arti.deities.index')->with('success', 'Deity updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $deity = Deity::findOrFail($id);
        $deity->delete();

        return redirect()->back()->with('success', 'Deity deleted successfully.');
    }
}
