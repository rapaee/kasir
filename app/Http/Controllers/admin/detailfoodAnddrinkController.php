<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class detailfoodAnddrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.detail-food&drink',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */ // Menampilkan form untuk tambah data
   public function create()
   {
      // Mengambil semua produk dari database
      $new_product = Product::all();
      $kategori = Kategori::all();
      // Mengirim data produk ke view
      return view('admin.add-detail-data-barang',  compact('kategori'),[
         'new_product' => $new_product,
      ]);
   }

   // Menyimpan data produk baru
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
           return redirect()->route('detail-f&d-admin')->with('success', 'Berhasil menambahkan produk');
       } catch (\Exception $e) {
           // Redirect kembali ke form tambah data dengan pesan error
           return redirect()->route('add-detail-data-barang-admin')->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
       }
   }
   

   
   public function destroy($id)
   {
       $dataBarang = Product::find($id);
       if ($dataBarang) {
           $dataBarang->delete();
           return redirect()->route('detail-f&d-admin')->with('success', 'Data barang berhasil dihapus');
       } else {
           return redirect()->route('detail-f&d-admin')->with('error', 'Data barang tidak ditemukan');
       }
   }

   public function edit($id)
{
    $barang = Product::findOrFail($id); // Mengambil data produk berdasarkan id
    $kategori = Kategori::all(); // Mengambil semua kategori
    return view('admin/edit-detail-data-barang', compact('barang', 'kategori')); // Mengirim data barang dan kategori ke view
}

   
public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_barang' => 'required|string',
        'kode_barang' => 'required|numeric',
        'harga' => 'required|numeric',
        'id_kategori' => 'required|exists:kategori,id', // Pastikan validasi kolom 'id_kategori'
        'stok_barang' => 'required|numeric',
    ]);

    try {
        // Mengambil data barang berdasarkan ID
        $barang = Product::findOrFail($id);

        // Update data barang
        $barang->nama_barang = $request->nama_barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->harga = $request->harga;
        $barang->id_kategori = $request->id_kategori; // Menggunakan id_kategori
        $barang->stok_barang = $request->stok_barang;
        $barang->save();

        // Redirect ke halaman data-barang dengan pesan sukses
        return redirect()->route('detail-f&d-admin')->with('success', 'Berhasil mengupdate produk');
    } catch (\Exception $e) {
        // Redirect kembali ke form dengan pesan error
        return redirect()->route('update-data-detail-barang-admin', $id)->with('fail', 'Gagal mengupdate produk: ' . $e->getMessage());
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
