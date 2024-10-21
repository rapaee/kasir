<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\Transaksi;

class TransaksiAdminController extends Controller
{
    public function index()
    {
        return view('admin.transaksi');
    }
    public function index1()
    {
        $report = detail_transaksi::with(['product', 'transaksi.users'])->paginate(10);
        return view('admin.transaksi', [
            'report' => $report,
        ]);
    }
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            $transaksi->delete();
            return redirect()->route('transaksi-admin')->with('success', 'Data barang berhasil dihapus');
        } else {
            return redirect()->route('transaksi-admin')->with('error', 'Data barang tidak ditemukan');
        }
    }
}
