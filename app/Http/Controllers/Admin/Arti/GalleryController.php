<?php

namespace App\Http\Controllers\Admin\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Deity;
use App\Models\Arti\GalleryImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $images = GalleryImage::with('deity')->paginate(10);
        return view('admin.arti.gallery.index', compact('images'));
    }

    public function create(): View
    {
        $deities = Deity::all();
        return view('admin.arti.gallery.create', compact('deities'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'deity_id' => 'required|exists:arti_deities,id',
            'title' => 'required|string|max:255',
            'image_url' => 'required_without:image_file|nullable|url|max:255',
            'image_file' => 'required_without:image_url|nullable|image|max:2048',
            'download_count' => 'sometimes|integer|min:0',
        ]);

        $data = $request->except(['image_file']);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/gallery', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        GalleryImage::create($data);

        return redirect()->route('admin.arti.gallery.index')->with('success', 'Wallpaper created successfully.');
    }

    public function edit(int $id): View
    {
        $image = GalleryImage::findOrFail($id);
        $deities = Deity::all();
        return view('admin.arti.gallery.edit', compact('image', 'deities'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $image = GalleryImage::findOrFail($id);

        $request->validate([
            'deity_id' => 'required|exists:arti_deities,id',
            'title' => 'required|string|max:255',
            'image_url' => 'required_without:image_file|nullable|url|max:255',
            'image_file' => 'nullable|image|max:2048',
            'download_count' => 'required|integer|min:0',
        ]);

        $data = $request->except(['image_file']);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/gallery', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $image->update($data);

        return redirect()->route('admin.arti.gallery.index')->with('success', 'Wallpaper updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $image = GalleryImage::findOrFail($id);
        $image->delete();

        return redirect()->route('admin.arti.gallery.index')->with('success', 'Wallpaper deleted successfully.');
    }
}
