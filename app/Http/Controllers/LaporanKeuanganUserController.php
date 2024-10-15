<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\LaporanKeuangan;
use App\Models\Product;
use App\Models\Transaksi;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanKeuanganExport;
use Carbon\Carbon;
use Illuminate\Http\Request;


class LaporanKeuanganUserController extends Controller
{
    public function index()
    {
        $report = LaporanKeuangan::all();
        return view('admin.laporan-keuangan',compact('report'));
    }
    public function filter(Request $request)
    {
        $query = LaporanKeuangan::query();
    
        // Cek apakah ada tanggal yang dikirim melalui request
        if ($request->has('tanggal')) {
            $tanggal = $request->input('tanggal');
            // Filter berdasarkan tanggal
            $query->whereDate('tanggal_laporan', $tanggal);
        }
    
        $report = $query->get();
        return view('admin.laporan-keuangan', compact('report'));
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
    public function simpanTotalPendapatan(Request $request)
    {
        // Ambil tanggal dari input form
        $tanggal = $request->get('tanggal');
        
        // Jika tanggal tidak ada, set ke hari ini
        $tanggal = $tanggal ? Carbon::parse($tanggal) : Carbon::today();
    
        // Hitung total pendapatan dari tabel detail_transaksi berdasarkan tanggal yang difilter
        $totalPendapatan = detail_transaksi::whereDate('created_at', $tanggal)
                                            ->sum('sub_total');
        
        // Ambil satu contoh id_detail dari tabel detail_transaksi berdasarkan tanggal
        $idDetail = detail_transaksi::whereDate('created_at', $tanggal)
                                    ->select('id')->first()->id;
        
        // Simpan atau update data ke dalam laporan_keuangan berdasarkan tanggal yang dipilih
        $laporanKeuangan = LaporanKeuangan::updateOrCreate(
            ['tanggal_laporan' => $tanggal->toDateString()], // Acuan berdasarkan tanggal yang dipilih
            [
                'total_pendapatan' => $totalPendapatan,
                'id_detail' => $idDetail // Tambahkan id_detail ke dalam query
            ]
        );
        
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Total pendapatan untuk tanggal tersebut berhasil disimpan');
    }
    public function export()
    {
        return Excel::download(new LaporanKeuanganExport, 'laporan_keuangan.xlsx');
    }

    public function laporanKeuangan(Request $request)
{
    $tanggal = $request->input('tanggal');
    if ($tanggal) {
        $report = Transaksi::whereDate('tanggal', $tanggal)->get();
    } else {
        $report = collect(); // atau Transaksi::all() jika ingin menampilkan semua data
    }
    return view('laporan-keuangan', compact('report'));
}

}
