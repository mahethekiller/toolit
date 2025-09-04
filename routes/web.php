<?php

use App\Http\Controllers\ToolController;
use App\Http\Controllers\Tools\CaseConvertorController;
use App\Http\Controllers\Tools\PasswordGeneratorController;
use App\Http\Controllers\Tools\WordCounterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['showSidebar' => false]);
});


Route::get('/tools/case-converter', [CaseConvertorController::class, 'caseConverter'])->name('case-converter');
Route::post('/tools/case-converter', [CaseConvertorController::class, 'caseConverterProcess']);


Route::get('/tools/word-counter', [WordCounterController::class, 'index'])->name('tools.wordcounter');


Route::get('/tools/password-generator', [PasswordGeneratorController::class, 'index'])
    ->name('tools.password');

# Optional API route (only if you want server-side generation):
Route::post('/tools/password-generator/generate', [PasswordGeneratorController::class, 'generate'])
    ->name('tools.password.generate');


Route::get('/tools/image-compressor', [ToolController::class, 'imageCompressor']);
Route::post('/tools/image-compressor', [ToolController::class, 'imageCompressorProcess']);
