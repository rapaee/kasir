<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\Transaksi;
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
    public function destroy($id)
   {
       $dataBarang = detail_transaksi::find($id);
       if ($dataBarang) {
           $dataBarang->delete();
           return redirect()->route('data-barang-user')->with('success', 'Data barang berhasil dihapus');
       } else {
           return redirect()->route('data-barang-user')->with('error', 'Data barang tidak ditemukan');
       }
   }
}
