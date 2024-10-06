<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function create()
    {
        $nama_barang = Product::all();
        return view('user.transaksi', compact( 'nama_barang'));
    }

    public function store(Request $request)
    {
        $request->validate([ 
            'tanggal.*' => 'required|date',
            'nama_barang' => 'required|array', // Pastikan ada array barang
            'jumlah_barang' => 'required|array',
            'sub_total' => 'required|array',
        ]);
    
        // Buat transaksi baru sekali saja
        $transaksi = Transaksi::create([
            'id_users' => Auth::id(),
            'tanggal' => now(), // Tanggal transaksi
        ]);
    
        // Simpan detail barang terkait transaksi yang sama
        foreach ($request->nama_barang as $key => $barang) {
            // Simpan detail transaksi dengan menggunakan satu id_transaksi
            detail_transaksi::create([
                'id_transaksi' => $transaksi->id, // Gunakan satu id_transaksi untuk semua barang
                'id_barang' => $barang, // ID barang dari form
                'jumlah_barang' => $request->jumlah_barang[$key], // Jumlah barang dari form
                'sub_total' => $request->sub_total[$key], // Sub total dari form
            ]);
    
            // Update stok barang
            $barangModel = Product::find($barang);
            $barangModel->stok_barang -= $request->jumlah_barang[$key];
            $barangModel->save();
        }
    
        return redirect()->route('transaksi-user')->with('success', 'Transaksi berhasil disimpan dan stok barang telah diperbarui!');
    }
    
    


}
