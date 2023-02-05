<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/admin/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produkindex');
Route::post('/admin/produk', [App\Http\Controllers\ProdukController::class, 'create'])->name('produkcreate');
Route::put('/admin/produk', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produkedit');
Route::delete('/admin/produk', [App\Http\Controllers\ProdukController::class, 'delete'])->name('produkdelete');
