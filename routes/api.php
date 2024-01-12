<?php

use App\Http\Controllers\ItemController;
use App\Http\Middleware\CacheMiddleware;
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

Route::get('/items', ItemController::class)
    ->middleware(CacheMiddleware::class);
