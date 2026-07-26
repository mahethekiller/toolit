<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\ToolUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ToolAnalyticsController extends Controller
{
    /**
     * Display the tool usage metrics and analytics dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // 1. Core Key Performance Indicators (KPIs)
        $totalHits = ToolUsage::count();
        $uniqueIps = ToolUsage::distinct('ip_address')->count('ip_address');
        
        $topToolData = ToolUsage::select('tool_id', DB::raw('count(*) as total'))
            ->whereNotNull('tool_id')
            ->groupBy('tool_id')
            ->orderByDesc('total')
            ->first();
            
        $topTool = $topToolData ? Tool::find($topToolData->tool_id) : null;
        $topToolName = $topTool ? $topTool->name : 'N/A';
        $topToolCount = $topToolData ? $topToolData->total : 0;

        $viewCount = ToolUsage::where('action', 'view')->count();
        $executeCount = ToolUsage::where('action', 'execute')->count();

        // 2. Fetch daily usage counts over the past 30 days
        $thirtyDaysAgo = Carbon::now()->subDays(30);
        $dailyUsages = ToolUsage::select(
                DB::raw("date(created_at) as date_label"),
                DB::raw("count(*) as total")
            )
            ->where('created_at', '>=', $thirtyDaysAgo)
            ->groupBy('date_label')
            ->orderBy('date_label')
            ->get();

        // Format label strings and populate data, filling missing dates with 0
        $chartLabels = [];
        $chartData = [];
        $usageMap = $dailyUsages->pluck('total', 'date_label')->toArray();

        for ($i = 30; $i >= 0; $i--) {
            $dateString = Carbon::now()->subDays($i)->format('Y-m-d');
            $chartLabels[] = Carbon::now()->subDays($i)->format('M d');
            $chartData[] = $usageMap[$dateString] ?? 0;
        }

        // 3. Tool breakdown list showing metrics for each registered tool
        $toolsBreakdown = Tool::leftJoin('tool_usages', 'tools.id', '=', 'tool_usages.tool_id')
            ->select(
                'tools.id',
                'tools.name',
                'tools.route_name',
                DB::raw('count(tool_usages.id) as total_hits'),
                DB::raw('count(distinct tool_usages.ip_address) as unique_visitors'),
                DB::raw("sum(case when tool_usages.action = 'view' then 1 else 0 end) as total_views"),
                DB::raw("sum(case when tool_usages.action = 'execute' then 1 else 0 end) as total_executions")
            )
            ->groupBy('tools.id', 'tools.name', 'tools.route_name')
            ->orderByDesc('total_hits')
            ->get();

        // 4. Paginated logs list
        $recentLogs = ToolUsage::with(['tool', 'user'])
            ->orderByDesc('id')
            ->paginate(25);

        $title = 'Tool Usage Analytics';

        return view('admin.tool-analytics.index', compact(
            'title',
            'totalHits',
            'uniqueIps',
            'topToolName',
            'topToolCount',
            'viewCount',
            'executeCount',
            'chartLabels',
            'chartData',
            'toolsBreakdown',
            'recentLogs'
        ));
    }
}
