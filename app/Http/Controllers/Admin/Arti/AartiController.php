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
            'lyrics' => ['required', 'string', function ($attribute, $value, $fail) {
                $decoded = json_decode($value, true);
                if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
                    $fail('The lyrics must be a valid JSON array.');
                }
            }],
        ]);

        $data = $request->all();
        $data['lyrics'] = json_decode($request->lyrics, true);

        Aarti::create($data);

        return redirect()->route('admin.arti.aartis.index')->with('success', 'Aarti created successfully.');
    }

    public function edit(int $id): View
    {
        $aarti = Aarti::findOrFail($id);
        $deities = Deity::all();
        $lyricsJson = json_encode($aarti->lyrics, JSON_PRETTY_PRINT);
        return view('admin.arti.aartis.edit', compact('aarti', 'deities', 'lyricsJson'));
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
            'lyrics' => ['required', 'string', function ($attribute, $value, $fail) {
                $decoded = json_decode($value, true);
                if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
                    $fail('The lyrics must be a valid JSON array.');
                }
            }],
        ]);

        $data = $request->all();
        $data['lyrics'] = json_decode($request->lyrics, true);

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
