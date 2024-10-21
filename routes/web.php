<?php 

use App\Http\Controllers\BarangController; 
use App\Http\Controllers\LaporanKeuanganController; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DetailFoodAndDrinkController;
use App\Http\Controllers\LaporanKeuanganUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiAdminController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\transaksiv2Controller;
use Illuminate\Support\Facades\Route;  

Route::get('/', function () {
    return view('welcome');
});
// Rute autentikasi login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
Route::get('/admin/data-barang', [BarangController::class, 'index'])->name('data-barang-admin'); 
Route::get('/admin/transaksi', [TransaksiAdminController::class, 'index1'])->name('transaksi-admin'); 
Route::get('/admin/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan-keuangan-admin'); 

// Navbar halaman user
Route::get('/user/home',[LoginController::class, 'index1'])->name('user.home'); 
Route::get('/user/data-barang',[BarangController::class, 'nav1'])->name('data-barang-user'); 
Route::get('/user/laporan-keuangan',[LaporanKeuanganUserController  ::class,'index1'])->name('laporan-keuangan-user'); 
Route::get('/user/transaksi',[TransaksiController::class,'create'])->name('transaksi-user'); 
Route::get('/user/transaksiv2',[transaksiv2Controller::class,'index'])->name('transaksiv2-user'); 

// Rute untuk tambah barang dan transaksi
Route::get('/user/in-ed/add-data-barang',[BarangController::class, 'create'])->name('add-data-barang'); 
Route::post('/user/in-ed/add-data-barang', [BarangController::class, 'store'])->name('add-data-barang.store');   
Route::post('/user/transaksi',[TransaksiController::class,'store'])->name('transaksi-store');

Route::middleware(['auth'])->group(function () {
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi-create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi-store');
});

// Rute untuk edit dan delete barang transaksi
Route::get('/user/in-ed/edit-data-barang/{id}', [BarangController::class, 'edit'])->name('edit-data-barang-user');
Route::get('/user/in-ed/edit-profile/',[ProfileController::class,'editProfile'])->name('edit-profile');
Route::put('/user/update/{id}', [BarangController::class, 'update'])->name('update-data-barang');
Route::delete('/user/delete/{id}', [BarangController::class,'destroy'])->name('delete-data-barang');
Route::delete('/admin/delete/{id}', [TransaksiAdminController::class,'destroy'])->name('delete-transaksi-admin');

//detail halaman dashboard user
Route::get('user/detail-food&drink/',[DetailFoodAndDrinkController::class,'index'])->name('detail-f&d');

//laporan keuangan
Route::get('/laporan-keuangan/harian', [LaporanKeuanganController::class, 'totalPendapatanHarian'])->name('laporan-keuangan-harian');
Route::get('/laporan-keuangan/filter', [LaporanKeuanganUserController::class, 'filterPendapatan'])->name('laporan-keuangan-filter');
Route::post('/simpan-total-pendapatan', [LaporanKeuanganController::class, 'simpanTotalPendapatan'])->name('simpan-total-pendapatan');
Route::get('/admin/laporan-keuangan', [LaporanKeuanganController::class, 'filter'])->name('laporan-keuangan-admin');
Route::get('/laporan-keuangan', [LaporanKeuanganUserController::class, 'index2'])->name('laporan-keuangan-index2');

//excel
Route::get('/export-laporan-keuangan', [LaporanKeuanganController::class, 'export'])->name('export-laporan-keuangan');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


?>