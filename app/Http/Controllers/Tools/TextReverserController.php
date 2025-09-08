<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextReverserController extends Controller
{
    public function index()
    {
        return view('tools.text-reverser');
    }

    public function process(Request $request)
    {
        $text = $request->input('text');
        $reversed = strrev($text);

        return response()->json(['reversed' => $reversed]);
    }
}

