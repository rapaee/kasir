<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use Illuminate\Http\Request;

class TransaksiAdminController extends Controller
{
    public function index()
    {
        return view('admin.transaksi');
    }
    public function index1()
    {
        // Menampilkan semua laporan tanpa filter
        $report = detail_transaksi::with(['product', 'transaksi.users'])->get();
        return view('admin.transaksi', [
            'report' => $report,
        ]);
    }
}
