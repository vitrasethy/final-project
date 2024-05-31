<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use Inertia\Inertia;

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::resource('/carts', CartController::class)->only(['index', 'store', 'destroy'])
    ->middleware('auth:web');

Route::post('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('checkout/success', [CartController::class, 'success'])->name('checkout.success');

Route::get('login', function () {
    return Inertia::render('Auth/Login');
})->name('login');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('google/redirect', [GoogleAuthController::class, 'redirect']);
Route::get('google/callback', [GoogleAuthController::class, 'callback']);
