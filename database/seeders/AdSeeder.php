<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Seed initial ad placements.
     */
    public function run(): void
    {
        $adCode = '<script async="async" data-cfasync="false" src="https://pl31240142.profitableratecpmnetwork.com/9bbd04007e4d66bed8bcc2f5a0fc36d9/invoke.js"></script><div id="container-9bbd04007e4d66bed8bcc2f5a0fc36d9"></div>';

        $placements = [
            [
                'position' => 'sidebar',
                'name'     => 'Sidebar 1:1 Native Banner',
                'code'     => $adCode,
                'active'   => 1,
            ],
            [
                'position' => 'toola',
                'name'     => 'Tool Break (Post-Tool) 1:1 Native Banner',
                'code'     => $adCode,
                'active'   => 1,
            ],
            [
                'position' => 'home_grid',
                'name'     => 'Homepage Tools Grid 1:1 Native Banner',
                'code'     => $adCode,
                'active'   => 1,
            ],
            [
                'position' => 'tools_grid',
                'name'     => 'Tools Catalog Grid 1:1 Native Banner',
                'code'     => $adCode,
                'active'   => 1,
            ],
        ];

        foreach ($placements as $placement) {
            Ad::updateOrCreate(
                ['position' => $placement['position']],
                [
                    'name'   => $placement['name'],
                    'code'   => $placement['code'],
                    'active' => $placement['active'],
                ]
            );
        }
    }
}
