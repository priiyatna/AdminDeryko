<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/produk', [App\Http\Controllers\HomeController::class, 'produk'])->name('produk');
Route::get('/transaksi', [App\Http\Controllers\HomeController::class, 'transaksi'])->name('transaksi');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::post('/update-profile', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('update.profile');


Route::prefix('transaksi')->name('transaksi.')->group(function () {
    Route::get('/tambah', [App\Http\Controllers\HomeController::class, 'tambah'])->name('tambah');
    Route::post('/submit', [App\Http\Controllers\HomeController::class, 'submit'])->name('submit');
    Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
    Route::get('/cetak-pdf', [App\Http\Controllers\HomeController::class, 'cetakPdf'])->name('cetak.pdf'); 
});

Route::get('/laporan_penjualan', [App\Http\Controllers\HomeController::class, 'laporan_penjualan'])->name('laporan_penjualan');
Route::get('/laporan_stokbarang', [App\Http\Controllers\HomeController::class, 'laporan_stokbarang'])->name('laporan_stokbarang');