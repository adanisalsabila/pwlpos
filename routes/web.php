<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;



Route::get('/', [WelcomeController::class, 'index'])->name('Welcome');

Route::prefix('level')->name('level.')->group(function () {
    Route::get('/', [LevelController::class, 'index'])->name('index');
    Route::get('/create', [LevelController::class, 'create'])->name('create');
    Route::post('/', [LevelController::class, 'store'])->name('store');
    Route::get('/{level}', [LevelController::class, 'show'])->name('show');
    Route::get('/{level}/edit', [LevelController::class, 'edit'])->name('edit');
    Route::match(['put', 'patch'], '/{level}', [LevelController::class, 'update'])->name('update');
    Route::delete('/{level}', [LevelController::class, 'destroy'])->name('destroy');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{level}', [UserController::class, 'show'])->name('show');
    Route::get('/{level}/edit', [UserController::class, 'edit'])->name('edit');
    Route::match(['put', 'patch'], '/{level}', [UserController::class, 'update'])->name('update');
    Route::delete('/{level}', [UserController::class, 'destroy'])->name('destroy');
});

Route::prefix('kategori')->name('kategori.')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('index');
    Route::get('/create', [KategoriController::class, 'create'])->name('create');
    Route::post('/', [KategoriController::class, 'store'])->name('store');
    Route::get('/{id}', [KategoriController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('edit');
    Route::put('/{id}', [KategoriController::class, 'update'])->name('update');
    Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('destroy');
});

Route::prefix('barang')->name('barang.')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('index');
    Route::get('/create', [BarangController::class, 'create'])->name('create');
    Route::post('/', [BarangController::class, 'store'])->name('store');
    Route::get('/{id}', [BarangController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BarangController::class, 'update'])->name('update');
    Route::delete('/{id}', [BarangController::class, 'destroy'])->name('destroy');
});

Route::prefix('supplier')->name('supplier.')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('index');
    Route::get('/create', [SupplierController::class, 'create'])->name('create');
    Route::post('/', [SupplierController::class, 'store'])->name('store');
    Route::get('/{id}', [SupplierController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('edit');
    Route::put('/{id}', [SupplierController::class, 'update'])->name('update');
    Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('destroy');
});

Route::prefix('stok')->name('stok.')->group(function () {
    Route::get('/', [StokController::class, 'index'])->name('index');
    Route::get('/create', [StokController::class, 'create'])->name('create');
    Route::post('/', [StokController::class, 'store'])->name('store');
    Route::get('/{id}', [StokController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [StokController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StokController::class, 'update'])->name('update');
    Route::delete('/{id}', [StokController::class, 'destroy'])->name('destroy');
});

Route::prefix('penjualan')->name('penjualan.')->group(function () {
    Route::get('/', [PenjualanController::class, 'index'])->name('index');
    Route::get('/create', [PenjualanController::class, 'create'])->name('create');
    Route::post('/', [PenjualanController::class, 'store'])->name('store');
    Route::get('/{id}', [PenjualanController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PenjualanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PenjualanController::class, 'update'])->name('update');
    Route::delete('/{id}', [PenjualanController::class, 'destroy'])->name('destroy');
});

Route::prefix('penjualan-detail')->name('penjualan-detail.')->group(function () {
    Route::get('/', [PenjualanDetailController::class, 'index'])->name('index');
    Route::get('/create', [PenjualanDetailController::class, 'create'])->name('create');
    Route::post('/', [PenjualanDetailController::class, 'store'])->name('store');
    Route::get('/{id}', [PenjualanDetailController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PenjualanDetailController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PenjualanDetailController::class, 'update'])->name('update');
    Route::delete('/{id}', [PenjualanDetailController::class, 'destroy'])->name('destroy');
});