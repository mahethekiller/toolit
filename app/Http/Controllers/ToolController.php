<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;


class ToolController extends Controller
{
    // Case Converter
    public function caseConverter()
    {
        return view('tools.case-converter');
    }

    public function caseConverterProcess(Request $request)
    {
        $text = $request->input('text');
        $mode = $request->input('mode');

        switch ($mode) {
            case 'upper':
                $output = strtoupper($text);
                break;
            case 'lower':
                $output = strtolower($text);
                break;
            case 'title':
                $output = ucwords(strtolower($text));
                break;
            default:
                $output = $text;
        }

        return view('tools.case-converter', compact('text', 'output', 'mode'));
    }

    // Image Compressor
    public function imageCompressor()
    {
        return view('tools.image-compressor');
    }

    public function imageCompressorProcess(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120', // 5MB max
        ]);

        $image = Image::make($request->file('image'))
            ->encode('jpg', 70);

        $filename = 'compressed_' . time() . '.jpg';
        $path = public_path('uploads/' . $filename);
        $image->save($path);

        return back()->with('success', 'Image compressed successfully!')
            ->with('file', 'uploads/' . $filename);
    }
}
