<?php

namespace App\Http\Controllers;

use App\Models\PluginQuery;
use Illuminate\Http\Request;

class PluginQueryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'captcha' => 'required|numeric',
            'plugin_slug' => 'nullable|string|max:255',
        ]);

        if ($request->captcha != session('plugin_captcha_answer')) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => ['captcha' => ['❌ Incorrect answer to the math question.']]
                ], 422);
            }
            return back()->withErrors(['captcha' => '❌ Incorrect answer to the math question.'])->withInput();
        }

        $pluginQuery = PluginQuery::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'plugin_slug' => $request->plugin_slug ?? 'header-and-footer-script-adder',
            'status' => 'new'
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => '✅ Thank you! Your query has been submitted successfully. We will get back to you soon.'
            ]);
        }

        return back()->with('success', '✅ Thank you! Your query has been submitted successfully.');
    }
}
