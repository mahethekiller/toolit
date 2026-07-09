<?php

use App\Http\Controllers\Api\Arti\DeityController;
use App\Http\Controllers\Api\Arti\AartiController;
use App\Http\Controllers\Api\Arti\GalleryController;
use App\Http\Controllers\Api\Arti\ProfileController;
use App\Http\Controllers\Api\Arti\ReminderController;
use App\Http\Controllers\Api\Arti\FavoriteController;
use App\Http\Controllers\Api\Arti\AuthController;
use Illuminate\Support\Facades\Route;

// Auth Routes (Pre-prefixed by api/arti)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public Read Routes
Route::get('/deities', [DeityController::class, 'index']);
Route::get('/aartis', [AartiController::class, 'index']);
Route::get('/aartis/{id}', [AartiController::class, 'show']);
Route::get('/gallery', [GalleryController::class, 'index']);

// Protected User Routes (Require Sanctum token using the custom arti guard)
Route::middleware('auth:arti')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::post('/profile/streak', [ProfileController::class, 'incrementStreak']);
    Route::get('/profile/history', [ProfileController::class, 'history']);
    Route::post('/profile/history', [ProfileController::class, 'logHistory']);

    // Favorites
    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle']);

    // Reminders
    Route::get('/reminders', [ReminderController::class, 'index']);
    Route::post('/reminders', [ReminderController::class, 'store']);
    Route::put('/reminders/{id}', [ReminderController::class, 'update']);
    Route::delete('/reminders/{id}', [ReminderController::class, 'destroy']);
});
