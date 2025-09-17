<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteScript;
use Illuminate\Http\Request;

class SiteScriptController extends Controller
{
    public function edit()
    {
        $scripts = SiteScript::first() ?? new SiteScript();
        return view('admin.scripts.edit', compact('scripts'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'head_code'   => 'nullable|string',
            'body_code'   => 'nullable|string',
            'footer_code' => 'nullable|string',
        ]);

        $scripts = SiteScript::first();
        if ($scripts) {
            $scripts->update($data);
        } else {
            SiteScript::create($data);
        }

        return back()->with('success', 'Scripts updated successfully!');
    }
}
