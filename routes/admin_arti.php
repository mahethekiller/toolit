<?php

use App\Http\Controllers\Admin\Arti\DeityController;
use App\Http\Controllers\Admin\Arti\AartiController;
use App\Http\Controllers\Admin\Arti\GalleryController;
use App\Http\Controllers\Admin\Arti\UserController;
use App\Http\Controllers\Admin\Arti\ReminderController;
use App\Http\Controllers\Admin\Arti\PrayerHistoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin/arti')->name('admin.arti.')->group(function () {
    Route::resource('deities', DeityController::class);
    Route::resource('aartis', AartiController::class);
    Route::resource('gallery', GalleryController::class);
    
    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users/{id}/generate-token', [UserController::class, 'generateToken'])->name('users.generate-token');
    Route::get('tokens', [UserController::class, 'tokenGenerator'])->name('users.tokens');
    Route::post('tokens', [UserController::class, 'generateTokenFromGenerator'])->name('users.generate-token-generator');
    Route::get('docs', [UserController::class, 'apiDocs'])->name('users.docs');

    // Reminders
    Route::get('reminders', [ReminderController::class, 'index'])->name('reminders.index');
    Route::delete('reminders/{id}', [ReminderController::class, 'destroy'])->name('reminders.destroy');

    // Histories
    Route::get('histories', [PrayerHistoryController::class, 'index'])->name('histories.index');
    Route::delete('histories/{id}', [PrayerHistoryController::class, 'destroy'])->name('histories.destroy');
});
