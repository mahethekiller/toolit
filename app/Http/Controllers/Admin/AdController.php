<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->get();
        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'code' => 'required|string',
            'active' => 'boolean',
        ]);

        Ad::create($request->all());
        return redirect()->route('admin.ads.index')->with('success', '✅ Ad added successfully!');
    }

    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'code' => 'required|string',
            'active' => 'boolean',
        ]);

        $ad->update($request->all());
        return redirect()->route('admin.ads.index')->with('success', '✅ Ad updated successfully!');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('admin.ads.index')->with('success', '🗑️ Ad deleted successfully!');
    }
}
