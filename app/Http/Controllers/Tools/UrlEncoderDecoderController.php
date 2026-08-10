<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Tool;
use Illuminate\Http\Request;

class UrlEncoderDecoderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('active', true)->where('route_name', 'tools.url-encoder-decoder')->first();
        $faqs = Faq::where('group_name', 'URL Encoder & Decoder')->get();
        return view('tools.url-encoder-decoder', compact('tool', 'faqs'));
    }
}
