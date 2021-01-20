<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/react', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index'); 

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index'); 

    // Events
    Route::get('/admin/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
    Route::get('/admin/events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
    Route::get('/admin/events/{event}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
    Route::get('/admin/events/{event}/show', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');
    Route::post('/admin/events', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');
    Route::patch('/admin/events/{event}/update', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
    Route::delete('/admin/events/{event}/delete', [App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');

    Route::get('/admin/menus', [App\Http\Controllers\MenuController::class, 'index'])->name('menus.index');
    Route::get('/admin/menus/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menus.create');
    Route::post('/admin/menus', [App\Http\Controllers\MenuController::class, 'store'])->name('menus.store');

    Route::get('/admin/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/admin/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
});
