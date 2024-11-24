<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/proses', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/server', [ServerController::class, 'index']);
    Route::get('/server/add', [ServerController::class, 'addPage']);
    Route::post('/server/tambah', [ServerController::class, 'tambahServer']);
    Route::get('/server/detail/{slug}', [ServerController::class, 'detail']);
    Route::get('/server/edit/{slug}', [ServerController::class, 'edit']);
    Route::post('/server/update/{slug}', [ServerController::class, 'update']);
});
