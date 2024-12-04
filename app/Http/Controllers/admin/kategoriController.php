<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $new_kategori=Kategori::all();
        return view('admin/kategori', compact('new_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $new_kategori=Kategori::all();
        return view('admin/add-kategori', compact('new_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);
    
        try {
            // Membuat instance produk baru dan menyimpan data
            $new_product = new Kategori();
            $new_product->nama_kategori = $request->nama_kategori;
            $new_product->save();
    
            // Redirect ke halaman data-barang dengan pesan sukses
            return redirect()->route('add-kategori')->with('success', 'Berhasil menambahkan produk');
        } catch (\Exception $e) {
            // Redirect kembali ke form tambah data dengan pesan error
            return redirect()->route('add-kategori-admin')->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
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
