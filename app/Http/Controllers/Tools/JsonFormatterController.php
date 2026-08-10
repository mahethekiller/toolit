<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Tool;
use Illuminate\Http\Request;

class JsonFormatterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('active', true)->where('route_name', 'tools.json-formatter')->first();
        $faqs = Faq::where('group_name', 'JSON Formatter')->get();
        return view('tools.json-formatter', compact('tool', 'faqs'));
    }
}
