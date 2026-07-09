<?php

namespace App\Http\Controllers\Admin\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Deity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            'description' => 'required|string|max:1000',
            'image_url' => 'required_without:image_file|nullable|url|max:255',
            'image_file' => 'required_without:image_url|nullable|image|max:2048',
        ]);

        $data = $request->except(['image_file']);

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
            'description' => 'required|string|max:1000',
            'image_url' => 'required_without:image_file|nullable|url|max:255',
            'image_file' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['image_file']);

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

        return redirect()->route('admin.arti.deities.index')->with('success', 'Deity deleted successfully.');
    }
}
