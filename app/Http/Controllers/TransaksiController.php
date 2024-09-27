<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
{
    public function index()
    {
        return view('admin.transaksi');
    }
    public function index1()
    {
        return view('user.transaksi');
    }

     // Process the transaction form submission
     public function store(Request $request)
     {
         // Start database transaction for atomic operations
         DB::beginTransaction();
 
         try {
             // Retrieve Kasir using NISN
             $kasir = Kasir::where('nisn', $request->nisn)->firstOrFail();
 
             // Retrieve Barang using Nama Barang
             $barang = Product::where('nama_barang', $request->nama_barang)->firstOrFail();
 
             // Create new Transaksi
             $transaksi = Transaksi::create([
                 'kasir_id' => $kasir->id,
                 'total_harga' => 0 // This will be updated later
             ]);
 
             // Calculate subtotal (jumlah_barang * harga_barang)
             $sub_total = $request->jumlah_barang * $barang->harga;
 
             // Update Transaksi total_harga with the subtotal
             $transaksi->total_harga = $sub_total;
             $transaksi->save();
 
             // Commit the transaction to the database
             DB::commit();
 
             return redirect()->back()->with('success', 'Transaksi berhasil disimpan.');
 
         } catch (\Exception $e) {
             // Rollback if there is an error
             DB::rollback();
             return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
         }
     }
}
