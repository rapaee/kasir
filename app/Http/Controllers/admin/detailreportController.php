<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class detailreportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report = LaporanKeuangan::all();
        $count = LaporanKeuangan::paginate(10);
        return view('admin.detail-report-dashboard', compact('report', 'count'));
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
            $report = Transaksi::all(); // Jika tidak ada data, return koleksi kosong
        }
    
        return view('admin.detail-report-dashboard', [
            'report' => $data,
        ]);
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
