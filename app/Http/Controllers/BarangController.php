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
         // Membuat instance product baru dan menyimpan data
         $new_product = new Product();
         $new_product->nama_barang = $request->nama_barang;
         $new_product->harga = $request->harga; 
         $new_product->kategori_barang = $request->kategori_barang;
         $new_product->stok_barang = $request->stok_barang;
         $new_product->save();

         // Redirect ke halaman data-barang dengan pesan sukses
         return redirect()->route('data-barang.post')->with('success', 'Berhasil menambahkan produk');
      } catch (\Exception $e) {
         // Redirect kembali ke form tambah data dengan pesan error
         return redirect()->route('add-data-barang')->with('fail', 'Gagal menambahkan produk ' . $e->getMessage());
      }
   }
   
   public function EditProduct(Request $request){
      $request->validate([
          'full_name' => 'required|string',
          'email' => 'required|email|unique:users,email,' . $request->user_id,
          'phone_number' => 'required|numeric',
      ]);
  
      try {
          // Update user
          $update_user = Product::where('id', $request->user_id)->update([
              'name' => $request->full_name,
              'email' => $request->email,
              'phone_number' => $request->phone_number,
          ]);
  
          return redirect()->route('users.index')->with('success', 'User Updated Successfully');
      } catch (\Exception $e) {
          return redirect()->route('edit-user', ['id' => $request->user_id])->with('fail', $e->getMessage());
      }
  }
  
  public function loadEditForm($id) {
      // Mengambil data barang berdasarkan id
      $product = Product::find($id);
  
      // Jika data tidak ditemukan
      if (!$product) {
          return redirect()->back()->with('error', 'Data tidak ditemukan.');
      }
  
      // Menampilkan view edit dengan data barang yang telah diambil
      return view('user.in-ed.edit-data-barang', compact('product'));
  }
}