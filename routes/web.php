<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);



Route::get('/openrouter', [OpenRouterController::class, 'chat']);


use App\Http\Controllers\MovieController3;

Route::get('/admin/add', [MovieController3::class, 'create']);
Route::post('/admin/add', [MovieController3::class, 'store']);