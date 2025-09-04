<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SeoController;
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
        Route::get('/tools', [App\Http\Controllers\Admin\ToolController::class, 'index'])
            ->name('tools.index');
        Route::post('/tools/sync', [App\Http\Controllers\Admin\ToolController::class, 'sync'])
            ->name('tools.sync');

        // Users, Roles, etc...
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);

        Route::resource('seo', SeoController::class)->except(['show', 'destroy']);

        Route::resource('contact-messages', \App\Http\Controllers\Admin\ContactMessageController::class)
            ->only(['index', 'show']);

    });
