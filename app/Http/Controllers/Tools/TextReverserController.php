<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Tool;
use Illuminate\Http\Request;

class TextReverserController extends Controller
{
    public function index()
    {

        $tool = Tool::where('active', true)->where('route_name', 'tools.textreverser')->first();
        $faqs = Faq::where('group_name', 'Text Reverser')->get();
        return view('tools.text-reverser', compact('tool', 'faqs'));
    }

    public function process(Request $request)
    {
        $text = $request->input('text');
        $reversed = strrev($text);

        return response()->json(['reversed' => $reversed]);
    }
}

