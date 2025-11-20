<?php

namespace App\Http\Controllers;

use App\Models\PortfolioExperience;
use App\Models\PortfolioSkill;
use App\Models\PortfolioProject;
use App\Models\PortfolioSetting;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $settings = PortfolioSetting::getSettings();
        $experiences = PortfolioExperience::active()->ordered()->get();
        $skills = PortfolioSkill::active()->ordered()->get();
        $projects = PortfolioProject::active()->ordered()->get();

        $skillsByCategory = [
            'languages' => $skills->where('category', 'languages'),
            'frameworks' => $skills->where('category', 'frameworks'),
            'other' => $skills->where('category', 'other')
        ];

        return view('portfolio.index', compact('settings', 'experiences', 'skillsByCategory', 'projects'));
    }
}
