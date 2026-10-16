<?php

namespace App\Http\Controllers\Admin\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Aarti;
use App\Models\Arti\Deity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AartiController extends Controller
{
    public function index(Request $request): View
    {
        $query = Aarti::with('deity');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('subtitle', 'like', "%{$search}%")
                  ->orWhere('lyrics', 'like', "%{$search}%")
                  ->orWhere('lyrics_hinglish', 'like', "%{$search}%")
                  ->orWhere('lyrics_hindi_plain', 'like', "%{$search}%");
            });
        }

        if ($request->filled('deity_id')) {
            $query->where('deity_id', $request->input('deity_id'));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status === 'active') {
                $query->where('is_active', true);
            } elseif ($status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        if ($request->filled('media')) {
            $media = $request->input('media');
            if ($media === 'has_audio') {
                $query->whereNotNull('audio_url')->where('audio_url', '!=', '');
            } elseif ($media === 'no_audio') {
                $query->where(function ($q) {
                    $q->whereNull('audio_url')->orWhere('audio_url', '');
                });
            } elseif ($media === 'has_video') {
                $query->whereNotNull('video_url')->where('video_url', '!=', '');
            } elseif ($media === 'no_video') {
                $query->where(function ($q) {
                    $q->whereNull('video_url')->orWhere('video_url', '');
                });
            }
        }

        $aartis = $query->orderByDesc('is_active')->latest('id')->paginate(15)->withQueryString();
        $deities = Deity::orderBy('name')->get();
        $categories = Aarti::whereNotNull('category')->where('category', '!=', '')->distinct()->orderBy('category')->pluck('category');

        return view('admin.arti.aartis.index', compact('aartis', 'deities', 'categories'));
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
            'title_devanagari' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:arti_aartis,slug',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'deity_name' => 'nullable|string|max:255',
            'deity_devanagari' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:2048',
            'duration' => 'nullable|string|max:255',
            'duration_minutes' => 'nullable|integer',
            'timing' => 'nullable|string|max:255',
            'timing_devanagari' => 'nullable|string|max:255',
            'significance' => 'nullable|string',
            'significance_devanagari' => 'nullable|string',
            'meaning_short' => 'nullable|string',
            'audio_url' => 'nullable|string|max:255',
            'video_url' => 'nullable|string|max:255',
            'lyrics' => 'required|string',
            'lyrics_hinglish' => 'nullable|string',
            'lyrics_hindi_plain' => 'nullable|string',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data = $request->except(['image_file']);
        $data['is_active'] = $request->has('is_active');
        $data['is_popular'] = $request->has('is_popular');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($request->title);
        }

        $deity = Deity::find($request->deity_id);
        if ($deity) {
            if (empty($data['deity_name'])) {
                $data['deity_name'] = $deity->name;
            }
            if (empty($data['deity_devanagari'])) {
                $data['deity_devanagari'] = $deity->name_devanagari;
            }
        }

        if (empty($data['subtitle'])) {
            $data['subtitle'] = ($data['deity_name'] ?? '') . ' • ' . ($request->timing ?? 'Daily Aarti');
        }

        if (empty($data['duration'])) {
            $data['duration'] = !empty($data['duration_minutes']) ? ($data['duration_minutes'] . ' min') : '3 min';
        }

        if (empty($data['lyrics_hindi_plain'])) {
            $data['lyrics_hindi_plain'] = $data['lyrics'];
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/aartis', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

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
            'title_devanagari' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:arti_aartis,slug,' . $id,
            'subtitle' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'deity_name' => 'nullable|string|max:255',
            'deity_devanagari' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:2048',
            'duration' => 'nullable|string|max:255',
            'duration_minutes' => 'nullable|integer',
            'timing' => 'nullable|string|max:255',
            'timing_devanagari' => 'nullable|string|max:255',
            'significance' => 'nullable|string',
            'significance_devanagari' => 'nullable|string',
            'meaning_short' => 'nullable|string',
            'audio_url' => 'nullable|string|max:255',
            'video_url' => 'nullable|string|max:255',
            'lyrics' => 'required|string',
            'lyrics_hinglish' => 'nullable|string',
            'lyrics_hindi_plain' => 'nullable|string',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data = $request->except(['image_file']);
        $data['is_active'] = $request->has('is_active');
        $data['is_popular'] = $request->has('is_popular');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($request->title);
        }

        $deity = Deity::find($request->deity_id);
        if ($deity) {
            if (empty($data['deity_name'])) {
                $data['deity_name'] = $deity->name;
            }
            if (empty($data['deity_devanagari'])) {
                $data['deity_devanagari'] = $deity->name_devanagari;
            }
        }

        if (empty($data['subtitle'])) {
            $data['subtitle'] = ($data['deity_name'] ?? '') . ' • ' . ($request->timing ?? 'Daily Aarti');
        }

        if (empty($data['duration'])) {
            $data['duration'] = !empty($data['duration_minutes']) ? ($data['duration_minutes'] . ' min') : '3 min';
        }

        if (empty($data['lyrics_hindi_plain'])) {
            $data['lyrics_hindi_plain'] = $data['lyrics'];
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/aartis', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $aarti->update($data);

        return redirect()->route('admin.arti.aartis.index')->with('success', 'Aarti updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $aarti = Aarti::findOrFail($id);
        $aarti->delete();

        return redirect()->back()->with('success', 'Aarti deleted successfully.');
    }

    public function bulkToggle(Request $request): RedirectResponse
    {
        $request->validate([
            'aarti_ids' => 'required|array',
            'aarti_ids.*' => 'exists:arti_aartis,id',
            'action' => 'required|in:enable,disable,delete'
        ]);

        if ($request->action === 'delete') {
            $count = count($request->aarti_ids);
            Aarti::whereIn('id', $request->aarti_ids)->delete();
            return redirect()->back()->with('success', "{$count} selected " . ($count === 1 ? 'aarti has' : 'aartis have') . " been deleted successfully.");
        }

        $isActive = $request->action === 'enable';

        Aarti::whereIn('id', $request->aarti_ids)->update(['is_active' => $isActive]);

        $statusText = $isActive ? 'enabled' : 'disabled';
        return redirect()->back()->with('success', "Selected aartis have been {$statusText}.");
    }
}
