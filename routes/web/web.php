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

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{menu}/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

// TEMPORARY WILL BE DELETED
Route::get('/beli', [App\Http\Controllers\MenuController::class, 'beli'])->name('menu.beli');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index'); 
    Route::post('/images', [App\Http\Controllers\ImageController::class, 'store'])->name('images.store');


});
