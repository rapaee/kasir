<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    // BarangController.php
        public function getNamaBarang($kode_barang)
        {
            // Cari barang berdasarkan kode_barang
            $barang = Product::where('kode_barang', $kode_barang)->first();

            if ($barang) {
                return response()->json(['nama_barang' => $barang->nama_barang]);
            } else {
                return response()->json(['nama_barang' => null]);
            }
        }

    // Fungsi untuk mengambil harga barang berdasarkan kode_barang
   // BarangController.php
public function getBarangDetails($kode_barang)
{
    // Cari barang berdasarkan kode_barang
    $barang = Product::where('kode_barang', $kode_barang)->first();

    if ($barang) {
        return response()->json([
            'nama_barang' => $barang->nama_barang,
            'harga' => $barang->harga
        ]);
    } else {
        return response()->json([
            'nama_barang' => null,
            'harga' => null
        ]);
    }
}


    public function create()
    {
        $nama_barang = Product::all();
        return view('user.transaksi', compact('nama_barang'));
    }

    public function nota()
    {
        $transaksi = Transaksi::with('detail_transaksi')->create([
            'id_users' => Auth::id(),
            'tanggal' => now(), // Tanggal transaksi
        ]);

        return view('user.nota', compact('transaksi'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'kode_barang' => 'required|array|min:1',
                'kode_barang.*' => 'required',
                'jumlah_barang' => 'required|array|min:1',
                'jumlah_barang.*' => 'required|integer|min:1',
                'sub_total' => 'required|array|min:1',
                'sub_total.*' => 'required|numeric|min:0',
                'nominal' => 'required|numeric|min:0', // Validasi nominal total pembayaran
            ]);

    
            // Mulai transaksi database
            DB::beginTransaction();
    
            // Buat transaksi baru
            $transaksi = Transaksi::create([
                'id_users' => Auth::id(),
                'tanggal' => now(), // Tanggal transaksi
            ]);

            // dd($request->all());
    
            $totalSubTotal = 0;
    
            // Simpan detail barang terkait transaksi
            foreach ($request->kode_barang as $key => $kode_barang) {
                $barangModel = Product::where('kode_barang', $kode_barang)->first();
    
                if (!$barangModel) {
                    return redirect()->route('transaksi-user')->with('error', 'Barang dengan kode ' . $kode_barang . ' tidak ditemukan.');
                }
    
                if ($barangModel->stok_barang < $request->jumlah_barang[$key]) {
                    return redirect()->route('transaksi-user')->with('error', 'Stok barang tidak cukup untuk: ' . $barangModel->nama_barang);
                }
    
                detail_transaksi::create([
                    'id_transaksi' => $transaksi->id,
                    'id_barang' => $barangModel->id,
                    'jumlah_barang' => $request->jumlah_barang[$key],
                    'sub_total' => $request->sub_total[$key],
                    'nominal' => $request->nominal[$key],
                ]);
    
                $barangModel->stok_barang -= $request->jumlah_barang[$key];
                $barangModel->save();
    
                $totalSubTotal += $request->sub_total[$key];
            }
    
            // Commit transaksi database
            DB::commit();
    
            // Hitung kembalian
            $kembalian = $request->nominal - $totalSubTotal;
    
            // Redirect ke halaman nota dengan data transaksi dan kembalian
            return view('user.nota', compact('transaksi', 'kembalian'));
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Gagal menambahkan produk: ' . $e->getMessage());
            return redirect()->route('transaksi-user')->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }
    
}
