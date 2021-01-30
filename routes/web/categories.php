<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    // Categories
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/show', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
    Route::delete('/categories/{category}/delete', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
});
