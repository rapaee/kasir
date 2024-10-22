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
    public function barChart()
    {
        // Gantilah dengan logika pengambilan data yang sesuai
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];
        return view('user.data-barang', compact('data'));
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
