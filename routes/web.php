<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstrumentationController;
use App\Http\Controllers\EnsembleTypeController;
use App\Http\Controllers\MusicCreatorController;
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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/phpinfo', function () {
//     return view('phpinfo');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Define a route for the dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Music Routes
Route::get('/musics', [MusicController::class, 'index'])->name('musics.index');
Route::get('/musics/create', [MusicController::class, 'create'])->name('musics.create');

Route::post('/musics', [MusicController::class, 'store'])->name('musics.store');

Route::get('/musics/{id}/edit', [MusicController::class, 'edit'])->name('musics.edit');
Route::put('/musics/{id}', [MusicController::class, 'update'])->name('musics.update');
Route::delete('/musics/{id}', [MusicController::class, 'destroy'])->name('musics.destroy');


// Route for showing a single music details
Route::get('/musics/{id}', [MusicController::class, 'show'])->name('musics.show');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('music_management/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('music_management/categories', [CategoryController::class, 'store'])->name('categories.store'); // Updated route for storing a new category
Route::get('music_management/categories/{categories}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('music_management/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('music_management/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('music_management/instrumentations', [InstrumentationController::class, 'index'])->name('instrumentations.index');
Route::post('music_management/instrumentations', [InstrumentationController::class, 'store'])->name('instrumentations.store'); // Updated route for storing a new instrumentation
Route::get('music_management/instrumentations/{instrumentations}/edit', [InstrumentationController::class, 'edit'])->name('instrumentations.edit');
Route::put('music_management/instrumentations/{instrumentation}', [InstrumentationController::class, 'update'])->name('instrumentations.update');

Route::delete('music_management/instrumentations/{instrumentation}', [InstrumentationController::class, 'destroy'])->name('instrumentations.destroy');

Route::get('music_management/ensemble_types', [EnsembleTypeController::class, 'index'])->name('ensemble_types.index');
Route::post('music_management/ensemble_types', [EnsembleTypeController::class, 'store'])->name('ensemble_types.store'); // Updated route for storing a new ensemble_type
Route::get('music_management/ensemble_types/{ensemble_types}/edit', [EnsembleTypeController::class, 'edit'])->name('ensemble_types.edit');
Route::put('music_management/ensemble_types/{ensemble_type}', [EnsembleTypeController::class, 'update'])->name('ensemble_types.update');

Route::delete('music_management/ensemble_types/{ensemble_type}', [EnsembleTypeController::class, 'destroy'])->name('ensemble_types.destroy');

Route::get('music_management/credits', [MusicCreatorController::class, 'index'])->name('credits.index');
Route::post('music_management/credits', [MusicCreatorController::class, 'store'])->name('credits.store'); // Updated route for storing a new ensemble_type
Route::get('music_management/credits/{credits}/edit', [MusicCreatorController::class, 'edit'])->name('credits.edit');
Route::put('music_management/credits/{credit}', [MusicCreatorController::class, 'update'])->name('credits.update');

Route::delete('music_management/credits/{credit}', [MusicCreatorController::class, 'destroy'])->name('credits.destroy');