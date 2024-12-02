<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\DetailTransaksi;
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
                'kode_barang.*' => 'required', // Pastikan setiap item di kode_barang tidak kosong
                'jumlah_barang' => 'required|array|min:1',
                'jumlah_barang.*' => 'required|integer|min:1', // Pastikan jumlah adalah integer dan minimal 1
                'sub_total' => 'required|array|min:1',
                'sub_total.*' => 'required|numeric|min:0', // Pastikan subtotal adalah angka dan minimal 0
            ]);

            // Mulai transaksi database
            DB::beginTransaction();

            // Buat transaksi baru
            $transaksi = Transaksi::create([
                'id_users' => Auth::id(),
                'tanggal' => now(), // Tanggal transaksi
            ]);

            // Simpan detail barang terkait transaksi
            foreach ($request->kode_barang as $key => $kode_barang) {
                // Temukan model barang berdasarkan kode_barang
                $barangModel = Product::where('kode_barang', $kode_barang)->first();

                if (!$barangModel) {
                    return redirect()->route('transaksi-user')->with('error', 'Barang dengan kode ' . $kode_barang . ' tidak ditemukan.');
                }

                // Pastikan stok cukup
                if ($barangModel->stok_barang < $request->jumlah_barang[$key]) {
                    return redirect()->route('transaksi-user')->with('error', 'Stok barang tidak cukup untuk: ' . $barangModel->nama_barang);
                }

                // Simpan detail transaksi
                detail_transaksi::create([
                    'id_transaksi' => $transaksi->id, // Gunakan satu id_transaksi untuk semua barang
                    'id_barang' => $barangModel->id, // ID barang dari model
                    'jumlah_barang' => $request->jumlah_barang[$key], // Jumlah barang dari form
                    'sub_total' => $request->sub_total[$key], // Sub total dari form
                ]);

                // Update stok barang
                $barangModel->stok_barang -= $request->jumlah_barang[$key];
                $barangModel->save();
            }

            // Commit transaksi database
            DB::commit();

            // Redirect ke halaman nota dengan pesan sukses
            return view('user.nota', compact('transaksi'));
        } catch (\Exception $e) {
            // Rollback jika ada kesalahan
            DB::rollback();

            // Log error untuk debugging
            Log::error('Gagal menambahkan produk: ' . $e->getMessage());

            // Redirect kembali ke form tambah data dengan pesan error
            return redirect()->route('transaksi-user')->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }
}
