<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Tool;
use Illuminate\Http\Request;

class WordCounterController extends Controller
{
    public function index(Request $request)
    {
        $text = $request->input('text', '');

        $stats = [
            'characters' => 0,
            'characters_no_spaces' => 0,
            'words' => 0,
            'sentences' => 0,
            'paragraphs' => 0,
        ];

        if ($text) {
            $stats['characters'] = mb_strlen($text);
            $stats['characters_no_spaces'] = mb_strlen(str_replace(' ', '', $text));
            $stats['words'] = str_word_count($text);
            $stats['sentences'] = preg_match_all('/[.!?]+/', $text);
            $stats['paragraphs'] = preg_match_all('/\n\s*\n/', trim($text)) + 1;
        }


        $tool = Tool::where('active', true)->where('route_name', 'tools.wordcounter')->first();
        $faqs = Faq::where('group_name', 'Word Counter')->get();

        return view('tools.word-counter', compact('text', 'stats', 'tool', 'faqs'));
    }
}
