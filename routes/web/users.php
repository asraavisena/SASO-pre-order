<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/show', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
});