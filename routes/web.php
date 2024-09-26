<?php 

use App\Http\Controllers\BarangController; 
use App\Http\Controllers\LaporanKeuanganController; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\NavController; 
use App\Http\Controllers\Auth\AuthenticatedSessionController; 
use App\Http\Controllers\KasirController; 
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\TransaksiController; 
use App\Http\Controllers\UserController; 
use Illuminate\Support\Facades\Route;  

// Rute autentikasi login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Rute yang membutuhkan autentikasi
Route::middleware('auth')->group(function () {     
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');     
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');     
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});  

// Menyertakan rute autentikasi bawaan
require __DIR__.'/auth.php';  

// Navbar halaman admin
Route::get('/admin/home',[LoginController::class,'index'])->name('admin.home'); 
Route::get('/admin/data-kasir',[KasirController::class,'viewAdminkasir'])->name('kasir-admin'); 
Route::get('/admin/data-barang', [NavController::class, 'index'])->name('data-barang-admin'); 
Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('transaksi-admin'); 
Route::get('/admin/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan-keuangan-admin'); 

// Navbar halaman user
Route::get('/user/home',[UserController::class, 'nav'])->name('user.home'); 
Route::get('/user/data-kasir',[KasirController::class, 'index'])->name('data-kasir-user'); 
Route::get('/user/data-barang',[UserController::class, 'nav1'])->name('data-barang-user'); 
Route::get('/user/laporan-keuangan',[LaporanKeuanganController::class,'index1'])->name('laporan-keuangan-user'); 
Route::get('/user/transaksi',[TransaksiController::class,'index1'])->name('transaksi-user'); 

// Rute untuk tambah barang dan kasir
Route::get('/user/in-ed/add-data-barang',[BarangController::class, 'create'])->name('add-data-barang'); 
Route::post('/user/in-ed/add-data-barang', [BarangController::class, 'store'])->name('add-data-barang.store'); 
Route::get('/user/in-ed/add-kasir',[KasirController::class,'create'])->name('add-kasir'); 
Route::post('/user/in-ed/add-kasir',[KasirController::class,'store'])->name('add-kasir.store');  

// Rute untuk edit dan delete barang
Route::get('/user/in-ed/edit-data-barang/{id}', [BarangController::class, 'edit'])->name('edit-data-barang-user');
Route::put('/user/update/{id}', [BarangController::class, 'update'])->name('update-data-barang');
Route::delete('/user/delete/{id}', [BarangController::class,'destroy'])->name('delete-data-barang');

// Rute untuk edit dan delete kasir
Route::get('/admin/edit-data-kasir/{id}', [KasirController::class, 'edit'])->name('edit-data-kasir-admin'); 
Route::put('/admin/data-kasir/update/{id}', [KasirController::class, 'update'])->name('update-data-kasir-admin');
Route::delete('/admin/delete/{id}', [KasirController::class, 'destroy'])->name('delete-kasir-admin'); 

?>