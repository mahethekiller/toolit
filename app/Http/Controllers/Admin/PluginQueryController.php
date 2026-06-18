<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PluginQuery;
use Illuminate\Http\Request;

class PluginQueryController extends Controller
{
    public function index()
    {
        $queries = PluginQuery::latest()->paginate(15);
        return view('admin.plugin-queries.index', compact('queries'));
    }

    public function show(PluginQuery $pluginQuery)
    {
        // Mark as read when opened
        if ($pluginQuery->status === 'new') {
            $pluginQuery->update(['status' => 'read']);
        }

        return view('admin.plugin-queries.show', compact('pluginQuery'));
    }

    public function destroy(PluginQuery $pluginQuery)
    {
        $pluginQuery->delete();

        return redirect()->route('admin.plugin-queries.index')
            ->with('success', '🗑️ Query has been deleted successfully.');
    }
}
