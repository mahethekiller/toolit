<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\ToolUsage;
use Illuminate\Http\Request;

class TrackExecutionController extends Controller
{
    /**
     * Store a client-side execution log.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            // Exclude admin users
            if (auth()->check() && auth()->user()->hasRole('admin')) {
                return response()->json(['status' => 'ignored', 'reason' => 'admin']);
            }

            $routeName = $request->input('route_name');
            if (empty($routeName)) {
                return response()->json(['status' => 'error', 'message' => 'Route name is required'], 400);
            }

            $tool = Tool::where('route_name', $routeName)
                ->where('active', true)
                ->first();

            ToolUsage::create([
                'tool_id' => $tool?->id,
                'route_name' => $routeName,
                'ip_address' => $request->ip() ?? '127.0.0.1',
                'user_agent' => $request->userAgent(),
                'user_id' => auth()->id(),
                'action' => 'execute',
            ]);

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            logger()->error('Client-side execution tracking error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Internal error'], 500);
        }
    }
}
