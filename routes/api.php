<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\HostingController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->prefix('domains')->group(function () {
    Route::get('/', [DomainController::class, 'index']);
    Route::post('/create', [DomainController::class, 'store']);
    Route::put('/{id}', [DomainController::class, 'update']);
    Route::delete('/{id}', [DomainController::class, 'destroy']);
});

Route::middleware('auth:api')->prefix('hosting')->group(function () {
    Route::post('/create', [HostingController::class, 'store']);
    Route::put('/{id}', [HostingController::class, 'update']);
    Route::delete('/{id}', [HostingController::class, 'destroy']);
});
Route::middleware('auth:api')->get('/hosting', [HostingController::class, 'index']);


Route::middleware('auth:api')->prefix('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'getAllUsers']);
    Route::delete('/users/{id}', [AdminController::class, 'destroy']);
    Route::get('/users/{id}/domains', [AdminController::class, 'getUserDomains']);
});

Route::middleware(['admin'])->get('/test-admin', function () {
    return response()->json(['message' => 'Acesso concedido!'], 200);
});
