<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function() {
    return view('frontend.home');
});
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


