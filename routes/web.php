<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/proses', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/back', [DashboardController::class, 'back']);

    Route::get('/server', [ServerController::class, 'index']);
    Route::get('/server/add', [ServerController::class, 'addPage']);
    Route::post('/server/tambah', [ServerController::class, 'tambahServer']);
    Route::get('/server/detail/{slug}', [ServerController::class, 'detail']);
    Route::get('/server/edit/{slug}', [ServerController::class, 'edit']);
    Route::post('/server/update/{slug}', [ServerController::class, 'update']);
    Route::get('/server/delete/{slug}', [ServerController::class, 'delete'])->middleware('admin');

    Route::get('/ip', [IpController::class, 'index']);
    Route::get('/ip/add', [IpController::class, 'addPage']);
    Route::post('/ip/tambah', [IpController::class, 'tambah']);
    Route::get('/ip/edit/{slug}', [IpController::class, 'edit']);
    Route::post('/ip/update/{slug}', [IpController::class, 'update']);
    Route::get('/ip/delete/{slug}', [IpController::class, 'delete'])->middleware('admin');

    Route::get('/users', [UserController::class, 'data']);
    Route::get('/users/add', [UserController::class, 'add']);
    Route::post('/users/tambah', [UserController::class, 'tambah']);
    Route::get('/users/edit/{slug}', [UserController::class, 'edit']);
    Route::post('/users/update/{slug}', [UserController::class, 'update']);
    Route::get('/users/delete/{slug}', [UserController::class, 'delete'])->middleware('admin');
});
