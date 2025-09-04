<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        $seos = Seo::all();
        return view('admin.seo.index', compact('seos'));
    }

    public function edit(Seo $seo)
    {
        return view('admin.seo.edit', compact('seo'));
    }

    public function update(Request $request, Seo $seo)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|string|max:255',
            'canonical' => 'nullable|string|max:255',
            'url' => 'required|string|unique:seos,url,' . ($seo->id ?? 'NULL'),
        ]);

        $seo->update($request->all());

        return redirect()->route('admin.seo.index')->with('success', 'SEO updated successfully');
    }

    // Optional: Create new SEO record
    public function create()
    {
        return view('admin.seo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|string|unique:seos,url,' . ($seo->id ?? 'NULL'),
        ]);

        Seo::create($request->all());

        return redirect()->route('admin.seo.index')->with('success', 'SEO created successfully');
    }
}
