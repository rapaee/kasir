<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create()
    {
        $nama_kasir = Kasir::all();
        $nama_barang = Product::all();
        return view('user.transaksi', compact('nama_kasir', 'nama_barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kasir' => 'required|exists:kasir,id',
            'nama_barang.*' => 'required|exists:barang,id', // Pastikan id_barang ada
            'harga.*' => 'required|numeric',
            'jumlah_barang.*' => 'required|integer',
            'sub_total.*' => 'required|numeric',
        ]);
    
        // Simpan transaksi dan kurangi stok barang
        foreach ($request->nama_barang as $key => $barang) {
            // Simpan transaksi
            Transaksi::create([
                'id_kasir' => $request->id_kasir,
                'id_barang' => $barang,
                'jumlah_barang' => $request->jumlah_barang[$key],
                'sub_total' => $request->sub_total[$key],
                'tanggal' => now(), // Menyimpan tanggal transaksi
            ]);
    
            // Kurangi stok barang di tabel barang
            $barangModel = Product::find($barang);
            $barangModel->stok_barang -= $request->jumlah_barang[$key];
            $barangModel->save();
        }
    
        return redirect()->route('transaksi-create')->with('success', 'Transaksi berhasil disimpan dan stok barang telah diperbarui!');
    }
    


}
