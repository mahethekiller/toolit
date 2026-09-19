<?php

namespace App\Http\Controllers\Admin\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Aarti;
use App\Models\Arti\Deity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AartiController extends Controller
{
    public function index(): View
    {
        $aartis = Aarti::with('deity')->paginate(10);
        return view('admin.arti.aartis.index', compact('aartis'));
    }

    public function create(): View
    {
        $deities = Deity::all();
        return view('admin.arti.aartis.create', compact('deities'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'deity_id' => 'required|exists:arti_deities,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'audio_url' => 'required|url|max:255',
            'video_url' => 'required|string|max:255',
            'lyrics' => 'required|string',
            'lyrics_hinglish' => 'nullable|string',
            'lyrics_hindi_plain' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        Aarti::create($data);

        return redirect()->route('admin.arti.aartis.index')->with('success', 'Aarti created successfully.');
    }

    public function edit(int $id): View
    {
        $aarti = Aarti::findOrFail($id);
        $deities = Deity::all();
        return view('admin.arti.aartis.edit', compact('aarti', 'deities'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $aarti = Aarti::findOrFail($id);

        $request->validate([
            'deity_id' => 'required|exists:arti_deities,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'audio_url' => 'required|url|max:255',
            'video_url' => 'required|string|max:255',
            'lyrics' => 'required|string',
            'lyrics_hinglish' => 'nullable|string',
            'lyrics_hindi_plain' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $aarti->update($data);

        return redirect()->route('admin.arti.aartis.index')->with('success', 'Aarti updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $aarti = Aarti::findOrFail($id);
        $aarti->delete();

        return redirect()->route('admin.arti.aartis.index')->with('success', 'Aarti deleted successfully.');
    }

    public function bulkToggle(Request $request): RedirectResponse
    {
        $request->validate([
            'aarti_ids' => 'required|array',
            'aarti_ids.*' => 'exists:arti_aartis,id',
            'action' => 'required|in:enable,disable'
        ]);

        $isActive = $request->action === 'enable';

        Aarti::whereIn('id', $request->aarti_ids)->update(['is_active' => $isActive]);

        $statusText = $isActive ? 'enabled' : 'disabled';
        return redirect()->route('admin.arti.aartis.index')->with('success', "Selected aartis have been {$statusText}.");
    }
}
