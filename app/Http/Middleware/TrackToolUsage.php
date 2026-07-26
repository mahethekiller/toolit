<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tool;
use App\Models\ToolUsage;

class TrackToolUsage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            // Exclude admin users from being tracked
            if (auth()->check() && auth()->user()->hasRole('admin')) {
                return $response;
            }

            $routeName = $request->route()?->getName();
            
            // Skip logging for the execution tracking endpoint itself
            if ($routeName === 'tools.track-execution') {
                return $response;
            }
            
            // Resolve the tool from route name
            $tool = null;
            if ($routeName) {
                // If it is a POST process/generate route, map it back to the base route name
                $baseRouteName = preg_replace('/\.process|\.generate$/', '', $routeName);
                
                $tool = Tool::where('active', true)
                    ->where(function ($query) use ($routeName, $baseRouteName) {
                        $query->where('route_name', $routeName)
                              ->orWhere('route_name', $baseRouteName);
                    })
                    ->first();
            }

            // Fallback: Resolve by request path matching url suffix
            if (!$tool) {
                $path = trim($request->path(), '/'); // e.g. "tools/case-converter"
                $tool = Tool::where('active', true)
                    ->where(function($query) use ($path) {
                        $query->where('url', 'like', '%' . $path)
                              ->orWhere('url', 'like', '%' . $path . '/%');
                    })
                    ->first();
            }

            // Create the log entry
            ToolUsage::create([
                'tool_id' => $tool?->id,
                'route_name' => $routeName ?? $request->path(),
                'ip_address' => $request->ip() ?? '127.0.0.1',
                'user_agent' => $request->userAgent(),
                'user_id' => auth()->id(),
                'action' => $request->isMethod('POST') ? 'execute' : 'view',
            ]);
        } catch (\Exception $e) {
            // Silently log and fail to prevent tracking issues from breaking the user experience
            logger()->error("Tool tracking middleware error: " . $e->getMessage());
        }

        return $response;
    }
}
