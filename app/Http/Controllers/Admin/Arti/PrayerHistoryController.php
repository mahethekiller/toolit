<?php

namespace App\Http\Controllers\Admin\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\PrayerHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PrayerHistoryController extends Controller
{
    public function index(): View
    {
        $histories = PrayerHistory::with(['user', 'aarti'])->orderBy('played_at', 'desc')->paginate(15);
        return view('admin.arti.histories.index', compact('histories'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $history = PrayerHistory::findOrFail($id);
        $history->delete();

        return redirect()->route('admin.arti.histories.index')->with('success', 'Prayer history log deleted successfully.');
    }
}
