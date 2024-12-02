<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan data produk dengan pagination
    public function nav1()
    {
        $new_product = Product::paginate(10);
        return view('user.data-barang', [
            'new_product' => $new_product,
        ]);
    }

    // Menampilkan form untuk tambah data produk
    public function create()
    {
        // Mengambil semua kategori dan produk untuk form
        $kategori = Kategori::all();
        return view('user.in-ed.add-data-barang', compact('kategori'));
    }

    // Menyimpan data produk baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_barang' => 'required|string',
            'kode_barang' => 'required|string',
            'harga' => 'required|numeric',
            'kategori_barang' => 'required|exists:kategori,id', // Validasi kategori
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
            return redirect()->route('data-barang-user')->with('success', 'Berhasil menambahkan produk');
        } catch (\Exception $e) {
            // Redirect kembali ke form tambah data dengan pesan error
            return redirect()->route('add-data-barang')->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }

    // Menghapus data produk
    public function destroy($id)
    {
        try {
            $dataBarang = Product::findOrFail($id); // Menggunakan findOrFail untuk otomatis menangani jika tidak ditemukan
            $dataBarang->delete();
            return redirect()->route('data-barang-user')->with('success', 'Data barang berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('data-barang-user')->with('error', 'Data barang tidak ditemukan');
        }
    }

    // Menampilkan form untuk edit data produk
    public function edit($id)
    {
        $barang = Product::findOrFail($id); // Mengambil data produk berdasarkan id
        $kategori = Kategori::all(); // Mengambil semua kategori
        return view('user/in-ed.edit-data-barang', compact('barang', 'kategori')); // Mengirim data barang dan kategori ke view
    }

    // Mengupdate data produk
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string',
            'kode_barang' => 'required|string',
            'harga' => 'required|numeric',
            'kategori_barang' => 'required|exists:kategori,id', // Validasi kategori
            'stok_barang' => 'required|numeric',
        ]);

        try {
            // Mengambil data barang berdasarkan ID
            $barang = Product::findOrFail($id);

            // Update data barang
            $barang->nama_barang = $request->nama_barang;
            $barang->kode_barang = $request->kode_barang;
            $barang->harga = $request->harga;
            $barang->id_kategori = $request->kategori_barang; // Menggunakan kategori_barang
            $barang->stok_barang = $request->stok_barang;
            $barang->save();

            // Redirect ke halaman data-barang dengan pesan sukses
            return redirect()->route('data-barang-user')->with('success', 'Berhasil mengupdate produk');
        } catch (\Exception $e) {
            // Redirect kembali ke form dengan pesan error
            return redirect()->route('update-data-barang', $id)->with('fail', 'Gagal mengupdate produk: ' . $e->getMessage());
        }
    }
};
