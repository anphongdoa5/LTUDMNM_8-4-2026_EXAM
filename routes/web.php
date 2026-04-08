<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\MovieController2;
Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);



Route::get('/openrouter', [OpenRouterController::class, 'chat']);
Route::get('/movies', [MovieController2::class, 'index']);
Route::get('/movies/delete/{id}', [MovieController2::class, 'delete']);
Route::get('/movies/{id}', [MovieController2::class, 'show']);