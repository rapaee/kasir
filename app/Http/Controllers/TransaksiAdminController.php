<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\LaporanKeuangan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class TransaksiAdminController extends Controller
{
    public function index()
    {
        // Menampilkan halaman transaksi kosong atau data default
        return view('admin.transaksi');
    }

    public function index1()
    {
        // Menampilkan daftar transaksi dengan relasi 'product' dan 'transaksi.users'
        $report = detail_transaksi::with(['product', 'transaksi.users'])->paginate(10);
        
        return view('admin.transaksi', [
            'report' => $report,
        ]);
    }

    public function show()
    {
        // Menampilkan semua laporan tanpa filter
        $report = detail_transaksi::with(['product', 'transaksi.users'])->paginate(10);
        return view('admin.transaksi', [
            'report' => $report,
        ]);
    }

    public function filter(Request $request)
    {
        // Filter data transaksi berdasarkan tanggal
        $tanggal = $request->input('tanggal');
        $report = detail_transaksi::whereHas('transaksi', function ($query) use ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        })->with(['product', 'transaksi.users'])->paginate(10);

        // Tampilkan hasil filter ke dalam view admin.transaksi
        return view('admin.transaksi', compact('report'));
    }
}
