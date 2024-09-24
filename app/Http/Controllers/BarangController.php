<?php
namespace App\Http\Controllers;

use App\Models\Product;
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
         return redirect()->route('data-barang')->with('success', 'Berhasil menambahkan produk');
      } catch (\Exception $e) {
         // Redirect kembali ke form tambah data dengan pesan error
         return redirect()->route('add-data-barang')->with('fail', 'Gagal menambahkan produk: ' . $e->getMessage());
      }
   }
   public function destroy($id) {
    try {
        // Hapus produk berdasarkan ID
        Product::where('id_barang', $id)->delete();
        
        // Redirect setelah berhasil dihapus ke halaman data-barang
        return redirect()->route('data-barang.post')->with('success', 'Berhasil menghapus produk');
    } catch (\Exception $e) {
        // Redirect jika terjadi error dengan pesan error
        return redirect()->route('data-barang.post')->with('fail', 'Gagal menghapus produk: ' . $e->getMessage());
    }
}


}
