<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\Tool;
use Illuminate\Http\Request;

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
                    'name' => ucfirst(str_replace('-', ' ', last(explode('/', $route->uri())))),
                    'uri' => $route->uri(),
                    'route_name' => $route->getName(),
                ];
            });

        foreach ($routes as $tool) {
            Tool::updateOrCreate(
                ['route_name' => $tool['route_name']], // Unique key
                [
                    'name' => $tool['name'],
                    'url' => url($tool['uri']),
                    'active' => true,
                ]
            );
        }

        return redirect()->route('admin.tools.index')
            ->with('success', '✅ Tools synced successfully!');
    }
}
