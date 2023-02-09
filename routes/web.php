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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\ProdukController::class, 'welcome'])->name('welcome');
Route::get('/profil', [App\Http\Controllers\ProdukController::class, 'profil'])->name('profil');
Route::get('/detail', [App\Http\Controllers\ProdukController::class, 'detail'])->name('detail');
Route::get('/cart/{id}', [App\Http\Controllers\PesananController::class, 'cart'])->name('cart');
Route::post('/cart/{id}', [App\Http\Controllers\PesananController::class, 'cart'])->name('cart');
Route::put('/cart/{id}', [App\Http\Controllers\PesananController::class, 'cartjumlah'])->name('cartjumlah');
Route::delete('/cart/delete/{id}', [App\Http\Controllers\pesananController::class, 'cartdelete'])->name('cartdelete');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/admin/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produkindex');
Route::post('/admin/produk', [App\Http\Controllers\ProdukController::class, 'create'])->name('produkcreate');
Route::put('/admin/produk', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produkedit');
Route::delete('/admin/produk', [App\Http\Controllers\ProdukController::class, 'delete'])->name('produkdelete');

Route::get('/admin/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategoriindex');
Route::post('/admin/kategori', [App\Http\Controllers\KategoriController::class, 'create'])->name('kategoricreate');
Route::put('/admin/kategori', [App\Http\Controllers\KategoriController::class, 'edit'])->name('kategoriedit');
Route::delete('/admin/kategori', [App\Http\Controllers\KategoriController::class, 'delete'])->name('kategoridelete');

Route::get('/admin/satuan', [App\Http\Controllers\SatuanController::class, 'index'])->name('satuanindex');
Route::post('/admin/satuan', [App\Http\Controllers\SatuanController::class, 'create'])->name('satuancreate');
Route::put('/admin/satuan', [App\Http\Controllers\SatuanController::class, 'edit'])->name('satuanedit');
Route::delete('/admin/satuan', [App\Http\Controllers\SatuanController::class, 'delete'])->name('satuandelete');
