<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToolsPageController;
use App\Http\Controllers\Tools\CaseConvertorController;
use App\Http\Controllers\Tools\PasswordGeneratorController;
use App\Http\Controllers\Tools\TextReverserController;
use App\Http\Controllers\Tools\WhitespaceRemoverController;
use App\Http\Controllers\Tools\WordCounterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['showSidebar' => false]);
})->name('home');

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

    // Text Reverser
    Route::get('/text-reverser', [TextReverserController::class, 'index'])->name('textreverser');
    Route::post('/text-reverser/process', [TextReverserController::class, 'process'])->name('textreverser.process');

    Route::get('/whitespace-remover', [WhitespaceRemoverController::class, 'index'])->name('whitespace');
    Route::post('/whitespace-remover/process', [WhitespaceRemoverController::class, 'process'])->name('whitespace.process');

});

// routes/web.php
Route::get('/tools', [ToolsPageController::class, 'index'])
    ->name('tools.index');

Route::view('/about', 'about')->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-of-use', [PageController::class, 'termsOfUse'])->name('terms.use');
Route::get('/ads-disclosure', [PageController::class, 'adsDisclosure'])->name('ads.disclosure');
Route::get('/header-and-footer-script-adder', [PageController::class, 'headerFooterScriptAdder'])->name('plugins.header-footer-script-adder');
Route::get('/header-and-footer-script-adder/thank-you', [PageController::class, 'headerFooterScriptAdderThankYou'])->name('plugins.header-footer-script-adder.thank-you');
Route::post('/plugins/header-and-footer-script-adder/support', [App\Http\Controllers\PluginQueryController::class, 'store'])->name('plugins.header-footer-script-adder.support');




Route::get('/portfolio/mahendra', [PortfolioController::class, 'index']);
// Projects Page
Route::get('/portfolio/mahendra/projects', [PortfolioController::class, 'projects'])->name('projects');



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
