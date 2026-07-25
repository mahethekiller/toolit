<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolsPageController extends Controller
{
    public function index(Request $request)
    {
        $query = Tool::where('active', true);

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($builder) use ($q) {
                $builder->where('name', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%")
                        ->orWhere('long_description', 'like', "%{$q}%");
            });
        }

        $tools = $query->get();
        return view('tools.index', compact('tools'));
    }
}

