<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;


use App\Http\Controllers\MovieController2;
Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/openrouter', [OpenRouterController::class, 'chat']);


use App\Http\Controllers\MovieController3;

Route::get('/admin/add', [MovieController3::class, 'create']);
Route::post('/admin/add', [MovieController3::class, 'store']);
Route::get('/the-loai/{id}', [App\Http\Controllers\MovieController::class, 'getMoviesByGenre']);
Route::get('/movie/{id}', [App\Http\Controllers\MovieController::class, 'detail'])->name('movie.detail');
Route::post('/timkiem', [MovieController::class, 'search']);

Route::get('/movies', [MovieController2::class, 'index']);
Route::get('/movies/delete/{id}', [MovieController2::class, 'delete']);
Route::get('/movies/{id}', [MovieController2::class, 'show']);
