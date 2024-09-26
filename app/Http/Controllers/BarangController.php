<?php
namespace App\Http\Controllers;

use App\Models\Product;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class BarangController extends Controller
{
   // Menampilkan form untuk tambah data
   public function create()
   {
      // Mengambil semua produk dari database
      $new_product = Product::all();
      
      // Mengirim data produk ke view
      return view('user.in-ed.add-data-barang', [
         'new_product' => $new_product,
      ]);
   }

   // Menyimpan data produk baru
   public function store(Request $request)
   {
      // Validasi input dari form
      $request->validate([
         'nama_barang' => 'required|string',
         'harga' => 'required|numeric',
         'kategori_barang' => 'required|string',
         'stok_barang' => 'required|numeric',
      ]);

      try {
         // Membuat instance produk baru dan menyimpan data
         $new_product = new Product();
         $new_product->nama_barang = $request->nama_barang;
         $new_product->harga = $request->harga; 
         $new_product->kategori_barang = $request->kategori_barang;
         $new_product->stok_barang = $request->stok_barang;
         $new_product->save();

         // Redirect ke halaman data-barang dengan pesan sukses
         return redirect()->route('data-barang-user')->with('success', 'Berhasil menambahkan produk');
      } catch (\Exception $e) {
         // Redirect kembali ke form tambah data dengan pesan error
         return redirect()->route('add-data-barang')->with('fail', 'Gagal menambahkan produk: ' . $e->getMessage());
      }
   }

   public function destroy($id)
   {
       $dataBarang = Product::find($id);
       if ($dataBarang) {
           $dataBarang->delete();
           return redirect()->route('data-barang-user')->with('success', 'Data barang berhasil dihapus');
       } else {
           return redirect()->route('data-barang-user')->with('error', 'Data barang tidak ditemukan');
       }
   }

   public function edit($id)
   {
       $barang = Product::findOrFail($id);
       return view('user.in-ed.edit-data-barang', compact('barang'));
   }
   
   public function update(Request $request, string $id)
   {
       // Validasi input
       $request->validate([
           'nama_barang' => 'required|string|max:255',
           'harga' => 'required|numeric',
           'kategori_barang' => 'required|string',
           'stok_barang' => 'required|numeric',
       ]);
   
       // Mengambil data barang berdasarkan id dan memperbarui
       $barang = Product::findOrFail($id);
   
       $barang->update([
           'nama_barang' => $request->input('nama_barang'),
           'harga' => $request->input('harga'),
           'kategori_barang' => $request->input('kategori_barang'),
           'stok_barang' => $request->input('stok_barang'),
       ]);
   
       // Redirect ke halaman data barang dengan pesan sukses
       return redirect()->route('data-barang-user')->with('success', 'Data produk berhasil diperbarui.');
   }
   
   
}


