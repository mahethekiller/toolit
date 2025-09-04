<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // User management
    Route::resource('users', UserController::class);

    // Role management
    Route::resource('roles', RoleController::class);

});

use App\Http\Controllers\Admin\AdminDashboardController;

// Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
//     Route::get('/tools', [AdminDashboardController::class, 'tools'])->name('admin.tools');
//     Route::get('/users', [AdminDashboardController::class, 'users'])->name('admin.users');
// });

