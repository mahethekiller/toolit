<?php
namespace App\Http\Controllers;

use App\Models\PortfolioExperience;
use App\Models\PortfolioProject;
use App\Models\PortfolioSetting;
use App\Models\PortfolioSkill;

class PortfolioController extends Controller
{
    public function index()
    {
        $settings    = PortfolioSetting::getSettings();
        $experiences = PortfolioExperience::active()->ordered()->get();
        $skills      = PortfolioSkill::active()->ordered()->get();
        $projects    = PortfolioProject::active()->ordered()->get();

        $skillsByCategory = [
            'languages'  => $skills->where('category', 'languages'),
            'frameworks' => $skills->where('category', 'frameworks'),
            'other'      => $skills->where('category', 'other'),
        ];

        return view('portfolio.index', compact('settings', 'experiences', 'skillsByCategory', 'projects'));
    }

    public function projects()
    {
        $settings = PortfolioSetting::getSettings();
        $projects = PortfolioProject::active()->ordered()->get();

        // Calculate technology counts
        $techCounts      = [];
        $topTechnologies = [];

        foreach ($projects as $project) {
            foreach ($project->technologies as $tech) {
                $tech = trim($tech);
                if (! isset($techCounts[$tech])) {
                    $techCounts[$tech] = 0;
                }
                $techCounts[$tech]++;
            }
        }

        // Get top technologies (most used)
        arsort($techCounts);
        $topTechnologies = array_slice($techCounts, 0, 8, true); // Top 8 technologies

        return view('portfolio.projects', compact('settings', 'projects', 'techCounts', 'topTechnologies'));
    }
}
