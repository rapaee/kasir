<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeuangan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailReportDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = LaporanKeuangan::all();
        $count = LaporanKeuangan::paginate(10);
        return view('user.detail-report-dashboard', compact('report', 'count'));
    }
    public function filterBulanan(Request $request)
{
    $bulan = $request->input('bulan');
    
    if ($bulan) {
        // Filter berdasarkan bulan dan tahun saat ini
        $data = LaporanKeuangan::whereMonth('tanggal_laporan', $bulan)
            ->whereYear('tanggal_laporan', Carbon::now()->year)
            ->get();
    } else {
        // Tampilkan pesan atau data kosong jika tidak ada bulan yang dipilih
        $report = transaksi::all(); // Jika tidak ada data, return koleksi kosong
    }

    return view('user.detail-report-dashboard', [
        'report' => $data,
    ]);
}


    // Filter detail dasboard user
    // public function filterBulanan(Request $request)
    // {
    //     // Ambil tanggal dari input form
    //     $tanggal = $request->get('tanggal_laporan');
        
    //     // Jika tanggal tidak ada, set ke bulan ini
    //     $tanggal = $tanggal ? Carbon::parse($tanggal) : Carbon::today();
        
    //     // Mengambil awal dan akhir bulan dari tanggal yang dipilih
    //     $startOfMonth = $tanggal->copy()->startOfMonth();
    //     $endOfMonth = $tanggal->copy()->endOfMonth();
        
    //     // Mengambil laporan dari tabel laporan_keuangan untuk bulan yang dipilih
    //     $report = LaporanKeuangan::with('detail_transaksi') // Jika ada relasi ke detail
    //         ->whereBetween('tanggal_laporan', [$startOfMonth, $endOfMonth])
    //         ->get();
        
    //     // Menghitung total pendapatan (total_pendapatan) untuk bulan yang dipilih
    //     $totalPendapatan = $report->sum('total_pendapatan');

    //     return view('user.detail-report-dashboard', [
    //         'totalPendapatanBulanIni' => $totalPendapatan,
    //         'report' => $report,
    //         'tanggal_laporan' => $tanggal->format('Y-m'), // Mengirimkan bulan yang difilter ke view
    //     ]);
    // }

    // /**
    //  * Get financial report for a specific month.
    //  */
    // public function filterBulan(Request $request)
    // {
    //     $bulan = $request->input('bulan');
        
    //     if ($bulan) {
    //         // Ambil data sesuai bulan yang dipilih
    //         $data = LaporanKeuangan::whereMonth('tanggal_laporan', $bulan)->get();
    //     } else {
    //         // Tampilkan pesan atau data kosong
    //         $data = collect(); // atau bisa juga menggunakan null
    //     }
    
    //     return view('user.detail-report-dashboard', compact('data'));
    // }
    
    
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