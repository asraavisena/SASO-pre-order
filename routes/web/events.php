<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    // Events
    Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
    Route::get('/events/{event}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
    Route::get('/events/{event}/show', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');
    Route::post('/events', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');
    Route::patch('/events/{event}/upload', [App\Http\Controllers\EventController::class, 'upload'])->name('events.upload');
    Route::patch('/events/{event}/update', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}/delete', [App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');
});