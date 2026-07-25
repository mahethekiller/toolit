<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Tool;
use Illuminate\Http\Request;

class LoremIpsumController extends Controller
{
    public function index()
    {
        $tool = Tool::where('active', true)->where('route_name', 'tools.loremipsum')->first();
        $faqs = Faq::where('group_name', 'Lorem Ipsum Generator')->get();

        return view('tools.lorem-ipsum-generator', compact('tool', 'faqs'));
    }
}
