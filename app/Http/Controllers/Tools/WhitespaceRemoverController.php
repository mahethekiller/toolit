<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Tool;
use Illuminate\Http\Request;

class WhitespaceRemoverController extends Controller
{
    public function index()
    {
        $tool = Tool::where('active', true)->where('route_name', 'tools.whitespace')->first();
        $faqs = Faq::where('group_name', 'Whitespace Remover')->get();
        return view('tools.whitespace-remover', compact('tool', 'faqs'));
    }

    public function process(Request $request)
    {
        $text = $request->input('text', '');
        $option = $request->input('option', 'all');

        switch ($option) {
            case 'all':
                $result = preg_replace('/\s+/', '', $text);
                break;
            case 'extra':
                $result = preg_replace('/\s+/', ' ', $text);
                break;
            case 'leading-trailing':
                $result = trim($text);
                break;
            case 'left':
                $result = ltrim($text);
                break;
            case 'right':
                $result = rtrim($text);
                break;
            case 'line-breaks':
                $result = preg_replace('/\r\n|\r|\n/', '', $text);
                break;
            default:
                $result = $text;
        }

        return response()->json(['result' => $result]);
    }
}

