<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentGeneratorController;
use App\Http\Controllers\DocumentController;

Route::get('/', function () {
    return view('dashboard', [
        'templates' => [
            ['key' => 'residential-sale', 'name' => 'Residential Sale', 'description' => 'Sale of residential properties'],
            ['key' => 'commercial-lease', 'name' => 'Commercial Lease', 'description' => 'Lease of commercial premises'],
        ]
    ]);
});

// ✅ All protected routes go inside auth middleware
Route::middleware(['auth'])->group(function () {
    // Dashboard route now handled by controller
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // OpenAI document generation route
    Route::post('/generate-document', [DocumentGeneratorController::class, 'generate'])->name('generate.document');

    // Old basic prompt-based form
    Route::get('/generate-form', function () {
        return view('generate');
    });

    // ✅ Document type-based route (already added correctly)
    Route::get('/document/form/{type}', [DocumentController::class, 'showForm'])->name('document.form');
});

require __DIR__.'/auth.php';
