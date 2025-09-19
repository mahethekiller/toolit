<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SiteScriptController;
use App\Http\Controllers\Admin\ToolController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // User management
    Route::resource('users', UserController::class);

    // Role management
    Route::resource('roles', RoleController::class);

});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Tools
        Route::get('/tools', [ToolController::class, 'index'])
            ->name('tools.index');
        Route::post('/tools/sync', [ToolController::class, 'sync'])
            ->name('tools.sync');
        Route::get('/tools/{id}/edit', [ToolController::class, 'edit'])->name('tools.edit');
        Route::put('/tools/{id}', [ToolController::class, 'update'])->name('tools.update');

        // Users, Roles, etc...
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);

        Route::resource('seo', SeoController::class)->except(['show', 'destroy']);

        Route::resource('contact-messages', ContactMessageController::class)
            ->only(['index', 'show']);

        Route::get('/admin/scripts', [SiteScriptController::class, 'edit'])->name('scripts.edit');
        Route::post('/admin/scripts', [SiteScriptController::class, 'update'])->name('scripts.update');

        // faq
        Route::resource('faqs', FaqController::class);

    });
