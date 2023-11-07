<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraApiController;
use App\Http\Controllers\BarangApiController;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\SupplierApiController;
use App\Http\Controllers\HistoryApiController;
use App\Models\Barang;
use App\Models\Mitra;

    Route::resource('barang', BarangApiController::class);
    Route::resource('kategori', CategoryApiController::class);
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::resource('mitra', MitraApiController::class);
    Route::resource('supplier', SupplierApiController::class);
    Route::resource('history', HistoryApiController::class);
