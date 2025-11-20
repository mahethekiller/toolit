<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSkill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = PortfolioSkill::ordered()->get();
        $categories = ['languages', 'frameworks', 'other'];

        return view('admin.skills.index', compact('skills', 'categories'));
    }

    public function create()
    {
        $categories = ['languages' => 'Programming Languages', 'frameworks' => 'Frameworks & Technologies', 'other' => 'Other Skills'];
        return view('admin.skills.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
            'category' => 'required|in:languages,frameworks,other',
            'type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        PortfolioSkill::create($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill added successfully!');
    }

    public function edit(PortfolioSkill $skill)
    {
        $categories = ['languages' => 'Programming Languages', 'frameworks' => 'Frameworks & Technologies', 'other' => 'Other Skills'];
        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    public function update(Request $request, PortfolioSkill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
            'category' => 'required|in:languages,frameworks,other',
            'type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully!');
    }

    public function destroy(PortfolioSkill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully!');
    }

    public function toggleStatus(PortfolioSkill $skill)
    {
        $skill->update(['is_active' => !$skill->is_active]);

        $status = $skill->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Skill {$status} successfully!");
    }
}
