<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;


Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/openrouter', [OpenRouterController::class, 'chat']);

Route::get('/the-loai/{id}', [App\Http\Controllers\MovieController::class, 'getMoviesByGenre']);
Route::get('/movie/{id}', [App\Http\Controllers\MovieController::class, 'detail'])->name('movie.detail');
Route::post('/timkiem', [MovieController::class, 'search']);

