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
        ]);

        $data = $request->all();

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
        ]);

        $data = $request->all();

        $aarti->update($data);

        return redirect()->route('admin.arti.aartis.index')->with('success', 'Aarti updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $aarti = Aarti::findOrFail($id);
        $aarti->delete();

        return redirect()->route('admin.arti.aartis.index')->with('success', 'Aarti deleted successfully.');
    }
}
