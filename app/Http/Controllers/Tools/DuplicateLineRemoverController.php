<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Tool;
use Illuminate\Http\Request;

class DuplicateLineRemoverController extends Controller
{
    public function index()
    {
        $tool = Tool::where('active', true)->where('route_name', 'tools.duplicate-line-remover')->first();
        $faqs = Faq::where('group_name', 'Duplicate Line Remover')->get();
        return view('tools.duplicate-line-remover', compact('tool', 'faqs'));
    }
}
