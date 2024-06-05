<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MusicController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([], function () {

    // Music search route
    Route::get('/musics/search', [MusicController::class, 'search'])->name('api.musics.search');
});



//http://127.0.0.1:8000/api/musics/search?title=darating
    // User routes
    Route::get('/users', [UserController::class, 'index'])->name('api.users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('api.users.show');
    Route::post('/users', [UserController::class, 'store'])->name('api.users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('api.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');

    

// Retrieve all minister
Route::get('/ministers', [PersonnelController::class, 'getMinisters']);
// Retrieve all minister by id
Route::get('/ministers/{id}', [PersonnelController::class, 'getMinisters']);