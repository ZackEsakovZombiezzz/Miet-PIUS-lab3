<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

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
Route::post('/games', [GameController::class, 'store']);
Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{game}', [GameController::class, 'show']);
Route::put('/games/{game}', [GameController::class, 'update']);
Route::delete('/games/{game}', [GameController::class, 'destroy']);

Route::post('/reviews', [ReviewController::class, 'store']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{review}', [ReviewController::class, 'show']);
Route::put('/reviews/{review}', [ReviewController::class, 'update']);
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy']);
