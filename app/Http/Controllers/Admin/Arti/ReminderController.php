<?php

namespace App\Http\Controllers\Admin\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\Reminder;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReminderController extends Controller
{
    public function index(): View
    {
        $reminders = Reminder::with('user')->paginate(15);
        return view('admin.arti.reminders.index', compact('reminders'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();

        return redirect()->route('admin.arti.reminders.index')->with('success', 'Reminder deleted successfully.');
    }
}
