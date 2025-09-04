<?php
namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaseConvertorController extends Controller
{
    public function index()
    {
        return view('tools.case-converter');
    }

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
}
