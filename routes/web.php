<?php

use App\Http\Controllers\admin\BarangController as AdminBarangController;
use App\Http\Controllers\admin\detailfoodAnddrinkController as AdminDetailfoodAnddrinkController;
use App\Http\Controllers\admin\detailreportController;
use App\Http\Controllers\admin\detailtransaksiController;
use App\Http\Controllers\admin\detailUserController;
use App\Http\Controllers\BarangController; 
use App\Http\Controllers\LaporanKeuanganController; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BarangAdminController;
use App\Http\Controllers\BarangUserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DetailFoodAndDrinkController;
use App\Http\Controllers\DetailReportDashboard;
use App\Http\Controllers\DetailTransaksiDashboard;
use App\Http\Controllers\DetailUserController as ControllersDetailUserController;
use App\Http\Controllers\LaporanKeuanganUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiAdminController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\transaksiv2Controller;
use App\Models\detail_transaksi;
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
Route::get('/admin/data-barang', [AdminBarangController::class, 'index'])->name('data-barang-admin'); 
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
Route::get('/user/in-ed/add-detail-data-barang',[BarangUserController::class, 'create'])->name('add-detail-data-barang');
Route::get('/admin/add-data-barang',[AdminBarangController::class, 'create'])->name('add-data-barang-admin');
Route::get('/admin/add-detail-data-barang',[AdminDetailfoodAnddrinkController::class, 'create'])->name('add-detail-data-barang-admin');
Route::post('/user/in-ed/add-detail-data-barang', [BarangUserController::class, 'store'])->name('add-detail-data-barang.store');
Route::post('/user/in-ed/add-data-barang', [BarangController::class, 'store'])->name('add-data-barang.store');   
Route::post('/admin/add-data-barang', [AdminBarangController::class, 'store'])->name('add-data-barang-admin.store');   
Route::post('/admin/add-detail-data-barang', [AdminDetailfoodAnddrinkController::class, 'store'])->name('add-detail-data-barang-store');   
Route::get('/user/nota/', [TransaksiController::class, 'nota'])->name('user.nota');
Route::get('/user/nota/', [DetailUserController::class, 'notaa'])->name('user-notaa');

Route::middleware(['auth'])->group(function () {
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi-create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi-store');
});

// Rute untuk edit dan delete barang transaksi
Route::get('/user/in-ed/edit-data-barang/{id}', [BarangController::class, 'edit'])->name('edit-data-barang-user');
Route::get('/admin/edit-data-barang/{id}', [AdminBarangController::class, 'edit'])->name('edit-data-barang-admin');
Route::get('/admin/edit-detail-data-barang/{id}', [AdminDetailfoodAnddrinkController::class, 'edit'])->name('edit-detail-data-barang-admin');
Route::get('/user/in-ed/edit-profile/',[ProfileController::class,'editProfile'])->name('edit-profile');
Route::put('/user/update/{id}', [BarangController::class, 'update'])->name('update-data-barang');
Route::put('/admin/update/{id}', [AdminDetailfoodAnddrinkController::class, 'update'])->name('update-data-detail-barang-admin');
Route::put('/admin/update/{id}', [AdminBarangController::class, 'update'])->name('update-data-barang-admin');
Route::delete('/user/delete/{id}', [BarangController::class,'destroy'])->name('delete-data-barang');
Route::delete('/admin/delete-food/{id}', [AdminDetailfoodAnddrinkController::class, 'destroy'])->name('delete-data-barang-admin');
Route::delete('/admin/delete-product/{id}', [AdminBarangController::class, 'destroy'])->name('delete-product-admin');
Route::get('/admin/transaksi/filter', [TransaksiAdminController::class, 'filter'])->name('transaksi-filter-admin');
Route::get('/admin/transaksi/show', [TransaksiAdminController::class, 'show'])->name('transaksi-filter-all');
Route::get('/user/detail-laporan{id}', [ControllersDetailUserController::class, 'show'])->name('detail-laporan');




//detail halaman dashboard user
Route::get('user/detail-food&drink/',[DetailFoodAndDrinkController::class,'index'])->name('detail-f&d');
Route::get('admin/detail-food&drink/',[AdminDetailfoodAnddrinkController::class,'index'])->name('detail-f&d-admin');
Route::get('user/detail-transaksi-dashboard/',[DetailTransaksiDashboard::class,'index'])->name('detail-transaksi-dashboard');
Route::get('admin/detail-transaksi-dashboard/',[detailtransaksiController::class,'index'])->name('detail-transaksi-dashboard-admin');
Route::get('user/detail-report-dashboard/',[DetailReportDashboard::class,'index'])->name('detail-report-dashboard');
Route::get('admin/detail-report-dashboard/',[detailreportController::class,'index'])->name('detail-report-dashboard-admin');
Route::get('admin/detail-user-dashboard/',[detailUserController::class,'index'])->name('detail-user-dashboard-admin');


//laporan keuangan
Route::get('/laporan-keuangan/harian', [LaporanKeuanganController::class, 'totalPendapatanHarian'])->name('laporan-keuangan-harian');
Route::get('/laporan-keuangan/filter', [LaporanKeuanganUserController::class, 'filterPendapatan'])->name('laporan-keuangan-filter');
Route::get('/laporan-keuangan/bulanDsh', [DetailReportDashboard::class, 'filterBulanan'])->name('laporan-keuangan-bulan');
Route::get('/admin/laporan-keuangan/bulan', [detailreportController::class, 'filterBulanan'])->name('laporan-keuangan-bulan-admin');
Route::get('/laporan-keuangan/bulann', [DetailReportDashboard::class, 'laporanKeuanganBulan'])->name('laporan-keuangan.bulan');
Route::post('/simpan-total-pendapatan', [LaporanKeuanganController::class, 'simpanTotalPendapatan'])->name('simpan-total-pendapatan');
Route::get('/admin/laporan-keuangan', [LaporanKeuanganController::class, 'filter'])->name('laporan-keuangan-admin');
Route::get('/laporan-keuangan', [LaporanKeuanganUserController::class, 'index2'])->name('laporan-keuangan-index2');

//excel
Route::get('/export-laporan-keuangan', [LaporanKeuanganController::class, 'export'])->name('export-laporan-keuangan');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

//bar chart
Route::get('/laporan-keuangan', [LoginController::class, 'showLaporanKeuangan'])->name('bar-chart');
Route::get('/laporan-keuangan/admin', [LoginController::class, 'showLaporanKeuanganAdmin'])->name('bar-chart-admin');





?>