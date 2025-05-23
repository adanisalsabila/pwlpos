<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController; // Tambahkan ini
use Illuminate\Http\Request;
use App\Http\Controllers\Api\LevelController;

// Route::post('/register', [RegisterController::class, '__invoke'])->name('api.register');
Route::post('/register1', RegisterController::class)->name('api.register1');
Route::post('/login', [LoginController::class, '__invoke'])->name('api.login');
Route::post('/logout', [LogoutController::class, '__invoke'])->name('api.logout'); // Tambahkan baris ini

// Cek user yang login
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json([
        'success' => true,
        'user' => $request->user(),
    ]);
});



Route::get('levels', [LevelController::class, 'index']);
Route::post('levels', [LevelController::class, 'store']);
Route::get('levels/{level}', [LevelController::class, 'show']);
Route::put('levels/{level}', [LevelController::class, 'update']);
Route::delete('levels/{level}', [LevelController::class, 'destroy']);