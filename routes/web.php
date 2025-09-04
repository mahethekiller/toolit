<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\Tools\CaseConvertorController;
use App\Http\Controllers\Tools\PasswordGeneratorController;
use App\Http\Controllers\Tools\WordCounterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['showSidebar' => false]);
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');




Route::prefix('tools')->name('tools.')->group(function () {
    // Case Converter
    Route::get('/case-converter', [CaseConvertorController::class, 'caseConverter'])
        ->name('case-converter');
    Route::post('/case-converter', [CaseConvertorController::class, 'caseConverterProcess']);

    // Word Counter
    Route::get('/word-counter', [WordCounterController::class, 'index'])
        ->name('wordcounter');

    // Password Generator
    Route::get('/password-generator', [PasswordGeneratorController::class, 'index'])
        ->name('password');
    Route::post('/password-generator/generate', [PasswordGeneratorController::class, 'generate'])
        ->name('password.generate');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
