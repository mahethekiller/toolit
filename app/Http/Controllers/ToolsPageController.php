<?php

namespace App\Http\Controllers;

use App\Models\Tool;

class ToolsPageController extends Controller
{
    public function index()
    {
        $tools = Tool::where('active', true)->get();
        return view('tools.index', compact('tools'));
    }
}
