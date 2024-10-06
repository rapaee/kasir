<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        return view('admin.laporan-keuangan');
    }

    public function index1()
    {
        // Menampilkan semua laporan tanpa filter
        $report = detail_transaksi::with(['product', 'transaksi.users'])->get();
        return view('user.laporan-keuangan', [
            'report' => $report,
        ]);
    }

    public function totalPendapatanHarian()
    {
        // Mengambil tanggal hari ini
        $tanggalHariIni = Carbon::today();

        // Menghitung total pendapatan (sub_total) per hari
        $totalPendapatanHariIni = detail_transaksi::whereDate('created_at', $tanggalHariIni)
                                ->sum('sub_total');

        // Mengambil laporan detail untuk ditampilkan
        $report = detail_transaksi::with(['product', 'transaksi.users'])
                                    ->whereDate('created_at', $tanggalHariIni)
                                    ->get();

        return view('user.laporan-keuangan', [
            'totalPendapatanHariIni' => $totalPendapatanHariIni,
            'report' => $report,
        ]);
    }

    public function filterPendapatan(Request $request)
    {
        // Ambil tanggal dari input form
        $tanggal = $request->get('tanggal');
        
        // Jika tanggal tidak ada, set ke hari ini
        $tanggal = $tanggal ? Carbon::parse($tanggal) : Carbon::today();

        // Mengambil laporan detail untuk tanggal yang dipilih
        $report = detail_transaksi::with(['product', 'transaksi.users'])
                ->whereDate('created_at', $tanggal)
                ->get();

        // Menghitung total pendapatan (sub_total) untuk tanggal yang dipilih
        $totalPendapatan = $report->sum('sub_total');

        return view('user.laporan-keuangan', [
            'totalPendapatanHariIni' => $totalPendapatan,
            'report' => $report,
        ]);
    }
    

}
