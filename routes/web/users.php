<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:super admin','auth'])->group(function(){
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/show', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    Route::put('users/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');
    Route::put('users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');
});