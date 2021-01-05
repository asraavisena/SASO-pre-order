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

Route::get('/react', function () {
    return view('react-welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index'); 

    Route::get('/admin/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
    Route::get('/admin/events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
    Route::post('/admin/events', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');

    Route::get('/admin/menus', [App\Http\Controllers\MenuController::class, 'index'])->name('menus.index');
});
