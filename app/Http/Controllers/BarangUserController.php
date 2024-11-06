<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class BarangUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
   {
      // Mengambil semua produk dari database
      $new_product = Product::all();
      $kategori = Kategori::all();
      // Mengirim data produk ke view
      return view('user.in-ed.add-detail-data-barang',  compact('kategori'),[
         'new_product' => $new_product,
      ]);
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
       // Validasi input dari form
       $request->validate([
           'nama_barang' => 'required|string',
           'kode_barang' => 'required|numeric',
           'harga' => 'required|numeric',
           'kategori_barang' => 'required|exists:kategori,id', // Validasi kategori harus ada di tabel kategori
           'stok_barang' => 'required|numeric',
       ]);
   
       try {
           // Membuat instance produk baru dan menyimpan data
           $new_product = new Product();
           $new_product->nama_barang = $request->nama_barang;
           $new_product->kode_barang = $request->kode_barang;
           $new_product->harga = $request->harga;
           $new_product->id_kategori = $request->kategori_barang; // Menyimpan kategori barang yang dipilih
           $new_product->stok_barang = $request->stok_barang;
           $new_product->save();
   
           // Redirect ke halaman data-barang dengan pesan sukses
           return redirect()->route('detail-f&d')->with('success', 'Berhasil menambahkan produk');
       } catch (\Exception $e) {
           // Redirect kembali ke form tambah data dengan pesan error
           return redirect()->route('add-detail-data-barang')->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
       }
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
