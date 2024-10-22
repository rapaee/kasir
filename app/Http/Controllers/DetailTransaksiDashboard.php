<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use Illuminate\Http\Request;

class DetailTransaksiDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data transaksi detail beserta relasi user, transaksi, dan produk dengan pagination
        $report = detail_transaksi::with(['transaksi.users', 'product']) // Menggunakan eager loading
                                ->paginate(10); // 10 transaksi per halaman
        
        // Mengirim data ke view
        return view('user.detail-transaksi-dashboard', compact('report'));
    }
}
