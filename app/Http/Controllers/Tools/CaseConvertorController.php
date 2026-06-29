<?php
namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Tool;
use Illuminate\Http\Request;

class CaseConvertorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('active', true)->where('route_name', 'tools.case-converter')->first();
        $faqs = Faq::where('group_name', 'Case Converter')->get();
        return view('tools.case-converter', compact('tool', 'faqs'));
    }

     public function caseConverter()
    {
        $tool = Tool::where('active', true)->where('route_name', 'tools.case-converter')->first();
        $faqs = Faq::where('group_name', 'Case Converter')->get();
        return view('tools.case-converter', compact('tool', 'faqs'));
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

        $tool = Tool::where('active', true)->where('route_name', 'tools.case-converter')->first();
        $faqs = Faq::where('group_name', 'Case Converter')->get();

        return view('tools.case-converter', compact('text', 'output', 'mode', 'tool', 'faqs'));
    }
}
