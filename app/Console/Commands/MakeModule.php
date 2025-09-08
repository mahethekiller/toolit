<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeModule extends Command
{
    /**
     * Signature:
     * php artisan make:module Post
     * php artisan make:module Post --undo
     */
    protected $signature = 'make:module {name} {--undo}';

    protected $description = 'Create or remove Controller, Model, Migration, Views, and Routes for a module';

    public function handle()
    {
        $name = Str::studly($this->argument('name')); // PascalCase
        $namePlural = Str::pluralStudly($name);
        $nameLower = Str::snake($name);              // snake_case
        $nameKebab = Str::kebab($name);              // kebab-case

        if ($this->option('undo')) {
            $this->undo($name, $nameLower, $nameKebab);
            return;
        }

        $this->info("Creating module: $name");

        // 1. Model + Migration
        Artisan::call('make:model', [
            'name' => $name,
            '-m'   => true
        ]);
        $this->info("Model + Migration created: $name");

        // 2. Controller
        Artisan::call('make:controller', [
            'name' => "{$name}Controller",
            '--resource' => true
        ]);
        $this->info("Controller created: {$name}Controller");

        // 3. Views
        $viewPath = resource_path("views/{$nameLower}");
        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
        }
        $views = ['index.blade.php', 'create.blade.php', 'edit.blade.php', 'show.blade.php'];
        foreach ($views as $view) {
            File::put($viewPath . '/' . $view, "<h1>$name $view</h1>");
        }
        $this->info("Views created: resources/views/{$nameLower}");

        // 4. Add route to web.php
        $routeFile = base_path('routes/web.php');
        $routeLine = "Route::resource('{$nameKebab}', \\App\\Http\\Controllers\\{$name}Controller::class);";
        File::append($routeFile, PHP_EOL . $routeLine . PHP_EOL);
        $this->info("Route added: $routeLine");
    }

    /**
     * Undo module creation
     */
    protected function undo($name, $nameLower, $nameKebab)
    {
        $this->info("Removing module: $name");

        // 1. Delete Model
        $modelPath = app_path("Models/{$name}.php");
        if (File::exists($modelPath)) {
            File::delete($modelPath);
            $this->info("Deleted model: $modelPath");
        }

        // 2. Delete Controller
        $controllerPath = app_path("Http/Controllers/{$name}Controller.php");
        if (File::exists($controllerPath)) {
            File::delete($controllerPath);
            $this->info("Deleted controller: $controllerPath");
        }

        // 3. Delete Views
        $viewPath = resource_path("views/{$nameLower}");
        if (File::exists($viewPath)) {
            File::deleteDirectory($viewPath);
            $this->info("Deleted views: $viewPath");
        }

        // 4. Remove Route
        $routeFile = base_path('routes/web.php');
        $routeLine = "Route::resource('{$nameKebab}', \\App\\Http\\Controllers\\{$name}Controller::class);";
        if (File::exists($routeFile)) {
            $routes = File::get($routeFile);
            $routes = str_replace(PHP_EOL . $routeLine . PHP_EOL, '', $routes);
            File::put($routeFile, $routes);
            $this->info("Removed route: $routeLine");
        }

        // 5. Migration rollback (only latest batch)
        Artisan::call('migrate:rollback', [
            '--step' => 1
        ]);
        $this->info("Rolled back last migration (possibly for $name).");
    }
}
