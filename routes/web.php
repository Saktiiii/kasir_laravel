<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Beranda;
use App\Livewire\User;
use App\Livewire\Produk;
use App\Livewire\Transaksi;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Laporan;
use Illuminate\Support\Facades\App;

Route::get('home', function () {
    return view('home');
});



Auth::routes();
Route::get('/home', Beranda::class)->middleware(['auth'])->name('home');
Route::get('/user', User::class)->name('user');
Route::get('/produk', Produk::class)->middleware(['auth'])->name('produk');
Route::get('/transaksi', Transaksi::class)->middleware(['auth'])->name('transaksi');
Route::get('/laporan', Laporan::class)->middleware(['auth'])->name('laporan');
Route::get('/cetak', ['App\Http\Controllers\HomeController', 'cetak']);
