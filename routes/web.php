<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function() {
    return view('frontend.home');
});

Route::get('/product-details', function() {
    return view('frontend.product-details');
});

Route::get('/carts', function () {
    return view('frontend.cart');
});

Route::get('/sub-products', function () {
    return view('frontend.product');
});

Route::get('/profiles', function () {
    return view('frontend.profile');
});

Route::get('/orders', function () {
    return view('frontend.order');
});

Route::get('/wish-lists', function () {
    return view('frontend.wishlist');
});


Route::get('/term-conditions', function () {
    return view('frontend.term-conditions');
});





require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


