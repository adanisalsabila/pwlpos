<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;

Route::post('/register', [RegisterController::class, '__invoke'])->name('api.register');
Route::post('/login', [LoginController::class, '__invoke'])->name('api.login');

// Cek user yang login
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json([
        'success' => true,
        'user' => $request->user(),
    ]);
});
