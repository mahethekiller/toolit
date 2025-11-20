<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'experiences' => \App\Models\PortfolioExperience::count(),
            'skills' => \App\Models\PortfolioSkill::count(),
            'projects' => \App\Models\PortfolioProject::count(),
            'active_projects' => \App\Models\PortfolioProject::where('is_active', true)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
