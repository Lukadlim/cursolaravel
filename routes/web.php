<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckEmail;

Route::resource('products', ProductController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/product/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/category/{id}', [SiteController::class, 'category'])->name('site.category');

Route::get('/cart', [CartController::class, 'cartList'])->name('site.cart');
Route::post('/cart', [CartController::class, 'addCart'])->name('site.addcart');
Route::post('/remove', [CartController::class, 'removeCart'])->name('site.removecart');
Route::post('/update', [CartController::class, 'updateCart'])->name('site.updatecart');
Route::get('/clear', [CartController::class, 'clearCart'])->name('site.clearcart');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'checkemail']);