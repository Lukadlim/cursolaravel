<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/{id?}', [ProductController::class, 'show'])->name('product.show');