<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ToolController extends Controller
{
    public function index()
    {
        $dbTools = Tool::all();
        return view('admin.tools.index', compact('dbTools'));
    }

    public function sync(Request $request)
    {
        $routes = collect(Route::getRoutes())
            ->filter(function ($route) {
                return str_starts_with($route->uri(), 'tools/')
                && in_array('GET', $route->methods());
            })
            ->map(function ($route) {
                return [
                    'name'       => ucfirst(str_replace('-', ' ', last(explode('/', $route->uri())))),
                    'uri'        => $route->uri(),
                    'route_name' => $route->getName(),
                ];
            });

        foreach ($routes as $tool) {
            Tool::updateOrCreate(
                ['route_name' => $tool['route_name']], // Unique key
                [
                    'name'   => $tool['name'],
                    'url'    => url($tool['uri']),
                    'active' => true,
                ]
            );
        }

        return redirect()->route('admin.tools.index')
            ->with('success', '✅ Tools synced successfully!');
    }

    // app/Http/Controllers/Admin/ToolController.php

    public function edit($id)
    {
        $tool = Tool::findOrFail($id);
        return view('admin.tools.edit', compact('tool'));
    }

    public function update(Request $request, $id)
    {
        $tool = Tool::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'url'         => 'required|url',
            'description' => 'nullable|string|max:500',
            'active'      => 'required|boolean',
            'icon'        => 'nullable|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'icon_alt'    => 'nullable|string|max:255',
        ]);

        // Handle icon upload
        if ($request->hasFile('icon')) {
            $fileName        = $request->icon->getClientOriginalName(); // keep original file name
            $destinationPath = public_path('uploads/tools/icons');

            // Check if file already exists
            if (file_exists($destinationPath . '/' . $fileName)) {
                return back()->withErrors(['icon' => '❌ The file "' . $fileName . '" already exists. Please rename the file and try again.'])->withInput();
            }

            $request->icon->move($destinationPath, $fileName);
            $tool->icon = $fileName;
        }

        $tool->name        = $request->name;
        $tool->url         = $request->url;
        $tool->description = $request->description;
        $tool->icon_alt    = $request->icon_alt;
        $tool->active      = (bool) $request->active;
        $tool->save();

        return redirect()->route('admin.tools.index')
            ->with('success', '✅ Tool updated successfully!');
    }

}
