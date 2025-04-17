<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/generate-document', [DocumentGeneratorController::class, 'generate'])->name('generate.document');

    // ✅ Add this route to fix 404
    Route::get('/generate-form', function () {
        return view('generate');
    });
});


require __DIR__.'/auth.php';
#use Illuminate\Support\Facades\Route;

Route::get('/generate-form', function () {
    return view('generate');
});

