<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  
    public function index()
    {
        // Mengambil semua data produk
        $products = Product::all();
        return view('admin.data-barang', compact('products')); // Merujuk ke folder admin
    }

    // Menampilkan form penambahan barang
    public function create()
    {
        return view('admin.add'); // Merujuk ke folder admin
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
        ]);

        try {
            // Menyimpan data ke database
            Product::create([
                'product_name' => $request->input('product_name'),
                'price' => $request->input('price'),
                'category' => $request->input('category'),
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika gagal menyimpan
            return redirect()->back()->with('fail', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }
}
