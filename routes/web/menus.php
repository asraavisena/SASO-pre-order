<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    // Menus
    Route::get('/menus', [App\Http\Controllers\MenuController::class, 'index'])->name('menus.index');
    Route::get('/menus/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menus.create');
    Route::get('/menus/{menu}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('menus.edit');
    Route::get('/menus/{menu}/show', [App\Http\Controllers\MenuController::class, 'show'])->name('menus.show');
    Route::post('/menus', [App\Http\Controllers\MenuController::class, 'store'])->name('menus.store');
    Route::patch('/menus/{menu}/update', [App\Http\Controllers\MenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{menu}/delete', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menus.destroy');

    Route::patch('/menus/{menu}/upload', [App\Http\Controllers\MenuController::class, 'upload'])->name('menus.upload');
    Route::delete('/menus/{menu}/imgdelete', [App\Http\Controllers\MenuController::class, 'img_delete'])->name('menus.imgdelete');
});