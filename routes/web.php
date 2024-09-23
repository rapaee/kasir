<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('auth/login', function () {
    return view('login');
})->name('register'); // untuk halaman setelah register otomatis halaman user


// Route::get('user/home', function () {
//     return view('user/home');
// })->middleware(['auth', 'verified'])->name('home');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//navbar halaman admin
Route::get('admin/home',[LoginController::class,'index'])->name('home');
Route::get('/admin/data-barang', [NavController::class, 'index'])->name('data-barang');
Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/admin/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan-keuangan');
//
//navbar halaman user
Route::get('user/home',[UserController::class, 'nav'])->name('home');
Route::get('user/data-barang',[UserController::class, 'nav1'])->name('data-barang.post');
//
Route::get('/user/in-ed/add-data-barang',[BarangController::class, 'create'])->name('add-data-barang');
Route::post('user/in-ed/add-data-barang', [BarangController::class, 'store'])->name('add-data-barang');





