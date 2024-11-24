<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/server', [ServerController::class, 'index']);
Route::get('/server/add', [ServerController::class, 'addPage']);
