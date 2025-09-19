<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('group_name')->get()->groupBy('group_name');
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
            'faqs.*.question' => 'required|string|max:255',
            'faqs.*.answer' => 'required|string',
        ]);

        foreach ($request->faqs as $faq) {
            Faq::create([
                'group_name' => $request->group_name,
                'question' => $faq['question'],
                'answer' => $faq['answer'],
            ]);
        }

        return redirect()->route('admin.faqs.index')
            ->with('success', '✅ FAQs added successfully!');
    }

    public function edit($groupName)
{
    // Fetch all FAQs in this group
    $faqs = Faq::where('group_name', $groupName)->get();

    if ($faqs->isEmpty()) {
        return redirect()->route('admin.faqs.index')
            ->with('error', '⚠️ FAQ group not found!');
    }

    return view('admin.faqs.edit', compact('faqs', 'groupName'));
}

public function update(Request $request, $groupName)
{
    $request->validate([
        'faqs.*.question' => 'required|string|max:255',
        'faqs.*.answer' => 'required|string',
    ]);

    // Delete existing FAQs in this group
    Faq::where('group_name', $groupName)->delete();

    // Re-create FAQs from the form
    foreach ($request->faqs as $faq) {
        Faq::create([
            'group_name' => $groupName,
            'question' => $faq['question'],
            'answer' => $faq['answer'],
        ]);
    }

    return redirect()->route('admin.faqs.index')
        ->with('success', '✅ FAQs updated successfully!');
}

}

