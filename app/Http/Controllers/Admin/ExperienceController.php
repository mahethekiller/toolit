<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioExperience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = PortfolioExperience::ordered()->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'responsibilities' => 'required|array',
            'responsibilities.*' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        PortfolioExperience::create($validated);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience added successfully!');
    }

    public function edit(PortfolioExperience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, PortfolioExperience $experience)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'responsibilities' => 'required|array',
            'responsibilities.*' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience updated successfully!');
    }

    public function destroy(PortfolioExperience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience deleted successfully!');
    }

    public function toggleStatus(PortfolioExperience $experience)
    {
        $experience->update(['is_active' => !$experience->is_active]);

        $status = $experience->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Experience {$status} successfully!");
    }
}
