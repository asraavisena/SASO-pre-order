<?php

use Illuminate\Support\Facades\Route;

// With auth
Route::middleware('auth')->group(function(){
    // Orders
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}/show', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
});