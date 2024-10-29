<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\LaporanKeuangan;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $user = User::where('usertype', 'user')->get();
        $userCount = User::where('usertype', 'user')->count();


        $productCount = Product::count();
        $product = Product::all();

        // Ambil data detail_transaksi beserta pengguna dan transaksi
        $detailTransaksi = detail_transaksi::with(['transaksi.users'])->get();
        // Hitung jumlah detail transaksi
        $detailTransaksiCount = detail_transaksi::count();

        $reportCount = LaporanKeuangan::count();
        $report = LaporanKeuangan::all();
        return view('admin.home', compact('product', 'productCount', 'detailTransaksi', 'detailTransaksiCount','reportCount','report','user','userCount'));
    }function index1()
    {
        $productCount = Product::count();
        $product = Product::all();

        // Ambil data detail_transaksi beserta pengguna dan transaksi
        $detailTransaksi = detail_transaksi::with(['transaksi.users'])->get();
        // Hitung jumlah detail transaksi
        $detailTransaksiCount = detail_transaksi::count();

        $reportCount = LaporanKeuangan::count();
        $report = LaporanKeuangan::all();
        return view('user.home', compact('product', 'productCount', 'detailTransaksi', 'detailTransaksiCount','reportCount','report'));
    }
    public function showLaporanKeuangan()
    {
        // Mengambil data laporan keuangan
        $laporanKeuangan = LaporanKeuangan::all();
        
        // Mengirim data ke view
        return view('user.home', compact('laporanKeuangan'));
    }
    public function showLaporanKeuanganAdmin()
    {
        // Mengambil data laporan keuangan
        $laporanKeuangan = LaporanKeuangan::all();
        
        // Mengirim data ke view
        return view('admin.home', compact('laporanKeuangan'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
